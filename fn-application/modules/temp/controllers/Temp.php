<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Temp extends MY_Controller
{
  
  var $js;

  function __construct() {
    parent:: __construct(); 
    $this->sess->unrestricted();
  }

  /**
   * Add
   */
  public function add() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'item_id' ) ) {
        $data = [
          'tmp_barcode'   => $this->input->post( 'item_id' ),
          'tmp_date'      => $this->input->post( 'order_date' ),
          'tmp_quantity'  => $this->input->post( 'prod_quantity' ),
          'tmp_price'     => $this->input->post( 'unit_price' ),
          'tmp_srp'       => $this->input->post( 'prod_srp' ),
          'tmp_expiry'    => $this->input->post( 'expiry_date' ), 
        ];
      }

      $data = clean_array( $data );
      if ( $this->dbdelta->check( 'tbl_temp_orderdetails', [ 'tmp_barcode' => trim( $this->input->post( 'item_id' ) ) ] ) ) {
        response( [ 'msg' => 'exist', 'data' => 'Product' ] );
      } else {
        if ( $this->dbdelta->insert( 'tbl_temp_orderdetails', $data ) ) {
          response( [ 'msg' => 'success', 'data' => 'added.' ] );
        }
      }
    }

    $fields = '`id`, `tbl_items`.`item_id` AS `item_id` ,`item_name`, `item_description` AS `desc`, `category_name`, `uc_number` AS `equivalent`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id1` ) AS `order_unit`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id2`) AS `selling_unit`';
    $joins = [
      'tbl_subcategory' => '`tbl_subcategory`.`subcat_id`=`tbl_items`.`subcat_id`',
      'tbl_category' => '`tbl_category`.`category_id`=`tbl_subcategory`.`category_id`',
      'tbl_ucjunc' => '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`',
      'tbl_unitconvert' => '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`'
    ];

    $sql = 'SUM((`tmp_quantity` * `tmp_price`)) AS sum';
    $date = $this->dbdelta->get_col_data( 'tbl_temp_orderdetails', 'tmp_date' );

    $config['order_date'] = $date ? $date[0]->tmp_date : 'yyyy-mm-dd';
    $config['total_amount'] = $this->dbdelta->get_sum( 'tbl_temp_orderdetails', $sql );
    $config['products'] = $this->dbdelta->get_all( 'tbl_items', [], 0, $joins, [], 0, $fields );

    $joins = array_merge( ['tbl_items' => '`tbl_items`.`item_id`=`tbl_temp_orderdetails`.`tmp_barcode`'], $joins );
    $fields = '`tbl_temp_orderdetails`.`id` AS `id`, `item_name`, `item_description`, `tmp_barcode`, `uc_number` AS `equivalent`, `tmp_date`, `tmp_quantity`, `tmp_price`, `tmp_srp`, `tmp_expiry`, `category_name`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id1` ) AS `order_unit`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id2`) AS `selling_unit`';
    $config['temps'] = $this->dbdelta->get_all( 'tbl_temp_orderdetails', [], 0, $joins, [], 0, $fields );

    $config['view'] = 'view_add';
    $config['title'] = 'Add Order';
    $config['subcategories'] = $this->dbdelta->get_all( 'tbl_subcategory' );
    $config['units'] = $this->dbdelta->get_all( 'tbl_unit' );
    $this->content->view( $config );
  }

  /**
   * Edit
   */
  public function edit() {
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {
        $fields = '`tbl_temp_orderdetails`.`id` AS `id`, `item_name`, `item_description`, `tmp_barcode`, `uc_number` AS `equivalent`, `tmp_date`, `tmp_quantity`, `tmp_price`, `tmp_srp`, `tmp_expiry`, `category_name`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id1` ) AS `order_unit`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id2`) AS `selling_unit`';
        $joins = [
          'tbl_items' => '`tbl_items`.`item_id`=`tbl_temp_orderdetails`.`tmp_barcode`',
          'tbl_subcategory' => '`tbl_subcategory`.`subcat_id`=`tbl_items`.`subcat_id`',
          'tbl_category' => '`tbl_category`.`category_id`=`tbl_subcategory`.`category_id`',
          'tbl_ucjunc' => '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`',
          'tbl_unitconvert' => '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`'
        ];
        $data = $this->dbdelta->get_all( 'tbl_temp_orderdetails', [], 0, $joins, ['tbl_temp_orderdetails.id' => $this->input->get( 'id' )], 0, $fields );
      }
    } else {
      if ( $this->input->post( 'tmp_id' ) ) {
        $id = intval( $this->input->post( 'tmp_id' ) );
        $data = [
          'tmp_barcode'   => $this->input->post( 'item_id' ),
          'tmp_date'      => $this->input->post( 'order_date' ),
          'tmp_quantity'  => $this->input->post( 'prod_quantity' ),
          'tmp_price'     => $this->input->post( 'unit_price' ),
          'tmp_srp'       => $this->input->post( 'prod_srp' ),
          'tmp_expiry'    => $this->input->post( 'expiry_date' ), 
        ];

        $data = clean_array( $data );
        if ( $this->dbdelta->update( 'tbl_temp_orderdetails', $data, [ 'id' => $id ] ) ) {
          response( [ 'msg' => 'success', 'data' => 'updated.' ] );
        }
      }
    }

    $config['view'] = 'view_edit';
    $config['title'] = 'Edit Product';
    $config['temp'] = $data;
    $this->content->view( $config );
  }

  /**
   * Delete
   */
  public function delete() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'id' ) ) {
        $id = $this->input->post( 'id' );

        if ( $this->dbdelta->delete( 'tbl_temp_orderdetails', 'id', $id ) ) {
          response( [ 'msg' => 'success', 'data' => 'deleted.' ] );
        }
      }
    }
  }

  /**
   * Reset
   */
  public function reset() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'reset_orders' ) ) {
        if ( $this->dbdelta->reset_table( 'tbl_temp_orderdetails' ) ) {
          response( [ 'msg' => 'success', 'data' => 'reset.' ] );
        }
      }
    }
  }

}
