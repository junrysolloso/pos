<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Database delta - 
 * Simple CRUD class for database operations
 * 
 * @author Junry Solloso
 */
class Dbdelta
{ 
  var $CI;
  var $db;

  function __construct() {
    $this->CI =& get_instance();
    $this->db = $this->CI->db;
  }

  /**
   * Add data to database
   * @param string $table database table
   * @param array  $data key and value pair
   * @return boolean
   */
  public function insert( $table = NULL, $data = [] ) {
    if ( is_array( $data ) && count( $data ) > 0 ) {
      if ( $table ) {
        if ( $this->db->insert( $table, $data ) ) {
          return true;
        }
      }
    }
    return false;
  } 

  /**
   * Update database table
   * @param string $table database table
   * @param array  $data key and value pair
   * @param array  $arg reference value pair
   * @return boolean
   */
  public function update( $table  = NULL, $data = [], $arg = [] ) {
    if ( is_array( $data ) && ! empty( $data ) ) {
      if ( is_array( $arg ) && ! empty( $arg ) ) {
        foreach ( $arg as $key => $value ) {
          $this->db->where( $key, $value );
        }
      }

      if ( $this->db->update( $table, $data ) ) {
        return true;
      }
    }
    return false;
  } 

  /**
   * Delete specific data
   * @param string $table database table
   * @param string $col column to delete
   * @param int    $id reference id
   * @return boolean
   */
  public function delete( $table = NULL, $col = NULL, $id = 0 ) {
    if ( $table && $col && $id) {
      $this->db->where( $col, $id );
      if ( $this->db->delete( $table ) ) {
        return true;
      }
    }
    return false;
  } 

  /**
   * Check specific value if exist
   * @param string $table database table
   * @param array  $arg key and value pair for where clause
   * @return boolean
   */
  public function check( $table = NULL, $arg = [] ) {
    if ( $table ) {
      if ( is_array( $arg ) && count( $arg ) > 0 ) {
        $this->db->select( '*' );

        foreach ( $arg as $key => $value) {
          $this->db->where( $key, $value );
        }

        $query = $this->db->get( $table );
        if ( $query->num_rows() > 0 ) {
          return true;
        }
      }
    }
    return false;
  }
  
  /**
   * Get all data from a table
   * @param string $table database table
   * @param array  $order_by order by reference
   * @param int    $limit result limit
   * @param array  $joins table(s) too join (optional)
   * @param array  $filter key value pair for where clause
   * @param int    $offset row offset
   * @param string $fields cutom selection of fields
   * @param string $group_by reference column for grouping
   * @param string $distinct distinct column
   * @return array
   */
  public function get_all( 
    $table    = NULL, 
    $order_by = [],
    $limit    = 0, 
    $joins    = [], 
    $filter   = [], 
    $offset   = 0, 
    $fields   = NULL,
    $group_by = NULL,
    $distinct = NULL ) {

    if ( $table ) {

      if ( $fields ) {
        $this->db->select( $fields );
      }

      if ( is_array( $order_by ) && ! empty( $order_by ) ) {
        foreach ( $order_by as $key => $value ) {
          $this->db->order_by( $key, $value );
        }
      }

      if ( is_array( $filter ) && ! empty( $filter ) ) {
        foreach ( $filter as $key => $value ) {
          $this->db->where( $key, $value );
        }
      }
      
      if ( is_array( $joins ) && ! empty( $joins ) ) {
        foreach ( $joins as $key => $value ) {
          $this->db->join( $key, $value );
        }
      }

      if ( $limit ) {
        $this->db->limit( $limit );
      }

      if ( $offset ) {
        $this->db->offset( $offset );
      }

      if ( $distinct ) {
        $this->db->distinct( $distinct );
      }

      if ( $group_by ) {
        $this->db->group_by( $group_by );
      }

      $query = $this->db->get( $table );
      if ( $query ) {
        return $query->result();
      }
    }
  }

  /**
   * Get specific data using specific id
   * @param string $table database table
   * @param array  $where reference key value pair
   * @param array  $joins table(s) too join (optional)
   * @param array  $order_by optional
   * @param array  $fields optional
   * @param int    $limit
   * @return array
   */
  public function get_by_id( 
    $table = NULL, 
    $where = [], 
    $joins = [],
    $order_by = [],
    $fields = NULL,
    $limit = 0 ) {

    if ( $table && is_array( $where ) ) {
      
      if ( $fields ) {
        $this->db->select( $fields );
      }

      if ( is_array( $joins ) && ! empty( $joins )  ) {
        foreach ( $joins as $key => $value ) {
          $this->db->join( $key, $value );
        }
      }

      if ( is_array( $order_by ) && count( $order_by ) > 0  ) {
        foreach ( $order_by as $key => $value ) {
          $this->db->order_by( $key, $value );
        }
      }

      if ( $limit ) {
        $this->db->limit( $limit );
      }

      foreach ( $where as $key => $value ) {
        $this->db->where( $key, $value );
      }

      $query = $this->db->get( $table );
      if ( $query ) {
        return $query->result();
      }
    }
  }

  /**
   * Get data id
   * @param string $table database table
   * @param string $col column name
   * @param array  $arg array of clause
   * @return int
   */
  public function get_data_id( $table = NULL, $col = NULL, $arg = [] ) {
    if ( $table && is_array( $arg ) ) {
      
      foreach ( $arg as $key => $value ) {
        $this->db->where( $key, $value );
      }

      $id = $this->db->select( '`'. $col .'` AS id' )->get( $table )->row()->id;
      if ( $id ) {
        return intval( $id );
      }
    }
    return false;
  }

  /**
   * Get max id
   * @param string $table database table
   * @param string $col column of id
   * @return int
   */
  public function get_max_id( $table = NULL, $col = NULL ) {
    if ( $table && $col ) {
      $max_id = $this->db->select( 'MAX(`'. $col .'`) AS id' )->get( $table )->row()->id;
      if ( $max_id ) {
        return intval( $max_id );
      }
    }
    return false;
  }

  /**
   * Get column counts
   * @param string  $table database table
   * @param string  $col column to be count
   * @param boolean $distinct detemines whether to query distinct data
   * @param array   $filter key and value pair where clause
   * @param array   $joins key and value pair table to join
   * @return int
   */
  public function get_count( 
    $table    = NULL, 
    $col      = NULL, 
    $distinct = FALSE, 
    $filter   = [], 
    $joins    = [] ) {
    if ( $table && $col ) {

      if ( $distinct ) {
        $this->db->select( 'COUNT( DISTINCT '. $col .') AS counts' );
      } else {
        $this->db->select( 'COUNT('. $col .') AS counts' );
      }

      if ( is_array( $filter ) && count( $filter ) > 0  ) {
        foreach ( $filter as $key => $value ) {
          $this->db->where( $key, $value );
        }
      }

      if ( is_array( $joins ) && count( $joins ) > 0  ) {
        foreach ( $joins as $key => $value ) {
          $this->db->join( $key, $value );
        }
      } 

      $counts = $this->db->get( $table )->row()->counts;
      if ( $counts ) {
        return intval( $counts ) ? intval( $counts ) : 0;
      }
    }
    return false;
  }

  /**
   * Get column data
   * @param string $table database table
   * @param string $col column to get the data from
   * @return array
   */
  public function get_col_data( $table = NULL, $col = NULL ) {
    if ( $table && $col ) {
      $query = $this->db->select( $col )->distinct( $col )->get( $table );
      if ( $query ) {
        return $query->result();
      }
    }
    return false;
  }

  /**
   * Get sum
   * @param string $table database table
   * @param string $sql query for summation
   * @return int
   */
  public function get_sum( $table = NULL, $sql = NULL ) {
    if ( $table && $sql ) {
      $sum = $this->db->select( $sql )->get( $table )->row()->sum;
      return $sum ? $sum : 0;
    }
    return false;
  }

  /**
   * Truncate table
   * @param string $table database table
   * @return boolean
   */
  public function reset_table( $table = NULL ) {
    if ( $table ) {
      if ( $this->db->truncate( $table ) ) {
        return true;
      }
    }
    return false;
  }

}
