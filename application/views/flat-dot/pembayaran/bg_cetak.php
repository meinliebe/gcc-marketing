
<style>
	div: {
		font-size: 18px;
	}
</style>
<div class="row">
	<div class="width: 20%" style="margin-left: 500px;">
		<table>
			<tr><td>GCC</td></tr>
			<tr><td><?php echo $kavling;?></td></tr>
			<tr><td>67</td></tr>
			<tr><td>72</td></tr>
		</table>
	</div>
	
	<div style="display: inline-block; margin: 30 10 0 50; width: 80;">
		<?php echo $no_nota; ?>
	</div>
	<div style="margin: 30 0 0 0; display: inline-block;">
		<!-- KALAU MAU QR_CODE PAKAI INI -->
		<img src="<?php echo base_url();?>index.php/dashboard/pembayaran/qr_code/<?php echo $barcode;?>">
	</div>
	<div style="margin: 0 0 0 0">
		<table style="margin: 0 0 0 150">
			<tr>
				<td><?php echo $nama; ?></td>
			</tr>
			<tr>
				<td><?php echo $terbilang; ?></td>
			</tr>
			<tr>
				<td>Cash satu unit rumah pelunasan pada <?php echo $tgl_pesan; ?></td>
			</tr>
		</table>
	</div>
	<div style="margin: 30 0 0 350">
		<?php echo $tgl_kwitansi; ?>
	</div>
	<div style="margin: 30 0 0 80">
		<?php echo $jumlah_harga;?>
	</div>
	<div style="margin: 30 0 0 350">
		<?php echo $petugas; ?>
	</div>
	

	<!-- KALAU MAU BARCODE EAN13 PAKAI INI -->
	<!-- <img src="<?php echo base_url();?>index.php/dashboard/pembayaran/barcode_ean13/<?php echo $barcode;?>"> -->
</div>
