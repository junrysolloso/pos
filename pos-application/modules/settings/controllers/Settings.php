<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 

    if ( $this->session->userdata( 'user_rule' ) != 'administrator' ) {
      redirect( base_url( 'login' ) );
    }

    // Load models
    $this->load->model( 'Model_Unit' );
    $this->load->model( 'Model_User' );
    $this->load->model( 'Model_Damage' );
    $this->load->model( 'Model_Company' );
    $this->load->model( 'Model_Category' );
    $this->load->model( 'Model_Subcategory' );
    $this->load->model( 'Model_Product_Info' );
    $this->load->model( 'Model_Unit_Convert' );
    $this->load->model( 'Model_View_Products' );
    $this->load->model( 'orders/Model_Orders_Temp' );
      
  }

	/**
	 * Index page for the settings page
	 */
  public function index() {

    // Load form library
    $this->load->library( 'form_validation' );

    // Check server request if post
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

      /**
       * Submit button of the form is in array form
       * we can get the value and pass it to switch
       * in order to know what form is being submitted.
       */
      if( $this->input->post( 'submit' ) && ! empty( $this->input->post( 'submit' ) ) ) {
        $post_id = $this->input->post( 'submit' )[0];
      }
      
      // switch between the submit button values
      // NOTE: id will be use on update only e.g $category_id
      switch ( $post_id ) {
        case 'Save Product Details':

          $data = array(
            'item_id'          => $this->input->post( 'item_id' ),
            'item_name'        => $this->input->post( 'item_name' ),
            'item_description' => $this->input->post( 'item_description' ),
            'item_critlimit'   => $this->input->post( 'item_critlimit' ),
            'subcat_id'        => $this->input->post( 'subcat_id' ),
            'unit_id1'         => $this->input->post( 'unit_id1' ),
            'unit_id2'         => $this->input->post( 'unit_id2' ),
            'uc_number'        => $this->input->post( 'uc_number' ),
          );

          $this->Model_Unit_Convert->uc_add( $data );
          
          $this->Model_Product_Info->product_add( $data );
         

          break;
        case 'Save Category Details':

          // Category and sub-category id will be use on update
          $cat_id = $this->input->post( 'category_id' ) ? $this->input->post( 'category_id' ) : NULL;
          $sub_id = $this->input->post( 'subcat_id' ) ? $this->input->post( 'subcat_id' ) : NULL;

          $cat_data = array (
            'category_id'   => $cat_id,
            'category_name' => $this->input->post( 'category_name' ),
          );
          
          $subcat_id  = $sub_id;
          $subcat_nm  = $this->input->post( 'subcat_name' );

          // Save category / sub-category information
          $this->Model_Category->category_add( $cat_data );
          foreach ( $subcat_nm as $key ) {
            $this->Model_Subcategory->subcat_add( $cat_data['category_name'], $key );
          }
      
          break;
        case 'Save Unit Details':
          
          // Save setting unit information
          $unit_id = $this->input->post( 'unit_id' ) ? $this->input->post( 'unit_id' ) : NULL; 
          $data = array (
            'unit_id'   => $unit_id,
            'unit_desc' => $this->input->post( 'unit_desc' ),
            'unit_sh'   => $this->input->post( 'unit_sh' ),
          );

          if ( $this->Model_Unit->item_insert( $data ) ) {
            unset( $_POST );
            $this->session->set_tempdata( array(
              'msg' 	=> 'Unit successfully added.',
              'class' => 'alert-success',
            ), NULL, 5 );
          }

          break;
        case 'Save Company Details':
          
          $data = array(
            'com_id'          => $this->input->post( 'com_id' ),
            'com_name'        => $this->input->post( 'com_name' ),
            'com_proprietor'  => $this->input->post( 'com_proprietor' ),
            'com_tin'         => $this->input->post( 'com_tin' ),
            'com_address'     => $this->input->post( 'com_address' ),
          );
          $this->Model_Company->company_info_add( $data );

          break;
        case 'Save Damage Item':
          
          // Save Setting Damage Reports
          $ds_id = $this->input->post( 'ds_id' ) ? $this->input->post( 'ds_id' ) : NULL;
          $ds_date =  $this->input->post( 'ds_date');
          $createDate = date_create($ds_date);
          $data = array (
            'ds_id'       => $ds_id,
            'item_id'     => $this->input->post( 'dmg_item_id' ),
            'ds_quantity' => $this->input->post( 'ds_quantity' ),
            'ds_remarks'  => $this->input->post( 'ds_remarks' ),
            'ds_date'     => date_format($createDate,"Y-m-d"),
          
          );

          if ( $this->Model_Damage->item_insert( $data ) ) {
            unset( $_POST );
            $this->session->set_tempdata( array(
              'msg' 	=> 'Damage report successfully added.',
              'class' => 'alert-success',
            ), NULL, 5 );
          }

          break;
        case 'Save User Details':
          
          $data = array(
            'userinfo_id'       => $this->input->post( 'userinfo_id' ),
            'username'          => $this->input->post( 'username' ),
            'user_pass'         => $this->input->post( 'user_pass' ),
            'user_level'        => $this->input->post( 'user_level' ),
            'userinfo_name'     => $this->input->post( 'userinfo_name' ),
            'userinfo_address'  => $this->input->post( 'userinfo_address' ),
            'userinfo_nickname' => $this->input->post( 'userinfo_nickname' ),
          );
          $this->Model_User->user_add( $data );

          break;
        default:

          $this->session->set_tempdata( array(
            'msg' 	=> 'Unable to process submitted data.',
            'class' => 'alert-danger',
          ), NULL, 5 );

          break;

          if( $this->input->post( 'update' ) && ! empty( $this->input->post( 'update' ) ) ) {
            if ( $this->Model_View_Products->item_update( $data ) ) {
              unset( $_POST );
              $this->session->set_tempdata( array(
                'msg' 	=> 'Product successfully updated.',
                'class' => 'alert-success',
              ), NULL, 5 );
            }
          }
      }
    }

    $data['title']            = 'Settings';
    $data['class']            = 'settings';
    $data['logs']             = $this->Model_Log->log_get( 0, NULL );
    $data['sales_total']      = $this->Model_Sales->sales_total_get();
    $data['category_all']     = $this->Model_Category->category_get();
    $data['subcategory_all']  = $this->Model_Subcategory->subcat_get();
    $data['damage_all']       = $this->Model_Damage->damage_get();
    $data['unit_all']         = $this->Model_Unit->unit_get();
    $data['user_all']         = $this->Model_User->user_get();
    $data['view_products']    = $this->Model_View_Products->view_products();
    $data['com_info']         = $this->Model_Company->com_info_get();

    /**
     * Load template parts
     */

    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );
    
    $this->template->write_view( 'content', 'templates/template_topbar', $data );
    $this->template->write_view( 'content', 'templates/template_sidebar' );
    $this->template->write_view( 'content', 'view_settings_head' );
    $this->template->write_view( 'content', 'view_category' );
    $this->template->write_view( 'content', 'view_unit' );
    $this->template->write_view( 'content', 'view_product' );
    $this->template->write_view( 'content', 'view_damage' );
    $this->template->write_view( 'content', 'view_company' );
    $this->template->write_view( 'content', 'view_user' );
    $this->template->write_view( 'content', 'view_logs' );
    $this->template->write_view( 'content', 'view_settings_footer' );
    $this->template->write_view( 'content', 'templates/template_footer' );

    // Addtional scripts
    $this->template->add_js( 'pos-assets/js/pages/settings/category.js' );
    $this->template->add_js( 'pos-assets/js/pages/settings/company.js' );
    $this->template->add_js( 'pos-assets/js/pages/settings/damage.js' );
    $this->template->add_js( 'pos-assets/js/pages/settings/product.js' );
    $this->template->add_js( 'pos-assets/js/pages/settings/unit.js' );
    $this->template->add_js( 'pos-assets/js/pages/settings/user.js' );

    $this->template->render();
    
  }

  /**
   * Category
   */
  public function cateogry() {

    // Check server request if post
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      
      // Add category
      if ( $this->input->post( 'add_submit' ) ) {
    
        $subcat_nm = $this->input->post( 'sub_name' );

        // Save category / sub-category information
        $this->Model_Category->category_add( $this->input->post( 'cat_name' ) );
        foreach ( $subcat_nm as $key ) {
          $this->Model_Subcategory->subcat_add( $cat_data['category_name'], $key );
        }
      }
    }
  }

  /**
   * Server response
   */
  private function _response( $data = NULL ) {

    // Send server response
    header( 'content-type: application/json' );
    if ( $data ) {
      die( json_encode( $data ) );
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
  
  /**
   * Update temporary table
   */
  public function update_product() {
    if( $this->input->post( 'id' ) ) {

      $data = array( 
        'id'                    => $this->input->post( 'id' ),
        'order_id'              => $this->input->post( 'order_id' ),
        'item_id'               => $this->input->post( 'item_id' ),
        'orderdetails_quantity' => $this->input->post( 'quantity' ),
        'price_per_unit'        => $this->input->post( 'price' ) ,
        'inv_item_srp'          => $this->input->post( 'srp' ),
        'expiry_date'           => $this->input->post( 'expiry' ),
        'no_of_stocks'          => $this->input->post( 'stocks' ),
        'ordinv_unit_price'     => $this->input->post( 'unit_p' ),
      );

      if( $this->Model_Settings->product_update( $data ) ) {
        /**
         * Return json data
         */
        header( 'content-type: application/json' );
        exit( json_encode( array( 'msg' => 'success' ) ) );
      }
    }
  }
  
  public function dispdata()
	{
	$result['data']=$this->Model_View_Products->displayrecords();
	$this->load->view('update_prd_info',$result);
	}
  

  public function updatedata()
	{
	$id=$this->input->get('id');
	$result['data']=$this->Model_View_Products->displayrecordsById($id);
	$this->load->view('update_prd_info',$result);	
	
		if($this->input->post('save_edit_order'))
		{
		$item_id=$this->input->post('item_id');
		$item_name=$this->input->post('item_name');
    $item_desc=$this->input->post('item_description');
    $item_crit=$this->input->post('item_critlimit');
		$this->Model_View_Products->updaterecords($item_id,$item_name,$item_desc,$item_crit,$id);
		redirect("Settings/dispdata");
		}
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */
