<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_model extends CI_Model {

	 
	public function indexs_data_pelanggan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Pelanggan</th>
					  <th>Alamat</th>
					  <th>Jenis Pelanggan</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		
		$where['nama_pelanggan']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("dlmbg_pelanggan");
		$config['base_url'] = base_url() . 'dashboard/pelanggan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("kode_pelanggan","DESC")->get("dlmbg_pelanggan",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.$g->alamat_pelanggan.'</td>
					<td class="center">'.$g->jenis.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pelanggan/edit/'.$g->kode_pelanggan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pelanggan/hapus/'.$g->kode_pelanggan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_satuan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Satuan</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		

		$where['satuan']  = $this->session->userdata("key"); 		  
		$tot_hal = $this->db->like($where)->get("dlmbg_jenis_satuan");
		$config['base_url'] = base_url() . 'dashboard/satuan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("id_jenis_satuan","DESC")->get("dlmbg_jenis_satuan",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->satuan.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/satuan/edit/'.$g->id_jenis_satuan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/satuan/hapus/'.$g->id_jenis_satuan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_transaksi($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Jenis Transaksi</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		

		$where['nama_transaksi']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("dlmbg_jenis_transaksi");
		$config['base_url'] = base_url() . 'dashboard/jenis_transaksi/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("kode_jenis_transaksi","DESC")->get("dlmbg_jenis_transaksi",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->jenis_transaksi.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/jenis_transaksi/edit/'.$g->kode_jenis_transaksi.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/jenis_transaksi/hapus/'.$g->kode_jenis_transaksi.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_pengguna($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Pengguna</th>
					  <th>Username</th>
					  <th>Level</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';

		$where['nama_user']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("dlmbg_user");
		$config['base_url'] = base_url() . 'dashboard/pengguna/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("kode_user","DESC")->get("dlmbg_user",$limit,$offset);
		$i=$offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_user.'</td>
					<td class="center">'.$g->username.'</td>
					<td class="center">'.$g->level.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pengguna/edit/'.$g->kode_user.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pengguna/hapus/'.$g->kode_user.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_jenis_transaksi($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Jenis Transaksi</th>
					  <th>Harga</th>
					  <th>Satuan</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';

		$where['nama_transaksi']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("dlmbg_jenis_transaksi");
		$config['base_url'] = base_url() . 'dashboard/jenis_transaksi/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select * from dlmbg_jenis_transaksi a left join dlmbg_jenis_satuan b on a.id_jenis_satuan=b.id_jenis_satuan where nama_transaksi like '%".$where['nama_transaksi']."%' limit ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_transaksi.'</td>
					<td class="center">Rp. '.number_format($g->harga,2,',','.').'</td>
					<td class="center">'.$g->satuan.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/jenis_transaksi/edit/'.$g->kode_jenis_transaksi.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/jenis_transaksi/hapus/'.$g->kode_jenis_transaksi.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_pemesanan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>No. Nota</th>
					  <th>Tanggal</th>
					  <th>Nama Pelanggan</th>
					  <th>Blok Rumah</th>
					  <th>Nomor Rumah</th>
					  <th>Alamat</th>
					  <th>Jenis Transaksi</th>
					  <th>Total Harga</th>
					  <th>Status Pembayaran</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		
		if($this->session->userdata("key_search")=="")
		{
			$set['key_search'] = "nama_pelanggan";
			$this->session->set_userdata($set);
		}
		$where[$this->session->userdata("key_search")]  = $this->session->userdata("key"); 	

		$key = $this->session->userdata("key_search");
		$val = $this->session->userdata("key");

		$tot_hal = $this->db->query("select a.tgl_pesan, a.kode_pemesanan, b.alamat_pelanggan, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		 from dlmbg_pemesanan a left join dlmbg_pelanggan b on a.kode_pelanggan=b.kode_pelanggan where ".$key." like '%".$val."%'");
		$config['base_url'] = base_url() . 'dashboard/pemesanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select a.tgl_pesan, a.kode_pemesanan, b.alamat_pelanggan, b.nama_pelanggan, a.blok_rumah, a.no_rumah, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		 from dlmbg_pemesanan a left join dlmbg_pelanggan b on a.kode_pelanggan=b.kode_pelanggan where ".$key." like '%".$val."%' LIMIT ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->kode_pemesanan.'</td>
					<td>'.$g->tgl_pesan.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.$g->blok_rumah.'</td>
					<td>'.$g->no_rumah.'</td>
					<td>'.$g->alamat_pelanggan.'</td>';
					$get_detail = $this->db->select("*")->join("dlmbg_jenis_transaksi","dlmbg_jenis_transaksi.kode_jenis_transaksi=dlmbg_pemesanan_detail.kode_jenis_transaksi")->get_where("dlmbg_pemesanan_detail",array("kode_pemesanan"=>$g->kode_pemesanan));
					$hasil .= "<th>";

					foreach($get_detail->result() as $gd)
					{
						$hasil .= "<li>".$gd->nama_transaksi."</li>";
					}

					$hasil .= "</th>";
					$hasil .='<td>'.number_format($g->jumlah_harga,2,",",".").'</td>
					<td>'.$g->status_pembayaran.'</td>
					<td class="center">';
					if($this->session->userdata("level")=="admin")
					{
						$hasil .='	<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/edit/'.$g->kode_pemesanan.'" title="Edit">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pemesanan/hapus/'.$g->kode_pemesanan.'" onClick=\'return confirm("Anda yakin?");\' title="Hapus">
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>';
					}
					$hasil .='<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/cetak/'.$g->kode_pemesanan.'" title="Cetak Kwitansi" target="_blank">
							<i class="halflings-icon file halflings-icon"></i>  
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_belum_lunas($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>No. Nota</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Selesai</th>
					  <th>Nama Pelanggan</th>
					  <th>Alamat</th>
					  <th>Jenis Transaksi</th>
					  <th>Total Harga</th>
					  <th>Uang Muka</th>
					  <th>Sisa Bayar</th>
					  <th>Status Pembayaran</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		
		
		if($this->session->userdata("key_search")=="")
		{
			$set['key_search'] = "nama_pelanggan";
			$this->session->set_userdata($set);
		}
		$where[$this->session->userdata("key_search")]  = $this->session->userdata("key"); 	

		$key = $this->session->userdata("key_search");
		$val = $this->session->userdata("key");

		$tot_hal = $this->db->query("select a.tgl_pesan, uang_muka, a.kode_pemesanan, b.alamat_pelanggan, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		 from dlmbg_pemesanan a left join dlmbg_pelanggan b on a.kode_pelanggan=b.kode_pelanggan where ".$key." like '%".$val."%' and status_pembayaran='Belum Lunas'");

		$config['base_url'] = base_url() . 'dashboard/pemesanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select a.tgl_pesan, uang_muka, a.kode_pemesanan, b.alamat_pelanggan, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		 from dlmbg_pemesanan a left join dlmbg_pelanggan b on a.kode_pelanggan=b.kode_pelanggan where ".$key." like '%".$val."%' and status_pembayaran='Belum Lunas' LIMIT ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->kode_pemesanan.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.$g->tgl_pesan.'</td>
					<td>'.$g->alamat_pelanggan.'</td>';
					$get_detail = $this->db->select("*")->join("dlmbg_jenis_transaksi","dlmbg_jenis_transaksi.kode_jenis_transaksi=dlmbg_pemesanan_detail.kode_jenis_transaksi")->get_where("dlmbg_pemesanan_detail",array("kode_pemesanan"=>$g->kode_pemesanan));
					$hasil .= "<th>";

					foreach($get_detail->result() as $gd)
					{
						$hasil .= "<li>".$gd->nama_transaksi."</li>";
					}

					$hasil .= "</th>";
					$hasil .='<td>'.number_format($g->jumlah_harga,2,",",".").'</td>
					<td>'.number_format($g->uang_muka,2,",",".").'</td>
					<td>'.number_format($g->jumlah_harga-$g->uang_muka,2,",",".").'</td>
					<td>'.$g->status_pembayaran.'</td>
					<td class="center">';

					if($this->session->userdata("level")=="admin")
					{
						$hasil .='	<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/edit/'.$g->kode_pemesanan.'" title="Edit">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pemesanan/hapus/'.$g->kode_pemesanan.'" onClick=\'return confirm("Anda yakin?");\' title="Hapus">
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>';
					}
					$hasil .='	<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/cetak/'.$g->kode_pemesanan.'" title="Cetak Kwitansi" target="_blank">
							<i class="halflings-icon file halflings-icon"></i>  
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_pembayaran($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>No. Kwitansi</th>
					  <th>No. Nota</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Bayar</th>
					  <th>Nama Pelanggan</th>
					  <th>Alamat</th>
					  <th>Jenis Transaksi</th>
					  <th>Total Harga</th>
					  <th>Jumlah Bayar</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		
		
		if($this->session->userdata("key_search")=="")
		{
			$set['key_search'] = "nama_pelanggan";
			$this->session->set_userdata($set);
		}
		$where[$this->session->userdata("key_search")]  = $this->session->userdata("key"); 	

		$key = $this->session->userdata("key_search");
		$val = $this->session->userdata("key");
			  
		$tot_hal = $this->db->query("select a.kode_pemesanan, status_pembayaran, a.kode_pembayaran, b.tgl_pesan, a.tgl_bayar, a.bayar, b.nama_pelanggan, b.alamat_pelanggan, b.jumlah_harga 
		from dlmbg_pembayaran a left join (select x.tgl_pesan, x.kode_pemesanan, y.nama_pelanggan, y.alamat_pelanggan, x.jumlah_harga, x.status_pembayaran 
		from dlmbg_pemesanan x left join dlmbg_pelanggan y on x.kode_pelanggan=y.kode_pelanggan) b on a.kode_pemesanan=b.kode_pemesanan where ".$key." like '%".$val."%'");

		$config['base_url'] = base_url() . 'dashboard/pembayaran/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select a.kode_pemesanan, status_pembayaran, a.kode_pembayaran, b.tgl_pesan, a.tgl_bayar, a.bayar, b.nama_pelanggan, b.alamat_pelanggan, b.jumlah_harga 
		from dlmbg_pembayaran a left join (select x.tgl_pesan, x.kode_pemesanan, y.nama_pelanggan, y.alamat_pelanggan, x.jumlah_harga, x.status_pembayaran 
		from dlmbg_pemesanan x left join dlmbg_pelanggan y on x.kode_pelanggan=y.kode_pelanggan) b on a.kode_pemesanan=b.kode_pemesanan where ".$key." like '%".$val."%' LIMIT ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->kode_pembayaran.'</td>
					<td>'.$g->kode_pemesanan.'</td>
					<td>'.$g->tgl_pesan.'</td>
					<td>'.$g->tgl_bayar.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.$g->alamat_pelanggan.'</td>';
					$get_detail = $this->db->select("*")->join("dlmbg_jenis_transaksi","dlmbg_jenis_transaksi.kode_jenis_transaksi=dlmbg_pemesanan_detail.kode_jenis_transaksi")->get_where("dlmbg_pemesanan_detail",array("kode_pemesanan"=>$g->kode_pemesanan));
					$hasil .= "<th>";

					foreach($get_detail->result() as $gd)
					{
						$hasil .= "<li>".$gd->nama_transaksi."</li>";
					}

					$hasil .= "</th>";
					$hasil .= '<td>'.number_format($g->jumlah_harga,2,",",".").'</td>
					<td>'.number_format($g->bayar,2,",",".").'</td>
					<td>'.$g->status_pembayaran.'</td>
					<td class="center">';
					if($this->session->userdata("level")=="admin")
					{
						$hasil .= '<a class="btn btn-info" href="'.base_url().'dashboard/pembayaran/edit/'.$g->kode_pembayaran.'/'.$g->kode_pemesanan.'" title="Edit">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pembayaran/hapus/'.$g->kode_pembayaran.'/'.$g->kode_pemesanan.'" onClick=\'return confirm("Anda yakin?");\' title="Hapus">
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>';
					}

					$hasil .='<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/cetak/'.$g->kode_pemesanan.'" title="Cetak Kwitansi" target="_blank">
							<i class="halflings-icon file halflings-icon"></i>  
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	
	public function indexs_data_blok_bangunan()
	{
		
	}
	 
	public function indexs_laporan_pemesanan($cari,$limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>No. Nota</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Selesai</th>
					  <th>Nama Pelanggan</th>
					  <th>Total Harga</th>
					  <th>Status Pembayaran</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->query("select a.tgl_pesan, a.kode_pemesanan, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		from dlmbg_pemesanan a left join dlmbg_pelanggan b on a.kode_pelanggan=b.kode_pelanggan where 
		INSTR(CONCAT(' ', tgl_pesan,' '), '".$cari."')");
		
		$config['base_url'] = base_url() . 'dashboard/pemesanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select a.tgl_pesan, a.kode_pemesanan, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		from dlmbg_pemesanan a left join dlmbg_pelanggan b on a.kode_pelanggan=b.kode_pelanggan where 
		INSTR(CONCAT(' ', tgl_pesan,' '), '".$cari."') LIMIT ".$offset.",".$limit."");
		
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->kode_pemesanan.'</td>
					<td>'.$g->tgl_pesan.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.number_format($g->jumlah_harga,2,",",".").'</td>
					<td>'.$g->status_pembayaran.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/edit/'.$g->kode_pemesanan.'" title="Edit">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/cetak/'.$g->kode_pemesanan.'" title="Cetak Kwitansi" target="_blank">
							<i class="halflings-icon file halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pemesanan/hapus/'.$g->kode_pemesanan.'" onClick=\'return confirm("Anda yakin?");\' title="Hapus">
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_laporan_pembayaran($tipe,$cari,$limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>No. Kwitansi</th>
					  <th>No. Nota</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Selesai</th>
					  <th>Tanggal Bayar</th>
					  <th>Nama Pelanggan</th>
					  <th>Total Harga</th>
					  <th>Jumlah Bayar</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->query("select x.kode_pemesanan, x.kode_pembayaran, y.tgl_pesan, x.tgl_bayar, x.bayar, y.nama_pelanggan, y.jumlah_harga 
		from dlmbg_pembayaran x left join (select a.tgl_pesan, a.kode_pemesanan, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran 
		from dlmbg_pemesanan a left join dlmbg_pelanggan b on a.kode_pelanggan=b.kode_pelanggan) y on x.kode_pemesanan=y.kode_pemesanan where 
		INSTR(CONCAT(' ', tgl_bayar,' '), '".$cari."')");
		
		$config['base_url'] = base_url() . 'dashboard/pemesanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select x.kode_pemesanan, x.kode_pembayaran, y.tgl_pesan, x.tgl_bayar, x.bayar, y.nama_pelanggan, y.jumlah_harga 
		from dlmbg_pembayaran x left join (select a.tgl_pesan, a.kode_pemesanan, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran 
		from dlmbg_pemesanan a left join dlmbg_pelanggan b on a.kode_pelanggan=b.kode_pelanggan) y on x.kode_pemesanan=y.kode_pemesanan where 
		INSTR(CONCAT(' ', tgl_bayar,' '), '".$cari."') LIMIT ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->kode_pembayaran.'</td>
					<td>'.$g->kode_pemesanan.'</td>
					<td>'.$g->tgl_pesan.'</td>
					<td>'.$g->tgl_bayar.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.number_format($g->jumlah_harga,2,",",".").'</td>
					<td>'.number_format($g->bayar,2,",",".").'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pembayaran/edit/'.$g->kode_pembayaran.'/'.$g->kode_pemesanan.'" title="Edit">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/cetak/'.$g->kode_pemesanan.'" title="Cetak Kwitansi" target="_blank">
							<i class="halflings-icon file halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pembayaran/hapus/'.$g->kode_pembayaran.'/'.$g->kode_pemesanan.'" onClick=\'return confirm("Anda yakin?");\' title="Hapus">
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		
		if($tipe=="bulanan")
		{
	
		}
		else if($tipe=="harian")
		{
			$penghasilan = $this->db->query("select sum(bayar) as total from dlmbg_pembayaran x where INSTR(CONCAT(' ', tgl_bayar,' '), '".$cari."')")->row();
			$hasil .= ' <tbody>
					<tr>
						<td colspan="8">Total Pendapatan Kotor</td>
						<td colspan="2">Rp. '.number_format($penghasilan->total,2,",",".").'</td>
					</tr>';
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sistem($limit,$offset)
	{
		$hasil="";
		$where['title']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("dlmbg_setting");

		$config['base_url'] = base_url() . 'dashboard/sistem/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like($where)->get("dlmbg_setting",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-bordered bootstrap-datatable datatable'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Setting System</th>
					<th>Type</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->title."</td>
					<td>".$h->tipe."</td>
					<td>";
			$hasil .= "<a href='".base_url()."dashboard/sistem/edit/".$h->id_setting."' class='btn btn-small'><i class='icon-edit'></i> Edit</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	
	public function getMaxKodePesanan()
	{
		$q = $this->db->query("select MAX(RIGHT(kode_pemesanan,8)) as kd_max from dlmbg_pemesanan");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "GCC".$kd;
	}
	
	public function getMaxKodePembayaran()
	{
		$q = $this->db->query("select MAX(RIGHT(kode_pembayaran,8)) as kd_max from dlmbg_pembayaran");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "PM".$kd;
	}
	
	public function getBalancedStok($kode_bahan_baku,$kurangi)
	{
		$q = $this->db->query("select stok from dlmbg_bahan_baku where kode_bahan_baku='".$kode_bahan_baku."'");
		$stok = "";
		foreach($q->result() as $d)
		{
			$stok = $d->stok-$kurangi;
		}
		return $stok;
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */