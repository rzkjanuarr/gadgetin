<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_laporan($tanggal){
		$this->db->select('*');
		$this->db->from('gadgetin_gaji');
		$this->db->join('gadgetin_karyawan', 'gadgetin_karyawan.karyawan_id = gadgetin_gaji.gaji_karyawan_id');
		$this->db->join('gadgetin_jabatan', 'gadgetin_jabatan.jabatan_id = gadgetin_karyawan.karyawan_jabatan_id');
		$this->db->like('gaji_tanggal',$tanggal);
		$this->db->where('gaji_status','sudah');
		$this->db->order_by('gaji_bulan_ke','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
}
