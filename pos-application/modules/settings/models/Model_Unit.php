<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Unit extends MY_Model
{

  protected $_table     = 'tbl_unit';
  protected $_unit_id   = 'unit_id';
  protected $_unit_desc = 'unit_desc';
  protected $_unit_sh   = 'unit_sh';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Add Unit
   * @param string $unit - add only the unit
   * @return bool
   */
  public function item_insert( $unit ) {

    $this->db->select( 'unit_id as id' );
    $this->db->where( $this->_unit_desc, strtolower( $unit['unit_desc'] ) );
    $query = $this->db->get( $this->_table );

    // Check if the given unit is present
    if ( $query->num_rows() > 0 ) {
      return 'exist';
    } else {

      // Insert the given unit which is not present
      // in the databse.
      $data = array( 
        $this->_unit_desc => strtolower( $unit['unit_desc'] ), 
        $this->_unit_sh   => strtolower( $unit['unit_sh'] ),
      );

      if ( $this->db->insert( $this->_table, $data ) ) {
        $this->Model_Log->log_add( log_lang( 'unit' )['add'] );
        return $this->unit_get();
      }
    }
  }


  /**
   * Get all unit
   * @return array $result
   */
  public function unit_get() {
    $query = $this->db->get( $this->_table );
    if( $query ) {
      return $query->result();
    }
  }

  /**
   * Update unit
   * @param array $data
   * @return bool
   */
  public function unit_update( $data ) {
    if( is_array( $data ) && ! empty( $data ) ) {
      $this->db->where( $this->_unit_id, $data['unit_id'] );
      if( $this->db->update( $this->_table, $data ) ) {
        $this->Model_Log->log_add( log_lang( 'unit' )['updated'] );
        
        return $this->unit_get();
      }
    }
  }

}

/* End of file Model_Unit.php */
/* Location: ./application/modules/settings/models/Model_Unit.php */
