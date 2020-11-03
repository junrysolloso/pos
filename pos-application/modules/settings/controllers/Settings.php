<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 


    // if ( ! $this->session->userdata( 'user_id' ) ) {
    //   redirect( base_url( 'login' ) );
    // }
    $this->load->model('Model_Unit');
    $this->load->model('Model_Damage');
    $this->load->model( 'sales/Model_Sales' );
  }

	/**
	 * Index page for the settings page
	 */
  public function index() {
    
    // Save setting unit information
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

      $unit_id = $this->input->post( 'unit_id' ) ? $this->input->post( 'unit_id' ) : NULL;
      $data = array (
        'unit_id'    => $unit_id,
        'unit_desc' => $this->input->post( 'unit_desc' ),
        'unit_sh' => $this->input->post( 'unit_sh' ),
      
      );
      if( $this->input->post( 'submit_unit' ) && ! empty( $this->input->post( 'submit_unit' ) ) ) {
        if ( $this->Model_Unit->item_insert( $data ) ) {
          unset( $_POST );
          $this->session->set_tempdata( array(
            'msg' 	=> 'Unit successfully added.',
            'class' => 'alert-success',
          ), NULL, 5 );
        }
      }
    }

    // Save Setting Damage Reports
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

      $ds_id = $this->input->post( 'ds_id' ) ? $this->input->post( 'ds_id' ) : NULL;
      $data = array (
        'ds_id'    => $ds_id,
        'item_id' => $this->input->post( 'item_id' ),
        'ds_quantity' => $this->input->post( 'ds_quantity' ),
        'ds_remarks' => $this->input->post( 'ds_remarks' ),
      
      );
      if( $this->input->post( 'submit_dmg' ) && ! empty( $this->input->post( 'submit_dmg' ) ) ) {
        if ( $this->Model_Damage->item_insert( $data ) ) {
          unset( $_POST );
          $this->session->set_tempdata( array(
            'msg' 	=> 'Damage report successfully added.',
            'class' => 'alert-success',
          ), NULL, 5 );
        }
      }
    }

    $data['title'] = 'Settings';
    $data['class'] = 'settings';
    $data['sales_total'] = $this->Model_Sales->sales_total_get();

    /**
     * Load template parts
     * 
     * Loading template parts should be place at the bottom  
     * part of the function in order to avoid error in saving data
     * specially when rendering a view.
     */

    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );
    
    $this->template->write_view( 'content', 'templates/template_topbar' );
    $this->template->write_view( 'content', 'templates/template_sidebar', $data );
    $this->template->write_view( 'content', 'view_settings', $data );
    $this->template->write_view( 'content', 'templates/template_footer' );
    $this->template->render();
  }

}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */
