<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH . '/libraries/Runaway.php');

class Example_test extends Runaway {
	
	public function __construct()
	{
		parent::__construct();
		$this->title = 'Basic Math';
	}
	
	private $a = 5;
	private $b = 5;
	
	public function test_adition()
	{	
		$this->assert_equals($this->a + $this->b, 10);
	}
	
	public function test_subtraction()
	{	
		$this->assert_equals($this->a - $this->b, 0);
	}
	
}