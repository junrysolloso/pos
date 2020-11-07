<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Inv_Items extends MY_Model
{

  protected $_table               = 'tbl_items';
  protected $_item_id             = 'item_id';
  protected $subcat_id            = 'subcat_id';
  protected $item_name            = 'item_name';
  protected $item_description     = 'item_description';
  protected $item_critlimit       = 'item_critlimit';
  protected $unit_id              = 'unit_id';

  protected $_relate_category     = 'tbl_category';
  protected $_relate_inventory    = 'tbl_inventory';
  protected $_relate_subcategory  = 'tbl_subcategory';
  protected $_relate_ucjunc      = 'tbl_ucjunc';
  protected $_relate_unitconvert = 'tbl_unitconvert';
  protected $_relate_unit         = 'tbl_unit';

  protected $_category_name       = 'category_name';

  function __construct() {
    parent:: __construct();
  }

    /**
   * Get all damage report
   * @return array $result
   */
  public function inv_items_get( $category ) {

    $this->db->select('`tbl_items`.`item_id` AS `barcode` , `tbl_items`.`item_name` AS `name`, `tbl_items`.`item_description` AS `item_des`, `tbl_inventory`.`inv_rem_stocks` AS  `remaining`, `unit_desc`');
    $this->db->where( $this->_category_name, $category );
    $this->db->join($this->_relate_inventory, '`tbl_items`.`item_id` = `tbl_inventory`.`item_id`');
    $this->db->join( $this->_relate_subcategory, '`tbl_subcategory`.`subcat_id`=`tbl_items`.`subcat_id`' );
    $this->db->join( $this->_relate_category, '`tbl_subcategory`.`category_id`=`tbl_category`.`category_id`' );
    $this->db->join( $this->_relate_ucjunc, '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`' );
    $this->db->join( $this->_relate_unitconvert, '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`' );
    $this->db->join( $this->_relate_unit, '`tbl_unit`.`unit_id`=`tbl_unitconvert`.`unit_id2`' );

    $query = $this->db->get( $this->_table );
    if( $query ) {
      return $query->result();
    }
  }

}

/* End of file Model_Damage.php */
/* Location: ./application/modules/settings/models/Model_Damage.php */
