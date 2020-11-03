<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Unit extends MY_Model
{

  protected $_table           = 'tbl_unit';
  protected $_unit_id         = 'unit_id';
  protected $_unit_desc       = 'unit_desc';
  protected $_unit_sh         = 'unit_sh';
  
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

}

/* End of file Model_Inventory.php */
/* Location: ./application/modules/inventory/models/Model_Inventory.php */
