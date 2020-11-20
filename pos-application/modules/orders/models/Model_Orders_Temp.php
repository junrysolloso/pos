<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Orders_Temp extends MY_Model
{

  protected $_table               = 'tbl_temp_orderdetails';
  protected $_id                  = 'id';
  protected $_tmp_barcode         = 'tmp_barcode';
  protected $_tmp_date            = 'tmp_date';
  protected $_tmp_quantity        = 'tmp_quantity';
  protected $_tmp_price           = 'tmp_price';
  protected $_tmp_srp             = 'tmp_srp';
  protected $_tmp_expiry          = 'tmp_expiry';

  protected $_relate_items        = 'tbl_items';
  protected $_relate_category     = 'tbl_category';
  protected $_relate_subcategory  = 'tbl_subcategory';
  protected $_relate_unitconvert  = 'tbl_unitconvert';
  protected $_relate_ucjunc       = 'tbl_ucjunc';
  
  function __construct() {
    parent:: __construct();
  }

  /**
   * Update order details
   * @param array $data
   * @return array $result
   */
  public function tmp_update( $data = [] ) {
    if( is_array( $data ) ) {

      $data_array = array();

      $tmp_data = array(
        $this->_tmp_quantity  => $data['tmp_quantity'],
        $this->_tmp_price     => $data['tmp_price'],
        $this->_tmp_srp       => $data['tmp_srp'],
        $this->_tmp_expiry    => $data['tmp_expiry'],
      );

      $this->db->where( $this->_id, $data['id'] );
      if ( $this->db->update( $this->_table, $tmp_data ) ) {

        /**
         * Get all temporary order details
         */
        $this->db->select( '`tbl_temp_orderdetails`.`id` AS `id`, `item_name`, `item_description`, `tmp_barcode`, `tmp_date`, `tmp_quantity`, `tmp_price`, `tmp_srp`, `tmp_expiry`, `category_name`, `uc_number` AS `equivalent`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id1` ) AS `order_unit`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id2`) AS `selling_unit`' );
        $this->db->join( $this->_relate_items, '`tbl_items`.`item_id`=`tbl_temp_orderdetails`.`tmp_barcode`' );
        $this->db->join( $this->_relate_subcategory, '`tbl_subcategory`.`subcat_id`=`tbl_items`.`subcat_id`' );
        $this->db->join( $this->_relate_category, '`tbl_category`.`category_id`=`tbl_subcategory`.`category_id`' );
        $this->db->join( $this->_relate_ucjunc, '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`' );
        $this->db->join( $this->_relate_unitconvert, '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`' );
        $this->db->order_by( 'id', 'DESC' );
        
        /**
         * All data from the temporary table
         * And add the value to @var $order_details array
         */
        array_push( $data_array, $this->db->get( 'tbl_temp_orderdetails' )->result() );

        /**
         * Sum of the total price
         * @var $tmp_quantity vs @var $tmp_price - table columms 
         */
        $this->db->select( 'SUM((`tmp_quantity` * `tmp_price`)) AS total' );
        /**
         * Add the value to @var $order_details array
         */
        array_push( $data_array, $this->db->get( 'tbl_temp_orderdetails' )->row()->total );

        /**
         * Select and return the date
         */
        $this->db->select( '`tmp_date` AS `date`' )->limit( 1 );
        /**
         * Add the value to @var $order_details array
         */
        array_push( $data_array, $this->db->get( 'tbl_temp_orderdetails' )->row()->date );

        return $data_array;
      }
    }
  }

}

/* End of file Model_Orders_Temp.php */
/* Location: ./application/modules/orders/models/Model_Orders_Temp.php */
