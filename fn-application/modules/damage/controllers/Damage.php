<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Damage extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 
    $this->sess->unrestricted();
  }

	/**
	 * Index page
	 */
  public function index() {
    $joins = [
      'tbl_items' => '`tbl_items`.`item_id`=`tbl_damagestocks`.`item_id`'
    ];

    $config['view'] = 'view_damage';
    $config['title'] = 'Damage Products';
    $config['damage'] = $this->dbdelta->get_all( 'tbl_damagestocks', [], 0, $joins );

    $this->content->view( $config );
  }

  /**
   * Add
   */
  public function add() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'date_reported' ) ) {
        $data = [
          'item_id' => trim( $this->input->post( 'barcode' ) ),
          'ds_quantity' => intval( $this->input->post( 'quantity' ) ),
          'ds_remarks' => strtolower( $this->input->post( 'remarks' ) ),
          'ds_date' => $this->input->post( 'date_reported' )
        ];

        $data = clean_array( $data );
        if ( $this->dbdelta->insert( 'tbl_damagestocks', $data ) ) {
          response( [ 'msg' => 'success', 'data' => 'added.' ] );
        }
      }
    }

    $config['view'] = 'view_add';
    $config['title'] = 'Add Damage';
    $this->content->view( $config );
  }

  /**
   * Edit
   */
  public function edit() {
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {
        $data = $this->dbdelta->get_by_id( 'tbl_damagestocks', [ 'ds_id' => $this->input->get( 'id' ) ] );
      }
    } else {
      if ( $this->input->post( 'date_reported' ) ) {
        $id = $this->input->post( 'ds_id' );
        $data = [
          'item_id' => trim( $this->input->post( 'barcode' ) ),
          'ds_quantity' => intval( $this->input->post( 'quantity' ) ),
          'ds_remarks' => strtolower( $this->input->post( 'remarks' ) ),
          'ds_date' => $this->input->post( 'date_reported' )
        ];

        $data = clean_array( $data );
        if ( $this->dbdelta->update( 'tbl_damagestocks', $data, [ 'ds_id' => $id ] ) ) {
          response( [ 'msg' => 'success', 'data' => 'updated.' ] );
        }
      }
    }

    $config['view'] = 'view_edit';
    $config['title'] = 'Edit Damage';
    $config['damage'] = $data;
    $this->content->view( $config );
  }

  /**
   * Delete
   */
  public function delete() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'id' ) ) {
        $id = $this->input->post( 'id' );

        if ( $this->dbdelta->delete( 'tbl_damagestocks', 'ds_id', $id ) ) {
          response( [ 'msg' => 'success', 'data' => 'deleted.' ] );
        }
      }
    }
  }

}
