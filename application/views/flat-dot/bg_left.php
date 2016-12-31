<div id="sidebar-left" class="span1">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="<?php echo $mark_dashboard; ?>"><a href="<?php echo base_url(); ?>"><i class="fa-icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
			<li class="<?php echo $mark_pelanggan; ?>"><a href="<?php echo base_url(); ?>dashboard/pelanggan"><i class="fa-icon-hdd"></i><span class="hidden-tablet"> Data Konsumen</span></a></li>
			<?php if($this->session->userdata("level")=="admin"){?>
			<li class="<?php echo $mark_user; ?>"><a href="<?php echo base_url(); ?>dashboard/pengguna"><i class="fa-icon-tasks"></i><span class="hidden-tablet"> Data Pengguna</span></a></li>
			<?php } ?>
			<li class="<?php echo $mark_pemesanan; ?>"><a href="<?php echo base_url(); ?>dashboard/pemesanan"><i class="fa-icon-list-alt"></i><span class="hidden-tablet"> Cetak Kwitansi</span></a></li>
			<li class="<?php echo $mark_pembayaran; ?>"><a href="<?php echo base_url(); ?>dashboard/pembayaran"><i class="fa-icon-align-justify"></i><span class="hidden-tablet"> Data Pelunasan</span></a></li>
			<li class="<?php echo $mark_jenis_transaksi; ?>"><a href="<?php echo base_url(); ?>dashboard/jenis_transaksi"><i class="fa-icon-calendar"></i><span class="hidden-tablet"> Jenis Transaksi</span></a></li>
			<li class="<?php echo $mark_jenis_satuan; ?>"><a href="<?php echo base_url(); ?>dashboard/satuan"><i class="fa-icon-file"></i><span class="hidden-tablet"> Jenis Satuan</span></a></li>
		</ul>
	</div>
</div>