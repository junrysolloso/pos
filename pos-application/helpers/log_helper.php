<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists( 'log_lang' ) ) {
  /**
   * Log Messages
   * @param string $activity
   * @return array $task
   */
  function log_lang( $activity ) {
    $task = array (
      'category' => array(
        'delete'  => 'Deleted Category',
        'updated' => 'Updated Category',
        'add'     => 'Added Category ',
        'view'    => 'Viewed Category',
      ),
      'com_info' => array(
        'delete'  => 'Deleted Company Information',
        'updated' => 'Updated Company Information',
        'add'     => 'Added Company Information',
        'view'    => 'Viewed Company Information',
      ),
      'customer' => array(
        'delete'  => 'Deleted Customer Information',
        'updated' => 'Updated Customer Information',
        'add'     => 'Added Customer Information',
        'view'    => 'Viewed Customer Information',
      ),
      'damage_stocks' => array(
        'delete'  => 'Deleted Damage Stocks',
        'updated' => 'Updated Damage Stocks',
        'add'     => 'Added Damage Stocks',
        'view'    => 'Viewed Damage Stocks',
      ),
      'inventory' => array(
        'delete'  => 'Deleted Item In Inventory',
        'updated' => 'Updated Item In Inventory',
        'add'     => 'Added Item In Inventory',
        'view'    => 'Viewed Item In Inventory',
      ),
      'item' => array(
        'delete'  => 'Deleted Item',
        'updated' => 'Updated Item',
        'add'     => 'Added Item',
        'view'    => 'Viewed Item',
      ),
      'migrations' => array(
        'add'     => 'Perform Migration',
      ),
      'order_details' => array(
        'delete'  => 'Deleted Order Details',
        'updated' => 'Updated Order Details',
        'add'     => 'Added Order Details',
        'view'    => 'Viewed Order Details',
      ),
      'order_inventory' => array(
        'delete'  => 'Deleted Order Inventory',
        'updated' => 'Updated Order Inventory',
        'add'     => 'Added Order Inventory',
        'view'    => 'Viewed Order Inventory',
      ),
      'orders' => array(
        'delete'  => 'Deleted Order',
        'updated' => 'Updated Order',
        'add'     => 'Added Order',
        'view'    => 'Viewed Order',
      ),
      'sales' => array(
        'delete'  => 'Deleted Sales',
        'updated' => 'Updated Sales',
        'add'     => 'Added Sales',
        'view'    => 'Viewed Sales',
      ),
      'sales_info' => array(
        'delete'  => 'Deleted Sales Information',
        'updated' => 'Updated Sales Information',
        'add'     => 'Added Sales Information',
        'view'    => 'Viewed Sales Information',
      ),
      'sub_category' => array(
        'delete'  => 'Deleted Sub-category',
        'updated' => 'Updated Sub-category',
        'add'     => 'Added Sub-category',
        'view'    => 'Viewed Sub-category',
      ),
      'unit' => array(
        'delete'  => 'Deleted Unit',
        'updated' => 'Updated Unit',
        'add'     => 'Added Unit',
        'view'    => 'Viewed Unit',
      ),
      'unit_convert' => array(
        'delete'  => 'Deleted Convertion',
        'updated' => 'Updated Convertion',
        'add'     => 'Added Convertion',
        'view'    => 'Viewed Convertion',
      ),
      'user_info' => array(
        'delete'  => 'Deleted User Information',
        'updated' => 'Updated User Information',
        'add'     => 'Added User Information',
        'view'    => 'Viewed User Information',
      ),
      'login' => array(
        'in'      => 'Login',
        'out'     => 'Logout',
      ),
      'default'   => 'Cannot Track Task',
    );

    switch ( $activity ) {
      case 'category':
        return $task['category'];
        break;
      case 'com_info':
        return $task['com_info'];
        break;
      case 'customer':
        return $task['customer'];
        break;
      case 'damage_stocks':
        return $task['damage_stocks'];
        break;
      case 'inventory':
        return $task['inventory'];
        break;
      case 'item':
        return $task['item'];
        break;
      case 'migrations':
        return $task['migrations'];
        break;
      case 'order_details':
        return $task['order_details'];
        break;
      case 'order_inventory':
        return $task['order_inventory'];
        break;
      case 'orders':
        return $task['orders'];
        break;
      case 'sales':
        return $task['sales'];
        break;
      case 'sales_info':
        return $task['sales_info'];
        break;
      case 'sub_category':
        return $task['sub_category'];
        break;
      case 'unit':
        return $task['unit'];
        break;
      case 'user_info':
        return $task['user_info'];
        break;
      case 'login':
        return $task['login'];
        break;
      case 'unit_convert':
        return $task['unit_convert'];
        break;
      default:
      return $task['default'];
        break;
    }
  }
}

if( ! function_exists( 'clean_array' ) ) {
  /**
   * Clean array
   * @param array $array - array to be clean
   * @return array $array
   */
  function clean_array( $array ) {
    if( is_array( $array ) ) {
      foreach ( $array as $key => $val ) {
        if ( empty(  $val ) ||  $val == NULL ) {
          unset( $array[ $key ] );
        }
      }
      return $array;
    }
  }
}

