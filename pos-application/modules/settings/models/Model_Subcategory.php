<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Subcategory extends MY_Model
{

  /**
   * Class properties
   * 
   * This properties is derive from the given
   * table columns also used as class properties.
   */
  protected $_table        = 'tbl_subcategory';
  protected $_subcat_id    = 'subcat_id';
  protected $_subcat_name  = 'subcat_name';
  protected $_category_id  = 'category_id';

  protected $_relate_table = 'tbl_category';
  protected $_relate_name  = 'category_name';

  /**
   * Construct parent
   */
  function __construct() {
    parent:: __construct();
  }

  /**
   * Add Sub-category
   * @param string $sub_category
   * @return bool
   */
  public function subcat_add( $category, $sub_category ) {

    $this->db->select( 'subcat_id as id' );
    $this->db->where( $this->_subcat_name, strtolower( $sub_category ) );
    $query = $this->db->get( $this->_table );

    // Check sub-category if exist
    if ( $query->num_rows() === 0 ) {
    
      $this->db->select( 'category_id as id' );
      $this->db->where( $this->_relate_name, strtolower( $category ) );
      $query = $this->db->get( $this->_relate_table );

      if ( $query->num_rows() > 0 ) {
        $cat_id = $query->row()->id;
      } else {
        $this->db->select( 'MAX(category_id) as id' );
        $cat_id = $this->db->get( $this->_relate_table )->row()->id;
      }

      $data = array( 
        $this->_subcat_name => strtolower( $sub_category ),
        $this->_category_id => intval( $cat_id ),
      ); 

      if( $this->db->insert( $this->_table, $data ) ) {
        $this->Model_Log->log_add( log_lang( 'sub_category' )['add'] );
        return true;
      }
    }
  }

  /**
   * Get all sub-categories
   * @return array $result
   */
  public function subcat_get() {
    $this->db->order_by( $this->_subcat_id, 'DESC' );
    $query = $this->db->get( $this->_table );
    if( $query ) {
      return $query->result();
    }
  }

  /**
   * Update sub-category
   * @param array $data
   * @return bool
   */
  public function subcat_update( $data ) {
    if( is_array( $data ) && ! empty( $data ) ) {
      $this->db->where( $this->_subcat_id, $data['subcat_id'] ); //  TODO: this is array of id
      if( $this->db->update( $this->_table, $data ) ) {
        return true;
      }
    }
  }

}

/* End of file Model_Subcategory.php */
/* Location: ./application/modules/settings/models/Model_Subcategory.php */
