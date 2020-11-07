<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 

    if ( ! $this->session->userdata( 'user_id' ) ) {
      redirect( base_url( 'login' ) );
    }

    // Load models
    $this->load->model( 'Model_Inv_Damage' );
    $this->load->model( 'Model_Inventory' );
    $this->load->model( 'Model_Inv_Items' );
  }

	/**
	 * Index page for the settings page
	 */
  public function index() {

    $data['title'] = 'Inventory';
    $data['class'] = 'inventory';
    $data['sales_total'] = $this->Model_Sales->sales_total_get();

    $data['damage_all']   = $this->Model_Inv_Damage->damage_get();
    $data['inv_grocery']  = $this->Model_Inv_Items->inv_items_get( 'grocery' );
    $data['inv_pharmacy'] = $this->Model_Inv_Items->inv_items_get( 'pharmacy' );
    $data['inv_beauty']   = $this->Model_Inv_Items->inv_items_get( 'beauty' );

    /**
     * Load template parts
     */
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );
    
    $this->template->write_view( 'content', 'templates/template_topbar' );
    $this->template->write_view( 'content', 'templates/template_sidebar', $data );
    $this->template->write_view( 'content', 'view_inventory', $data );
    $this->template->write_view( 'content', 'templates/template_footer' );
    $this->template->render();
  }

}

/* End of file Inventory.php */
/* Location: ./application/modules/inventory/controllers/Inventory.php */
