#Estilingue Codeigniter Template
* * *

This is a Codeigniter Application Template for start projects.

It's based on a custom *MY_Controller* that extends the default *CI_Controller* and load the initial core assets for application.

The *MY_Controller* loads the initial view *layout* and setup the main *html* template. Then in your extended controller you can call the **render** method to render the view for that endpoint:

```php
$content = $this->load->view('main/home', $data, TRUE);
$this->render('Main Page Title', $content);
```

Inside the *layout* view, the *MY_Controller* loads the defaults stylesheet and javascript assets, and you can pass custom assets pushing them on the protected arrays:

```php
$this->local_stylesheets[] = 'style.css';
$this->local_javascripts[] = 'app_scripts.js';
```

##Assets Helper

The **Assets Helper** uses a base configuration for setup localizated on ***application/config/config.php***:

```php
$config['assets_url'] = 'assets/';
```

The assets path setup is based on the following scheme:

- **assets/**
	- **css/**
		- app.css
		- boilerplate.css
	- **js/**
		- app.js
	- **images/**

Then we can use the 3 helper functions:

**img_asset:** that loads an image file from assets path
```php
img_asset('name_of_file');
```

**css_asset:** that loads an stylesheet file from assets path
```php
css_asset('name_of_file');
```

**js_asset:** that loads an javascript file from assets path
```php
js_asset('name_of_file');
```

##Runaway - Unit Testing Suite

The **Runaway** library is a unit testing framework to test business logic inside models.

**Usage:**

First of all, create a *tests/* directory inside your controllers folder.

```bash
user@machine:.../application/controllers$ mkdir tests
```

Then create your tests controllers inside always importing and extending the Runaway library:

```php
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
?>
```

After you create the tests for this controller you can call on command line:

```bash
user@machine:.../project$ php index.php tests/example_test
```

***response:***

```bash
######### Runaway Suite: Running Tests #########
Model: Basic Math

* test_adition: test passed

* test_subtraction: test passed

######### Ended Tests #########
```