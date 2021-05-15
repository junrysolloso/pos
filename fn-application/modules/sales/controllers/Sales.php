<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends MY_Controller
{

  var $joins = [
    'tbl_salesinfo' => '`tbl_sales`.`sales_id`=`tbl_salesinfo`.`sales_id`',
    'tbl_items' => '`tbl_items`.`item_id`=`tbl_salesinfo`.`item_id`',
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
   * Overall
   */
  public function index() {
    $page = intval( $this->input->get( 'page' ) );
    $link = 'sales';
    $this->data( 'pharmacy', $page, $link );
  }

  /**
   * Pharmacy
   */
  public function pharmacy() {
    $page = intval( $this->input->get( 'page' ) );
    $link = 'sales/pharmacy';
    $this->data( 'pharmacy', $page, $link );
  }

  /**
   * Grocery
   */
  public function grocery() {
    $page = intval( $this->input->get( 'page' ) );
    $link = 'sales/grocery';
    $this->data( 'grocery', $page, $link );
  }

  /**
   * Beauty products
   */
  public function beauty_products() {
    $page = intval( $this->input->get( 'page' ) );
    $link = 'sales/beauty-products';
    $this->data( 'beauty products', $page, $link );
  }

  /**
   * Data
   */
  private function data( $category = NULL, $page = 0, $link = NULL ) {
    $limit = 50;
    $link = base_url() . $link;
    $rows = $this->dbdelta->get_count( 'tbl_sales', '`tbl_sales`.`sales_id`', NULL, [ 'category_name' => $category ], $this->joins );
    $offset = $page && is_numeric( $page ) ? $page : 0;
    $fields = '`tbl_salesinfo`.item_id` AS `barcode`, `tbl_items`.item_name` AS `name`, `item_description` AS desc, `sales_or`, (`no_of_items` * `unit_price`) AS `sales_total`, `no_of_items`, `unit_desc`';
    
    switch ( $category ) {
      case 'pharmacy':
      case 'grocery':
      case 'beauty products':
        $filter = [ 'category_name' => $category ];
        break;
      default:
        $filter = [];
        break;
    }

    $data = $this->dbdelta->get_all( 'tbl_sales', [ 'tbl_sales.sales_id' => 'DESC' ], $limit, $this->joins, $filter, $offset, $fields );
    $config['view'] = 'view_sales';
    $config['title'] = ucwords( $category ) . ' Sales';
    $config['sales'] = $data;
    $config['pagination'] = $this->paginate->links( $link, $limit, $rows );
    $this->content->view( $config );
  }

}
