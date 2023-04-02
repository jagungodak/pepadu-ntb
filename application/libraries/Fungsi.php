<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Fungsi
{
	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->database();
		date_default_timezone_set('Asia/Singapore');
	}

	function bulan($input)
	{
		if ($input == '1') {
			$output = 'Januari';
		}
		if ($input == '2') {
			$output = 'Februari';
		}
		if ($input == '3') {
			$output = 'Maret';
		}
		if ($input == '4') {
			$output = 'April';
		}
		if ($input == '5') {
			$output = 'Mei';
		}
		if ($input == '6') {
			$output = 'Juni';
		}
		if ($input == '7') {
			$output = 'Juli';
		}
		if ($input == '8') {
			$output = 'Agustus';
		}
		if ($input == '9') {
			$output = 'September';
		}
		if ($input == '10') {
			$output = 'Oktober';
		}
		if ($input == '11') {
			$output = 'November';
		}
		if ($input == '12') {
			$output = 'Desember';
		}
		if ($input == '') {
			$output = '-';
		}
		return $output;
	}

	function bulan2($input)
	{
		if ($input == '1') {
			$output = 'Jan';
		}
		if ($input == '2') {
			$output = 'Feb';
		}
		if ($input == '3') {
			$output = 'Mar';
		}
		if ($input == '4') {
			$output = 'Apr';
		}
		if ($input == '5') {
			$output = 'Mei';
		}
		if ($input == '6') {
			$output = 'Jun';
		}
		if ($input == '7') {
			$output = 'Jul';
		}
		if ($input == '8') {
			$output = 'Ags';
		}
		if ($input == '9') {
			$output = 'Sep';
		}
		if ($input == '10') {
			$output = 'Okt';
		}
		if ($input == '11') {
			$output = 'Nov';
		}
		if ($input == '12') {
			$output = 'Des';
		}
		if ($input == '') {
			$output = '-';
		}
		return $output;
	}
	function hari($input)
	{
		if ($input == 'Sun') {
			$output = 'Minggu';
		}
		if ($input == 'Mon') {
			$output = 'Senin';
		}
		if ($input == 'Tue') {
			$output = 'Selasa';
		}
		if ($input == 'Wed') {
			$output = 'Rabu';
		}
		if ($input == 'Thu') {
			$output = 'Kamis';
		}
		if ($input == 'Fri') {
			$output = 'Jumat';
		}
		if ($input == 'Sat') {
			$output = 'Sabtu';
		}
		if ($input == '') {
			$output = '-';
		}
		return $output;
	}
	function hari2($input)
	{
		if ($input == '1') {
			$output = 'Minggu';
		}
		if ($input == '2') {
			$output = 'Senin';
		}
		if ($input == '3') {
			$output = 'Selasa';
		}
		if ($input == '4') {
			$output = 'Rabu';
		}
		if ($input == '5') {
			$output = 'Kamis';
		}
		if ($input == '6') {
			$output = 'Jumat';
		}
		if ($input == '7') {
			$output = 'Sabtu';
		}
		if ($input == '') {
			$output = '-';
		}
		return $output;
	}
	function hari3($input)
	{
		if ($input == '1') {
			$output = 'Sun';
		}
		if ($input == '2') {
			$output = 'Mon';
		}
		if ($input == '3') {
			$output = 'Tue';
		}
		if ($input == '4') {
			$output = 'Wed';
		}
		if ($input == '5') {
			$output = 'Thu';
		}
		if ($input == '6') {
			$output = 'Fri';
		}
		if ($input == '7') {
			$output = 'Sat';
		}
		if ($input == '') {
			$output = '-';
		}
		return $output;
	}
	function tanggal($in, $show_time = false)
	{
		$tgl = substr($in, 8, 2);
		$bln = substr($in, 5, 2);
		$thn = substr($in, 0, 4);

		$hour = substr($in, 11, 2);
		$min = substr($in, 14, 2);
		$sec = substr($in, 17, 2);

		$timestmp = mktime($hour, $min, $sec, $bln, $tgl, $thn);
		$output = $this->hari(date('D', $timestmp)) . ', ' . $tgl . '  ' . $this->bulan($bln) . ' ' . $thn;
		if ($show_time)
			$output .= ', pukul ' . $hour . ' : ' . $min;
		return $output;
	}

	function tanggal2($in, $show_time = false)
	{
		$tgl = substr($in, 8, 2);
		$bln = substr($in, 5, 2);
		$thn = substr($in, 0, 4);

		$hour = substr($in, 11, 2);
		$min = substr($in, 14, 2);
		$sec = substr($in, 17, 2);

		$timestmp = mktime($hour, $min, $sec, $bln, $tgl, $thn);
		$output = $tgl . '  ' . $this->bulan($bln) . ' ' . $thn;
		if ($show_time)
			$output .= ', pukul ' . $hour . ' : ' . $min;
		return $output;
	}

	function tanggal3($in, $show_time = false)
	{
		$tgl = substr($in, 8, 2);
		$bln = substr($in, 5, 2);
		$thn = substr($in, 0, 4);

		$hour = substr($in, 11, 2);
		$min = substr($in, 14, 2);
		$sec = substr($in, 17, 2);

		$timestmp = mktime($hour, $min, $sec, $bln, $tgl, $thn);
		$output = $tgl . '  ' . $this->bulan2($bln) . ' ' . $thn;
		if ($show_time)
			$output .= ', pukul ' . $hour . ' : ' . $min;
		return $output;
	}

	function tgl($in, $show_time = false)
	{
		$tgl = substr($in, 8, 2);
		$bln = substr($in, 5, 2);
		$thn = substr($in, 0, 4);

		$hour = substr($in, 11, 2);
		$min = substr($in, 14, 2);
		$sec = substr($in, 17, 2);

		$timestmp = mktime($hour, $min, $sec, $bln, $tgl, $thn);
		$output = $tgl . ' ' . $this->bulan2($bln);
		if ($show_time)
			$output .= ', pukul ' . $hour . ' : ' . $min;
		return $output;
	}
	function break_string($string, $word_limit)
	{
		$words = explode(" ", $string);
		return implode(" ", array_splice($words, 0, $word_limit));
	}
	function timestamp($timestamp)
	{
		$difference = time() - $timestamp;
		$periods = array("detik", "menit", "jam", "hari", "minggu", "bulan", "tahun", "decade");
		$lengths = array("60", "60", "24", "7", "4.35", "12", "10");

		if ($difference > 0) {
			$ending = "yang lalu";
		} else {
			$difference = -$difference;
			$ending = "akan datang";
		}

		for ($j = 0; $difference >= $lengths[$j]; $j++) {
			$difference /= $lengths[$j];
		}

		$difference = round($difference) . ' ';

		if ($difference != 1) {
			$periods[$j] .= " ";
		}

		if ($difference == 0) {
			return 'baru saja';
		} else
			return $difference . ' ' . $periods[$j] . ' ' . $ending;
	}
	function pecah($uang, $delimiter = '.', $kurung = false)
	{
		if ($uang == '' || $uang == 0) {
			$rupiah = '0';
			return $rupiah;
		}
		$neg = false;
		if ($uang < 0) {
			$neg = true;
			$uang = abs($uang);
		}
		$rupiah = number_format($uang, 0, ',', $delimiter);
		if ($neg && $kurung) {
			$rupiah = '(' . $rupiah . ')';
		}

		return $rupiah;
	}


	function terbilang($n)
	{
		$this->dasar = array(1 => 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan');
		$this->angka = array(1000000000, 1000000, 1000, 100, 10, 1);
		$this->satuan = array('milyar', 'juta', 'ribu', 'ratus', 'puluh', '');

		$str = "";
		$i = 0;
		if ($n == 0) {
			$str = "nol";
		} else {
			while ($n != 0) {
				$count = (int) ($n / $this->angka[$i]);
				if ($count >= 10) {
					$str .= $this->terbilang($count) . " " . $this->satuan[$i] . " ";
				} else if ($count > 0 && $count < 10) {
					$str .= $this->dasar[$count] . " " . $this->satuan[$i] . " ";
				}
				$n -= $this->angka[$i] * $count;
				$i++;
			}
			$str = preg_replace("/satu puluh (\w+)/i", "\\1 belas", $str);
			$str = preg_replace("/satu (ribu|ratus|puluh|belas)/i", "se\\1", $str);
		}
		return $str;
	}

	function seo_friendly($judul)
	{
		$var = strtolower($judul);
		$title = str_replace(",", "", $var);
		$seo = preg_replace('/\%/', ' percentage', $title);
		$seo = preg_replace('/\@/', ' at ', $seo);
		$seo = preg_replace('/\&/', ' and ', $seo);
		$seo = preg_replace('/\s[\s]+/', '-', $seo); // Strip off multiple spaces 
		$seo = preg_replace('/[\s\W]+/', '-', $seo); // Strip off spaces and non-alpha-numeric
		$seo = preg_replace('/^[\-]+/', '', $seo); // Strip off the starting hyphens 
		$seo = preg_replace('/[\-]+$/', '', $seo); // // Strip off the ending hyphens 		
		$seo = str_replace(" ", "-", $seo);
		return $seo;
	}

	function cek_login()
	{
		$CI =& get_instance();
		$CI->load->library('session');
		if ($CI->session->userdata()) {

			$username = $CI->session->userdata("username");

			$query = $this->CI->db->query("SELECT * FROM tbl_user WHERE username = '$username' ")->row_array();
			if ($query) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function cek_hak_akses($id_modul)
	{
		$CI =& get_instance();
		$CI->load->library('session');

		$id_grup_pengguna = $CI->session->userdata('idkelompok');

		$query = $this->CI->db->where('tbl_kelompok_user.idkelompok', $id_grup_pengguna)->get()->row_array();
		//$query = $this->CI->db->get('tbl_kelompok_user')->row_array();
		$menu = $query['menu'];

		if (in_array($id_modul, $menu)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


}