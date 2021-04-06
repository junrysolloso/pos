<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\CanvasFactory;

class Reports extends MY_Controller 
{

  function __construct() {
    parent:: __construct();
    $this->sess->unrestricted();
    $this->load->library( 'pdf' );
  }

  /**
   * Reports filter
   */
  public function filter() {
    $config['js'] = [
      'fn-assets/vendors/daterangepicker/moment.min.js',
      'fn-assets/vendors/daterangepicker/daterangepicker.min.js',
      'fn-assets/js/helpers/helper_datepicker.js'
    ];

    $config['css'] = [
      'fn-assets/vendors/daterangepicker/daterangepicker.css'
    ];

    $config['view'] = 'view_filter';
    $config['title'] = 'Report Filter';
    $this->content->view( $config );
  }

  /**
   * Reports
   */
  public function index() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      $filter = [];
      $range = explode(" ", $this->input->post( 'rangedate' ) );

      $data = [
        'mode' => strtolower( $this->input->post( 'mode_print' ) ),
        'category' => strtolower( $this->input->post( 'category_print' ) ),
        'from' => $range[0],
        'to' => $range[2]
      ];

      $from =  $data['from'];
      $to =  $data['to'];
      $common = [
        'tbl_ucjunc' => '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`',
        'tbl_unit' => '`tbl_unit`.`unit_id`=`tbl_items`.`unit_id`',
        'tbl_subcategory' => '`tbl_items`.`subcat_id`=`tbl_subcategory`.`subcat_id`',
        'tbl_category' => '`tbl_category`.`category_id`=`tbl_subcategory`.`category_id`',
        'tbl_unitconvert' => '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`'
      ];

      $data = clean_array( $data );
      switch ( $data['mode'] ) {
        case 'inventory':
          foreach ( $data as $key => $value ) {
            if ( $key == 'category' ) {
              $filter['category_name'] = $value;
            }
          }

          $joins = [
            'tbl_inventory' => '`tbl_items`.`item_id` = `tbl_inventory`.`item_id`',
            'tbl_orderdetails' => '`tbl_items`.`item_id` = `tbl_orderdetails`.`item_id`',
            'tbl_orderdetails_expiry' => '`tbl_orderdetails`.`orderdetails_id` = `tbl_orderdetails_expiry`.`orderdetails_id`'
          ];

          $joins = array_merge( $joins, $common );
          $fields = '`tbl_items`.`item_id` AS `barcode` , `tbl_items`.`item_name` AS `name`, `tbl_items`.`item_description` AS `item_des`, `tbl_inventory`.`inv_rem_stocks` AS  `remaining`, `unit_desc`, `tbl_inventory`.`inv_item_srp` AS `srp`, `expiry_date`, `price_per_unit`';
          $config['inventory'] = $this->dbdelta->get_all( 'tbl_items', [ 'name' => 'ASC' ], 0, $joins, $filter, 0, $fields );
          $config['subtitle'] = $data['category'];
          $title =  ucwords( 'Inventory' );
          break;

        case 'sales':
          foreach ( $data as $key => $value ) {
            if ( $key == 'category' ) {
              $filter['category_name'] = $value;
            } else if ( $key == 'from' ) {
              $filter["`sales_date` BETWEEN '$from' AND '$to'"] = NULL;
            }
          }

          $joins = [
            'tbl_salesinfo' => '`tbl_sales`.`sales_id`=`tbl_salesinfo`.`sales_id`',
            'tbl_items' => '`tbl_items`.`item_id`=`tbl_salesinfo`.`item_id`',
          ];

          $joins = array_merge( $joins, $common );
          $fields = '`tbl_salesinfo`.item_id` AS `barcode`, `tbl_items`.item_name` AS `name`, `sales_or`, (`no_of_items` * `unit_price`) AS `sales_total`, `no_of_items`, `unit_desc`, `sales_date`';
          $config['sales'] = $this->dbdelta->get_all( 'tbl_sales', [ 'sales_date' => 'ASC' ], 0, $joins, $filter, 0, $fields );
          $config['subtitle'] = date_format( date_create( $data['from'] ), 'M j, Y' ) .' - '. date_format( date_create( $data['to'] ), 'M j, Y' );
          $title =  ucwords( $data['category'] );
          break;

        case 'orders':
          foreach ( $data as $key => $value ) {
            if ( $key == 'category' ) {
              $filter['category_name'] = $value;
            } else if ( $key == 'from' ) {
              $filter["`order_date` BETWEEN '$from' AND '$to'"] = NULL;
            }
          }

          $joins = [ 
            'tbl_orderdetails' => '`tbl_orderdetails`.`orderdetails_id`=`tbl_orderinventory`.`orderdetails_id`',
            'tbl_orderdetails_expiry' => '`tbl_orderdetails_expiry`.`orderdetails_id`=`tbl_orderdetails`.`orderdetails_id`',
            'tbl_orders' => '`tbl_orderdetails`.`order_id`=`tbl_orders`.`order_id`',
            'tbl_items' => '`tbl_orderdetails`.`item_id`=`tbl_items`.`item_id`',
          ];

          $joins = array_merge( $joins, $common );
          $fields = '`tbl_orderdetails`.`orderdetails_id` AS `id`, `tbl_orders`.`order_id` AS `oid`, `item_name` AS `name`, `item_description` AS `desc`, `tbl_items`.`item_id` AS `barcode`, `order_date` AS `odate`, `no_of_stocks` AS `stocks`, `orderdetails_quantity` AS `quantt`, `price_per_unit` AS `price`, `inv_item_srp` AS `srp`, `expiry_date` AS `exdate`, `category_name` AS `catname`, `uc_number` AS `equiv`, `unit_desc` AS `udesc`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id1` ) AS `order_unit`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id2`) AS `selling_unit`';
          $config['orders'] = $this->dbdelta->get_all( 'tbl_orderinventory', [ 'odate' => 'ASC' ], 0, $joins, $filter, 0, $fields );
          $config['subtitle'] = date_format( date_create( $data['from'] ), 'M j, Y' ) .' - '. date_format( date_create( $data['to'] ), 'M j, Y' );
          $title =  ucwords( $data['category'] );
          break;
        default:
          break;
      }
      
      $config['title'] = $title;
      $this->template->write( 'title', $title );

      if ( $data['mode'] == 'inventory' ) {
        $this->template->write_view( 'content', 'view_inventory', $config );
      } else if ( $data['mode'] == 'sales' ) {
        $this->template->write_view( 'content', 'view_sales', $config );
      } else {
        $this->template->write_view( 'content', 'view_orders', $config );
      }
      
      $content = $this->template->render( NULL, TRUE );
      $this->pdf->create_pdf( $content, ucwords( $title ), false );
    }
  }

}