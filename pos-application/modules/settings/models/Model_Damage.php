<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Damage extends MY_Model
{

  protected $_table           = 'tbl_damagestocks';
  protected $_ds_id           = 'ds_id';
  protected $_item_id         = 'item_id';
  protected $_ds_quantity     = 'ds_quantity';
  protected $_ds_remarks      = 'ds_remarks';
  
  // protected $_join_tbl_items  = 'tbl_items';

  function __construct() {
    parent:: __construct();

  }

  /**
   * Insert item
   * @param array $data - array of data to be inserted on database
   * @return bool
   */
  public function item_insert( $data = [] ) {
    if( isset( $data ) && ! empty( $data ) ) {
      $this->_remove_empty_key( $data );
      if ( $this->db->insert( $this->_table, $data )  ) {
        return true;
      } else {
        return false;
      }
    } 
  }

  /**
   * Get all items
   * @return array $result - all items
   */
  public function items() {
    $this->db->select( '*' );
    $this->db->order_by( $this->_ds_id , 'DESC' );
    $this->db->from( $this->_table );
    $query = $this->db->get();
    if( $query ) {
      return $query->result();
    } else {
      return false;
    }
  }
}

/* End of file Model_Inventory.php */
/* Location: ./application/modules/inventory/models/Model_Inventory.php */
