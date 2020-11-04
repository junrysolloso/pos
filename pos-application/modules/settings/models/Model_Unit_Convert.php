<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Unit_Convert extends MY_Model
{

  protected $_table      = 'tbl_unitconvert';
  protected $_uc_id      = 'uc_id';
  protected $_unit_id1   = 'unit_id1';
  protected $_unit_id2   = 'unit_id2';
  protected $_uc_number  = 'uc_number';

  protected $_relate_table = 'tbl_ucjunc';
  protected $_relate_uc    = 'uc_id';
  protected $_relate_item  = 'item_id';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Add Unit Convertion
   * @param array $data
   * @return bool
   */
  public function uc_add( $data = [] ) {
    if( is_array( $data ) ) {
      $data = clean_array( $data );
      $uc_data = array(
        $this->_unit_id1  => intval( $data['unit_id1'] ),
        $this->_unit_id2  => intval( $data['unit_id2'] ),
        $this->_uc_number => intval( $data['uc_number'] ),
      );

      if ( $this->db->insert( $this->_table, $uc_data ) ) {        
        $this->db->select( 'MAX(uc_id) AS id' );
        $junc_data = array(
          $this->_relate_uc => $this->db->get( $this->_table )->row()->id,
          $this->_relate_item => $data['item_id'],
        );
        if ( $this->db->insert( $this->_relate_table, $junc_data ) ) {
          $this->Model_Log->log_add( log_lang( 'unit_convert' )['add'] );
          return true;
        }
      }
    }
  }

}

/* End of file Model_Unit_Convert.php */
/* Location: ./application/modules/settings/models/Model_Unit_Convert.php */
