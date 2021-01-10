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
        <h2 style="margin-top:0px">Transaksi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode Buku <?php echo form_error('kode_buku') ?></label>
            <input type="text" class="form-control" name="kode_buku" id="kode_buku" placeholder="Kode Buku" value="<?php echo $kode_buku; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nomor Anggota <?php echo form_error('nomor_anggota') ?></label>
            <input type="text" class="form-control" name="nomor_anggota" id="nomor_anggota" placeholder="Nomor Anggota" value="<?php echo $nomor_anggota; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Pinjam <?php echo form_error('tanggal_pinjam') ?></label>
            <input type="text" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" placeholder="Tanggal Pinjam" value="<?php echo $tanggal_pinjam; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Kembali <?php echo form_error('tanggal_kembali') ?></label>
            <input type="text" class="form-control" name="tanggal_kembali" id="tanggal_kembali" placeholder="Tanggal Kembali" value="<?php echo $tanggal_kembali; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Denda <?php echo form_error('denda') ?></label>
            <input type="text" class="form-control" name="denda" id="denda" placeholder="Denda" value="<?php echo $denda; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>