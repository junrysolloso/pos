<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Damage extends MY_Model
{

  protected $_table       = 'tbl_damagestocks';
  protected $_ds_id       = 'ds_id';
  protected $_item_id     = 'item_id';
  protected $_ds_quantity = 'ds_quantity';
  protected $_ds_remarks  = 'ds_remarks';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Add Damage
   * @param string $damage - add only the damage
   * @return bool
   */
  public function item_insert( $data = [] ) {
    if( isset( $data ) && ! empty( $data ) ) {
      $data = clean_array( $data );
      if ( $this->db->insert( $this->_table, $data )  ) {
        return true;
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

/* End of file Model_Damage.php */
/* Location: ./application/modules/settings/models/Model_Damage.php */
