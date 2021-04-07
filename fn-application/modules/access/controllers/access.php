<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Access extends MY_Controller 
{

	function __construct() {
		parent::__construct();
	}

	/**
	 * No access
	 */
	public function denied() {
    $this->template->set_master_template( 'layouts/layout_site' );
    $this->template->write( 'title', 'No Access' );
    $this->template->write_view( 'content', 'view_denied' );
    $this->template->render();
	}
}
