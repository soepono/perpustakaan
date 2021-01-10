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
        <h2 style="margin-top:0px">Buku <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pengarang <?php echo form_error('pengarang') ?></label>
            <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Pengarang" value="<?php echo $pengarang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Penerbit <?php echo form_error('penerbit') ?></label>
            <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit" value="<?php echo $penerbit; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Katgori<?php echo form_error('katgori_id') ?></label>
            <select name="katgori_id" class="form-control">
                <option value="">Pilih Kategori</option>
                <?php if ($list_kategori):?>
                    <?php foreach ($list_kategori as $lk):?>
                        <option value="<?php echo $lk->id?>"><?php echo $lk->nama?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Kode Buku <?php echo form_error('kode_buku') ?></label>
            <input type="text" class="form-control" name="kode_buku" id="kode_buku" placeholder="Kode Buku" value="<?php echo $kode_buku; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('buku') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>