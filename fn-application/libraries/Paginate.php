<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Pagination
 */
class Paginate 
{

  var $CI;
  var $pagination;
  var $uri;

  function __construct() {
    $this->CI =& get_instance();
    $this->pagination = $this->CI->pagination;
    $this->uri = $this->CI->uri;
  }

  /**
   * Create links
   * @param string $url url of the page
   * @param int    $limit limit of the data to show per page
   * @param int    $row current count of data
   * @return string 
   */
  public function links( $url, $limit, $rows ) {

    $config['per_page'] = $limit;
    $config['base_url'] = $url;
    $config['total_rows'] = $rows;

    $config['page_query_string'] = true;
    $config['query_string_segment'] = 'page';

    // Wrapper
    $config['full_tag_open'] = '<ul class="pagination mt-4">';
    $config['full_tag_close'] = '</ul>';

    // Previous
    $config['prev_link'] = 'Previous'; 
    $config['prev_tag_open'] = '<li class="paginate_button page-item previous">';
    $config['prev_tag_close'] = '</li>';

    // Next
    $config['next_link'] = 'Next'; 
    $config['next_tag_open'] = '<li class="paginate_button page-item next">';
    $config['next_tag_close'] = '</li>';

    // First
    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="paginate_button page-item">';
    $config['first_tag_close'] = '</li>';

    // Last
    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="paginate_button page-item">';
    $config['last_tag_close'] = '</li>';

    // Current
    $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#" class="page-link">';
    $config['cur_tag_close'] = '</a></li>';

    // Number
    $config['num_tag_open'] = '<li class="paginate_button page-item">';
    $config['num_tag_close'] = '</li>';

    // <a> attribute
    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize( $config );
    return $this->pagination->create_links();
  }

}