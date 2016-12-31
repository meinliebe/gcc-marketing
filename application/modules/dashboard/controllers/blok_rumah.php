<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class blok_rumah extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_blok_rumah'] = "active";
			$d['mark_jenis_satuan'] = "";
			$d['mark_jenis_bangunan'] = "";
			$d['mark_belum_lunas'] = "";
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_blok_rumah($GLOBALS['site_limit_medium'],$uri);
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/blok_rumah/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function tambah()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_blok_rumah'] = "active";
			$d['mark_jenis_satuan'] = "";
			$d['mark_jenis_bangunan'] = "";
			$d['mark_belum_lunas'] = "";
			
			$d['jenis_bangunan'] = $this->db->get("dlmbg_jenis_bangunan");
			
			$d['id_param'] = "";
			$d['nama_transaksi'] = "";
			$d['harga'] = "";
			$d['id_jenis_satuan'] = "";
			$d['st'] = "tambah";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/blok_rumah/bg_input");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_blok_rumah'] = "active";
			$d['mark_jenis_satuan'] = "";
			$d['mark_jenis_bangunan'] = "";
			$d['mark_blok_rumah'] = "";
			$d['mark_belum_lunas'] = "";
			
			$d['jenis'] = $this->db->get("dlmbg_jenis_satuan");
			
			$id['kode_blok_rumah'] = $id_param;
			$get = $this->db->get_where("dlmbg_blok_rumah",$id)->row();
			$d['id_param'] = $get->kode_blok_rumah;
			$d['nama_transaksi'] = $get->nama_transaksi;
			$d['harga'] = $get->harga;
			$d['id_jenis_satuan'] = $get->id_jenis_satuan;
			$d['st'] = "edit";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/blok_rumah/bg_input");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function simpan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['kode_blok_rumah'] = $_POST['id_param'];
			$dt['nama_transaksi'] = $_POST['nama_transaksi'];
			$dt['id_jenis_satuan'] = $_POST['id_jenis_satuan'];
			$dt['harga'] = $_POST['harga'];
			$st = $_POST['st'];
			
			if($st=="tambah")
			{
				$this->db->insert("dlmbg_blok_rumah",$dt);
				redirect("dashboard/blok_rumah");
			}
			else if($st=="edit")
			{
				$this->db->update("dlmbg_blok_rumah",$dt,$id);
				redirect("dashboard/blok_rumah");
			}
		}
		else
		{
			redirect("login");
		}
	}

	function set()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$set['key'] = $_POST['key'];
			$this->session->set_userdata($set);
			redirect("dashboard/blok_rumah");
		}
		else
		{
			redirect("login");
		}
	}

	function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['kode_blok_rumah'] = $id_param;
			$get = $this->db->delete("dlmbg_blok_rumah",$id);
			redirect("dashboard/blok_rumah");
		}
		else
		{
			redirect("login");
		}
	}
}
