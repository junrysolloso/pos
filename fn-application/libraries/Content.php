<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Page content
 */
class Content 
{

  var $CI;
  var $template;

  function __construct() {
    $this->CI =& get_instance();
    $this->template = $this->CI->template;
  }

  /**
   * Page content
   * @param array $config
   * @return string
   */
  public function view( $config = [], $output = FALSE ) {
    if ( is_array( $config ) && ! empty( $config ) ) {
      $this->template->set_master_template( 'layouts/layout_admin' );
      $this->template->write( 'title', $config['title'] ); 
      $this->template->write_view( 'content', 'templates/template_topbar', $config );
      $this->template->write_view( 'content', 'templates/template_left_side' );
      $this->template->write_view( 'content', $config['view'] );
      $this->template->write_view( 'content', 'templates/template_footer' );

      if ( key_exists( 'css', $config ) ) {
        if ( is_array( $config['css'] ) && count( $config['css'] ) > 0 ) {
          foreach ( $config['css'] as $value ) {
            $this->template->add_css( $value );
          }
        }
      }
  
      if ( key_exists( 'js', $config ) ) {
        if ( is_array( $config['js'] ) && count( $config['js'] ) > 0 ) {
          foreach ( $config['js'] as $value ) {
            $this->template->add_js( $value );
          }
        }
      }
  
      // View page contents
      $this->template->render( NULL, $output );
    }
  }

}
