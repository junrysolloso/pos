<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends MY_Controller
{
  
  var $joins = [
    'tbl_inventory' => '`tbl_items`.`item_id` = `tbl_inventory`.`item_id`',
    'tbl_orderdetails' => '`tbl_items`.`item_id` = `tbl_orderdetails`.`item_id`',
    'tbl_orderdetails_expiry' => '`tbl_orderdetails`.`orderdetails_id` = `tbl_orderdetails_expiry`.`orderdetails_id`',
    'tbl_subcategory' => '`tbl_subcategory`.`subcat_id`=`tbl_items`.`subcat_id`',
    'tbl_category' => '`tbl_subcategory`.`category_id`=`tbl_category`.`category_id`',
    'tbl_ucjunc' => '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`',
    'tbl_unitconvert' => '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`',
    'tbl_unit' => '`tbl_unit`.`unit_id`=`tbl_unitconvert`.`unit_id2`'
  ];

  function __construct() {
    parent:: __construct(); 
    $this->sess->unrestricted();
  }

  /**
   * Pharmacy
   */
  public function pharmacy() {
    $page = intval( $this->input->get( 'page' ) );
    $link = 'inventory/pharmacy';
    $this->data( 'pharmacy', $page, $link );
  }

  /**
   * Grocery
   */
  public function grocery() {
    $page = intval( $this->input->get( 'page' ) );
    $link = 'inventory/grocery';
    $this->data( 'grocery', $page, $link );
  }

  /**
   * Beauty products
   */
  public function beauty_products() {
    $page = intval( $this->input->get( 'page' ) );
    $link = 'inventory/beauty-products';
    $this->data( 'beauty products', $page, $link );
  }

  /**
   * Data
   */
  private function data( $category = NULL, $page = 0, $link = NULL ) {
    $limit = 50;
    $link = base_url() . $link;
    $rows = $this->dbdelta->get_count( 'tbl_items', '`inv_id`', NULL, [ 'category_name' => $category ], $this->joins );
    $offset = $page && is_numeric( $page ) ? $page : 0;

    $fields = '`tbl_items`.`item_id` AS `barcode` , `tbl_items`.`item_name` AS `name`, `tbl_items`.`item_description` AS `item_des`, `tbl_inventory`.`inv_rem_stocks` AS  `remaining`, `unit_desc`, `tbl_inventory`.`inv_item_srp` AS `srp`, `expiry_date`, `price_per_unit`';
    $filter = [ 'category_name' => $category ];
    $data = $this->dbdelta->get_all( 'tbl_items', [], $limit, $this->joins, $filter, $offset, $fields );

    $config['view'] = 'view_inventory';
    $config['title'] = ucwords( $category ) . ' Inventory';
    $config['inventory'] = $data;
    $config['pagination'] = $this->paginate->links( $link, $limit, $rows );
    $this->content->view( $config );
  }

  /**
   * Almost out of stocks
   */
  public function out_of_stocks() {
    $config['view'] = 'view_stocks';
    $config['title'] = 'Almost Out Of Stocks';

    $fields = '`tbl_items`.`item_id` AS `barcode` , `tbl_items`.`item_name` AS `name`, `tbl_items`.`item_description` AS `item_des`, `tbl_inventory`.`inv_rem_stocks` AS  `remaining`, `unit_desc`, `tbl_inventory`.`inv_item_srp` AS `srp`, `expiry_date`, `price_per_unit`, `item_critlimit`';
    $filter = [ '`inv_rem_stocks` < `item_critlimit`' => NULL ];
    $config['stocks'] = $this->dbdelta->get_all( 'tbl_items',  [ 'inv_rem_stocks' => 'ASC' ], 0, $this->joins, $filter,[], $fields );
    $this->content->view( $config );
  }

}
