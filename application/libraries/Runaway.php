<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Runaway Class
 *
 * Unit Testing Suite
 *
 * @category	Unit Testing
 * @author		Diego Moreira
 * @link		https://github.com/Estilingue/ECodeigniter
 */
class Runaway extends CI_Controller {

	protected $title;
	protected $message;
	protected $CI;
	
	/**
	 * __construct
	 *
	 * The init method of this class
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->CI =& get_instance();
		$this->CI->load->library('bash_colors');
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * index
	 *
	 * Run Tests if is a CLI Request or call an error on HTTP access
	 *
	 */
	public function index()
	{
		if ($this->CI->input->is_cli_request())
			$this->_show_all();
		else
			show_error('Page not found', 404);
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * _show_all
	 *
	 * Show all calls to subclasses tests
	 *
	 */
	private function _show_all()
	{
		$this->_run_all();
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * _run_all
	 *
	 * Run each method found on _get_test_methods return
	 *
	 */
	private function _run_all()
	{
		echo $this->CI->bash_colors->getColoredString('######### Runaway Suite: Running Tests #########', 'purple', NULL) . PHP_EOL;
		
		if (isset($this->title))
			echo $this->CI->bash_colors->getColoredString('Model: ' . $this->title, 'white', NULL) . PHP_EOL . PHP_EOL;
		else
			echo $this->CI->bash_colors->getColoredString('Suite: '. get_class(), 'white', NULL) . PHP_EOL . PHP_EOL;
		
		foreach ($this->_get_test_methods() as $method)
		{
			$this->_run($method);
		}
		
		echo $this->CI->bash_colors->getColoredString('######### Ended Tests #########', 'purple', NULL) . PHP_EOL;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * _run
	 *
	 * The main function that runs at the method level
	 * printing the responses to the CLI output
	 *
	 */
	private function _run($method)
	{	
		// Reset test message
		$this->message = '';
		
		// Run cleanup set_up
		$this->set_up();
		
		// Run test case
		$this->$method();
		
		echo $this->CI->bash_colors->getColoredString('* '.$method .': ', 'yellow', NULL);
		echo $this->message . PHP_EOL . PHP_EOL;
		
		// Run cleanup set_clean()
		$this->set_clean();
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * _get_test_methods
	 *
	 * Method that filter any test method that inits
	 * with "test_" name
	 *
	 * @return array	An array of test methods
	 *
	 */
	private function _get_test_methods()
	{
		$methods = get_class_methods($this);
		$test_methods = array();
		
		foreach ($methods as $method)
		{
			if (substr(strtolower($method), 0, 5) == 'test_')
				$test_methods[] = $method;
		}
		
		return $test_methods;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * set_up
	 *
	 * Initiated custom setup
	 *
	 */
	public function set_up() { }
	
	/**
	 * set_clean()
	 *
	 * Initiated decouple of test variables
	 *
	 */
	public function set_clean() { }
	
	// --------------------------------------------------------------------
	
	/** 
	 *	-------------------------------------------------------------------
	 *	ASSERTION RULES
	 * --------------------------------------------------------------------
	 */
	 
	/**
	 * assert_true
	 *
	 * Checks if the assertion is true
	 *
	 * @param	multiple	An assertion to validate
	 *
	 * @return	bool		True on success | False on error
	 *
	 */
	public function assert_true($assertion)
	{
		if ($assertion)
		{
			$this->message = $this->CI->bash_colors->getColoredString('test passed', 'white', 'green');
			return TRUE;
		}
		else
		{
			$this->message = $this->CI->bash_colors->getColoredString('test not passed', 'white', 'red');
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * assert_false
	 *
	 * Checks if the assertion is false
	 *
	 * @param	multiple	An assertion to validate
	 *
	 * @return	bool		False on success | True on error
	 *
	 */
	public function assert_false($assertion)
	{
		if (!$assertion)
		{
			$this->message = $this->CI->bash_colors->getColoredString('test passed', 'white', 'green');
			return TRUE;
		}
		else
		{
			$this->message = $this->CI->bash_colors->getColoredString('test not passed', 'white', 'red');
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * assert_equals
	 *
	 * Checks if the value is equals the check variable
	 *
	 * @param	multiple	An assertion to validate
	 *
	 * @return	bool		False on success | True on error
	 *
	 */
	public function assert_equals($value, $check)
	{
		if ($value == $check)
		{
			$this->message = $this->CI->bash_colors->getColoredString('test passed', 'light_gray', 'green');
			return TRUE;
		}
		else
		{
			$this->message = $this->CI->bash_colors->getColoredString('test not passed', 'white', 'red');
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * assert_not_equals
	 *
	 * Checks if the value is not equals the check variable
	 *
	 * @param	multiple	An assertion to validate
	 *
	 * @return	bool		False on success | True on error
	 *
	 */
	public function assert_not_equals($value, $check)
	{
		if ($value != $check)
		{
			$this->message = $this->CI->bash_colors->getColoredString('test passed', 'green', null);
			return TRUE;
		}
		else
		{
			$this->message = $this->CI->bash_colors->getColoredString('test not passed', 'white', 'red');
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * assert_empty
	 *
	 * Checks if the value is not empty
	 *
	 * @param	multiple	An assertion to validate
	 *
	 * @return	bool		False on success | True on error
	 *
	 */
	public function assert_empty($assertion)
	{
		if (empty($assertion))
		{
			$this->message = $this->CI->bash_colors->getColoredString('test passed', 'green', null);
			return TRUE;
		}
		else
		{
			$this->message = $this->CI->bash_colors->getColoredString('test not passed', 'white', 'red');
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * assert_not_empty
	 *
	 * Checks if the value is not empty
	 *
	 * @param	multiple	An assertion to validate
	 *
	 * @return	bool		False on success | True on error
	 *
	 */
	public function assert_not_empty($assertion)
	{
		if (!empty($assertion))
		{
			$this->message = $this->CI->bash_colors->getColoredString('test passed', 'green', null);
			return TRUE;
		}
		else
		{
			$this->message = $this->CI->bash_colors->getColoredString('test not passed', 'white', 'red');
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
}

/* End of file Runaway.php */
/* Location: ./application/libraries/Runaway.php */