<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Orders extends MY_Controller
{

  function __construct() {
    parent:: __construct();

    if ( $this->session->userdata( 'user_rule' ) != 'administrator' ) {
      redirect( base_url( 'login' ) );
    }
    
    $this->load->model( 'Model_Orders' );
    $this->load->model( 'Model_Orderdetails' );
    $this->load->model( 'Model_Order_Inventory' );
    $this->load->model( 'settings/Model_Unit' );
    $this->load->model( 'settings/Model_Product_Info' );
    $this->load->model( 'settings/Model_Category' );
  }

  /**
   * Index page for orders
   */
  public function index() {

    /**
     * Order details variables
     */
    $data['order_details']       = array();
    $data['order_details_total'] = '0.00';
    $data['order_details_date']  = '';

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if( $this->input->post( 'item_id' ) ) {

        $expiration_date = $this->input->post( 'expiry_date' );
        $order_id        = $this->input->post( 'order_id' );

        $data = array(
          'item_id'               => $this->input->post( 'item_id' ),
          'order_date'            => $this->input->post( 'order_date' ),
          'price_per_unit'        => $this->input->post( 'price_per_unit' ),
          'orderdetails_quantity' => $this->input->post( 'orderdetails_quantity' ),
          'inv_item_srp'          => $this->input->post( 'inv_item_srp' ),
          'expiration_date'       => $this->input->post( 'expiration_date' ), 
        );
        
        $tmp_data = $this->Model_Orders->order_add( $data );
        if ( is_array( $tmp_data ) ) {
          /**
           * Return json data
           */
          header('content-type: application/json');
          exit( json_encode( $tmp_data ) );
        }
      }

      if ( $this->input->post( 'save_orders' ) ) {
        if ( $this->Model_Orders->order_details_save() ) {
          /**
           * Return json data
           */
          header( 'content-type: application/json' );
          exit( json_encode( array( 'msg' => 'success' ) ) );
        }
      }
    }

    /**
     * Reset temporary table
     */
    $this->Model_Orders->reset_orders_table();

    $ord_history = $this->Model_Order_Inventory->order_inv_get();

    $data['title']          = 'Orders';
    $data['class']          = 'orders';
    $data['sales_total']    = $this->Model_Sales->sales_total_get();
    $data['items_id_all']   = $this->Model_Product_Info->items_id_get();
    $data['categories_all'] = $this->Model_Category->category_get();
    $data['unit_all']       = $this->Model_Unit->unit_get();
    $data['order_history']  = $ord_history[0];
    $data['order_items']    = $ord_history[1];

     // Load template parts
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );

    $this->template->write_view( 'content', 'templates/template_topbar', $data );
    $this->template->write_view( 'content', 'templates/template_sidebar' );
    $this->template->write_view( 'content', 'view_orders' );
    $this->template->write_view( 'content', 'templates/template_footer' );
    $this->template->add_js( 'pos-assets/js/pages/page_order.js' );
    $this->template->render();

  }

  /**
   * Reset temporary table
   */
  public function reset_orders() {
    if( $this->input->post( 'reset_orders' ) ) {
      if( $this->Model_Orders->reset_orders_table() ) {
        /**
         * Return json data
         */
        header( 'content-type: application/json' );
        exit( json_encode( array( 'msg' => 'success' ) ) );
      }
    }
  }

  /**
   * Update temporary table
   */
  public function update_order() {
    if( $this->input->post( 'id' ) ) {

      $this->load->model( 'Model_Orders_Temp' );

      $data = array( 
        'id'            => $this->input->post('id'),
        'tmp_quantity'  => $this->input->post('tmp_quantity'),
        'tmp_price'     => $this->input->post('tmp_price'),
        'tmp_srp'       => $this->input->post('tmp_srp'),
        'tmp_expiry'    => $this->input->post('tmp_expiry'),
      );

      $result = $this->Model_Orders_Temp->tmp_update( $data );
      if( is_array( $result ) ) {
        /**
         * Return json data
         */
        header( 'content-type: application/json' );
        exit( json_encode( $result ) );
      }
    }
  }


}

/* End of file Orders.php */
/* Location: ./application/modules/orders/controllers/Orders.php */
