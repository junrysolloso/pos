<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller
{
  
  var $js;

  function __construct() {
    parent:: __construct(); 
    $this->sess->restricted();
    $this->js = [ 'fn-assets/js/pages/page_users.js' ];
  }

	/**
	 * Index page
	 */
  public function index() {
    $logins[] = [];

    $config['view'] = 'view_users';
    $config['title'] = 'Users';
		$config['body_class'] = 'users';
    $config['js'] = $this->js;

    $join = [ 'user_meta' => '`tbl_user_meta`.`user_id`=`tbl_user_login`.`user_id`' ];
    $config['users'] = $this->dbdelta->get_all( 'user_login', [ 'login_id' => 'ASC' ], 0, $join );
    $config['count'] = $this->dbdelta->get_count( 'tbl_user_meta', 'user_id' );

    if ( isset( $config['users'] ) ) $this->model_log->add( task( 'user' )['view'] );

    foreach ( $config['users'] as $key ) {
      $filter = [ 'user_id' => $key->user_id, 'log_task' => 'Log In' ];
      $count = $this->dbdelta->get_count( 'tbl_logs', 'log_id', false, $filter );
      $logins[] = $count;
    }

    $config['logins'] = $logins;
    $this->content->view( $config );
  }

  /**
   * Add
   */
  public function add() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'user_fname' ) ) {

        $photo_name = 'avatar.jpg';
        if ( isset( $_FILES['photo'] ) ) {
          $photo_name = $this->fileuploader->photo( 'photo', 'profiles' );
        }
        
        $meta = [
          'user_fname'  => strtolower( $this->input->post( 'user_fname' ) ),
          'user_email'  => $this->input->post( 'user_email' ),
          'user_phone'  => $this->input->post( 'user_phone' ),
          'user_photo'  => $photo_name,
          'user_address'=> strtolower( $this->input->post( 'user_address' ) ),
          'user_status' => strtolower( 'active' ),
          'user_bio'    => strtolower( $this->input->post( 'user_bio' ) ),
        ];

        $meta = clean_array( $meta );
        $login_name = strtolower( $this->input->post( 'user_name' ) );

        if ( ! $this->dbdelta->check( 'user_login', [ 'login_name'=> trim( $login_name ) ] ) ) {
          if ( $this->dbdelta->insert( 'user_meta', $meta ) ) {

            $login = [
              'login_name'  => $login_name,
              'login_pass'  => md5( $this->input->post( 'user_pass' ) ),
              'login_level' => strtolower( $this->input->post( 'user_level' ) ),
              'user_id'     => $this->dbdelta->get_max_id( 'tbl_user_meta', 'user_id' )
            ];

            $login = clean_array( $login );
            if ( $this->dbdelta->insert( 'user_login', $login ) ) {
              if ( $this->model_log->add( task( 'user' )['add'] ) ) {
                response( [ 'msg' => 'success', 'data' => 'added.' ] );
              }
            }
          }
        } else {
          response( [ 'msg' => 'exist', 'data' => 'Username' ] );
        }
      }
    }

    $config['view'] = 'view_add';
    $config['title'] = 'Add User';
		$config['body_class'] = 'users';
    $config['js'] = $this->js;
    $this->content->view( $config );
  }

  /**
   * Edit
   */
  public function edit() {
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

      if ( $this->input->get( 'id' ) ) {
        $join = [ 'user_meta' => '`tbl_user_meta`.`user_id`=`tbl_user_login`.`user_id`' ];
        $data = $this->dbdelta->get_by_id( 'user_login', [ 'tbl_user_meta.user_id' => $this->input->get( 'id' ) ], $join );
      }
    } else {

      if ( $this->input->post( 'user_id' ) ) {
        
        $photo_name = $this->input->post( 'orig_photo' );
        if ( isset( $_FILES['photo'] ) ) {
          $photo_name = $this->fileuploader->photo( 'photo', 'profiles' );
        }
          
        $id = $this->input->post( 'user_id' );
        $meta = [
          'user_email'  => $this->input->post( 'user_email' ),
          'user_phone'  => $this->input->post( 'user_phone' ),
          'user_photo'  => $photo_name,
          'user_fname'  => strtolower( $this->input->post( 'user_fname' ) ),
          'user_address'=> strtolower( $this->input->post( 'user_address' ) ),
          'user_status' => strtolower( $this->input->post( 'user_status' ) ),
          'user_bio'    => strtolower( $this->input->post( 'user_bio' ) ),
        ];

        $login = [
          'login_name'  => strtolower( $this->input->post( 'user_name' ) ),
          'login_pass'  => $this->input->post( 'user_pass' ) ? md5( $this->input->post( 'user_pass' ) ) : NULL,
          'login_level' => strtolower( $this->input->post( 'user_level' ) ),
        ];

        $meta  = clean_array( $meta );
        $login = clean_array( $login );

        if ( $this->dbdelta->update( 'user_meta', $meta, [ 'user_id' => $id ] ) ) {
          if ( $this->dbdelta->update( 'user_login', $login, [ 'user_id' => $id ] ) ) {
            if ( $this->model_log->add( task( 'user' )['update'] ) ) {
              response( [ 'msg' => 'success', 'data' => 'updated.' ] );
            }
          }
        }
      }
    }

    $config['view'] = 'view_edit';
    $config['title'] = 'Edit User';
		$config['body_class'] = 'users';
    $config['user'] = $data;
    $config['js'] = $this->js;
    $this->content->view( $config );
  }

  /**
   * Delete
   */
  public function delete() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'id' ) ) {
        $id = $this->input->post( 'id' );

        if ( $this->dbdelta->delete( 'tbl_user_login', 'user_id', $id ) ) {
          if ( $this->dbdelta->delete( 'tbl_user_meta', 'user_id', $id ) ) {
            if ( $this->model_log->add( task( 'user' )['delete'] ) ) {
              response( [ 'msg' => 'success', 'data' => 'deleted.' ] );
            }
          }
        }
      }
    }
  }

}
