<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists( 'task' ) ) {
  /**
   * Log messages
   * @param string $activity
   * @return array
   */
  function task( $activity ) {
    $task = [
      'product' => [
        'delete'  => 'Deleted product',
        'update'  => 'Updated product',
        'add'     => 'Added product',
        'view'    => 'Viewed product',
      ],
      'user' => [
        'delete'  => 'Deleted user',
        'update'  => 'Updated user',
        'add'     => 'Added user',
        'view'    => 'Viewed user',
      ],
      'order' => [
        'delete'  => 'Deleted order',
        'update'  => 'Updated order',
        'add'     => 'Added order',
        'view'    => 'Viewed order',
      ],
      'unit' => [
        'delete'  => 'Deleted unit',
        'update'  => 'Updated unit',
        'add'     => 'Added unit',
        'view'    => 'Viewed unit',
      ],
      'category' => [
        'delete'  => 'Deleted category',
        'update'  => 'Updated category',
        'add'     => 'Added category',
        'view'    => 'Viewed category',
      ],
      'subcategory' => [
        'delete'  => 'Deleted sub-category',
        'update'  => 'Updated sub-category',
        'add'     => 'Added sub-category',
        'view'    => 'Viewed sub-category',
      ],
      'login' => [
        'in'      => 'Log in',
        'out'     => 'Log out',
      ],
      'backup' => [
        'add'     => 'Backup database',
      ],
      'damage' => [
        'delete'  => 'Deleted damage',
        'update'  => 'Updated damage',
        'add'     => 'Added damage',
        'view'    => 'Viewed damage',
      ],
      'default'   => 'Cannot track task',
    ];

    switch ( $activity ) {
      case 'product':
        return $task['product'];
        break;
      case 'user':
        return $task['user'];
        break;
      case 'order':
        return $task['order'];
        break;
      case 'unit':
        return $task['unit'];
        break;
      case 'category':
        return $task['category'];
        break;
      case 'subcategory':
        return $task['subcategory'];
        break;
      case 'login':
        return $task['login'];
        break;
      case 'backup':
        return $task['backup'];
        break;
      case 'damage':
        return $task['damage'];
        break;
      default:
        return $task['default'];
        break;
    }
  }
}
