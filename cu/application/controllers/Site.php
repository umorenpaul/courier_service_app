<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		//$this->is_logged_in();
		error_reporting(E_ERROR | E_PARSE);
				$this->load->helper(array('form', 'url'));
			
		
			
				//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
			
	}
	function clear_cache() {
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
		}

   public function index()
     {

      $page_data['page_name']  = 'homepage';
      $page_data['page_title'] = 'MUSIC EXPLOSIVE';
      $this->load->view('index', $page_data);
	
	}
	
	public function about_us()
	{

	 $page_data['page_name']  = 'aboutUs';
	 $page_data['page_title'] = 'About Us';
	 $this->load->view('index', $page_data);
   
   }

   public function services()
	{

	 $page_data['page_name']  = 'service';
	 $page_data['page_title'] = 'Our Services';
	 $this->load->view('index', $page_data);
   
   }

   public function contact_us()
	{

	 $page_data['page_name']  = 'contactUs';
	 $page_data['page_title'] = 'Contact Us';
	 $this->load->view('index', $page_data);
   
   }
  
       public function portfolio()
	{

	 $page_data['page_name']  = 'portfolioPage';
	 $page_data['page_title'] = 'Our Portfolio';
	 $this->load->view('index', $page_data);
   
   }
       public function blog()
	{

	 $page_data['page_name']  = 'blogPage';
	 $page_data['page_title'] = 'News and Articles';
	 $this->load->view('index', $page_data);
   
   }

}
