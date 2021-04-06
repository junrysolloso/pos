<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends MY_Controller
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
    $fields = '`order_id` AS `order_id`, `order_date`, `order_total`';
    $page = intval( $this->input->get( 'page' ) );
    $link = base_url() . 'orders';
    $rows = $this->dbdelta->get_count( 'tbl_orders', 'order_id' );
    $offset = $page && is_numeric( $page ) ? $page : 0;

    $config['view'] = 'view_orders';
    $config['title'] = 'Orders';
    $config['orders'] = $this->dbdelta->get_all( 'tbl_orders', [ '`order_date`' => 'DESC' ], 50, [], [], $offset, $fields );
    $config['pagination'] = $this->paginate->links( $link, 50, $rows );
    $this->content->view( $config );
  }

  /**
	 * Order items page
	 */
  public function view() {
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {
        $id = intval( $this->input->get( 'id' ) );

        $filter = [ '`tbl_orders`.`order_id`' => $id ];
        $fields = '`tbl_orderdetails`.`orderdetails_id` AS `id`, `tbl_orders`.`order_id` AS `oid`, `item_name` AS `name`, `item_description` AS `desc`, `tbl_items`.`item_id` AS `barcode`, `order_date` AS `odate`, `no_of_stocks` AS `stocks`, `orderdetails_quantity` AS `quantt`, `price_per_unit` AS `price`, `inv_item_srp` AS `srp`, `expiry_date` AS `exdate`, `category_name` AS `catname`, `uc_number` AS `equiv`, `unit_desc` AS `udesc`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id1` ) AS `order_unit`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id2`) AS `selling_unit`';
        $joins = [ 
          'tbl_orderdetails' => '`tbl_orderdetails`.`orderdetails_id`=`tbl_orderinventory`.`orderdetails_id`',
          'tbl_orderdetails_expiry' => '`tbl_orderdetails_expiry`.`orderdetails_id`=`tbl_orderdetails`.`orderdetails_id`',
          'tbl_orders' => '`tbl_orderdetails`.`order_id`=`tbl_orders`.`order_id`',
          'tbl_items' => '`tbl_orderdetails`.`item_id`=`tbl_items`.`item_id`',
          'tbl_ucjunc' => '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`',
          'tbl_unit' => '`tbl_unit`.`unit_id`=`tbl_items`.`unit_id`',
          'tbl_subcategory' => '`tbl_items`.`subcat_id`=`tbl_subcategory`.`subcat_id`',
          'tbl_category' => '`tbl_category`.`category_id`=`tbl_subcategory`.`category_id`',
          'tbl_unitconvert' => '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`'
        ];
    
        $config['view'] = 'view_items';
        $config['title'] = 'Order Items';
        $config['orders'] = $this->dbdelta->get_all( 'tbl_orderinventory', [ '`order_date`' => 'DESC' ], 0, $joins, $filter, 0, $fields );
        $this->content->view( $config );
      }
    }
  }

  /**
   * Edit
   */
  public function edit() {
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {

        $id = $this->input->get( 'id' );
        $filter = [ '`tbl_orderdetails`.`orderdetails_id`' => $id ];
        $fields = '`tbl_orderdetails`.`orderdetails_id` AS `id`, `tbl_orders`.`order_id` AS `oid`, `item_name` AS `name`, `item_description` AS `desc`, `tbl_items`.`item_id` AS `barcode`, `order_date` AS `odate`, `no_of_stocks` AS `stocks`, `orderdetails_quantity` AS `quantt`, `price_per_unit` AS `price`, `inv_item_srp` AS `srp`, `expiry_date` AS `exdate`, `category_name` AS `catname`, `uc_number` AS `equiv`, `unit_desc` AS `udesc`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id1` ) AS `order_unit`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id2`) AS `selling_unit`';
        $joins = [ 
          'tbl_orderdetails' => '`tbl_orderdetails`.`orderdetails_id`=`tbl_orderinventory`.`orderdetails_id`',
          'tbl_orderdetails_expiry' => '`tbl_orderdetails_expiry`.`orderdetails_id`=`tbl_orderdetails`.`orderdetails_id`',
          'tbl_orders' => '`tbl_orderdetails`.`order_id`=`tbl_orders`.`order_id`',
          'tbl_items' => '`tbl_orderdetails`.`item_id`=`tbl_items`.`item_id`',
          'tbl_ucjunc' => '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`',
          'tbl_unit' => '`tbl_unit`.`unit_id`=`tbl_items`.`unit_id`',
          'tbl_subcategory' => '`tbl_items`.`subcat_id`=`tbl_subcategory`.`subcat_id`',
          'tbl_category' => '`tbl_category`.`category_id`=`tbl_subcategory`.`category_id`',
          'tbl_unitconvert' => '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`'
        ];
        $data = $this->dbdelta->get_all( 'tbl_orderinventory', [], 0, $joins, $filter, 0, $fields );
      }
    } else {
      if ( $this->input->post( 'details_id' ) ) {
        $order_id = intval( $this->input->post( 'order_id' ) );
        $details_id = intval( $this->input->post( 'details_id' ) );
        $item_id = intval( $this->input->post( 'item_id' ) );

        $orderdetails = array (
          'price_per_unit' => $this->input->post( 'unit_price' ),
        );
  
        $expiry = array (
          'expiry_date' => $this->input->post( 'expiry_date' ),
        );
  
        $order_inv = array (
          'ordinv_unit_price' => $this->input->post( 'unit_price' ),
          'inv_item_srp' => $this->input->post( 'prod_srp' ),
        );
  
        $inventory = array (
          'inv_item_srp' => $this->input->post( 'prod_srp' ),
        );

        $orderdetails = clean_array( $orderdetails );
        $expiry = clean_array( $expiry );
        $order_inv = clean_array( $order_inv );
        $inventory = clean_array( $inventory );

        if ( $this->dbdelta->update( 'tbl_orderdetails', $orderdetails, [ 'orderdetails_id' => $details_id ] ) ) {
          if ( $this->dbdelta->update( 'tbl_orderdetails_expiry', $expiry, [ 'orderdetails_id' => $details_id ] ) ) {
            if ( $this->dbdelta->update( 'tbl_orderinventory', $order_inv, [ 'orderdetails_id' => $details_id ] ) ) {
              if ( $this->dbdelta->update( 'tbl_inventory', $inventory, [ 'item_id' => $item_id ] ) ) {
                if ( $this->db->simple_query( 'UPDATE `tbl_orders` SET `order_total`= (SELECT SUM((`orderdetails_quantity` * `price_per_unit`)) FROM `tbl_orderdetails` WHERE `order_id`='.$order_id.' ) WHERE `order_id`='.$order_id.'' ) ) {
                  response( [ 'msg' => 'success', 'data' => 'updated.' ] );
                }
              }
            }
          }
        }
      }
    }

    $config['view'] = 'view_edit';
    $config['title'] = 'Edit Order';
    $config['order'] = $data;
    $this->content->view( $config );
  }

  /**
   * Save orders
   */
  public function save() {
    $inv_flag = false;  
    $flag = false;

    $tmp_date = $this->dbdelta->get_col_data( 'tbl_temp_orderdetails', 'tmp_date' )[0]->tmp_date;
    $tmp_total = floatval( $this->dbdelta->get_sum( 'tbl_temp_orderdetails', 'SUM((`tmp_quantity` * `tmp_price`)) AS sum' ) );
    $orders = $this->dbdelta->get_all( 'tbl_temp_orderdetails' );

    if ( $this->dbdelta->check( 'tbl_orders', [ 'order_date' => $tmp_date ] ) ) {
      $old_order = $this->dbdelta->get_by_id( 'tbl_orders', [ 'order_date' => $tmp_date ], [], [], NULL, 1 );

      $id = $old_order[0]->order_id;
      $o_total =  floatval( $old_order[0]->order_total );

      $data = [
        'order_total' => ( $tmp_total + $o_total )
      ];
      
      $this->dbdelta->update( 'tbl_orders', $data, [ 'order_id' => $id ] );
    } else {
      $data = [
        'order_date' => $tmp_date,
        'order_total' => $tmp_total
      ];
      $this->dbdelta->insert( 'tbl_orders', $data );
      $id = $this->dbdelta->get_max_id( 'tbl_orders', 'order_id' );
    }

    foreach ( $orders as $row ) {
      $data = [
        'order_id' => $id,
        'item_id' => $row->tmp_barcode,
        'orderdetails_quantity' => $row->tmp_quantity,
        'price_per_unit' => $row->tmp_price
      ];

      if ( $this->dbdelta->insert( 'tbl_orderdetails', $data ) ) {
        $details_id = $this->dbdelta->get_max_id( 'tbl_orderdetails', 'orderdetails_id' );
        $fields = '`uc_number` AS unit';

        $joins = [
          'tbl_ucjunc' => '`tbl_orderdetails`.`item_id`=`tbl_ucjunc`.`item_id`',
          'tbl_unitconvert' => '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`'
        ];
        $filter = [
          '`tbl_orderdetails`.`item_id`' => $row->tmp_barcode
        ];

        $unit = $this->dbdelta->get_all( 'tbl_orderdetails', [], 1, $joins, $filter, 0, $fields )[0]->unit;
        $stocks = intval( $row->tmp_quantity ) * intval( $unit );
        $inv_price = intval( $row->tmp_quantity * $row->tmp_price ) / intval( $stocks );
        
        $inv_data = [
          'orderdetails_id' => $details_id,
          'ordinv_unit_price' => $inv_price,
          'no_of_stocks' => $stocks,
          'inv_item_srp' => $row->tmp_srp
        ];

        $ex_data = [
          'orderdetails_id' => $details_id, 
          'expiry_date'     => $row->tmp_expiry,
          'rem_stocks'      => $stocks
        ];

        $inv_items = $this->dbdelta->get_all( 'tbl_inventory', [], 0, [], [ 'item_id' => $row->tmp_barcode ] );
        if ( ! empty( $inv_items ) ) {
          $inv_rem_stocks = intval( $inv_items[0]->inv_rem_stocks ) + $stocks;
          $inv_flag = true;
        } else {
          $inv_rem_stocks = $stocks;
        }

        $inventory_data = [
          'item_id' => $row->tmp_barcode,
          'inv_rem_stocks' => $inv_rem_stocks,
          'inv_item_srp' => $row->tmp_srp
        ];

        if ( $inv_flag ) {
          $this->dbdelta->update( 'tbl_inventory', $inventory_data, [ 'item_id' => $row->tmp_barcode ] );
        } else {
          $this->dbdelta->insert( 'tbl_inventory', $inventory_data );
        }

        if ( $this->dbdelta->insert( 'tbl_orderinventory', $inv_data ) ) {
          if ( $this->dbdelta->insert( 'tbl_orderdetails_expiry', $ex_data ) ) {
            $flag = true;
          }
        }
      }
    }

    if ( $flag ) {
      if ( $this->dbdelta->reset_table( 'tbl_temp_orderdetails' ) ) {
        response( [ 'msg' => 'success', 'data' => 'save.' ] );
      }
    }
  }

  /**
   * Delete orders
   */
  public function delete_orders() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'id' ) ) {
        $id = $this->input->post( 'id' );

        if ( $this->dbdelta->delete( 'tbl_orders', 'order_id', $id ) ) {
          response( [ 'msg' => 'success', 'data' => 'deleted.' ] );
        }
      }
    }
  }

}
