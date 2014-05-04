<?php
class Mgrafik extends CI_Model {
	var $table = "statistik";
	function __construct() {
		parent::__construct();
	}
	
	function getKunjungBulan($tanggal, $bulan, $tahun) {
		$query = $this->db->where('DAY(tanggal)=',$tanggal)
											->where('MONTH(tanggal)=',$bulan)
											->where('YEAR(tanggal)=',$tahun)
											->from($this->table)
											->count_all_results();
		return $query;
	}

	function getHitsBulan($tanggal, $bulan, $tahun) {
		$query = $this->db->query("
			SELECT IFNULL(SUM(hits),0) as hits FROM statistik WHERE Day(tanggal)=$tanggal AND month(tanggal) = $bulan AND year(tanggal) = $tahun
		");
//		$query = $this->db->select('IFNULL(sum(hits), 0) as hits')
//											->where('DAY(tanggal)=',$tanggal)
//											->where('MONTH(tanggal)=',$bulan)
//											->where('YEAR(tanggal)=',$tahun)
//											->from($this->table)
//											->get();
		return $query->row()->hits;
	}
}