<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Sales extends MY_Model
{

  protected $_table          = 'tbl_sales';
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
   * @param int $sales_id - optional
   * @param string $date - optional
   * @return array
   */
  public function sales_get( $sales_id = 0, $date = NULL ) {
    
  }

  /**
   * Get overall total sales
   * @return int $sales_total
   */
  public function sales_total_get() {
    $this->db->select( 'SUM(sales_total) as total' );
    $query = $this->db->get( $this->_table );
    if( $query ) {
      return $query->row()->total;
    } 
  }

  /**
   * Get daily total sales
   * @param string $category
   * @return int $sales_total
   */
  public function sales_daily_get( $category ) {
    $this->db->select( 'SUM(sales_total) as total' );
    
    switch ( $category ) {
      case 'pharmacy':
        
        break;
      case 'grocecy':
      
      break;
      case 'beauty':
      
      break;
      default:
        return false;
        break;
    }

    $query = $this->db->get( $this->_table );
    if( $query ) {
      return $query->row()->total;
    } 
  }

}

/* End of file Model_Sales.php */
/* Location: ./application/modules/sales/models/Model_Sales.php */
