<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adzan extends MX_Controller
{

	public function index()
	{
		$data['data'] = null;
		$this->template->countdown('countdown/adzan', $data);
	}

	public function getdata($waktu)
	{
		$data['is_jumat'] = false;

		$data['waktu_shalat'] 	= date("Y-m-d") . " " . substr(jadwal_shalat()[$waktu], 0, 5) . ":00";
		$data['shalat']			= ucfirst($waktu);

		$data['konten'] = [
			'1' => '“Jika kalian mendengar muadzin, maka ucapkanlah seperti apa yang diucapkannya. Kemudian bershalawatlah untukku. Karena siapa yang bershalawat kepadaku sekali, maka Allah akan bershalawat padanya (memberi ampunan) sebanyak sepuluh kali. Kemudian mintalah wasilah pada Allah untukku. Karena wasilah itu adalah tempat di surga yang hanya diperuntukkan bagi hamba Allah, aku berharap akulah yang mendapatkannya. Siapa yang meminta untukku wasilah seperti itu, dialah yang berhak mendapatkan syafa’atku.” (HR. Muslim no. 384).',
			'2' => 'Adzan ' . $data['shalat'] . ' akan segera tiba'
		];

		$data['waktu_sleep'] = null;
		if ($data['shalat'] == 'Dzuhur' and date('D') == 'Fri') {
			$data['shalat']		= 'Jumat';
			$data['is_jumat'] 	= true;

			$waktu = 'jumat';
			$jeda = set_perwaktu_shalat($waktu);
			$data['waktu_sleep'] = $jeda['perwaktushalat_jeda_layar_mati'];

			$data['konten'] = [
				'1' => '“Jika kalian mendengar muadzin, maka ucapkanlah seperti apa yang diucapkannya. Kemudian bershalawatlah untukku. Karena siapa yang bershalawat kepadaku sekali, maka Allah akan bershalawat padanya (memberi ampunan) sebanyak sepuluh kali. Kemudian mintalah wasilah pada Allah untukku. Karena wasilah itu adalah tempat di surga yang hanya diperuntukkan bagi hamba Allah, aku berharap akulah yang mendapatkannya. Siapa yang meminta untukku wasilah seperti itu, dialah yang berhak mendapatkan syafa’atku.” (HR. Muslim no. 384).',
				'2' => 'Adzan ' . $data['shalat'] . ' akan segera tiba'
			];
		}

		$this->template->countdown('countdown/adzan', $data);
	}
}

/* End of file Adzan.php */
/* Location: ./application/modules/adzan/controllers/Adzan.php */