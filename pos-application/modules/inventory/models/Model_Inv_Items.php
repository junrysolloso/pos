<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Inv_Items extends MY_Model
{

  protected $_table             = 'tbl_items';
  protected $_item_id           = 'item_id';
  protected $subcat_id          = 'subcat_id';
  protected $item_name          = 'item_name';
  protected $item_description   = 'item_description';
  protected $item_critlimit     = 'item_critlimit';
  protected $unit_id            = 'unit_id';

  protected $relate_category      = 'tbl_category';
  protected $relate_inventory     = 'tbl_inventory';
  protected $relate_subcategory   = 'tbl_subcategory';

  function __construct() {
    parent:: __construct();
  }

    /**
   * Get all damage report
   * @return array $result
   */
  public function inv_items_get() {

    $this->db->select('`tbl_items`.`item_id` AS `barcode` , `tbl_items`.`item_name` AS `name`, `tbl_items`.`item_description` AS `item_des`, `tbl_inventory`.`inv_rem_stocks` AS  `remaining`');
    $this->db->join($this->relate_inventory, '`tbl_items`.`item_id` = `tbl_inventory`.`item_id`');
    //$this->db->join($this->relate_subcategory, '`tbl_items`.`item_id` = `tbl_inventory`.`item_id`');
    //$this->db->order_by( '`ds_date`', 'DESC' );

    $query = $this->db->get( $this->_table );
    if( $query ) {
      return $query->result();
    }
  }

}

/* End of file Model_Damage.php */
/* Location: ./application/modules/settings/models/Model_Damage.php */
