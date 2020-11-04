<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Setup extends MY_Model
{

  function __construct() {
    parent:: __construct();
  }

  /**
   * Cleanup table data
   */
  public function clean_dummy( $table ) {
    $table = strtolower( $table );
    switch ( $table ) {
      case 'unit convert':
        if( $this->db->truncate( 'tbl_unitconvert' ) ) { 
          return true; 
        }
        break;
      case 'unit':
        if( $this->db->truncate( 'tbl_unit' ) ) {
          return true; 
        }
        break;
      case 'sub category':
        if( $this->db->truncate( 'tbl_subcategory' ) ) { 
          return true; 
        }
        break;
      case 'sales info':
        if( $this->db->truncate( 'tbl_salesinfo' ) ) { 
          return true; 
        }
        break;
      case 'sales':
        if( $this->db->truncate( 'tbl_sales' ) ) { 
          return true; 
        }
        break;
      case 'orders':
        if( $this->db->truncate( 'tbl_orders' ) ) { 
          return true; 
        }
        break;
      case 'order inventory':
        if( $this->db->truncate( 'tbl_orderinventory' ) ) { 
          return true; 
        }
        break;
      case 'order details':
        if( $this->db->truncate( 'tbl_orderdetails' ) ) { 
          return true; 
        }
        break;
      case 'items':
        if( $this->db->truncate( 'tbl_items' ) ) { 
          return true; 
        }
        break;
      case 'inventory':
        if( $this->db->truncate( 'tbl_inventory' ) ) { 
          return true; 
        }
        break;
      case 'category':
        if( $this->db->truncate( 'tbl_category' ) ) { 
          return true; 
        }
        break;
      case 'log':
        if( $this->db->truncate( 'tbl_log' ) ) { 
          return true; 
        }
        break;
      case 'all':
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
                                if( $this->db->truncate( 'tbl_ucjunc' ) ) {
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
        break;
      default:
        return false;
        break;
    }
  }

}

/* End of file Model_Setup.php */
/* Location: ./application/modules/setup/models/Model_Setup.php */
