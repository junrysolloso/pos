<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists( 'task' ) ) {
  /**
   * Log Messages
   * @param string $activity
   * @return array
   */
  function task( $activity ) {

    $task = array (
      'member' => array(
        'delete'  => 'Deleted Member',
        'update'  => 'Updated Member',
        'add'     => 'Added Member',
        'view'    => 'Viewed Member',
      ),
      'user' => array(
        'delete'  => 'Deleted User',
        'update'  => 'Updated User',
        'add'     => 'Added User',
        'view'    => 'Viewed User',
      ),
      'chapter' => array(
        'delete'  => 'Deleted Chapter',
        'update'  => 'Updated Chapter',
        'add'     => 'Added Chapter',
        'view'    => 'Viewed Chapter',
      ),
      'official' => array(
        'delete'  => 'Deleted Official',
        'update'  => 'Updated Official',
        'add'     => 'Added Official',
        'view'    => 'Viewed Official',
      ),
      'login' => array(
        'in'      => 'Log In',
        'out'     => 'Log Out',
      ),
      'backup' => array(
        'add'     => 'Backup Database',
      ),
      'default'   => 'Cannot Track Task',
    );

    switch ( $activity ) {
      case 'member':
        return $task['member'];
        break;
      case 'user':
        return $task['user'];
        break;
      case 'chapter':
        return $task['chapter'];
        break;
      case 'official':
        return $task['official'];
        break;
      case 'backup':
        return $task['backup'];
        break;
      case 'login':
        return $task['login'];
        break;
      default:
      return $task['default'];
        break;
    }
  }
}
