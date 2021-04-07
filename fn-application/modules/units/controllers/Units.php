<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Units extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 
    $this->sess->unrestricted();
  }

	/**
	 * Index page
	 */
  public function index() {
    $config['view'] = 'view_units';
    $config['title'] = 'Units';
		$config['body_class'] = 'units';
    $config['units'] = $this->dbdelta->get_all( 'tbl_unit' );

    $this->content->view( $config );
  }

  /**
   * Add
   */
  public function add() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'unit_desc' ) ) {
        $desc = strtolower( $this->input->post( 'unit_desc' ) );
        $unit = [
          'unit_desc' => $desc,
          'unit_sh' => strtolower( $this->input->post( 'unit_short' ) )
        ];

        $unit = clean_array( $unit );
        if ( ! $this->dbdelta->check( 'tbl_unit', [ 'unit_desc' => trim( $desc ) ] ) ) {
          if ( $this->dbdelta->insert( 'tbl_unit', $unit ) ) {
            if ( $this->model_log->add( task( 'unit' )['add'] ) ) {
              response( [ 'msg' => 'success', 'data' => 'added.' ] );
            }
          }
        } else {
          response( [ 'msg' => 'exist', 'data' => 'Unit' ] );
        }
      }
    }

    $config['view'] = 'view_add';
    $config['title'] = 'Add Unit';
		$config['body_class'] = 'units';
    $this->content->view( $config );
  }

  /**
   * Edit
   */
  public function edit() {
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {
        $data = $this->dbdelta->get_by_id( 'tbl_unit', [ 'unit_id' => $this->input->get( 'id' ) ] );
      }
    } else {
      if ( $this->input->post( 'unit_id' ) ) {
        $id = $this->input->post( 'unit_id' );
        $unit = [
          'unit_desc'  => strtolower( $this->input->post( 'unit_desc' ) ),
          'unit_sh'  => strtolower( $this->input->post( 'unit_short' ) )
        ];

        $unit = clean_array( $unit );
        if ( $this->dbdelta->update( 'tbl_unit', $unit, [ 'unit_id' => $id ] ) ) {
          if ( $this->model_log->add( task( 'unit' )['update'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'updated.' ] );
          }
        }
      }
    }

    $config['view'] = 'view_edit';
    $config['title'] = 'Edit Unit';
		$config['body_class'] = 'units';
    $config['unit'] = $data;

    $this->content->view( $config );
  }

  /**
   * Delete
   */
  public function delete() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'id' ) ) {
        $id = $this->input->post( 'id' );

        if ( $this->dbdelta->delete( 'tbl_unit', 'unit_id', $id ) ) {
          if ( $this->model_log->add( task( 'unit' )['delete'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'deleted.' ] );
          }
        }
      }
    }
  }

}
