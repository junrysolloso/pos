<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller
{
  
  var $js;

  function __construct() {
    parent:: __construct(); 
    $this->sess->unrestricted();
  }

	/**
	 * Index page
	 */
  public function index() {
    $joins = [ 
      'tbl_ucjunc' => 'tbl_ucjunc.item_id=tbl_items.item_id',
      'tbl_unitconvert' => 'tbl_unitconvert.uc_id=tbl_ucjunc.uc_id'
    ];
    
    $page = intval( $this->input->get( 'page' ) );
    $link = base_url() . 'products';
    $rows = $this->dbdelta->get_count( 'tbl_items', 'id' );
    $offset = $page && is_numeric( $page ) ? $page : 0;

    $config['view'] = 'view_products';
    $config['title'] = 'Products';
    $config['products'] = $this->dbdelta->get_all( 'tbl_items', [], 50, $joins, [], $offset );
    $config['pagination'] = $this->paginate->links( $link, 50, $rows );

    $this->content->view( $config );
  }

  /**
   * Add
   */
  public function add() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'item_id' ) ) {
        $item_id = $this->input->post( 'item_id' );
        $data = [
          'item_id' => $item_id,
          'subcat_id' => intval( $this->input->post( 'subcat_id' ) ),
          'item_name' => strtolower( $this->input->post( 'prod_name' ) ),
          'item_description' => strtolower( $this->input->post( 'prod_desc' ) ),
          'item_critlimit' => intval( $this->input->post( 'prod_limit' ) ),
          'brand_name' => $this->input->post( 'brand_name' ),
          'generic_name' => $this->input->post( 'generic_name' ),
          'unit_id' => intval( $this->input->post( 'order_unit' ) )
        ];

        $unit = [
          'unit_id1' => intval( $this->input->post( 'order_unit' ) ),
          'unit_id2' => intval( $this->input->post( 'selling_unit' ) ),
          'uc_number' => intval( $this->input->post( 'prod_equiv' ) )
        ];

        $unit = clean_array( $unit );
        $data = clean_array( $data );

        if ( ! $this->dbdelta->check( 'tbl_items', [ 'item_id'=> trim( $item_id ) ] ) ) {
          if ( $this->dbdelta->insert( 'tbl_unitconvert', $unit ) ) {
            $convert_id =  $this->dbdelta->get_max_id( 'tbl_unitconvert', 'uc_id' );
            $junc = [
              'uc_id' => intval( $convert_id ),
              'item_id' => $this->input->post( 'item_id' ),
            ];
  
            $junc = clean_array( $junc );
            if ( $this->dbdelta->insert( 'tbl_ucjunc', $junc ) ) {
              if ( $this->dbdelta->insert( 'tbl_items', $data ) ) {
                if ( $this->model_log->add( task( 'product' )['add'] ) ) {
                  response( [ 'msg' => 'success', 'data' => 'added.' ] );
                }
              }
            }
          }
        } else {
          response( [ 'msg' => 'exist', 'data' => 'Product' ] );
        } 
      }
    }

    $config['view'] = 'view_add';
    $config['title'] = 'Add Product';
    $config['subcategories'] = $this->dbdelta->get_all( 'tbl_subcategory' );
    $config['units'] = $this->dbdelta->get_all( 'tbl_unit' );
    $this->content->view( $config );
  }

  /**
   * Edit
   */
  public function edit() {
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {
        $joins = [ 
          'tbl_ucjunc' => 'tbl_ucjunc.item_id=tbl_items.item_id',
          'tbl_unitconvert' => 'tbl_unitconvert.uc_id=tbl_ucjunc.uc_id',
          'tbl_inventory' => 'tbl_inventory.item_id=tbl_items.item_id'
        ];
        $data = $this->dbdelta->get_by_id( 'tbl_items', [ 'id' => intval( $this->input->get( 'id' ) ) ], $joins );
      }
    } else {
      if ( $this->input->post( 'id' ) ) {
        $prod_id = $this->input->post( 'id' );
        $uc_id = $this->input->post( 'uc_id' );
        $ucjunc_id = $this->input->post( 'ucjunc_id' );
        $item_id = intval( $this->input->post( 'item_id' ) );

        $o_order_unit = intval( $this->input->post( 'o_order_unit' ) );
        $o_selling_unit = intval( $this->input->post( 'o_selling_unit' ) );
        $o_subcategory = $this->input->post( 'o_subcategory' );

        $data = [
          'item_id' => $this->input->post( 'item_id' ),
          'subcat_id' => $this->input->post( 'subcat_id' ) ?  intval( $this->input->post( 'subcat_id' ) ) : $o_subcategory,
          'item_name' => strtolower( $this->input->post( 'prod_name' ) ),
          'item_description' => strtolower( $this->input->post( 'prod_desc' ) ),
          'item_critlimit' => intval( $this->input->post( 'prod_limit' ) ),
          'brand_name' => $this->input->post( 'brand_name' ),
          'generic_name' => $this->input->post( 'generic_name' ),
          'unit_id' => intval( $this->input->post( 'order_unit' ) )
        ];

        $unit = [
          'unit_id1' => $this->input->post( 'order_unit' ) ? intval( $this->input->post( 'order_unit' ) ) : $o_order_unit,
          'unit_id2' => $this->input->post( 'selling_unit' ) ? intval( $this->input->post( 'selling_unit' ) ) : $o_selling_unit,
          'uc_number' => intval( $this->input->post( 'prod_equiv' ) )
        ];

        $junc = [
          'uc_id' => intval( $uc_id ),
          'item_id' => $this->input->post( 'item_id' ),
        ];

        $inventory = array (
          'inv_item_srp' => $this->input->post( 'prod_srp' ),
        );

        $junc = clean_array( $junc );
        $unit = clean_array( $unit );
        $data = clean_array( $data );
        $inventory = clean_array( $inventory );

        if ( $this->dbdelta->update( 'tbl_items', $data, [ 'id' => $prod_id ] ) ) {
          if ( $this->dbdelta->update( 'tbl_unitconvert', $unit, [ 'uc_id' => $uc_id ] ) ) {
            if ( $this->dbdelta->update( 'tbl_ucjunc', $junc, [ 'ucjunc_id' => $ucjunc_id ] ) ) {
              if ( $this->dbdelta->update( 'tbl_inventory', $inventory, [ 'item_id' => $item_id ] ) ) {
                if ( $this->model_log->add( task( 'product' )['update'] ) ) {
                  response( [ 'msg' => 'success', 'data' => 'updated.' ] );
                }
              }
            }
          }
        }
      }
    }

    $config['view'] = 'view_edit';
    $config['title'] = 'Edit Product';
    $config['product'] = $data;
    $config['subcategories'] = $this->dbdelta->get_all( 'tbl_subcategory' );
    $config['units'] = $this->dbdelta->get_all( 'tbl_unit' );
    $this->content->view( $config );
  }

  /**
   * Delete
   */
  public function delete() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'id' ) ) {
        $id = $this->input->post( 'id' );
        $uc_id = $this->input->post( 'uc_id' );

        if ( $this->dbdelta->delete( 'tbl_items', 'id', $id ) ) {
          if ( $this->dbdelta->delete( 'tbl_unitconvert', 'uc_id', $uc_id ) ) {
            if ( $this->dbdelta->delete( 'tbl_ucjunc', 'uc_id', $uc_id ) ) {
              if ( $this->model_log->add( task( 'product' )['delete'] ) ) {
                response( [ 'msg' => 'success', 'data' => 'deleted.' ] );
              }
            }
          }
        }
      }
    }
  }

}
