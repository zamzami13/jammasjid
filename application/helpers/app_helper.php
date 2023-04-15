<?php

if (!function_exists('get_versi')) {
  function get_versi()
  {
    $versi = "V.2.2";
    return $versi;
  }
}

if (!function_exists('app_get_mazhab')) {
  function app_get_mazhab($index = null)
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
}

if (!function_exists('set_null')) {
  function set_null($data = null)
  {
    if (!is_null($data)) {
      $data = $data;
    }
    return $data;
  }
}

if (!function_exists('app_get_posisi')) {
  function app_get_posisi($index = null)
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
}

if (!function_exists('app_input')) {
  function app_input($except = null, $clean = true)
  {
    $CI = &get_instance();

    $input  = [];

    foreach ($CI->input->post() as $key => $value) {

      $input[$key]  = $CI->input->post($key, $clean) == "" ? null : $CI->input->post($key, $clean);

      if (!is_null($except) and in_array($key, $except)) {
        $input[$key]  = $CI->input->post($key, !$clean) == "" ? null : my_clean_string($CI->input->post($key, !$clean));
      }

      if (substr($key, 0, 3) == 'tgl' or strpos($key, "_tgl")) {
        $input[$key]  = app_date_format($input[$key], 'Y-m-d', 'd-m-Y');
      }
    }

    return $input;
  }
}

if (!function_exists('app_status')) {
  function app_status($index = null)
  {
    $data = [
      '' => 'PILIH',
      '1' => 'Aktif',
      '0' => 'Tidak Aktif'
    ];
    if (!is_null($index)) return @$data[$index];
    return $data;
  }
}

if (!function_exists('app_master_jk')) {
  function app_master_jk($index = null)
  {
    $data = [
      '' => 'PILIH JENIS KELAMIN',
      'L' => 'Laki - Laki',
      'P' => 'Perempuan'
    ];
    if (!is_null($index)) return @$data[$index];
    return $data;
  }
}

if (!function_exists('app_master_level')) {
  function app_master_level($index = null)
  {
    $data = [
      '' => 'PILIH',
      '1' => 'System Admin',
      '2' => 'Admin',
      '3' => 'Pengguna',
      '4' => 'No Akses'
    ];
    if (!is_null($index)) return @$data[$index];
    return $data;
  }
}

if (!function_exists('_CI')) {
  function _CI()
  {
    $CI = &get_instance();
    return $CI;
  }
}

if (!function_exists('get_file_extensions')) {
  function get_file_extensions($string = "")
  {
    $array   = explode(".", $string);
    $ext   = end($array);

    return $ext;
  }
}

if (!function_exists('kelamin')) {
  function kelamin($kelamin)
  {
    if ($kelamin ==  'L') {
      $kelamin = 'Laki-Laki';
    } else {
      $kelamin = 'Perempuan';
    }

    return $kelamin;
  }
}

if (!function_exists('app_version')) {
  function app_version()
  {
    $string = "<b>Version <span style='color: #3C82C0'>" . get_versi() . "</span></b> | Check for updates : <a href='https://github.com/eriiksanjaya/appujian' target='_blank'>Github</a>";
    echo $string;
  }
}

if (!function_exists('d')) {
  function d($data, $die = false)
  {
    echo "<pre>";
    print_r($data);
    if ($die) {
      die();
    }
    echo "</pre>";
  }
}

if (!function_exists('dd')) {
  function dd($data, $die = true)
  {
    echo "<pre>";
    print_r($data);
    if ($die) {
      die();
    }
    echo "</pre>";
  }
}

if (!function_exists('strencrypt')) {
	function strencrypt($str = "", $forDB = FALSE)
	{
		$key    = _CI()->config->item('encryption_key');
		$str    = ($forDB) ? 'md5(concat(\'' . $key . '\',' . $str . '))' : md5($key . $str);
		return $str;
	}
}

if (!function_exists('app_make_path')) {
	/*Create  Directory Tree if Not Exists
	If you are passing a path with a filename on the end, pass true as the second parameter to snip it off */
	function app_make_path($pathname, $is_filename = false)
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

if (!function_exists('appdecrypt')) {
	function appdecrypt($string)
	{
		$encryption_key     	= _CI()->config->item('encryption_key');
		$encryption_iv      	= _CI()->config->item('encryption_iv');
		$encryption_method 		= _CI()->config->item('encryption_method');

		$key 	= hash("sha256", $encryption_key);
		$iv  	= substr(hash("sha256", $encryption_iv), 0, 16);
		$result	= openssl_decrypt(base64_decode($string), $encryption_method, $key, 0, $iv);
		return $result;
	}
}

if (!function_exists('app_minutes_to_hour')) {
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
}

if (!function_exists('_sub_page_title')) {
  function _sub_page_title()
  {
    $string = "
    <p>Bismillah</p>
    <p>Terimakasih telah membeli produk asli.</p>
    <p>Jam Masjid Digital ini dibuat pada tanggal 16 November 2018.</p>
                <p>
                    <strong>Saya tidak berkenan</strong>, jika Anda <strong>secara sengaja</strong> membajak produk kami dan menjualnya kembali / membagikan source code ini secara gratis. <br />
                    source code jam masjid digital ini, hanya untuk pemakaian pribadi, <br />
                    bukan untuk <strong>komersil</strong> / <strong>diperjualbelikan</strong> kembali, <br />
                    support saya dengan membeli produk asli.
                </p>

                <p>
                    Kalau lewat tangan Anda, dengan sengaja, filenya jadi kesebar, di akhirat kelak, <br />
                    kepada Allah, saya akan minta: <br />
                    1. Dosa-dosa saya pindah ke Anda. <br />
                    2. Pahala Anda, dihibahkan ke saya. <br /> <br />

                    Karena file source code jam masjid digital ini, harusnya didapatkan melalui pembelian ke saya. <br />
                    Lewat <a href='https://eriksanjaya.com/jam-masjid-digital'>https://eriksanjaya.com/jam-masjid-digital</a> <br />

                    <strong>Bukan gratis.</strong>
                </p>
                <p>Semoga berkah.</p>


                <strong>FAQ :</strong> <br />
                Q : <strong>Gan, saya hanya jual jasa pasang jam masjid, boleh saya pakai source codenya untuk masjid-masjid?</strong> <br />
                A : Boleh, dengan syarat, setiap penjualan, Anda harus bayar saya sebesar <strong>Rp 500.000</strong>. <br />
                Q : <strong>Gan, kalau source code jam masjid digitalnya, gak sengaja kesebar, dikarenakan hp / laptop saya hilang bagaimana?</strong> <br />
                A : Saya gak akan nuntut Anda, saya hanya nuntut jika secara sengaja. <br />
                <p></p>
                <p></p>


                Kontak : <br />
                Erik Sanjaya <br />
                0895 1700 0409 <br />
                eriiksanjaya@gmail.com <br />
    ";
    echo $string;
  }
}

if (!function_exists('app_time_add')) {
  function app_time_add($selectedTime = null, $modify = "+30 minutes", $format = "H:i")
  {
    // note this will set to today's current date since you are not specifying it in your passed parameter. This probably doesn't matter if you are just going to add time to it.
    $selectedTime = is_null($selectedTime) ? date($format) : $selectedTime;
    $datetime = DateTime::createFromFormat($format, $selectedTime);
    $datetime->modify($modify);
    return $datetime->format($format);
  }
}

if (!function_exists('qp')) {
  function qp($string = null)
  {
    $_string = 'pqjjv';
    if ($string) {
      return 'passed';
    }
    return $_string;
  }
}

if (!function_exists('app_date_add')) {
  function app_date_add($selectedTime = null, $modify = "+7 days", $format = 'Y-m-d')
  {
    // note this will set to today's current date since you are not specifying it in your passed parameter. This probably doesn't matter if you are just going to add time to it.
    $selectedTime = is_null($selectedTime) ? date($format) : $selectedTime;
    $datetime = DateTime::createFromFormat($format, $selectedTime);
    $datetime->modify($modify);
    return $datetime->format($format);
  }
}

if (!function_exists('app_time_duration')) {
  function app_time_duration($start, $end)
  {
    $start  = nice_date($start, 'H:i');
    $end    = nice_date($end, 'H:i');

    return $start . ' - ' . $end;
  }
}

if (!function_exists('appencrypt')) {
	function appencrypt($string)
	{
		$encryption_key     	= _CI()->config->item('encryption_key');
		$encryption_iv      	= _CI()->config->item('encryption_iv');
		$encryption_method 		= _CI()->config->item('encryption_method');

		$key    = hash("sha256", $encryption_key);
		$iv     = substr(hash("sha256", $encryption_iv), 0, 16);
		$result = openssl_encrypt($string, $encryption_method, $key, 0, $iv);
		return base64_encode($result);
	}
}

if (!function_exists('app_date_bigger')) {
  function app_date_bigger($bigger, $smaller)
  {
    $bigger     = date_create($bigger);
    $smaller    = date_create($smaller);

    return $bigger > $smaller ? true : false;
  }
}

if (!function_exists('app_date_diff')) {
  function app_date_diff($bigger, $smaller)
  {
    $bigger     = date_create($bigger);
    $smaller    = date_create($smaller);

    $diff = date_diff($smaller, $bigger);

    return $diff;
  }
}

if (!function_exists('app_date_value')) {
  function app_date_value($date, $format = 'd-m-Y', $from = '')
  {
    $result   = null;
    if ($date != "") {
      $result = ($from == '')  ? nice_date($date, $format) : app_date_format($date, $format, $from);
    }

    return $result;
  }
}

if (!function_exists('app_date_format')) {
  function app_date_format($date, $format = '', $from = '')
  {
    $newdate = $date;

    if ($from == "") {
      $newdate   = date_format(date_create($date), $format);
    } else {
      if (app_valid_date($date, $from)) {
        $myDateTime = DateTime::createFromFormat($from, $date);
        $newdate    = @$myDateTime->format('Y-m-d');
      }
    }

    return $newdate;
  }
}

if (!function_exists('app_date_indo')) {
  function app_date_indo($date, $short = false)
  {
    $get_tahun  = substr($date, 0, 4);
    $get_bulan    = substr($date, 5, 2);
    $get_tanggal    = substr($date, 8, 2);

    if ($short) {
      $bulan = [
        "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep",  "Okt", "Nov", "Des"
      ];
    } else {
      $bulan = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September",  "Oktober", "November", "Desember"
      ];
    }

    $newdate = $get_tanggal . " " . $bulan[$get_bulan - 1] . " " . $get_tahun;

    return $newdate;
  }
}

if (!function_exists('app_valid_date')) {
  function app_valid_date($date, $format = 'Y-m-d')
  {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
  }
}

if (!function_exists('nice_date')) {
  /**
   * Turns many "reasonably-date-like" strings into something
   * that is actually useful. This only works for dates after unix epoch.
   *
   * @param string  The terribly formatted date-like string
   * @param string  Date format to return (same as php date function)
   * @return  string
   */
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

if (!function_exists('app_generate_userid')) {
  function app_generate_userid($length = 2)
  {
    $_tipe  = "BEE";
    // $order = [['field' => 'user_id', 'direction' => 'DESC']];
    $where['custom'] = "user_level != 1";
    $_seq = _CI()->m_crud->getdata('row', 'master_user', "MAX(RIGHT(user_uid,{$length})) as nomor", $where);

    $seq  = intval($_seq->nomor) + 1;
    // $nomor  = $_tipe;
    $nomor  = @$data['user_createdate'] != "" ? nice_date(@$data['user_createdate'], 'y') : date('y');
    $nomor  .= substr(str_repeat("0", $length) . $seq, ($length * -1));

    return $nomor;
  }
}

if (!function_exists('app_get_waktu_sholat')) {
  function app_get_waktu_sholat()
  {
    $getdata = _CI()->m_crud->getdata('row', 'set_perhitungan_waktu_shalat', "*");
    return $getdata;
  }
}

if (!function_exists('app_db_exist')) {
  function app_db_exist($table, $where = null, $select = "*", $join = null)
  {
    $CI = &get_instance();
    $status   = FALSE;

    $getdata  = $CI->m_crud->getdata('array', $table, $select, $where, null, null, null, $join);

    if (count($getdata) > 0) {
      $status = TRUE;
    }

    $response['status'] = $status;
    $response['count'] = count($getdata);
    $response['data'] = $getdata;

    return $response;
  }
}

if (!function_exists('app_get_font')) {
  function app_get_font()
  {

    $where['custom'] = "font_status = '1' and font_isdelete = '0'";
    $getdata = _CI()->m_crud->getdata('row', 'set_font', '*', $where);

    return $getdata;
  }
}