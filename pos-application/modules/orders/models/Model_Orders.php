<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Orders extends MY_Model
{

  protected $_table       = 'tbl_orders';
  protected $_order_id    = 'order_id';
  protected $_order_total = 'order_total';
  protected $_order_date  = 'order_date';

  protected $_relate_orddetails     = 'tbl_orderdetails';
  protected $_orderdetails_id       = 'orderdetails_id';
  protected $_item_id               = 'item_id';
  protected $_unit_id               = 'unit_id';
  protected $_orderdetails_quantity = 'orderdetails_quantity';
  protected $_price_per_unit        = 'price_per_unit';

  protected $_relate_ordinventory = 'tbl_orderinventory';
  protected $_ordinv_unit_price   = 'ordinv_unit_price';
  protected $_no_of_stocks        = 'no_of_stocks';
  protected $_inv_item_srp        = 'inv_item_srp';

  protected $_relate_ucjunc      = 'tbl_ucjunc';
  protected $_relate_unitconvert = 'tbl_unitconvert';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Add Orders
   * @param array $data
   * @return bool
   */
  public function order_add( $data = [] ) {

    $order_details = array();

    if( is_array( $data ) ) {
      $order_data = array(
        'tmp_barcode'  => $data['item_id'],
        'tmp_date'     => date_format( date_create( $data['order_date'] ), 'Y-m-d' ), 
        'tmp_quantity' => intval( $data['orderdetails_quantity'] ),
        'tmp_price'    => $data['price_per_unit'], 
        'tmp_srp'      => $data['inv_item_srp'],
        'tmp_expiry'   => date_format( date_create( $data['expiration_date'] ), 'Y-m-d' ), 
      );

      if ( $this->db->insert( 'temp_orderdetails', $order_data ) ) {
        $this->db->select( '*' );
        $this->db->order_by( 'id', 'DESC' );
        array_push( $order_details, $this->db->get( 'temp_orderdetails' )->result() );

        $this->db->select( 'SUM((`tmp_quantity` * `tmp_price`)) AS total' );
        array_push( $order_details, $this->db->get( 'temp_orderdetails' )->row()->total );

        $this->db->select( '`tmp_date` AS `date`' )->limit( 1 );
        array_push( $order_details, $this->db->get( 'temp_orderdetails' )->row()->date );

        return $order_details;
      }
    }
  }

  /**
   * Save order details
   * @return bool
   */
  public function order_details_save() {
    $flag = false;

    $order_data = array(
      $this->_order_date  => $this->db->select( '`tmp_date` AS `date`' )->limit( 1 )->get( 'tbl_temp_orderdetails' )->row()->date,
      $this->_order_total => $this->db->select( 'SUM((`tmp_quantity` * `tmp_price`)) AS `total`' )->get( 'tbl_temp_orderdetails' )->row()->total,
    );

    if( $this->db->insert( $this->_table, $order_data ) ) {

      $this->db->select( 'MAX(`order_id`) as `id`' );
      $order_id = $this->db->get( $this->_table )->row()->id;

      $orders_details = $this->db->get( 'tbl_temp_orderdetails' )->result();
      foreach ( $orders_details as $row ) {

        $orderdetails_data = array( 
          $this->_order_id => $order_id,
          $this->_item_id  => $row->tmp_barcode,
          $this->_orderdetails_quantity => $row->tmp_quantity,
          $this->_price_per_unit        => $row->tmp_price,
        );

        if( $this->db->insert( $this->_relate_orddetails, $orderdetails_data ) ) {
          $this->Model_Log->log_add( log_lang( 'order_details' )['add'] );

          $this->db->select( 'MAX(`orderdetails_id`) AS `id`' );
          $orderdet_id = $this->db->get( $this->_relate_orddetails )->row()->id;
  
          $this->db->select( '`uc_number` AS `unit`' );
          $this->db->join( $this->_relate_ucjunc, '`tbl_orderdetails`.`item_id`=`tbl_ucjunc`.`item_id`' );
          $this->db->join( $this->_relate_unitconvert, '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`' );
          $this->db->where( '`tbl_orderdetails`.`item_id`', $row->tmp_barcode );
          $unit = $this->db->get( $this->_relate_orddetails )->row()->unit;
    
          $no_of_stocks      = intval( $row->tmp_quantity ) * intval( $unit );
          $ordinv_unit_price = intval( $row->tmp_quantity * $row->tmp_price ) / intval( $no_of_stocks );
    
          $inv_data = array(
            $this->_orderdetails_id   => $orderdet_id, 
            $this->_ordinv_unit_price => $ordinv_unit_price,
            $this->_no_of_stocks      => $no_of_stocks,
            $this->_inv_item_srp      => $row->tmp_srp,
          );
    
          if ( $this->db->insert( $this->_relate_ordinventory, $inv_data ) ) {
            $this->Model_Log->log_add( log_lang( 'order_inventory' )['add'] );
            $flag = true;
          }
        }

        if( $flag ) {
          $this->db->truncate( 'tbl_temp_orderdetails' );
          $this->session->set_tempdata( array(
            'msg' 	=> 'Orders successfully saved.',
            'class' => 'alert-success',
          ), NULL, 5 );
        }
      }
    }
  }

}

/* End of file Model_Orderdetails.php */
/* Location: ./application/modules/orders/models/Model_Orderdetails.php */
