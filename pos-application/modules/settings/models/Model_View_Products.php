<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_View_Products extends MY_Model
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
  protected $_relate_ucjunc       = 'tbl_ucjunc';
  protected $_relate_unitconvert  = 'tbl_unitconvert';
  protected $_relate_unit         = 'tbl_unit';
  protected $_relate_ord_details  = 'tbl_orderdetails';
  protected $_relate_ord_expiry   = 'tbl_orderdetails_expiry';

  protected $_category_name       = 'category_name';

  function __construct() {
    parent:: __construct();
  }

    /**
   * Get Inventory reports
   * @return array $result
   */
  public function view_products() {

    $this->db->select(' `tbl_items`.`id` AS `id`,`tbl_items`.`item_id` AS `barcode` , `tbl_items`.`item_name` AS `name`, `tbl_items`.`item_description` AS `item_des`, 
    `tbl_inventory`.`inv_rem_stocks` AS  `remaining`, `tbl_inventory`.`inv_item_srp` AS `srp`, 
    `tbl_items`.`item_critlimit` AS `critlimit`, `tbl_inventory`.`inv_rem_stocks` AS `qty`,
    `tbl_category`.`category_name` AS `c_name`, `tbl_unit`.`unit_desc` AS `unit_desc`, `tbl_orderdetails`.`price_per_unit` AS `unit_price`,
    `tbl_orderdetails_expiry`.`expiry_date` AS `exp_date`, `tbl_subcategory`.`subcat_name` AS `subcat_name`,
    `tbl_unitconvert`.`unit_id2` AS `selling_unit`');
    $this->db->join( $this->_relate_inventory, '`tbl_items`.`item_id` = `tbl_inventory`.`item_id`');
    $this->db->join( $this->_relate_subcategory, '`tbl_subcategory`.`subcat_id`=`tbl_items`.`subcat_id`' );
    $this->db->join( $this->_relate_category, '`tbl_subcategory`.`category_id`=`tbl_category`.`category_id`' );
    $this->db->join( $this->_relate_ucjunc, '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`' );
    $this->db->join( $this->_relate_unitconvert, '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`' );
    $this->db->join( $this->_relate_unit, '`tbl_unit`.`unit_id`=`tbl_unitconvert`.`unit_id2`' );
    $this->db->join( $this->_relate_ord_details, '`tbl_orderdetails`.`item_id`=`tbl_items`.`item_id`' );
    $this->db->join( $this->_relate_ord_expiry, '`tbl_orderdetails_expiry`.`orderdetails_id`=`tbl_orderdetails`.`orderdetails_id`' );

    $query = $this->db->get( $this->_table );
    if( $query ) {
      return $query->result();
    }
  }

  /**
   * Get Inventory reports
   * @return array $result
   */
  public function update_prouct($data) {

    $this->db->select('*`');
    $this->db->join( $this->_relate_inventory, '`tbl_items`.`item_id` = `tbl_inventory`.`item_id`');
    $this->db->join( $this->_relate_subcategory, '`tbl_subcategory`.`subcat_id`=`tbl_items`.`subcat_id`' );
    $this->db->join( $this->_relate_category, '`tbl_subcategory`.`category_id`=`tbl_category`.`category_id`' );
    $this->db->join( $this->_relate_ucjunc, '`tbl_items`.`item_id`=`tbl_ucjunc`.`item_id`' );
    $this->db->join( $this->_relate_unitconvert, '`tbl_ucjunc`.`uc_id`=`tbl_unitconvert`.`uc_id`' );
    $this->db->join( $this->_relate_unit, '`tbl_unit`.`unit_id`=`tbl_unitconvert`.`unit_id2`' );
    $this->db->join( $this->_relate_ord_details, '`tbl_orderdetails`.`item_id`=`tbl_items`.`item_id`' );
    $this->db->join( $this->_relate_ord_expiry, '`tbl_orderdetails_expiry`.`orderdetails_id`=`tbl_orderdetails`.`orderdetails_id`' );
    $this->db->where('edit_id =`id`');
    $query = $this->db->get( $this->_table );
    if( $query ) {
      return $query->result();
    }
  }
  function displayrecords()
	{
	$query=$this->db->query("select * from tbl_items");
	return $query->result();
	}

  function displayrecordsById($id)
	{
	$query=$this->db->query("select * from tbl_items where id='".$id."'");
	return $query->result();
	}

  function updaterecords($item_id,$item_name,$item_desc,$item_crit)
	{
	$query=$this->db->query("update tbl_items SET item_id='$item_id', product_name='$item_name',critlimit='$item_crit' where edit_id='".$id."'");
	}

}

/* End of file Model_View_Product.php */
/* Location: ./application/modules/settings/models/Model_View_Product.php */
