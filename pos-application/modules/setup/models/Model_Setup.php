<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Setup extends MY_Model
{

  function __construct() {
    parent:: __construct();
  }

  /**
   * Generate sample data
   * @param string $year
   * @param int $month
   * @return bool
   */
  public function generate_dummy( $year, $month ) {
    $flag = false;
    $id = 1;

    for ($i=1; $i < 31; $i++) { 
      if( strlen( $i ) == 1 ) $i = '0' . $i;

      $date  = $year .'-'. $month .'-'. $i;
      $total = ( 100 * intval( mt_rand( 2, 99 ) ) );
      $or    = mt_rand( 1000000, 9999999 );
      $code  = $this->_generate_code();

      // Sales
      if( $this->db->simple_query("INSERT INTO `tbl_sales` (`sales_id`, `cust_id`, `sales_date`, `sales_total`, `sales_or`, `sales_tellerid`, `sales_discount`) VALUES (NULL, NULL, '$date', '$total', '$or', '1', NULL)") ) {
        
        // Get sales max id
        $this->db->select( 'MAX(sales_id) as id' );
        $id = $this->db->get( 'tbl_sales' )->row()->id;

        // Sales information
        if( $this->db->simple_query("INSERT INTO `tbl_salesinfo` (`salesinfo_id`, `sales_id`, `item_id`, `unit_price`, `no_of_items`) VALUES (NULL, '$id', '$code', '50', '$i')") ) {
          // Items
          if( $this->db->simple_query("INSERT INTO `tbl_items` (`id`, `item_id`, `subcat_id`, `item_name`, `item_description`, `item_critlimit`, `unit_id`) VALUES (NULL, '$code', '1', 'Alaska', '100 grams', '36', '1')") ) {
            $flag = true;
          }
        }
      }
    }
    
    if ( $flag ) {
      // Category
      if( $this->db->simple_query("INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES (NULL, 'Milk')") ) {
        // Sub category
        if( $this->db->simple_query("INSERT INTO `tbl_subcategory` (`subcat_id`, `subcat_name`, `category_id`) VALUES (NULL, 'Alaska', '1')") ) {
          // Unit
          if( $this->db->simple_query("INSERT INTO `tbl_unit` (`unit_id`, `unit_desc`, `unit_sh`) VALUES (NULL, '1 dozen', '12')") ) {
            return true;
          }
        }
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
