<div class="row">
    <div class="col-md-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Peminjaman Buku</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                    title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
          <form method="post" action="#">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Buku</label>

                  <div class="col-sm-10">
                  	<select name="kode_buku" class="form-control selectpicker" required="" data-live-search="true">
                  		<option value="">Pilih Buku</option>
                  		<?php if ($list_buku):?>
                  			<?php foreach ($list_buku as $lb):?>
                  				<option value="<?php echo $lb->kode_buku?>"><?php echo $lb->kode_buku?> - <?php echo $lb->judul?></option>
                  			<?php endforeach?>
                  		<?php endif?>
                  	</select>
                  </div>
                </div><br><br>
                <div class="form-group">
                	<label for="inputEmail3" class="col-sm-2 control-label">Nomor Anggota</label>
                	<div class="col-sm-10">
                  <select name="nomor_anggota" class="form-control" required="">
                  		<option value="">Pilih Anggota</option>
                  		<?php if ($list_anggota):?>
                  			<?php foreach ($list_anggota as $la):?>
                  				<option value="<?php echo $la->nomor_anggota?>"><?php echo $la->nomor_anggota?> - <?php echo $la->nama_lengkap?></option>
                  			<?php endforeach?>
                  		<?php endif?>
                  	</select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" value="Pinjam" class="btn btn-info pull-right">Pinjam</button>
              </div> 
            </form>           
        </div>
      </div>
    </div>	
</div>

<!-- Data Peminjaman -->
<div class="row">
    <div class="col-md-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Peminjaman Buku</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                    title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Kode Buku</th>
			      <th scope="col">Nomor Anggota</th>
			      <th scope="col">Tanggal Kembali</th>
			      <th scope="col">Status</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php if ($list_trx):?>
			  		<?php $i=1;?>
			  		<?php foreach ($list_trx as $lt):?>
					    <tr>
					      <th scope="row"><?php echo $i?></th>
					      <td><?php echo $lt->kode_buku?></td>
					      <td><?php echo $lt->nomor_anggota?></td>
					      <td><?php echo $lt->tanggal_kembali?></td>
					      <td><?php echo $lt->status?></td>
					      <td>
					      	<?php if ($lt->status == "Dipinjam"):?>
					      		<a href="<?php echo site_url()?>/transaksi/kembali/<?php echo $lt->id?>">Kembali</a>
					      	<?php else:?>
					      			-
					      	<?php endif?>
					      </td>
					    </tr>
					    <?php $i++;?>
					<?php endforeach?>
				<?php endif?>
			  </tbody>
			</table>           
        </div>
      </div>
    </div>	
</div>