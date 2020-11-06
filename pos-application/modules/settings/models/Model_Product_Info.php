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

  protected $_relate_category    = 'tbl_category';
  protected $_relate_ucjunc      = 'tbl_ucjunc';
  protected $_relate_unitconvert = 'tbl_unitconvert';
  protected $_relate_subcategory = 'tbl_subcategory';

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
   * Get Items Id
   * @return array
   */
  public function items_id_get() {
    $this->db->select( '`id`, `tbl_items`.`item_id`, `item_name`, `item_description` AS `desc`, `category_name`, `uc_number` AS `equivalent`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id1` ) AS `order_unit`, (SELECT `unit_desc` FROM `tbl_unit` WHERE `unit_id` = `unit_id2`) AS `selling_unit`' );
    $this->db->join( $this->_relate_subcategory, '`tbl_subcategory`.`subcat_id`=`tbl_items`.`subcat_id`' );
    $this->db->join( $this->_relate_category, '`tbl_category`.`category_id`=`tbl_subcategory`.`category_id`' );
    $this->db->join( $this->_relate_ucjunc, '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`' );
    $this->db->join( $this->_relate_unitconvert, '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`' );
    $query = $this->db->get( $this->_table );
    if ( $query ) {
      return $query->result();
    }
  }

}

/* End of file Model_Product_Info.php */
/* Location: ./application/modules/settings/models/Model_Product_Info.php */
