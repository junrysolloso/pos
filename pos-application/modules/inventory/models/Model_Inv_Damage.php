<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Inv_Damage extends MY_Model
{

  protected $_table       = 'tbl_damagestocks';
  protected $_ds_id       = 'ds_id';
  protected $_item_id     = 'item_id';
  protected $_ds_quantity = 'ds_quantity';
  protected $_ds_remarks  = 'ds_remarks';

  protected $relate_items = 'tbl_items';

  function __construct() {
    parent:: __construct();
  }

    /**
   * Get all damage report
   * @return array $result
   */
  public function damage_get() {

    $this->db->select('`tbl_items`.`item_name` AS `name`, `tbl_damagestocks`.`item_id`,`tbl_damagestocks`.`ds_quantity`,`tbl_damagestocks`.`ds_remarks`,`tbl_damagestocks`.`ds_date`');
    $this->db->join($this->relate_items, '`tbl_items`.`item_id` = `tbl_damagestocks`.`item_id`');
    $this->db->order_by( '`ds_date`', 'DESC' );

    $query = $this->db->get( $this->_table );
    if( $query ) {
      return $query->result();
    }
  }

}

/* End of file Model_Damage.php */
/* Location: ./application/modules/settings/models/Model_Damage.php */
