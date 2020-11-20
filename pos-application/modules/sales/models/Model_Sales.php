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

  protected $_relate_items        = 'tbl_items';
  protected $_relate_sales        = 'tbl_sales';
  protected $_relate_salesinfo    = 'tbl_salesinfo';
  protected $_relate_category     = 'tbl_category';
  protected $_relate_subcategory  = 'tbl_subcategory';
  protected $_relate_ucjunc       = 'tbl_ucjunc';
  protected $_relate_unitconvert  = 'tbl_unitconvert';
  protected $_relate_unit         = 'tbl_unit';

  protected $_category_name       = 'category_name';

  function __construct() {
    parent:: __construct();
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
   * Get sales
   * @return array $result
   */
  public function sales_get( $category ) {
    /**
     * Data to return
     */
    $this->db->select('`tbl_salesinfo`.item_id` AS `barcode`, `tbl_items`.item_name` AS `name`, `sales_or`, (`no_of_items` * `unit_price`) AS `sales_total`, `no_of_items`, `unit_desc`');

    /**
     * Query parameters
     */
    $this->db->where( $this->_category_name, $category );
    $this->db->order_by( '`tbl_sales`.`sales_id`', 'DESC' );

    /**
     * Join all required tables
     */
    $this->db->join( $this->_relate_salesinfo, '`tbl_sales`.`sales_id`=`tbl_salesinfo`.`sales_id`' );
    $this->db->join( $this->_relate_items, '`tbl_items`.`item_id`=`tbl_salesinfo`.`item_id`' );
    $this->db->join( $this->_relate_subcategory, '`tbl_subcategory`.`subcat_id`=`tbl_items`.`subcat_id`' );
    $this->db->join( $this->_relate_category, '`tbl_subcategory`.`category_id`=`tbl_category`.`category_id`' );
    $this->db->join( $this->_relate_ucjunc, '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`' );
    $this->db->join( $this->_relate_unitconvert, '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`' );
    $this->db->join( $this->_relate_unit, '`tbl_unit`.`unit_id`=`tbl_unitconvert`.`unit_id2`' );

    /**
     * Assign the query to a variable 
     * this will ne use for checking if the query is successful.
     */
    $query = $this->db->get( $this->_relate_sales );

    if( $query->num_rows() > 0 ) {
      return $query->result();
    } 
  }


}

/* End of file Model_Sales.php */
/* Location: ./application/modules/sales/models/Model_Sales.php */
