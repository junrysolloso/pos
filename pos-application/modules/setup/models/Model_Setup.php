<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Setup extends MY_Model
{

  function __construct() {
    parent:: __construct();
  }

  /**
   * Generate sample data
   * @param array $data
   * @return bool
   */
  public function generate_dummy( $data ) {
    if( ! is_array( $data ) ) {
      exit;
    }

    $flag = false;

    $unit   = strtolower( $data['unit'] );
    $subcat = strtolower( $data['sub'] );
    $prod   = strtolower( $data['prod'] );
    $desc   = strtolower( $data['desc'] );
    $cat    = strtolower( $data['cat'] );

    switch ( $unit ) {
      case 'dozen':
        $short = 'doz';
        break;
      case 'pieces':
        $short = 'pcs';
        break;
      case 'bottle':
        $short = 'bot';
        break;
      default:
        $short = 'pcs';
        break;
    }

    for ( $i=1; $i < 31; $i++ ) { 
      if( strlen( $i ) == 1 ) $i = '0' . $i;

      $date  = $data['year'] .'-'. $data['month'] .'-'. $i;
      $total = ( 50 * intval( $i ) );
      $or    = mt_rand( 1000000, 9999999 );
      $code  = $this->_generate_code();

      $cat_id = $this->_category_get_id( $cat );
      $sub_id = $this->_subcat_get_id( $cat_id, $subcat );
      $uni_id = $this->_unit_get_id( $unit, $short );


      if ( $i == 1 ) {
        if ( $this->db->simple_query("INSERT INTO `tbl_items` (`item_id`, `subcat_id`, `item_name`, `item_description`, `item_critlimit`, `unit_id`) VALUES ('$code', '$sub_id', '$prod', '$desc', '36', '$uni_id')") ) {
          return true;
        }
      }

      // Get sales max id
      // $this->db->select( 'MAX(sales_id) as id' );
      // $id = $this->db->get( 'tbl_sales' )->row()->id;
      // $this->db->simple_query("INSERT INTO `tbl_sales` (`sales_date`, `sales_total`, `sales_or`, `sales_tellerid`, `sales_discount`) VALUES ('$date', '$total', '$or', '1', NULL)");

      // $this->db->simple_query("INSERT INTO `tbl_salesinfo` (`sales_id`, `item_id`, `unit_price`, `no_of_items`) VALUES ('$id', '$code', '50', '$i')");

    }
  }

  /**
   * Cleanup dummy data
   */
  public function clean_dummy() {
    if( $this->db->truncate( 'tbl_unitconvert' ) ) {
      if( $this->db->truncate( 'tbl_unit' ) ) {
        if( $this->db->truncate( 'tbl_subcategory' ) ) {
          if( $this->db->truncate( 'tbl_salesinfo' ) ) {
            if( $this->db->truncate( 'tbl_sales' ) ) {
              if( $this->db->truncate( 'tbl_orders' ) ) {
                if( $this->db->truncate( 'tbl_orderinventory' ) ) {
                  if( $this->db->truncate( 'tbl_orderdetails' ) ) {
                    if( $this->db->truncate( 'tbl_items' ) ) {
                      if( $this->db->truncate( 'tbl_inventory' ) ) {
                        if( $this->db->truncate( 'tbl_category' ) ) {
                          if( $this->db->truncate( 'tbl_log' ) ) {
                            return true;
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }

  /**
   * Generate/get category id
   */
  private function _category_get_id( $category ) {
    $this->db->select( 'category_id as id' );
    $this->db->where( 'category_name', $category );
    $query = $this->db->get( 'tbl_category' );
    if ( $query->num_rows() > 0 ) {
      return $query->row()->id;
    } else {
      $data = array( 'category_name' => $category );
      if ( $this->db->insert( 'tbl_category', $data ) ) {
        $this->db->select( 'MAX(category_id) as id' );
        return $this->db->get( 'tbl_category' )->row()->id;
      }
    }
  }

  /**
   * Generate/get sub-category id
   */
  private function _subcat_get_id( $category, $sub_category ) {
    $this->db->select( 'subcat_id as id' );
    $this->db->where( 'subcat_name', $sub_category );
    $query = $this->db->get( 'tbl_subcategory' );
    if ( $query->num_rows() > 0 ) {
      return $query->row()->id;
    } else {
      $data = array( 
        'subcat_name' => $sub_category,
        'category_id' => $category,
      );
      if ( $this->db->insert( 'tbl_subcategory', $data ) ) {
        $this->db->select( 'MAX(subcat_id) as id' );
        return $this->db->get( 'tbl_subcategory' )->row()->id;
      }
    }
  }

  /**
   * Generate/get unit id
   */
  private function _unit_get_id( $unit, $short ) {
    $this->db->select( 'unit_id as id' );
    $this->db->where( 'unit_desc', $unit );
    $query = $this->db->get( 'tbl_unit' );
    if ( $query->num_rows() > 0 ) {
      return $query->row()->id;
    } else {
      $data = array( 
        'unit_desc' => $unit,
        'unit_sh' => $short, 
      );
      if ( $this->db->insert( 'tbl_unit', $data ) ) {
        $this->db->select( 'MAX(unit_id) as id' );
        return $this->db->get( 'tbl_unit' )->row()->id;
      }
    }
  }

  /**
   * Generate sample code
   */
  private function _generate_code() {
    $code  = '93839' . mt_rand( 1000000, 9999999 );
    $this->db->select( 'id' );
    $this->db->where( 'item_id', $code );
    if ( $this->db->get( 'tbl_items' )->num_rows() > 0 ) {
      $this->_generate_code();
    } 
    return $code;
  }
}

/* End of file Model_Setup.php */
/* Location: ./application/modules/setup/models/Model_Setup.php */
