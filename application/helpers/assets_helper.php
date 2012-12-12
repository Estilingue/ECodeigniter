<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('img_asset'))
{
    function img_asset($address = '')
    {
        if ($address === '')
        	return '';
        else
        {
	        $CI =& get_instance();
	        
	        return base_url() . $CI->config->item('assets_url') . 'images/' . $address;
        }
    }   
}

if ( ! function_exists('css_asset'))
{
    function css_asset($address = '')
    {
        if ($address === '')
        	return NULL;
        else
        {
	        $CI =& get_instance();
	        
	        return base_url() . $CI->config->item('assets_url') . 'css/' . $address;
        }
    }   
}

if ( ! function_exists('js_asset'))
{
    function js_asset($address = '')
    {
        if ($address === '')
        	return NULL;
        else
        {
	        $CI =& get_instance();
	        
	        return base_url() . $CI->config->item('assets_url') . 'js/' . $address;
        }
    }   
}

/* End of file assets_helper.php */
/* Location: ./application/helpers/assets_helper.php */