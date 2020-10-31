<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Sales extends MY_Model
{

  protected $_table        = 'tbl_salesinfo';
  protected $_salesinfo_id = 'salesinfo_id';
  protected $_sales_id     = 'sales_id';
  protected $_item_id      = 'item_id';
  protected $_no_of_items  = 'no_of_items';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Get Sales Information
   * @param int $sales_id
   * @param string $date
   * @return array
   */
  public function sales_get( $sales_id = 0, $date = NULL ) {
    
  }

}

/* End of file Model_Salesinfo.php */
/* Location: ./application/modules/sales/models/Model_Salesinfo.php */
