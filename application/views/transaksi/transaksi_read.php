<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Transaksi Read</h2>
        <table class="table">
	    <tr><td>Kode Buku</td><td><?php echo $kode_buku; ?></td></tr>
	    <tr><td>Nomor Anggota</td><td><?php echo $nomor_anggota; ?></td></tr>
	    <tr><td>Tanggal Pinjam</td><td><?php echo $tanggal_pinjam; ?></td></tr>
	    <tr><td>Tanggal Kembali</td><td><?php echo $tanggal_kembali; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Denda</td><td><?php echo $denda; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>