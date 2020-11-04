<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Orders extends MY_Controller
{

  function __construct() {
    parent:: __construct();

    $this->load->model( 'Model_Relation' );
  }

  public function index() {

    $data['title'] = 'Orders';
    $data['class'] = 'orders';
    $data['sales_total']    = $this->Model_Sales->sales_total_get();
    $data['items_id_all']    = $this->Model_Relation->items_id_get();
    $data['categories_all'] = $this->Model_Relation->categories_get();

     // Load template parts
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );

    $this->template->write_view( 'content', 'templates/template_topbar' );
    $this->template->write_view( 'content', 'templates/template_sidebar', $data );
    $this->template->write_view( 'content', 'view_orders', $data );
    $this->template->write_view( 'content', 'templates/template_footer' );
    $this->template->render();

  }

}

/* End of file Orders.php */
/* Location: ./application/modules/orders/controllers/Orders.php */
