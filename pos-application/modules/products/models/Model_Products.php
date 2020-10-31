<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Products extends MY_Model
{

  protected $_table            = 'tbl_items';
  protected $_id               = 'id';
  protected $_item_id          = 'item_id';
  protected $_subcat_id        = 'subcat_id';
  protected $_item_name        = 'item_name';
  protected $_item_description = 'item_description';
  protected $_item_critlimit   = 'item_critlimit';
  protected $_unit_id          = 'unit_id';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Add Products
   * @param array $data
   * @return bool
   */
  public function products_add( $data = [] ) {

  }

  /**
   * Update Products
   * @param array $data
   * @return bool
   */
  public function products_update( $data = [] ) {
    
  }

  /**
   * Get Products
   * @param int $id
   * @return array
   */
  public function products_get( $id = 0 ) {
    
  }

}

/* End of file Model_Products.php */
/* Location: ./application/modules/products/models/Model_Products.php */
