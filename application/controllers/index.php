<?php 
class Index extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('mgrafik');
	}
	
	function Index() {
		$this->load->view('grafik');
	}
	
	function getData() {
		$jmlhari = date('t');
		$bulan = date('m');
		$tahun = date('Y');
		$result="";
		
		for ($i = 1; $i <= $jmlhari; $i++) {
			$result = $result . "[".$i.",".$this->mgrafik->getHitsBulan($i,$bulan,$tahun)."],";
		}		
		print "[[".substr($result, 0, strlen($result)-1)."]]";
	}
}