<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Orders extends MY_Model
{

  /**
   * Class properties and other related properties
   * 
   * $_table - Defines main table used in this class
   * $_relate_TABLE_NAME is just a reference to which the main table has relation.
   * $_VARIABLE_NAME is the fields used by the main table or its related tables.
   */
  protected $_table                 = 'tbl_orders';
  protected $_order_id              = 'order_id';
  protected $_order_total           = 'order_total';
  protected $_order_date            = 'order_date';

  /**
   * From tbl_orderdetails table
   */
  protected $_relate_orddetails     = 'tbl_orderdetails';
  protected $_orderdetails_id       = 'orderdetails_id';
  protected $_item_id               = 'item_id';
  protected $_unit_id               = 'unit_id';
  protected $_orderdetails_quantity = 'orderdetails_quantity';
  protected $_price_per_unit        = 'price_per_unit';

  /**
   * From tbl_orderinventory table
   */
  protected $_relate_ordinventory   = 'tbl_orderinventory';
  protected $_ordinv_unit_price     = 'ordinv_unit_price';
  protected $_no_of_stocks          = 'no_of_stocks';
  protected $_inv_item_srp          = 'inv_item_srp';

  /**
   * From tbl_ucjunc table
   */
  protected $_relate_ucjunc         = 'tbl_ucjunc';

  /**
   * From tbl_unitconvert table
   */
  protected $_relate_unitconvert    = 'tbl_unitconvert';

  /**
   * From tbl_inventory table
   */
  protected $_relate_inventory      = 'tbl_inventory';
  protected $_inv_rem_stocks        = 'inv_rem_stocks';

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
      /**
       * Store array of data for the temporary table.
       */
      $order_data = array(
        'tmp_barcode'  => $data['item_id'],
        'tmp_date'     => date_format( date_create( $data['order_date'] ), 'Y-m-d' ), 
        'tmp_quantity' => intval( $data['orderdetails_quantity'] ),
        'tmp_price'    => $data['price_per_unit'], 
        'tmp_srp'      => $data['inv_item_srp'],
        'tmp_expiry'   => date_format( date_create( $data['expiration_date'] ), 'Y-m-d' ), 
      );

      /**
       * Check if data is added
       * then @return $order_details
       */
      if ( $this->db->insert( 'temp_orderdetails', $order_data ) ) {
        $this->db->select( '*' );
        $this->db->order_by( 'id', 'DESC' );
        /**
         * All data from the temporary table
         * And add the value to @var $order_details array
         */
        array_push( $order_details, $this->db->get( 'temp_orderdetails' )->result() );

        /**
         * Sum of the total price
         * @var $tmp_quantity vs @var $tmp_price - table columms 
         */
        $this->db->select( 'SUM((`tmp_quantity` * `tmp_price`)) AS total' );
        /**
         * Add the value to @var $order_details array
         */
        array_push( $order_details, $this->db->get( 'temp_orderdetails' )->row()->total );

        /**
         * Select and return the date
         */
        $this->db->select( '`tmp_date` AS `date`' )->limit( 1 );
        /**
         * Add the value to @var $order_details array
         */
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

    /**
     * Assign an array of data to be used on the order table.
     */
    $order_data = array(
      $this->_order_date  => $this->db->select( '`tmp_date` AS `date`' )->limit( 1 )->get( 'tbl_temp_orderdetails' )->row()->date,
      $this->_order_total => $this->db->select( 'SUM((`tmp_quantity` * `tmp_price`)) AS `total`' )->get( 'tbl_temp_orderdetails' )->row()->total,
    );

    /**
     * Check if Order is successfully inserted on the table.
     */
    if( $this->db->insert( $this->_table, $order_data ) ) {
      $this->Model_Log->log_add( log_lang( 'order_details' )['add'] ); // Just logging

      /**
       * Get the MAX Order Id for reference on the other table
       */
      $this->db->select( 'MAX(`order_id`) as `id`' );
      $order_id = $this->db->get( $this->_table )->row()->id;

      /**
       * Get all the rows on the temporary table
       * and insert it one-by-one on specific tables.
       */
      $orders_details = $this->db->get( 'tbl_temp_orderdetails' )->result();
      foreach ( $orders_details as $row ) {

        /**
         * Insert Order on order details Table
         * To get the MAX id
         */
        $orderdetails_data = array( 
          $this->_order_id => $order_id,
          $this->_item_id  => $row->tmp_barcode,
          $this->_orderdetails_quantity => $row->tmp_quantity,
          $this->_price_per_unit        => $row->tmp_price,
        );

        if( $this->db->insert( $this->_relate_orddetails, $orderdetails_data ) ) {

          /**
           * Select the MAX id of order details
           */
          $this->db->select( 'MAX(`orderdetails_id`) AS `id`' );
          $orderdet_id = $this->db->get( $this->_relate_orddetails )->row()->id;
          
          /**
           * Query to get the unit for specific product/item
           */
          $this->db->select( '`uc_number` AS `unit`' );
          $this->db->join( $this->_relate_ucjunc, '`tbl_orderdetails`.`item_id`=`tbl_ucjunc`.`item_id`' );
          $this->db->join( $this->_relate_unitconvert, '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`' );
          $this->db->where( '`tbl_orderdetails`.`item_id`', $row->tmp_barcode )->limit( 1 );

          /**
           * Get the conversion of the product
           * ex: Dozen - unit will be 12
           * It depends upon the @var $equvailent specified.
           */
          $unit = $this->db->get( $this->_relate_orddetails )->row()->unit;
          
          /**
           * To get the number of stock
           * we will multiply the @var $quantity vs @var $unit
           */
          $no_of_stocks = intval( $row->tmp_quantity ) * intval( $unit );

          /**
           * This is the order unit price
           * @var $quantity vs $price then divided by @var $no_of_stocks
           */
          $ordinv_unit_price = intval( $row->tmp_quantity * $row->tmp_price ) / intval( $no_of_stocks );
          
          /**
           * Array of data for order inventory
           */
          $inv_data = array(
            $this->_orderdetails_id   => $orderdet_id, 
            $this->_ordinv_unit_price => $ordinv_unit_price,
            $this->_no_of_stocks      => $no_of_stocks,
            $this->_inv_item_srp      => $row->tmp_srp,
          );

          /**
           * Array of data for expiry
           */
          $expiry_data = array(
            'orderdetails_id' => $orderdet_id, 
            'expiry_date'     => $row->tmp_expiry,
            'rem_stocks'      => $no_of_stocks,
          );

          /**
           * Update inventory table if item_id is exist otherwise
           * insert the inventory details.
           */
          $inv_flag  = false;
          $inv_query = $this->db->select( '*' )->where( $this->_item_id, $row->tmp_barcode )->get( $this->_relate_inventory );
          if ( $inv_query->num_rows() > 0 ) {
            /**
             * Get the value of number of stocks
             * then add it to the existing number of stocks.
             */
            $rem_inv_item_stocks = intval( $inv_query->row()->inv_rem_stocks ) + $no_of_stocks;

            /**
             * This will signifies that the table inventory has existing record
             * for the given @var $item_id
             */
            $inv_flag = true; 
          } else {
            /**
             * If the @var $no_of_stocks if empty
             * then just assign the @var $no_of_stocks
             */
            $rem_inv_item_stocks = $no_of_stocks;
          }

          /**
           * Array of data for the inventory
           */
          $inv_item_data = array(
            $this->_item_id        => $row->tmp_barcode,
            $this->_inv_rem_stocks => $rem_inv_item_stocks,
            $this->_inv_item_srp   => $row->tmp_srp,
          );
          
          /**
           * Check if @var $flag is true
           * then perform the update otherwise insert.
           */
          if ( $inv_flag ) {
            $this->db->where( $this->_item_id, $row->tmp_barcode )->update( $this->_relate_inventory, $inv_item_data );
          } else {
            $this->db->insert( $this->_relate_inventory, $inv_item_data );
          }
          
          /**
           * Add item to Order Details Inventory
           */
          if( $this->db->insert( $this->_relate_ordinventory, $inv_data ) ) {
            /**
             * Add item to Order Details Expiry
             */
            if( $this->db->insert( 'tbl_orderdetails_expiry', $expiry_data ) ) {
              $this->Model_Log->log_add( log_lang( 'order_inventory' )['add'] ); // Just logging
              $flag = true;
            }
          }
        }

        /**
         * After ForEach is done looping and inserting the data
         * Clean the temporary table
         */
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

  /**
   * Reset Orders Temporary table
   */
  public function reset_orders_table() {
    /**
     * This will erase all the data in temporary table
     */
    if( $this->db->truncate( 'tbl_temp_orderdetails' ) ) {
      return true;
    }
  }

}

/* End of file Model_Orderdetails.php */
/* Location: ./application/modules/orders/models/Model_Orderdetails.php */
