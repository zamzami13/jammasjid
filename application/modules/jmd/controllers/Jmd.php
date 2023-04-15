<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jmd extends CI_Controller
{

	private $fullurl 	= '';
	private $initurl 	= 'jam-masjid-digital';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$data 	= null;

		$data 	= null;
		$data['initurl'] 					= $this->initurl;
		$data['fullurl'] 					= $this->fullurl;
		$data['_page_title']    	= 'About';
		$data['_sub_page_title'] 	= _sub_page_title();
		$data['_title']         	= $data['_page_title'];
		$data['_breadcrumb']    	= [['About', $this->initurl]];

		$this->load->view('jmd', $data);
	}
}

/* End of file About.php */
/* Location: ./application/modules/about/controllers/About.php */