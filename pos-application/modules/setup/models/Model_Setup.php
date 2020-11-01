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
    // if( ! is_array( $data ) ) {
    //   exit;
    // }

    $flag = false;
    $cat_ = array('grocery', 'pharmacy', 'beauty');
    foreach ( $cat_ as $key ) {
      $category = array( 'category_name' => $key );
      $this->db->insert( 'tbl_category', $category );
    }

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
      case 'ounce':
        $short = 'oz';
        break;
      default:
        $short = 'pcs';
        break;
    }

    for ( $i=1; $i < 30; $i++ ) { 
      //if( strlen( $i ) == 1 ) $i = '0' . $i;

      $date  = $data['year'] .'-'. $data['month'] .'-'. $i;
      $total = ( 50 * intval( $i ) );
      $or    = mt_rand( 1000000, 9999999 );
      $code  = $this->_generate_code();

      // $cat_id = $this->_category_get_id( $cat );
      // $sub_id = $this->_sub_category_get_id( $cat, $subcat );

      //  if ( $i == 1 ) {
      //   // Items
      //   if( $this->db->simple_query("INSERT INTO `tbl_items` (`item_id`, `subcat_id`, `item_name`, `item_description`, `item_critlimit`, `unit_id`) VALUES ('$code', '$sub_id', '$prod', '$desc', '36', '1')") ) {
      //     // Sub Category
      //     if( $this->db->simple_query("INSERT INTO `tbl_subcategory` (`subcat_name`, `category_id`) VALUES ('$subcat', '$cat_id')") ) {
      //       // Unit
      //       if( $this->db->simple_query("INSERT INTO `tbl_unit` (`unit_desc`, `unit_sh`) VALUES ('$unit', '$short')") ) {
      //         $flag = true;
      //       }
      //     }
      //   }
      // }
        
      // Sales
      if( $this->db->simple_query("INSERT INTO `tbl_sales` (`sales_date`, `sales_total`, `sales_or`, `sales_tellerid`) VALUES ('$date', '$total', '$or', '1')") ) {
        
        // // Get sales max id
        // $this->db->select( 'MAX(sales_id) as id' );
        // $id = $this->db->get( 'tbl_sales' )->row()->id;

        // // Sales information
        // if( $this->db->simple_query("INSERT INTO `tbl_salesinfo` (`sales_id`, `item_id`, `unit_price`, `no_of_items`) VALUES ('$id', '$code', '50', '$i')") ) {
         return true;
        // }
      }
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

  /**
   * Get category id
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
   * Get sub-category id
   */
  private function _sub_category_get_id( $category, $sub_category ) {
    $cat_id = $this->_category_get_id( $category );

    $this->db->select( 'subcat_id as id' );
    $this->db->where( 'subcat_name', $sub_category );
    $query = $this->db->get( 'tbl_subcategory' );
    if ( $query->num_rows() > 0 ) {
      return $query->row()->id;
    } else {
      $data = array( 
        'subcat_name' => $sub_category, 
        'category_id' => $cat_id,
      );
      if ( $this->db->insert( 'tbl_subcategory', $data ) ) {
        $this->db->select( 'MAX(subcat_id) as id' );
        return $this->db->get( 'tbl_subcategory' )->row()->id;
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
