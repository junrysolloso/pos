<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Order_Inventory extends MY_Model
{

  protected $_table               = 'tbl_orderinventory';
  protected $_orderdetails_id     = 'orderdetails_id';
  protected $_ordinv_unit_price   = 'ordinv_unit_price';
  protected $_no_of_stocks        = 'no_of_stocks';
  protected $_inv_item_srp        = 'inv_item_srp';

  protected $_relate_orddet_ex    = 'tbl_orderdetails_expiry';
  protected $_relate_orddetails   = 'tbl_orderdetails';
  protected $_relate_ucjunc       = 'tbl_ucjunc';
  protected $_relate_unitconvert  = 'tbl_unitconvert';
  protected $_relate_orders       = 'tbl_orders';
  protected $_relate_items        = 'tbl_items';
  protected $_relate_unit         = 'tbl_unit';

  protected $_relate_category     = 'tbl_category';
  protected $_relate_subcategory  = 'tbl_subcategory';
  protected $_order_id            = 'order_id';
  
  function __construct() {
    parent:: __construct();
  }

  /**
   * Get Orders
   * @return array
   */
  public function orders_get() {

    /**
     * Join all table connected to orders
     */
    $this->db->select( '`tbl_orders`.`order_id` AS `order_id`, `order_date`, `order_total`, SUM(`orderdetails_quantity`) AS `stocks`' );
    $this->db->join( $this->_relate_orddetails, '`tbl_orderdetails`.`orderdetails_id`=`tbl_orderinventory`.`orderdetails_id`' );
    $this->db->join( $this->_relate_orders, '`tbl_orderdetails`.`order_id`=`tbl_orders`.`order_id`' );
    $this->db->join( $this->_relate_items, '`tbl_orderdetails`.`item_id`=`tbl_items`.`item_id`' );
    $this->db->join( $this->_relate_ucjunc, '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`' );
    $this->db->join( $this->_relate_unit, '`tbl_unit`.`unit_id`=`tbl_items`.`unit_id`' );
    $this->db->order_by( '`order_date`', 'DESC' )->group_by( '`tbl_orders`.`order_id`' );

    $query = $this->db->get( $this->_table );

    if ( $query ) {
      $this->Model_Log->log_add( log_lang( 'order_details' )['view'] );
      return $query->result();
    }
  }

  /**
   * Get order items
   * @param int $order_id
   * @return array $result;
   */
  public function order_items_get( $order_id = 0 ) {

    /**
     * Join all table connected to orders
     */
    $this->db->select( '`tbl_orderdetails`.`orderdetails_id` AS `id`, `tbl_orders`.`order_id` AS `oid`, `item_name` AS `name`, `item_description` AS `desc`, `tbl_items`.`item_id` AS `barcode`, `order_date` AS `odate`, `no_of_stocks` AS `stocks`, `orderdetails_quantity` AS `quantt`, `price_per_unit` AS `price`, `inv_item_srp` AS `srp`, `expiry_date` AS `exdate`, `category_name` AS `catname`, `uc_number` AS `equiv`, `unit_desc` AS `udesc`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id1` ) AS `order_unit`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id2`) AS `selling_unit`' );
    $this->db->join( $this->_relate_orddetails, '`tbl_orderdetails`.`orderdetails_id`=`tbl_orderinventory`.`orderdetails_id`' );
    $this->db->join( $this->_relate_orddet_ex, '`tbl_orderdetails_expiry`.`orderdetails_id`=`tbl_orderdetails`.`orderdetails_id`' );
    $this->db->join( $this->_relate_orders, '`tbl_orderdetails`.`order_id`=`tbl_orders`.`order_id`' );
    $this->db->join( $this->_relate_items, '`tbl_orderdetails`.`item_id`=`tbl_items`.`item_id`' );
    $this->db->join( $this->_relate_ucjunc, '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`' );
    $this->db->join( $this->_relate_subcategory, '`tbl_items`.`subcat_id`=`tbl_subcategory`.`subcat_id`' );
    $this->db->join( $this->_relate_category, '`tbl_category`.`category_id`=`tbl_subcategory`.`category_id`' );
    $this->db->join( $this->_relate_unitconvert, '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`' );
    $this->db->join( $this->_relate_unit, '`tbl_unit`.`unit_id`=`tbl_unitconvert`.`unit_id2`' );
    $this->db->where( '`tbl_orders`.`order_id`', $order_id );
    $this->db->order_by( '`tbl_orderdetails`.`orderdetails_id`', 'ASC' );

    $query = $this->db->get( $this->_table );

    if ( $query ) {
      $this->Model_Log->log_add( log_lang( 'order_details' )['view'] );
      return $query->result();
    }
  }

}

/* End of file Model_Order_Inventory.php */
/* Location: ./application/modules/orders/models/Model_Order_Inventory.php */
