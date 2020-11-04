<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Product_Info extends MY_Model
{

  protected $_table             = 'tbl_items';
  protected $_item_id           = 'item_id';
  protected $subcat_id          = 'subcat_id';
  protected $item_name          = 'item_name';
  protected $item_description   = 'item_description';
  protected $item_critlimit     = 'item_critlimit';
  protected $unit_id            = 'unit_id';
  
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
   * Get all damage report
   * @return array $result
   */
  public function damage_get() {
    $query = $this->db->get( $this->_table );
    if( $query ) {
      return $query->result();
    }
  }

}

/* End of file Model_Inventory.php */
/* Location: ./application/modules/inventory/models/Model_Inventory.php */
