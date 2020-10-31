<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Sales extends MY_Model
{

  protected $_tbl_sales      = 'tbl_sales';
  protected $_sales_id       = 'sales_id';
  protected $_cust_id        = 'cust_id';
  protected $_sales_date     = 'sales_date';
  protected $_sales_total    = 'sales_total';
  protected $_sales_or       = 'sales_or';
  protected $_sales_tellerid = 'sales_tellerid';
  protected $_sales_discount = 'sales_discount';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Get Sales
   * @param int $sales_id
   * @param string $date
   * @return array
   */
  public function sales_get( $sales_id = 0, $date = NULL ) {
    
  }

}

/* End of file Model_Sales.php */
/* Location: ./application/modules/sales/models/Model_Sales.php */
