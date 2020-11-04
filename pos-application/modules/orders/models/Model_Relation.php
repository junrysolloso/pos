<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Relation extends MY_Model
{

  protected $_table_items = 'tbl_items';
  protected $_item_id     = 'item_id';

  protected $_table_cat   = 'tbl_category';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Get All Item Id
   * @return array $result
   */
  public function items_id_get() {
    $this->db->select( 'id, item_id' );
    $query = $this->db->get( $this->_table_items );
    if( $query ) {
      return $query->result();
    }
  }

  
  /**
   * Get All Categories
   * @return array $result
   */
  public function categories_get() {
    $this->db->select( 'category_id, category_name' );
    $query = $this->db->get( $this->_table_cat );
    if( $query ) {
      return $query->result();
    }
  }

}

/* End of file Model_Relation.php */
/* Location: ./application/modules/orders/models/Model_Relation.php */
