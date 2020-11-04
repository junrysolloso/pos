<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Product_Info extends MY_Model
{

  protected $_table             = 'tbl_items';
  protected $_item_id           = 'item_id';
  protected $_subcat_id         = 'subcat_id';
  protected $_item_name         = 'item_name';
  protected $_item_description  = 'item_description';
  protected $_item_critlimit    = 'item_critlimit';
  protected $_unit_id           = 'unit_id';

  function __construct() {
    parent:: __construct();
  }


  /**
   * Add Product Info
   * @param array $data
   * @return bool
   */
  public function product_add( $data = [] ) {
    if( is_array( $data ) ) {
      $data = clean_array( $data );
      $item_data = array(
        $this->_item_id    => $data['item_id'],
        $this->_subcat_id  => intval( $data['subcat_id'] ),
        $this->_item_name  => strtolower( $data['item_name'] ),
        $this->_item_description => strtolower( $data['item_description'] ),
        $this->_item_critlimit   => intval( $data['item_critlimit'] ),
        $this->_unit_id          => intval( $data['unit_id1'] ),
      );
      if ( $this->db->insert( $this->_table, $item_data ) ) {
        $this->Model_Log->log_add( log_lang( 'item' )['add'] );
        $this->session->set_tempdata( array(
          'msg' 	=> 'Item successfully added.',
          'class' => 'alert-success',
        ), NULL, 5 );
        return true;
      }
    }
  }

  /**
   * Get All Item Id
   * @return array $result
   */
  public function items_id_get() {
    $this->db->select( 'id, item_id, item_name' );
    $query = $this->db->get( $this->_table );
    if( $query ) {
      return $query->result();
    }
  }

}

/* End of file Model_Product_Info.php */
/* Location: ./application/modules/settings/models/Model_Product_Info.php */
