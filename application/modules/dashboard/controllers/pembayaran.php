<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pembayaran extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "active";
			$d['mark_jenis_transaksi'] = "";
			$d['mark_jenis_satuan'] = "";
			$d['mark_belum_lunas'] = "";
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_pembayaran($GLOBALS['site_limit_medium'],$uri);
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pembayaran/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function edit($id_param,$id_pemesanan)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "active";
			$d['mark_jenis_transaksi'] = "";
			$d['mark_jenis_satuan'] = "";
			$d['mark_belum_lunas'] = "";
			
			$get = $this->db->select("*")->join("dlmbg_pemesanan","dlmbg_pemesanan.kode_pemesanan=dlmbg_pembayaran.kode_pemesanan")->get_where("dlmbg_pembayaran",array("kode_pembayaran"=>$id_param))->row();
			
			$d['kode_pembayaran'] = $get->kode_pembayaran;
			$d['no_nota'] = $get->kode_pemesanan;
			$d['tgl_bayar'] = $get->tgl_bayar;
			$d['uang_muka'] = $get->uang_muka;
			$d['jumlah_total'] = $get->jumlah_harga;
			$d['jumlah_harga'] = $get->jumlah_harga-$get->uang_muka;
			$d['jumlah_harga'] = $get->jumlah_harga-$get->uang_muka;
			$d['status_pembayaran'] = $get->status_pembayaran;
			$d['bayar'] = $get->bayar;
			
			$get_head = $this->db->get_where("dlmbg_pemesanan",array("kode_pemesanan"=>$get->kode_pemesanan))->row();
			if($this->session->userdata("kode_pelanggan")=="")
			{
				$set_sess_head['kode_pelanggan'] = $get_head->kode_pelanggan;
				$this->session->set_userdata($set_sess_head);
			}
			$d['tgl_pesan'] = $get_head->tgl_pesan;
			$d['tgl_selesai'] = $get_head->tgl_selesai;
			$d['status_pembayaran'] = $get_head->status_pembayaran;
			
			$get_detail = $this->db->query("select a.kode_jenis_transaksi, a.jumlah, b.harga, b.nama_transaksi, b.satuan from dlmbg_pemesanan_detail a left join 
			(select x.nama_transaksi, y.satuan,  x.harga, x.kode_jenis_transaksi from dlmbg_jenis_transaksi x left join dlmbg_jenis_satuan y on x.id_jenis_satuan=y.id_jenis_satuan) 
			b on a.kode_jenis_transaksi=b.kode_jenis_transaksi where a.kode_pemesanan='".$id_pemesanan."'");
			
			$in_cart = array();
			foreach($get_detail->result() as $dpd)
			{
				$in_cart[] = array(
				'id'      => $dpd->kode_jenis_transaksi,
				'qty'     => $dpd->jumlah,
				'price'   => $dpd->harga,
				'name'    => $dpd->nama_transaksi,
				'options' => array('Satuan' => $dpd->satuan));
			}
			$this->cart->insert($in_cart);
			
			$d['pelanggan'] = $this->db->get("dlmbg_pelanggan");
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pembayaran/bg_edit");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function barcode_ean13($kode){

	$height = isset($_GET['height']) ? mysql_real_escape_string($_GET['height']) : '74';  $width = isset($_GET['width']) ? mysql_real_escape_string($_GET['width']) : '1'; //1,2,3,dst

	$this->load->library('zend');

	$this->zend->load('Zend/Barcode');

	$barcodeOPT = array(

		'text' => $kode,

		'barHeight'=> $height,

		'factor'=>$width,

		);

	$renderOPT = array();

	$render = Zend_Barcode::factory(

		'code39', 'image', $barcodeOPT, $renderOPT

		)->render();

	}

	function qr_code($param){
		$this->load->library('zend');
		$this->zend->load('Zend/qrlib');
		QRcode::png($param);
	}

	function kekata($x) {
	    $x = abs($x);
	    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
	    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	    $temp = "";
	    if ($x <12) {
	        $temp = " ". $angka[$x];
	    } else if ($x <20) {
	        $temp = $this->kekata($x - 10). " belas";
	    } else if ($x <100) {
	        $temp = $this->kekata($x/10)." puluh". $this->kekata($x % 10);
	    } else if ($x <200) {
	        $temp = " seratus" . $this->kekata($x - 100);
	    } else if ($x <1000) {
	        $temp = $this->kekata($x/100) . " ratus" . $this->kekata($x % 100);
	    } else if ($x <2000) {
	        $temp = " seribu" . $this->kekata($x - 1000);
	    } else if ($x <1000000) {
	        $temp = $this->kekata($x/1000) . " ribu" . $this->kekata($x % 1000);
	    } else if ($x <1000000000) {
	        $temp = $this->kekata($x/1000000) . " juta" . $this->kekata($x % 1000000);
	    } else if ($x <1000000000000) {
	        $temp = $this->kekata($x/1000000000) . " milyar" . $this->kekata(fmod($x,1000000000));
	    } else if ($x <1000000000000000) {
	        $temp = $this->kekata($x/1000000000000) . " trilyun" . $this->kekata(fmod($x,1000000000000));
	    }     
	        return $temp;
	}
	 
	 
	function terbilang($x, $style=4) {
	    if($x<0) {
	        $hasil = "minus ". trim($this->kekata($x));
	    } else {
	        $hasil = trim($this->kekata($x));
	    }     
	    switch ($style) {
	        case 1:
	            $hasil = strtoupper($hasil);
	            break;
	        case 2:
	            $hasil = strtolower($hasil);
	            break;
	        case 3:
	            $hasil = ucwords($hasil);
	            break;
	        default:
	            $hasil = ucfirst($hasil);
	            break;
	    }     
	    return $hasil;
	}


	function cetak($id_param)
	{
		$bulan = array('01' => 'JANUARI','02' => 'FEBRUARI','03' => 'MARET','04' => 'APRIL','05' => 'MEI','06' => 'JUNI','07' => 'JULI','08' => 'AGUSTUS','09' => 'SEPTEMBER','10' => 'OKTOBER','11' => 'NOVEMBER','12' => 'DESEMBER');

		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "active";
			$d['mark_jenis_transaksi'] = "";
			$d['mark_jenis_satuan'] = "";
			$d['mark_belum_lunas'] = "";
			
			$get = $this->db->get_where("dlmbg_pembayaran",array("kode_pemesanan"=>$id_param))->row();
			$d['barcode'] = $id_param;
			
			$d['kode_pembayaran'] = $get->kode_pembayaran;
			$d['no_nota'] = $get->kode_pemesanan;
			$d['tgl_bayar'] = $get->tgl_bayar;
			$d['bayar'] = $get->bayar;			
			
			$get_head = $this->db->get_where("dlmbg_pemesanan",array("kode_pemesanan"=>$get->kode_pemesanan))->row();
			if($this->session->userdata("kode_pelanggan")=="")
			{
				$set_sess_head['kode_pelanggan'] = $get_head->kode_pelanggan;
				$this->session->set_userdata($set_sess_head);
			}
			$petugas = $this->db->get_where("dlmbg_user", array("kode_user"=>$this->session->userdata("kode_user")))->row();

			$d['tgl_pesan'] = $get_head->tgl_pesan;
			$d['terbilang'] = $this->terbilang($get_head->jumlah_harga, $style = 3);			
			$d['jumlah_harga'] = $get_head->jumlah_harga;
			$d['status_pembayaran'] = $get_head->status_pembayaran;
			$d['kavling'] = $get_head->blok_rumah.'/'.$get_head->no_rumah;			
			$d['petugas'] = $petugas->nama_user;
			$d['tgl_kwitansi'] = date('d').' '.(ucwords(strtolower($bulan[date('m')]))).' '.date('Y');

			$get_detail = $this->db->query("select a.kode_jenis_transaksi, a.jumlah, b.harga, b.nama_transaksi, b.satuan from dlmbg_pemesanan_detail a left join 
			(select x.nama_transaksi, y.satuan,  x.harga, x.kode_jenis_transaksi from dlmbg_jenis_transaksi x left join dlmbg_jenis_satuan y on x.id_jenis_satuan=y.id_jenis_satuan) 
			b on a.kode_jenis_transaksi=b.kode_jenis_transaksi where a.kode_pemesanan='".$id_param."'");
			
			$in_cart = array();
			foreach($get_detail->result() as $dpd)
			{
				$in_cart[] = array(
				'id'      => $dpd->kode_jenis_transaksi,
				'qty'     => $dpd->jumlah,
				'price'   => $dpd->harga,
				'name'    => $dpd->nama_transaksi,
				'options' => array('Satuan' => $dpd->satuan));
			}
			$this->cart->insert($in_cart);
			
			$pelanggan = $this->db->get_where("dlmbg_pelanggan", array("kode_pelanggan" => $get_head->kode_pelanggan))->row();

			$d['nama'] = ucwords(strtolower($pelanggan->nama_pelanggan));
 			
			$html = $this->load->view($GLOBALS['site_theme']."/pembayaran/bg_cetak",$d, true);
			pdf_create($html,$id_param.time()."",true);
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
			$id['kode_pembayaran'] = $this->input->post('kode_pembayaran');
			$id['kode_pemesanan'] = $this->input->post('no_nota');
			$d_header['tgl_bayar'] = $this->input->post('tgl_bayar');
			$d_header['bayar'] = $this->input->post('bayar');
			
			$up['status_pembayaran'] = $this->input->post('status_pembayaran');
			$this->db->update("dlmbg_pemesanan",$up,array("kode_pemesanan" => $id['kode_pemesanan']));
			
			$this->db->update("dlmbg_pembayaran",$d_header,$id);
			$this->session->unset_userdata('kode_pelanggan');
			$this->session->unset_userdata('tgl_pesan');
			$this->session->unset_userdata('tgl_selesai');
			$this->session->unset_userdata('jumlah_harga');
			$this->cart->destroy();
			redirect("dashboard/pembayaran/edit/".$id['kode_pembayaran']."/".$id['kode_pemesanan']."");
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
			$set['key_search'] = $_POST['key_search'];
			$this->session->set_userdata($set);
			redirect("dashboard/pembayaran");
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
			$id['kode_pembayaran'] = $id_param;
			$this->db->delete("dlmbg_pembayaran",$id);
			redirect("dashboard/pembayaran");
		}
		else
		{
			redirect("login");
		}
	}
}
