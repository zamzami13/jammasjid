<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tema extends MX_Controller
{

	private $fullurl 	= '';
	private $initurl 	= 'pengaturan/tema';
	private $prefix 	= 'tema';
	private $tbl 		= 'set_masjid';
	private $tblprefix 	= 'masjid_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$data 	= null;
		$where 	= null;

		$data 	= null;
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Pengaturan';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = '';
		$data['_breadcrumb']            = [['Tema', $this->initurl]];

		$data['tema'] = app_tema();

		$this->template->display($this->prefix, $data);
	}

	public function action_edit()
	{

		$data 		= null;
		$response	= null;
		$input 		= $this->input->get();

		$result = $this->m_crud->update($this->tbl, ['masjid_tema' => $input['thid']]);

		if ($result) {
			$res['status']     = 1;
			$res['message'] 	= 'success';
			set_reload_update();
		} else {
			$res['status'] 	= 0;
			$res['message'] 	= 'failed';
		}

		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Cache-Control: no-store, no-cache");
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
	}
}

/* End of file Indentitas.php */
/* Location: ./application/modules/identitas/controllers/Indentitas.php */
