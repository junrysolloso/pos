<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Inventory extends MY_Model
{

  protected $_table             = 'tbl_orderinventory';
  protected $_orderdetails_id   = 'orderdetails_id';
  protected $_ordinv_unit_price = 'ordinv_unit_price';
  protected $_no_of_stocks      = 'no_of_stocks';
  protected $_inv_item_srp      = 'inv_item_srp';

  protected $_relate_orddetails  = 'tbl_orderdetails';
  protected $_relate_ucjunc      = 'tbl_ucjunc';
  protected $_relate_unitconvert = 'tbl_unitconvert';
  protected $_relate_orders      = 'tbl_orders';
  protected $_relate_items       = 'tbl_items';
  protected $_relate_unit        = 'tbl_unit';
  
  function __construct() {
    parent:: __construct();
  }

  /**
   * Get Orders
   * @return array
   */
  public function inv_get() {
    $inventory = array();

    $this->db->select( '`order_date`, `order_total`, SUM(`orderdetails_quantity`) AS `stocks`' );
    $this->db->join( $this->_relate_orddetails, '`tbl_orderdetails`.`orderdetails_id`=`tbl_orderinventory`.`orderdetails_id`' );
    $this->db->join( $this->_relate_orders, '`tbl_orderdetails`.`order_id`=`tbl_orders`.`order_id`' );
    $this->db->join( $this->_relate_items, '`tbl_orderdetails`.`item_id`=`tbl_items`.`item_id`' );
    $this->db->join( $this->_relate_ucjunc, '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`' );
    $this->db->join( $this->_relate_unit, '`tbl_unit`.`unit_id`=`tbl_items`.`unit_id`' );
    $this->db->order_by( '`order_date`', 'DESC' )->group_by( '`tbl_orders`.`order_id`' );

    array_push( $inventory, $this->db->get( $this->_table )->result() );

    $this->db->select( '`tbl_orderdetails`.`item_id` AS `barcode`, `tbl_items.item_name` AS `name`, `item_description` AS `desc`, `order_date`, `no_of_stocks` AS `stocks`' );
    $this->db->join( $this->_relate_orddetails, '`tbl_orderdetails`.`orderdetails_id`=`tbl_orderinventory`.`orderdetails_id`' );
    $this->db->join( $this->_relate_orders, '`tbl_orderdetails`.`order_id`=`tbl_orders`.`order_id`' );
    $this->db->join( $this->_relate_items, '`tbl_orderdetails`.`item_id`=`tbl_items`.`item_id`' );
    $this->db->join( $this->_relate_ucjunc, '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`' );
    $this->db->join( $this->_relate_unit, '`tbl_unit`.`unit_id`=`tbl_items`.`unit_id`' );
    $this->db->order_by( '`order_date`', 'DESC' );

    array_push( $inventory, $this->db->get( $this->_table )->result() );

    return $inventory;
  }

}

/* End of file Model_Inventory.php */
/* Location: ./application/modules/orders/models/Model_Order_Inventory.php */
