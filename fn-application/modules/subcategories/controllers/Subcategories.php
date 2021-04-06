<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategories extends MY_Controller
{
  
  var $js;

  function __construct() {
    parent:: __construct(); 
    $this->sess->unrestricted();
  }

  /**
   * Add
   */
  public function add() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'sub_name' ) ) {
        $name = strtolower( $this->input->post( 'sub_name' ) );
        $data = [
          'subcat_name'  => $name,
          'category_id'  => intval( $this->input->post( 'category_id' ) )
        ];

        $data = clean_array( $data );
        if ( ! $this->dbdelta->check( 'tbl_subcategory', [ 'subcat_name' => trim( $name ) ] ) ) {
          if ( $this->dbdelta->insert( 'tbl_subcategory', $data ) ) {
            response( [ 'msg' => 'success', 'data' => 'added.' ] );
          }
        } else {
          response( [ 'msg' => 'exist', 'data' => 'Sub-category' ] );
        }
      }
    }

    $config['view'] = 'view_add';
    $config['title'] = 'Add Sub Category';
    $config['categories'] = $this->dbdelta->get_all( 'tbl_category' );
    $this->content->view( $config );
  }

  /**
   * Edit
   */
  public function edit() {
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {
        $joins = [ 'tbl_category' => 'tbl_category.category_id=tbl_subcategory.category_id' ];
        $data = $this->dbdelta->get_by_id( 'tbl_subcategory', [ 'subcat_id' => $this->input->get( 'id' ) ], $joins );
      }
    } else {
      if ( $this->input->post( 'subcat_id' ) ) {
        $id = $this->input->post( 'subcat_id' );
        $data = [
          'subcat_name'  => strtolower( $this->input->post( 'sub_name' ) ),
          'category_id'  => intval( $this->input->post( 'category_id' ) )
        ];

        $data = clean_array( $data );
        if ( $this->dbdelta->update( 'tbl_subcategory', $data, [ 'subcat_id' => $id ] ) ) {
          response( [ 'msg' => 'success', 'data' => 'updated.' ] );
        }
      }
    }

    $config['view'] = 'view_edit';
    $config['title'] = 'Edit Sub Category';
    $config['categories'] = $this->dbdelta->get_all( 'tbl_category' );
    $config['subcategory'] = $data;
    $this->content->view( $config );
  }

  /**
   * Delete
   */
  public function delete() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'id' ) ) {
        $id = $this->input->post( 'id' );

        if ( $this->dbdelta->delete( 'tbl_subcategory', 'subcat_id', $id ) ) {
          response( [ 'msg' => 'success', 'data' => 'deleted.' ] );
        }
      }
    }
  }

}
