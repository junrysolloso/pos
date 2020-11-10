<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Category extends MY_Model
{

  /**
   * Class properties
   * 
   * This properties is derive from the given
   * table columns also used as class properties.
   */
  protected $_table     = 'tbl_category';
  protected $_cat_id    = 'category_id';
  protected $_cat_name  = 'category_name';

  /**
   * Initialize an object properties
   * upon creation of the object.
   */
  function __construct() {
    parent:: __construct();
  }

  /**
   * Add category
   * @param string $category - add only the category
   * @return bool
   */
  public function category_add( $category ) {

    $this->db->select( 'category_id as id' );
    $this->db->where( $this->_cat_name, strtolower( $category['category_name'] ) );
    $query = $this->db->get( $this->_table );

    // Check if the given category is present
    // and return the id.
    if ( $query->num_rows() > 0 ) {
      $this->session->set_tempdata( array(
        'msg' 	=> 'Category already exist.',
        'class' => 'alert-danger',
      ), NULL, 5 );
    } else {

      // Insert the given category which is not present
      // in the databse and return the id.
      $data = array( $this->_cat_name => strtolower( $category['category_name'] ) );
      if ( $this->db->insert( $this->_table, $data ) ) {
        $this->Model_Log->log_add( log_lang( 'category' )['add'] );
        $this->session->set_tempdata( array(
          'msg' 	=> 'Category successfully added.',
          'class' => 'alert-success',
        ), NULL, 5 );
      }
    }
  }

  /**
   * Get all categories
   * @return array $result
   */
  public function category_get() {
    $query = $this->db->get( $this->_table );
    if( $query ) {
      $this->Model_Log->log_add( log_lang( 'category' )['view'] );
      return $query->result();
    }
  }

  /**
   * Update the category
   * @param array $data
   * @return bool
   */
  public function category_update( $data ) {
    if( is_array( $data ) && ! empty( $data ) ) {
      $this->db->where( $this->_cat_id, $data['category_id'] );
      if( $this->db->update( $this->_table, $data ) ) {
        $this->Model_Log->log_add( log_lang( 'category' )['updated'] );
        return true;
      }
    }
  }

}

/* End of file Model_Category.php */
/* Location: ./application/modules/settings/models/Model_Category.php */
