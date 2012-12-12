<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY Controller
 *
 * @author	Diego Moreira
 *
 */
class MY_Controller extends CI_Controller {

	private $layout = 'layout';
		
	private $app_stylesheet = array(
		'app.css',
		'boilerplate.css'
	);
	
	private $app_javascript = array(
		'app.js'
	);
	
	
	// local stylesheets
	protected $local_stylesheets = array();
	protected $local_javascripts = array();
	
	/**
	 * render
	 *
	 * @access	protected
	 *
	 * @param	string	$page_title
	 * @param	mixed	$content
	 *
	 * @return	html	Loads the HTML from view
	 *
	 */
	protected function render($page_title, $content)
	{
		$view_data = array(
			'page_title' => $page_title,
			'stylesheets' => $this->get_stylesheets(),
			'javascripts' => $this->get_javascripts(),
			'content' => $content
		);
		
		$this->load->view($this->layout, $view_data);
	}
	
	private function get_stylesheets()
	{
		return array_merge($this->app_stylesheet, $this->local_stylesheets);
	}
	
	private function get_javascripts()
	{
		return array_merge($this->app_javascript, $this->local_javascripts);
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/My_Controller.php */