<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MY_Controller
{
  
  var $js;

  function __construct() {
    parent:: __construct(); 
    $this->sess->unrestricted();
  }

	/**
	 * Index page
	 */
  public function index() {
    $config['view'] = 'view_categories';
    $config['title'] = 'Categories';
    $config['categories'] = $this->dbdelta->get_all( 'tbl_category' );
    $config['subcategories'] = $this->dbdelta->get_all( 'tbl_subcategory' );
    $this->content->view( $config );
  }

  /**
   * Add
   */
  public function add() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'cat_name' ) ) {
        $name = strtolower( $this->input->post( 'cat_name' ) );
        $data = [
          'category_name' => $name
        ];

        $data = clean_array( $data );
        if ( ! $this->dbdelta->check( 'tbl_category', [ 'category_name' => trim( $name ) ] ) ) {
          if ( $this->dbdelta->insert( 'tbl_category', $data ) ) {
            if ( $this->model_log->add( task( 'category' )['add'] ) ) {
              response( [ 'msg' => 'success', 'data' => 'added.' ] );
            }
          }
        } else {
          response( [ 'msg' => 'exist', 'data' => 'Category' ] );
        }
      }
    }

    $config['view'] = 'view_add';
    $config['title'] = 'Add Category';
    $this->content->view( $config );
  }

  /**
   * Edit
   */
  public function edit() {
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {
        $data = $this->dbdelta->get_by_id( 'tbl_category', [ 'category_id' => $this->input->get( 'id' ) ] );
      }
    } else {
      if ( $this->input->post( 'category_id' ) ) {
        $id = $this->input->post( 'category_id' );
        $data = [
          'category_name'  => strtolower( $this->input->post( 'cat_name' ) )
        ];

        $data = clean_array( $data );
        if ( $this->dbdelta->update( 'tbl_category', $data, [ 'category_id' => $id ] ) ) {
          if ( $this->model_log->add( task( 'category' )['update'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'updated.' ] );
          }
        }
      }
    }

    $config['view'] = 'view_edit';
    $config['title'] = 'Edit Category';
    $config['category'] = $data;
    $this->content->view( $config );
  }

  /**
   * Delete
   */
  public function delete() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'id' ) ) {
        $id = $this->input->post( 'id' );

        if ( $this->dbdelta->delete( 'tbl_category', 'category_id', $id ) ) {
          if ( $this->model_log->add( task( 'category' )['delete'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'deleted.' ] );
          }
        }
      }
    }
  }

}
