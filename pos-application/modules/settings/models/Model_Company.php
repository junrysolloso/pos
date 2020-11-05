<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Company extends MY_Model
{

  protected $_table           = 'tbl_companyinfo';
  protected $_com_name        = 'com_name';
  protected $_com_proprietor  = 'com_proprietor';
  protected $_com_tin         = 'com_tin';
  protected $_com_address     = 'com_address';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Add Company Info
   * @param array $data
   * @return bool
   */
  public function company_info_add( $data = [] ) {
    if( is_array( $data ) ) {
      $data = clean_array( $data );

      $com_data = array(
        $this->_com_name       => strtolower( $data['com_name'] ),
        $this->_com_proprietor => strtolower( $data['com_proprietor'] ),
        $this->_com_address    => strtolower( $data['com_address'] ),
        $this->_com_tin        => $data['com_tin'],
      );

      if ( $this->db->insert( $this->_table, $com_data ) ) {
        $this->Model_Log->log_add( log_lang( 'com_info' )['add'] );
        $this->session->set_tempdata( array(
          'msg' 	=> 'Company Info successfully saved.',
          'class' => 'alert-success',
        ), NULL, 5 );
        return true;
      }
    }
  }

}

/* End of file Model_Company.php */
/* Location: ./application/modules/settings/models/Model_Company.php */
