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
      case 'company':
        if( $this->db->truncate( 'tbl_companyinfo' ) ) { 
          return true; 
        }
        break;
      case 'damage items':
        if( $this->db->truncate( 'tbl_damagestocks' ) ) { 
          return true; 
        }
        break;
      case 'order details expiry':
        if( $this->db->truncate( 'tbl_orderdetails_expiry' ) ) { 
          return true; 
        }
        break;
      case 'user':
        if( $this->db->truncate( 'tbl_userinfo' ) ) { 
          if( $this->db->truncate( 'tbl_users' ) ) { 
            if ( $this->db->simple_query( 'INSERT INTO `tbl_users` (`username`, `user_pass`, `user_level`, `user_id`) VALUES ("admin", "21232f297a57a5a743894a0e4a801fc3", "administrator", 1)' ) ) {
              if ( $this->db->simple_query( 'INSERT INTO `tbl_userinfo` (`userinfo_id`, `userinfo_name`, `userinfo_address`, `userinfo_nickname`) VALUES (1, "system admin", "dinagat sslands", "admin")' ) ) {
                return true;
              }
            }
          }
        }
        break;
      case 'log':
        if( $this->db->truncate( 'tbl_log' ) ) { 
          return true; 
        }
        break;
      case 'all':

        $tables =  array ( 
          'tbl_unitconvert',
          'tbl_unit',
          'tbl_subcategory',
          'tbl_salesinfo',
          'tbl_sales',
          'tbl_orders',
          'tbl_orderinventory',
          'tbl_orderdetails',
          'tbl_items',
          'tbl_inventory',
          'tbl_category',
          'tbl_log',
          'tbl_ucjunc',
          'tbl_companyinfo',
          'tbl_userinfo',
          'tbl_users',
          'tbl_damagestocks',
          'tbl_orderdetails_expiry',
        );

        foreach ( $tables as $table ) {
          $this->db->truncate( $table );
        }

        if ( $this->db->simple_query( 'INSERT INTO `tbl_users` (`username`, `user_pass`, `user_level`, `user_id`) VALUES ("admin", "21232f297a57a5a743894a0e4a801fc3", "Administrator", 1)' ) ) {
          if ( $this->db->simple_query( 'INSERT INTO `tbl_userinfo` (`userinfo_id`, `userinfo_name`, `userinfo_address`, `userinfo_nickname`) VALUES (1, "system admin", "dinagat sslands", "admin")' ) ) {
            return true;
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
