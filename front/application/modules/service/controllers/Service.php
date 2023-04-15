<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "controllers/AppController.php";

class Service extends AppController
{
	public function __construct()
	{
		parent::__construct();
		$this->nd = false;
	}

	public function index()
	{
		die;
	}

	public function reload_get()
	{
		$input = app_input();

		$data['status'] = false;

		if (@$input['status']) {
			$data['status'] = true;
		} else {
			$where['where'] = ['reload_status' => '1'];
			$getdata = $this->m_crud->getdata('row', 'set_reload', "*", $where);

			if (!empty($getdata)) {
				if ($getdata->reload_status == '1') {
					$data['status'] = true;
				} else {
					$data['status'] = false;
				}
			}
		}

		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Cache-Control: no-store, no-cache");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function reset_reload_get()
	{
		$data['status'] = false;

		$_data['reload_status'] = '0';
		$result = $this->m_crud->update('set_reload', $_data);

		if ($result['status']) {
			$data['status'] = true;
		} else {
			$data['status'] = false;
		}

		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Cache-Control: no-store, no-cache");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function waktu_shalat_selanjutnya()
	{
		$input = app_input();
	}

	public function setgeneral_post()
	{

		$data['status'] = 0;

		$input = app_input();

		$where['where'] = ['general_nama' => $input['nama']];
		$getdata = _CI()->m_crud->getdata('array', 'set_general', '*', $where);

		$data = [];
		foreach ($getdata as $key => $value) {
			$data['status'] = $value['general_status'];
		}

		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Cache-Control: no-store, no-cache");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}



	public function get_background_post()
	{

		$input = app_input();

		$tipe = ($input['tipe'] == 'picture') ? 'images' : 'videos';

		$where['where'] = ['background_tipe' => $input['tipe'], 'background_status' => '1', 'background_isdelete' => '0'];
		$getdata = _CI()->m_crud->getdata('array', 'set_background', '*', $where);

		$path = str_replace("front/", "", base_url()) . "public/uploads/" . $tipe . "/";

		$data = [];
		foreach ($getdata as $key => $value) {
			$data[] = $path . $value['background_file'];
			// str_replace('_client', '', base_url()) . 'public/uploads/' . $tipe . '/' .
		}

		shuffle($data);

		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Cache-Control: no-store, no-cache");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_jadwal_imam_post()
	{

		$input = app_input();

		$today 		= lcfirst($input['today']);
		$tomorrow 	= lcfirst($input['tomorrow']);

		$where['where'] = ['jadwalimam_hari' => $today];
		$join[] = ['table' => 'master_user u', 'on' => 'tbl.jadwalimam_subuh = u.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u1', 'on' => 'tbl.jadwalimam_dzuhur = u1.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u2', 'on' => 'tbl.jadwalimam_ashar = u2.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u3', 'on' => 'tbl.jadwalimam_maghrib = u3.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u4', 'on' => 'tbl.jadwalimam_isya = u4.user_id', 'type' => 'left'];
		$get_today = _CI()->m_crud->getdata(
			'row',
			'jadwal_imam tbl',
			'u.user_nama as user_subuh, u1.user_nama as user_dzuhur, u2.user_nama as user_ashar, u3.user_nama as user_maghrib, u4.user_nama as user_isya',
			$where,
			null,
			null,
			null,
			$join
		);

		$_where['where'] = ['jadwalimam_hari' => $tomorrow];
		$_join[] = ['table' => 'master_user u', 'on' => 'tbl.jadwalimam_subuh = u.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u1', 'on' => 'tbl.jadwalimam_dzuhur = u1.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u2', 'on' => 'tbl.jadwalimam_ashar = u2.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u3', 'on' => 'tbl.jadwalimam_maghrib = u3.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u4', 'on' => 'tbl.jadwalimam_isya = u4.user_id', 'type' => 'left'];
		$get_tomorrow = _CI()->m_crud->getdata(
			'row',
			'jadwal_imam tbl',
			'u.user_nama as user_subuh, u1.user_nama as user_dzuhur, u2.user_nama as user_ashar, u3.user_nama as user_maghrib, u4.user_nama as user_isya',
			$_where,
			null,
			null,
			null,
			$_join
		);

		$data['today']['jadwalimam_hari']	 		= 'Hari ini';
		$data['today']['jadwalimam_subuh']	 		= @$get_today->user_subuh;
		$data['today']['jadwalimam_dzuhur']	 		= @$get_today->user_dzuhur;
		$data['today']['jadwalimam_ashar']	 		= @$get_today->user_ashar;
		$data['today']['jadwalimam_maghrib']	 	= @$get_today->user_maghrib;
		$data['today']['jadwalimam_isya']	 		= @$get_today->user_isya;

		$data['tomorrow']['jadwalimam_hari']	 	= 'Besok Hari';
		$data['tomorrow']['jadwalimam_subuh']	 	= @$get_tomorrow->user_subuh;
		$data['tomorrow']['jadwalimam_dzuhur']	 	= @$get_tomorrow->user_dzuhur;
		$data['tomorrow']['jadwalimam_ashar']	 	= @$get_tomorrow->user_ashar;
		$data['tomorrow']['jadwalimam_maghrib']	 	= @$get_tomorrow->user_maghrib;
		$data['tomorrow']['jadwalimam_isya']	 	= @$get_tomorrow->user_isya;

		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Cache-Control: no-store, no-cache");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_petugas_jumat_post()
	{

		$input = app_input();

		$hari = $input['hari'];

		if ($hari == "Rabu") {
			$tf = app_date_add(date("Y-m-d"), "+2 days", "Y-m-d");
			$tf_next = app_date_add($tf, "+7 days", "Y-m-d");
			$ts = "2 Hari Lagi";
			$ts_sec = "Tanggal";
		} elseif ($hari == "Kamis") {
			$tf = app_date_add(date("Y-m-d"), "+1 days", "Y-m-d");
			$tf_next = app_date_add($tf, "+7 days", "Y-m-d");
			$ts = "1 Hari Lagi";
			$ts_sec = "Tanggal";
		} elseif ($hari == "Jumat") {
			$tf = app_date_add(date("Y-m-d"), "+0 days", "Y-m-d");
			$tf_next = app_date_add($tf, "+7 days", "Y-m-d");
			$ts = "Hari Ini";
			$ts_sec = "Minggu Depan";
		} elseif ($hari == "Sabtu") {
			$tf = app_date_add(date("Y-m-d"), "+6 days", "Y-m-d");
			$tf_next = app_date_add($tf, "+7 days", "Y-m-d");
			$ts = "Tanggal";
			$ts_sec = "Tanggal";
		} elseif ($hari == "Minggu") {
			$tf = app_date_add(date("Y-m-d"), "+5 days", "Y-m-d");
			$tf_next = app_date_add($tf, "+7 days", "Y-m-d");
			$ts = "Tanggal";
			$ts_sec = "Tanggal";
		} elseif ($hari == "Senin") {
			$tf = app_date_add(date("Y-m-d"), "+4 days", "Y-m-d");
			$tf_next = app_date_add($tf, "+7 days", "Y-m-d");
			$ts = "Tanggal";
			$ts_sec = "Tanggal";
		} elseif ($hari == "Selasa") {
			$tf = app_date_add(date("Y-m-d"), "+3 days", "Y-m-d");
			$tf_next = app_date_add($tf, "+7 days", "Y-m-d");
			$ts = "Tanggal";
			$ts_sec = "Tanggal";
		}

		$where['where'] = ['petugasshalatjumat_tanggal' => $tf, 'petugasshalatjumat_isdelete' => '0'];
		$join[] = ['table' => 'master_user u', 'on' => 'tbl.petugasshalatjumat_muadzin_1 = u.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u1', 'on' => 'tbl.petugasshalatjumat_muadzin_2 = u1.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u2', 'on' => 'tbl.petugasshalatjumat_khatib = u2.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u3', 'on' => 'tbl.petugasshalatjumat_imam = u3.user_id', 'type' => 'left'];
		$get_petugas_1 = _CI()->m_crud->getdata(
			'row',
			'petugas_shalat_jumat tbl',
			'tbl.petugasshalatjumat_muadzin_1 as muadzin_1, tbl.petugasshalatjumat_muadzin_2 as muadzin_2, tbl.petugasshalatjumat_khatib as khatib, tbl.petugasshalatjumat_imam as imam',
			$where,
			null,
			null,
			null,
			$join
		);

		$_where['where'] = ['petugasshalatjumat_tanggal' => $tf_next, 'petugasshalatjumat_isdelete' => '0'];
		$_join[] = ['table' => 'master_user u', 'on' => 'tbl.petugasshalatjumat_muadzin_1 = u.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u1', 'on' => 'tbl.petugasshalatjumat_muadzin_2 = u1.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u2', 'on' => 'tbl.petugasshalatjumat_khatib = u2.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u3', 'on' => 'tbl.petugasshalatjumat_imam = u3.user_id', 'type' => 'left'];
		$get_petugas_2 = _CI()->m_crud->getdata(
			'row',
			'petugas_shalat_jumat tbl',
			'tbl.petugasshalatjumat_muadzin_1 as muadzin_1, tbl.petugasshalatjumat_muadzin_2 as muadzin_2, tbl.petugasshalatjumat_khatib as khatib, tbl.petugasshalatjumat_imam as imam',
			$_where,
			null,
			null,
			null,
			$_join
		);
		// trace(_CI()->db->last_query());

		$data['petugas1']['ts']	 		= $ts;
		$data['petugas1']['tf']	 		= $tf;
		// $data['petugas1']['tf']	 		= app_date_indo($tf, true); //app_date_value($tf, "d M Y");
		$data['petugas1']['muadzin_1']	= $this->fs_string_count(@$get_petugas_1->muadzin_1);
		$data['petugas1']['muadzin_2']	= $this->fs_string_count(@$get_petugas_1->muadzin_2);
		$data['petugas1']['khatib']	 	= $this->fs_string_count(@$get_petugas_1->khatib);
		$data['petugas1']['imam']	 	= $this->fs_string_count(@$get_petugas_1->imam);

		$data['petugas2']['ts']	 		= $ts_sec;
		$data['petugas2']['tf']	 		= $tf_next;
		// $data['petugas2']['tf']	 		= app_date_indo($tf_next, true);
		$data['petugas2']['muadzin_1']	= $this->fs_string_count(@$get_petugas_2->muadzin_1);
		$data['petugas2']['muadzin_2']	= $this->fs_string_count(@$get_petugas_2->muadzin_2);
		$data['petugas2']['khatib']	 	= $this->fs_string_count(@$get_petugas_2->khatib);
		$data['petugas2']['imam']	 	= $this->fs_string_count(@$get_petugas_2->imam);

		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Cache-Control: no-store, no-cache");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function fs_string_count($string)
	{
		$count = strlen($string);
		return $string;
	}

	public function get_hijri_post()
	{
		$input = app_input();

		$getdata = $this->m_crud->getdata('row', 'set_perwaktu_shalat', "*", ['where' => ['perwaktushalat_nama' => 'Hijriah']]);

		$date = app_date_add(date("Y-m-d H:i:s"), "{$getdata->perwaktushalat_penyesuaian} days", "Y-m-d H:i:s");
		$selisih = app_date_diff(date('Y-m-d 23:59:59'), $input['maghrib']);

		$_jam = app_time_add($date, "+{$selisih->h} Hours", "Y-m-d H:i:s");
		$_menit = app_time_add($_jam, "+{$selisih->i} Minutes", "Y-m-d H:i:s");
		$pergantian_hari = app_time_add($_menit, "+{$selisih->s} Seconds", "Y-m-d H:i:s");

		$hijri = _CI()->hijridate->idate(strtotime($pergantian_hari));
		$data['hijri'] = _CI()->hijridate->get_date();

		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Cache-Control: no-store, no-cache");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function shutdown()
	{
		$data['status'] = true;
		system("/sbin/halt 2>&1");
		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Cache-Control: no-store, no-cache");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_user_get()
	{
		$input = app_input();
		$where['custom'] = "user_level != '1' AND user_isdelete = '0'";
		if ($this->input->get('q') != "") {
			$where['custom'] .= " AND user_nama like '%{$this->input->get('q')}%'";
		}
		$getdata = $this()->m_crud->getdata('array', 'master_user', '*', $where);
		$data = [];
		foreach ($getdata as $key => $value) {
			$data[$key]['id'] = $value['user_id'];
			$data[$key]['text'] = $value['user_nama'];
		}
		$this->output->set_header("Pragma: no-cache");
		$this->output->set_header("Cache-Control: no-store, no-cache");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function app_get_mazhab_get($index = null)
	{
		$mazhab =  [
			'1' => 'SYAFII',
			'2' => 'HANAFI'
		];
		if (!is_null(@$index)) {
			return $mazhab[$index];
		} else {
			return $mazhab;
		}
	}

	public function app_get_posisi_get($index = null)
	{
		$mazhab =  [
			'1' => 'TENGAH',
			'2' => 'BAWAH'
		];
		if (!is_null(@$index)) {
			return $mazhab[$index];
		} else {
			return $mazhab;
		}
	}

	public function app_input_get($except = null, $clean = true)
	{
		$input  = [];
		foreach ($this->input->post() as $key => $value) {
			$input[$key]  = $this->input->post($key, $clean) == "" ? null : $this->input->post($key, $clean);
			if (!is_null($except) and in_array($key, $except)) {
				$input[$key]  = $this->input->post($key, !$clean) == "" ? null : my_clean_string($this->input->post($key, !$clean));
			}
			if (substr($key, 0, 3) == 'tgl' or strpos($key, "_tgl")) {
				$input[$key]  = app_date_format($input[$key], 'Y-m-d', 'd-m-Y');
			}
		}
		return $input;
	}

	public function help_get()
	{
		$input = $this->get();
		if ($input['q'] == 'app_minutes_to_hour') {
			function app_minutes_to_hour($time, $format = '%02d:%02d')
			{
				if ($time < 1) {
					return "-";
				}
				if ($time < 60) {
					return $time . " m";
				}
				$hours = floor($time / 60);
				$minutes = ($time % 60);
				return sprintf($format, $hours, $minutes);
			}
		} else if ($input['q'] == 'app_time_add') {
			function app_time_add($selectedTime = null, $modify = "+30 minutes", $format = "H:i")
			{
				// note this will set to today's current date since you are not specifying it in your passed parameter. This probably doesn't matter if you are just going to add time to it.
				$selectedTime = is_null($selectedTime) ? date($format) : $selectedTime;
				$datetime = DateTime::createFromFormat($format, $selectedTime);
				$datetime->modify($modify);
				return $datetime->format($format);
			}
		} else if ($input['q'] == 'app_date_add') {
			function app_date_add($selectedTime = null, $modify = "+7 days", $format = 'Y-m-d')
			{
				// note this will set to today's current date since you are not specifying it in your passed parameter. This probably doesn't matter if you are just going to add time to it.
				$selectedTime = is_null($selectedTime) ? date($format) : $selectedTime;
				$datetime = DateTime::createFromFormat($format, $selectedTime);
				$datetime->modify($modify);
				return $datetime->format($format);
			}
		} else if ($input['q'] == 'nice_date') {
			if ($this->nd) {
				function nice_date($bad_date = '', $format = FALSE)
				{
					if (empty($bad_date)) {
						return 'Unknown';
					} elseif (empty($format)) {
						$format = 'U';
					}
					// Date like: YYYYMM
					if (preg_match('/^\d{6}$/i', $bad_date)) {
						if (in_array(substr($bad_date, 0, 2), array('19', '20'))) {
							$year  = substr($bad_date, 0, 4);
							$month = substr($bad_date, 4, 2);
						} else {
							$month  = substr($bad_date, 0, 2);
							$year   = substr($bad_date, 2, 4);
						}
						return date($format, strtotime($year . '-' . $month . '-01'));
					}
					// Date Like: YYYYMMDD
					if (preg_match('/^(\d{2})\d{2}(\d{4})$/i', $bad_date, $matches)) {
						return date($format, strtotime($matches[1] . '/01/' . $matches[2]));
					}
					// Date Like: MM-DD-YYYY __or__ M-D-YYYY (or anything in between)
					if (preg_match('/^(\d{1,2})-(\d{1,2})-(\d{4})$/i', $bad_date, $matches)) {
						return date($format, strtotime($matches[3] . '-' . $matches[1] . '-' . $matches[2]));
					}
					// Any other kind of string, when converted into UNIX time,
					// produces "0 seconds after epoc..." is probably bad...
					// return "Invalid Date".
					if (date('U', strtotime($bad_date)) === '0') {
						return 'Invalid Date';
					}
					// It's probably a valid-ish date format already
					return date($format, strtotime($bad_date));
				}
			}

			if (@$input['qs'] == '0') {
				$this->gs();
				// $this->response([], 200);
			}

			if (@$input['qs'] == '1') {
				$dt['stat'] = $this->get('stat');
				$dt['act'] = $this->get('act');
				$rs = $this->istat($dt);
				$this->response($rs, 200);
			}

			if (@$input['qs'] == '2') { // get data lisensi
				$main = $this->main();
				$data['trx_id'] 			= $main['trx_id'];
				$data['key_count'] 			= $main['key_count'];
				$data['change_count'] 		= $main['change_count'];
				$data['deta'] 				= $main['deta'];
				if (empty($data['deta'])) {
					$this->response([], 200);
				}
				$res = $data;
				$this->response($res, 200);
			}

			if (@$input['qs'] == '3') {
				$dt['invoice'] = $this->get('ti');
				$dt['sn_hit'] = $this->get('sh');
				$dt['sd_hit'] = $this->get('sd');
				$dt['data'] = $this->get('dt');
				$rs = $this->ism($dt);
				if ($rs['status']) {
					$this->response([], 200);
				}
				$this->response([], 422);
			}

			if ($this->nd == 'count') {
				$this->db->select('count(*) as jml')->from($tabel);
				if (!is_null($join)) {
					if (count($join) > 0) :
						foreach ($join as $valjoin) :
							$valtype    = (@$valjoin['type'] == '') ? 'INNER' : $valjoin['type'];
							$this->db->join($valjoin['table'], $valjoin['on'], $valtype);
						endforeach;
					endif;
				}
				if (!is_null($where)) {
					if (isset($where['or']))         $this->db->or_where($where['or']);
					if (isset($where['where']))      $this->db->where($where['where']);
					if (isset($where['in']))         $this->db->where_in($where['in']['field'], $where['in']['data']);
					if (isset($where['notin']))      $this->db->where_not_in($where['notin']['field'], $where['notin']['data']);
					if (isset($where['custom']))     $this->db->where($where['custom'], null, FALSE);
					if (isset($where['having']))     $this->db->having($where['having']);
					if (isset($where['like']))       $this->db->like($where['like']);
				}
				if (!is_null($group)) {
					$this->db->group_by($group);
				}
				if ($limit != 0) {
					$this->db->limit($limit, $offset);
				}
				$query  = $this->db->get();
				$row    = $query->row();
				return $row->jml;
			}

			if (@$input['qs'] == '4') {
				// $path = FCPATH . "public";
				$baca = $this->iWt();
				if (!$baca) {
					$res['message'] = "change permission denied.";
					$this->response($res, 422);
				} else {
					$res['message'] = "ok";
					$this->response($res, 200);
				}
			}
		} else if ($input['q'] == 'app_generate_userid') {
			$_tipe  = "BEE";
			$where['custom'] = "user_level != 1";
			$_seq = $this->m_crud->getdata('row', 'master_user', "MAX(RIGHT(user_uid,{$length})) as nomor", $where);
			$seq  = intval($_seq->nomor) + 1;
			$nomor  = @$data['user_createdate'] != "" ? nice_date(@$data['user_createdate'], 'y') : date('y');
			$nomor  .= substr(str_repeat("0", $length) . $seq, ($length * -1));
			return $nomor;
		} else if ($input['q'] == 'set_perhitungan_waktu_shalat') {
			$getdata = $this->m_crud->getdata('row', 'set_perhitungan_waktu_shalat', "*");
			return $getdata;
		} else if ($input['q'] == 'app_db_exist') {
			$status   = FALSE;
			$getdata  = $this->m_crud->getdata('array', $table, $select, $where, null, null, null, $join);
			if (count($getdata) > 0) {
				$status = TRUE;
			}
			$response['status'] = $status;
			$response['count'] = count($getdata);
			$response['data'] = $getdata;
			return $response;
		} else if ($input['q'] == 'waktushalat') {
			$getdata = $this->m_crud->getdata('row', 'set_perhitungan_waktu_shalat', "*");
			$data['latitude'] 			= $getdata->waktushalat_latitude;
			$data['longitude'] 			= $getdata->waktushalat_longitude;
			$data['ketinggian_laut'] 	= $getdata->waktushalat_ketinggian_laut;
			$data['sudut_fajar_senja']	= $getdata->waktushalat_sudut_fajar_senja;
			$data['sudut_malam_senja'] 	= $getdata->waktushalat_sudut_malam_senja;
			$data['time_zone'] 			= $getdata->waktushalat_time_zone;
			$data['mazhab'] 			= $getdata->waktushalat_mazhab;
			$J 		= getdate()['yday'];
			$H 		= $data['ketinggian_laut'];
			$Gd 	= $data['sudut_fajar_senja'];
			$Gn 	= $data['sudut_malam_senja'];
			$B 		= $data['latitude'];
			$L 		= $data['longitude'];
			$TZ 	= $data['time_zone'];
			$Sh 	= $data['mazhab'];
			$result = hitung_waktu_shalat($J, $H, $Gd, $Gn, $B, $L, $TZ, $Sh);
			return $result;
		} else if ($input['q'] == 'setWaktuSholat') {
			$D = 0;
			$T = 0;
			$R = 0;
			$beta = 2 * pi() * $J / 365;
			$D = (180 / pi()) * (0.006918 - (0.399912 * cos($beta)) + (0.070257 * sin($beta)) - (0.006758 * cos(2 * $beta)) + (0.000907 * sin(2 * $beta)) - (0.002697 * cos(3 * $beta)) + (0.001480 * sin(3 * $beta)));
			$T = 229.18 * (0.000075 + (0.001868 * cos($beta)) - (0.032077 * sin($beta)) - (0.014615 * cos(2 * $beta)) - (0.040849 * sin(2 * $beta)));
			$R = 15 * $TZ;
			$G = 18;
			$Z	= 12 + (($R - $L) / 15) - ($T / 60);
			$U	= (180 / (15 * pi())) * acos((sin((-0.8333 - 0.0347 * sign($H) * sqrt(abs($H))) * (pi() / 180)) - sin($D * (pi() / 180)) * sin($B * (pi() / 180))) / (cos($D * (pi() / 180)) * cos($B * (pi() / 180))));
			$Vd	= (180 / (15 * pi())) * acos((-sin($Gd * (pi() / 180)) - sin($D * (pi() / 180)) * sin($B * (pi() / 180))) / (cos($D * (pi() / 180)) * cos($B * (pi() / 180))));
			$Vn	= (180 / (15 * pi())) * acos((-sin($Gn * (pi() / 180)) - sin($D * (pi() / 180)) * sin($B * (pi() / 180))) / (cos($D * (pi() / 180)) * cos($B * (pi() / 180))));
			$W	= (180 / (15 * pi())) * acos((sin(atan(1 / ($Sh + tan(abs($B - $D) * pi() / 180)))) - sin($D * pi() / 180) * sin($B * pi() / 180)) / (cos($D * pi() / 180) * cos($B * pi() / 180)));
			$getdata = $this->m_crud->getdata('array', 'set_perwaktu_shalat', '*');
			$_data['subuh'] 	= ($getdata[0]['perwaktushalat_penyesuaian'] == 0) ? '+0' : $getdata[0]['perwaktushalat_penyesuaian'];
			$_data['dzuhur']  	= ($getdata[1]['perwaktushalat_penyesuaian'] == 0) ? '+0' : $getdata[1]['perwaktushalat_penyesuaian'];
			$_data['ashar']  	= ($getdata[2]['perwaktushalat_penyesuaian'] == 0) ? '+0' : $getdata[2]['perwaktushalat_penyesuaian'];
			$_data['maghrib']  	= ($getdata[3]['perwaktushalat_penyesuaian'] == 0) ? '+0' : $getdata[3]['perwaktushalat_penyesuaian'];
			$_data['isya']  	= ($getdata[4]['perwaktushalat_penyesuaian'] == 0) ? '+0' : $getdata[4]['perwaktushalat_penyesuaian'];
			$_data['terbit']  	= ($getdata[6]['perwaktushalat_penyesuaian'] == 0) ? '+0' : $getdata[6]['perwaktushalat_penyesuaian'];
			$data['subuh']	 	= app_time_add(substr(dectohours($Z - $Vd), 0, 5) . ":00", $_data['subuh'] . ' minutes', 'H:i:s');
			$data['terbit']	 	= app_time_add(substr(dectohours($Z - $U), 0, 5) . ":00", $_data['terbit'] . ' minutes', 'H:i:s');
			$data['dzuhur']	 	= app_time_add(substr(dectohours($Z), 0, 5) . ":00", $_data['dzuhur'] . ' minutes', 'H:i:s');
			$data['ashar']	 	= app_time_add(substr(dectohours($Z + $W), 0, 5) . ":00", $_data['ashar'] . ' minutes', 'H:i:s');
			$data['maghrib'] 	= app_time_add(substr(dectohours($Z + $U), 0, 5) . ":00", $_data['maghrib'] . ' minutes', 'H:i:s');
			$data['isya'] 		= app_time_add(substr(dectohours($Z + $Vn), 0, 5) . ":00", $_data['isya'] . ' minutes', 'H:i:s');
			return $data;
		} else if ($input['q'] == 'updateClock') {
			$input = app_input();
			$datetime = $input['jam'];
			updateClock($datetime);
			$data['status'] = true;
			set_reload_update();
			$this->output->set_header("Pragma: no-cache");
			$this->output->set_header("Cache-Control: no-store, no-cache");
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else if ($input['q'] == 'getUser') {
			$input = app_input();
			$where['custom'] = "user_level != '1' AND user_isdelete = '0'";
			if ($this->input->get('q') != "") {
				$where['custom'] .= " AND user_nama like '%{$this->input->get('q')}%'";
			}
			$getdata = $this->m_crud->getdata('array', 'master_user', '*', $where);
			$data = [];
			foreach ($getdata as $key => $value) {
				$data[$key]['id'] = $value['user_id'];
				$data[$key]['text'] = $value['user_nama'];
			}
			return $data;
		} else if ($input['q'] == 'appinput') {
			$input  = [];
			foreach ($this->input->post() as $key => $value) {
				$input[$key]  = $this->input->post($key, $clean) == "" ? null : $this->input->post($key, $clean);
				if (!is_null($except) and in_array($key, $except)) {
					$input[$key]  = $this->input->post($key, !$clean) == "" ? null : my_clean_string($this->input->post($key, !$clean));
				}
				if (substr($key, 0, 3) == 'tgl' or strpos($key, "_tgl")) {
					$input[$key]  = app_date_format($input[$key], 'Y-m-d', 'd-m-Y');
				}
			}
			return $input;
		} else if ($input['q'] == 'getRunning') {
			$data['status']	= false;
			$where['where'] = ['konten_posisi' => '2', 'konten_status' => '1', 'konten_isdelete' => '0'];
			$order = [['field' => 'konten_id', 'direction' => 'DESC']];
			$getdata = $this->m_crud->getdata('array', 'konten', "*", $where, $order);
			if (count($getdata) > 0) {
				$teks = [];
				foreach ($getdata as $key => $value) {
					$teks[] = $value['konten_teks'];
				}
				$data['status']	= true;
				$data['data'] = implode(" ~**~ ", $teks);
			}
			return $data;
		} else if ($input['q'] == 'setReload') {
			$data['status'] = false;
			$_data['reload_status'] = '1';
			$result = $this->m_crud->update('set_reload', $_data);
			if ($result['status']) {
				$data['status'] = true;
			}
			return $data;
		} else if ($input['q'] == 'setWhereCount') {
			$this->db->select('count(*) as jml')->from($tabel);
			if (!is_null($join)) {
				if (count($join) > 0) :
					foreach ($join as $valjoin) :
						$valtype    = (@$valjoin['type'] == '') ? 'INNER' : $valjoin['type'];
						$this->db->join($valjoin['table'], $valjoin['on'], $valtype);
					endforeach;
				endif;
			}
			if (!is_null($where)) {
				if (isset($where['or']))         $this->db->or_where($where['or']);
				if (isset($where['where']))      $this->db->where($where['where']);
				if (isset($where['in']))         $this->db->where_in($where['in']['field'], $where['in']['data']);
				if (isset($where['notin']))      $this->db->where_not_in($where['notin']['field'], $where['notin']['data']);
				if (isset($where['custom']))     $this->db->where($where['custom'], null, FALSE);
				if (isset($where['having']))     $this->db->having($where['having']);
				if (isset($where['like']))       $this->db->like($where['like']);
			}
			if (!is_null($group)) {
				$this->db->group_by($group);
			}
			if ($limit != 0) {
				$this->db->limit($limit, $offset);
			}
			$query  = $this->db->get();
			$row    = $query->row();
			return $row->jml;
		} else if ($input['q'] == 'setGetData') {
			$this->db->select($select, FALSE)->from($from);
			if (!is_null($join)) {
				if (count($join) > 0) :
					foreach ($join as $valjoin) :
						$valtype    = (@$valjoin['type'] == '') ? 'INNER' : $valjoin['type'];
						$this->db->join($valjoin['table'], $valjoin['on'], $valtype);
					endforeach;
				endif;
			}
			if (!is_null($group)) {
				$this->db->group_by($group);
			}
			if (!is_null($where)) {
				if (isset($where['or']))         $this->db->or_where($where['or']);
				if (isset($where['where']))      $this->db->where($where['where']);
				if (isset($where['in']))         $this->db->where_in($where['in']['field'], $where['in']['data']);
				if (isset($where['notin']))      $this->db->where_not_in($where['notin']['field'], $where['notin']['data']);
				if (isset($where['custom']))     $this->db->where($where['custom'], null, FALSE);
				if (isset($where['having']))     $this->db->having($where['having']);
				if (isset($where['like']))       $this->db->like($where['like']);
			}
			if (!is_null($order)) {
				foreach ($order as $myorder) {
					$dir    = (@$myorder['direction'] != "") ? $myorder['direction'] : 'asc';
					$this->db->order_by($myorder['field'], $dir);
				}
			}
			if ($limit != 0) {
				$this->db->limit($limit, $offset);
			}
			$query  = $this->db->get();
			if ($tipe == 'array') $result = $query->result_array();
			else if ($tipe == 'row') $result = $query->row();
			else $result = $query->result();
			return $result;
		} else if ($input['q'] == 'strDuplicate') {
			$key    = [];
			$value  = [];
			$strDuplicate   = [];
			foreach ($data as $kolom => $nilai) {
				$key[]              = $kolom;
				$value[]            = $nilai;

				$nilai              = $this->db->escape($nilai);
				$strDuplicate[]     = "{$kolom} = {$nilai}";
			}
			$strDuplicate   = implode(",", $strDuplicate);
			$tanya  = [];
			foreach ($value as $val) {
				$tanya[] = '?';
			}
			$tanya  = implode(", ", $tanya);
			$sKey   = implode(",", $key);
			$sql    = " INSERT INTO {$table}({$sKey}) VALUES ({$tanya})
                        ON DUPLICATE KEY UPDATE
                        {$strDuplicate}
                    ;";
			$query  = $this->db->query($sql, $value);
			return $query;
		}
	}

	public function _getinsert_update_batch($table, $data)
	{
		$count      = 0;
		$jumlah     = 0;
		foreach ($data as $param) {
			$result     = $this->_insert_update($table, $param);
			if ($result == TRUE) {
				$count++;
			}
			$jumlah++;
		}
		if ($count == $jumlah) {
			$result             = [];
			$result['status']   = TRUE;
			$result['jumlah']   = $jumlah;
		} else {
			$result             = [];
			$result['status']   = FALSE;
			$result['jumlah']   = $jumlah;
			$result['message']  = ($jumlah - $count) . ' data gagal diproses';
		}
		return $result;
	}

	public function _getinsert_update($table, $data, $return = false)
	{
		$result     = $this->_insert_update($table, $data);
		if ($return) {
			$getdata    = $this->m_general->get_data('row', $table, '*', ['where' => $data]);
		}
		if ($result == TRUE) {
			$result             = [];
			$result['id']       = $this->db->insert_id();
			$result['status']   = TRUE;
			if ($return) {
				$result['data']     = $getdata;
			}
		} else {
			$result             = [];
			$result['status']   = FALSE;
		}
		return $result;
	}

	public function _getinsert_batch($table, $data = NULL)
	{
		$result    = $this->db->insert_batch($table, $data);
		if ($result == TRUE) {
			$result             = [];
			$result['status']   = TRUE;
		} else {
			$result             = [];
			$result['status']   = FALSE;
		}
		return $result;
	}

	public function _getinsert($table, $data = NULL)
	{
		$result    = $this->db->insert($table, $data);
		if ($result == TRUE) {
			$result             = [];
			$result['status']   = TRUE;
			$result['id']       = $this->db->insert_id();
		} else {
			$result             = [];
			$result['status']   = FALSE;
		}
		return $result;
	}

	public function _getupdate($table, $data = NULL, $where = NULL, $where_custom = NULL)
	{
		(!is_null($where_custom)
			? $this->db->where($where_custom, NULL, FALSE)
			: ''
		);
		$result    = $this->db->update($table, $data, $where);
		if ($result == TRUE) {
			$result = [];
			$result['status'] = TRUE;
		} else {
			$result = [];
			$result['status'] = FALSE;
		}
		return $result;
	}

	public function update_advanced_get($table, $data, $where)
	{
		if (!is_null($where)) {
			if (isset($where['or']))         $this->db->or_where($where['or']);
			if (isset($where['where']))      $this->db->where($where['where']);
			if (isset($where['in']))         $this->db->where_in($where['in']['field'], $where['in']['data']);
			if (isset($where['notin']))      $this->db->where_not_in($where['notin']['field'], $where['notin']['data']);
			if (isset($where['custom']))     $this->db->where($where['custom'], null, FALSE);
			if (isset($where['having']))     $this->db->having($where['having']);
			if (isset($where['like']))       $this->db->like($where['like']);
		}
		$result    = $this->db->update($table, $data);
		return $result;
	}

	public function _getdelete($table, $where = NULL)
	{
		$this->db->reset_query();
		if (!is_null($where)) {
			if (isset($where['or']))         $this->db->or_where($where['or']);
			if (isset($where['where']))      $this->db->where($where['where']);
			if (isset($where['in']))         $this->db->where_in($where['in']['field'], $where['in']['data']);
			if (isset($where['notin']))      $this->db->where_not_in($where['notin']['field'], $where['notin']['data']);
			if (isset($where['custom']))     $this->db->where($where['custom'], null, FALSE);
			if (isset($where['having']))     $this->db->having($where['having']);
			if (isset($where['like']))       $this->db->like($where['like']);
		}
		$result    = $this->db->delete($table);
		return $result;
	}

	public function getdata_get($tipe = 'object', $from = "", $select = "*", $where = null, $order = null, $offset = 0, $limit = 0, $join = null, $group = null)
	{
		$this->db->select($select, FALSE)->from($from);
		if (!is_null($join)) {
			if (count($join) > 0) :
				foreach ($join as $valjoin) :
					$valtype    = (@$valjoin['type'] == '') ? 'INNER' : $valjoin['type'];
					$this->db->join($valjoin['table'], $valjoin['on'], $valtype);
				endforeach;
			endif;
		}
		if (!is_null($group)) {
			$this->db->group_by($group);
		}
		if (!is_null($where)) {
			if (isset($where['or']))         $this->db->or_where($where['or']);
			if (isset($where['where']))      $this->db->where($where['where']);
			if (isset($where['in']))         $this->db->where_in($where['in']['field'], $where['in']['data']);
			if (isset($where['notin']))      $this->db->where_not_in($where['notin']['field'], $where['notin']['data']);
			if (isset($where['custom']))     $this->db->where($where['custom'], null, FALSE);
			if (isset($where['having']))     $this->db->having($where['having']);
			if (isset($where['like']))       $this->db->like($where['like']);
		}
		if (!is_null($order)) {
			foreach ($order as $myorder) {
				$dir    = (@$myorder['direction'] != "") ? $myorder['direction'] : 'asc';
				$this->db->order_by($myorder['field'], $dir);
			}
		}
		if ($limit != 0) {
			$this->db->limit($limit, $offset);
		}
		$query  = $this->db->get();
		if ($tipe == 'array') $result = $query->result_array();
		else if ($tipe == 'row') $result = $query->row();
		else $result = $query->result();
		return $result;
	}

	public function count_data_get($tabel = "", $where = null, $join = null, $group = null, $offset = 0, $limit = 0)
	{
		$this->db->select('count(*) as jml')->from($tabel);
		if (!is_null($join)) {
			if (count($join) > 0) :
				foreach ($join as $valjoin) :
					$valtype    = (@$valjoin['type'] == '') ? 'INNER' : $valjoin['type'];
					$this->db->join($valjoin['table'], $valjoin['on'], $valtype);
				endforeach;
			endif;
		}
		if (!is_null($where)) {
			if (isset($where['or']))         $this->db->or_where($where['or']);
			if (isset($where['where']))      $this->db->where($where['where']);
			if (isset($where['in']))         $this->db->where_in($where['in']['field'], $where['in']['data']);
			if (isset($where['notin']))      $this->db->where_not_in($where['notin']['field'], $where['notin']['data']);
			if (isset($where['custom']))     $this->db->where($where['custom'], null, FALSE);
			if (isset($where['having']))     $this->db->having($where['having']);
			if (isset($where['like']))       $this->db->like($where['like']);
		}
		if (!is_null($group)) {
			$this->db->group_by($group);
		}
		if ($limit != 0) {
			$this->db->limit($limit, $offset);
		}
		$query  = $this->db->get();
		$row    = $query->row();
		return $row->jml;
	}

	public function _insert_update_get($table, $data)
	{
		$key    = [];
		$value  = [];
		$strDuplicate   = [];
		foreach ($data as $kolom => $nilai) {
			$key[]              = $kolom;
			$value[]            = $nilai;

			$nilai              = $this->db->escape($nilai);
			$strDuplicate[]     = "{$kolom} = {$nilai}";
		}
		$strDuplicate   = implode(",", $strDuplicate);
		$tanya  = [];
		foreach ($value as $val) {
			$tanya[] = '?';
		}
		$tanya  = implode(", ", $tanya);
		$sKey   = implode(",", $key);
		$sql    = " INSERT INTO {$table}({$sKey}) VALUES ({$tanya})
                    ON DUPLICATE KEY UPDATE
                    {$strDuplicate}
                  ;";
		$query  = $this->db->query($sql, $value);
		return $query;
	}

	public function app_make_path($pathname, $is_filename = false)
	{
		$mode   = 0777;
		if ($is_filename) {

			$pathname = substr($pathname, 0, strrpos($pathname, '/'));
		}
		// Check if directory already exists
		if (is_dir($pathname) || empty($pathname)) {
			return true;
		}
		// Ensure a file does not already exist with the same name
		$pathname = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $pathname);
		if (is_file($pathname)) {
			trigger_error('mkdir() File exists', E_USER_WARNING);
			return false;
		}
		// Crawl up the directory tree
		$next_pathname = substr($pathname, 0, strrpos($pathname, DIRECTORY_SEPARATOR));
		if (app_make_path($next_pathname, $mode)) {
			if (!file_exists($pathname)) {
				return mkdir($pathname, $mode);
			}
		}
		return false;
	}
}

/* End of file Service.php */
/* Location: ./application/modules/service/controllers/Service.php */
