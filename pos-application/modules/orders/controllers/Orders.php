<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Orders extends MY_Controller
{

  function __construct() {
    parent:: __construct();

    $this->load->model( 'Model_Orders' );
    $this->load->model( 'Model_Orderdetails' );
    $this->load->model( 'settings/Model_Unit' );
    $this->load->model( 'settings/Model_Product_Info' );
    $this->load->model( 'settings/Model_Category' );
  }

  /**
   * Index page for orders
   */
  public function index() {

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if( $this->input->post( 'submit_order' ) && ! empty( $this->input->post( 'submit_order' ) ) ) {

        $expiration_date = $this->input->post( 'expiry_date' );
        $order_id        = $this->input->post( 'order_id' );

        $data = array(
          'order_date'            => $this->input->post( 'order_date' ),
          'order_total'           => $this->input->post( 'order_total' ),
          'item_id'               => $this->input->post( 'item_id' ),
          'category_id'           => $this->input->post( 'category_id' ),
          'unit_id'               => $this->input->post( 'unit_id' ),
          'orderdetails_quantity' => $this->input->post( 'orderdetails_quantity' ),
          'price_per_unit'        => $this->input->post( 'price_per_unit' ),
        );

        if( ! empty( $expiration_date ) || 1 ) {
          array_push( $data, array( 'expiry_date' => $this->input->post( 'expiry_date' ) ) );
        }

        if( ! empty( $order_id ) && $order_id != 0 ) {
          array_push( $data, array( 'order_id' => $this->input->post( 'order_id' ) ) );
        }
        
        $this->Model_Orders->order_add( $data );
        $this->Model_Orderdetails->order_details_add( $data );
      }
    }

    $data['title'] = 'Orders';
    $data['class'] = 'orders';
    $data['sales_total']    = $this->Model_Sales->sales_total_get();
    $data['items_id_all']   = $this->Model_Product_Info->items_id_get();
    $data['categories_all'] = $this->Model_Category->category_get();
    $data['unit_all']       = $this->Model_Unit->unit_get();

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
