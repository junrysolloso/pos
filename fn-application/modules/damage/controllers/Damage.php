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
        $inv_items = $this->dbdelta->get_all( 'tbl_inventory', [], 0, [], [ 'item_id' => $data['item_id'] ] );
        if ( ! empty( $inv_items ) ) {
          $inventory_data = [
            'inv_rem_stocks' => intval( $inv_items[0]->inv_rem_stocks ) - $data['ds_quantity']
          ];
          if ( isset( $inventory_data ) ) {
            $this->dbdelta->update( 'tbl_inventory', $inventory_data, [ 'item_id' => $data['item_id'] ] );
          }
        } 

        if ( $this->dbdelta->insert( 'tbl_damagestocks', $data ) ) {
          if ( $this->model_log->add( task( 'damage' )['add'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'added.' ] );
          }
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
        $o_quantity = intval( $this->input->post( 'old_quantity' ) );

        $data = [
          'item_id' => trim( $this->input->post( 'barcode' ) ),
          'ds_quantity' => intval( $this->input->post( 'quantity' ) ),
          'ds_remarks' => strtolower( $this->input->post( 'remarks' ) ),
          'ds_date' => $this->input->post( 'date_reported' )
        ];

        $data = clean_array( $data );
        $n_quantity = $data['ds_quantity'] - $o_quantity;
        $inv_items = $this->dbdelta->get_all( 'tbl_inventory', [], 0, [], [ 'item_id' => $data['item_id'] ] );

        if ( $n_quantity > 0 ) {
          $inventory_data = [
            'inv_rem_stocks' => intval( $inv_items[0]->inv_rem_stocks ) - $n_quantity
          ];
        } else if ( $n_quantity < 0 ) {
          $inventory_data = [
            'inv_rem_stocks' => intval( $inv_items[0]->inv_rem_stocks ) + abs( $n_quantity )
          ];
        } else {
          $inventory_data = [
            'inv_rem_stocks' => intval( $inv_items[0]->inv_rem_stocks )
          ];
        }

        if ( ! empty( $inventory_data ) ) {
          $this->dbdelta->update( 'tbl_inventory', $inventory_data, [ 'item_id' => $data['item_id'] ] );
        } 

        if ( $this->dbdelta->update( 'tbl_damagestocks', $data, [ 'ds_id' => $id ] ) ) {
          if ( $this->model_log->add( task( 'damage' )['update'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'updated.' ] );
          }
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
          if ( $this->model_log->add( task( 'damage' )['delete'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'deleted.' ] );
          }
        }
      }
    }
  }

}
