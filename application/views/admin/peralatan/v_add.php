<div class="col-lg-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Add Data
		</div>
		<div class="panel-body">
			<?php

			if (isset($error_upload)) {
				echo '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
			}


			echo form_open_multipart('peralatan/add');
			?>

			<div class="form-group">
				<label>Nama Barang</label>
				<input class="form-control" type="text" name="nama" placeholder="Nama Barang" required>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Jenis Barang</label>
						<input class="form-control" type="text" name="jenis" placeholder="Jenis Barang" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Kondisi</label>
						<select name="kondisi" class="form-control">
							<option value="">--Pilih Kondisi--</option>
							<option value="Baik">Baik</option>
							<option value="Rusak">Rusak</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Banyak Barang</label>
						<input class="form-control" type="text" name="banyak" placeholder="Banyak Barang" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Kode Barang</label>
						<input class="form-control" type="text" name="kode" placeholder="Kode Barang" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Tanggal Pembelian</label>
						<input class="form-control" type="date" id="tanggal_pembelian" name="tanggal_pembelian" min="2020-01-01" max="2030-12-31" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Harga</label>
						<input class="form-control" type="text" name="harga" placeholder="Harga" required>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Foto</label>
				<input type="file" class="form-control" type="text" name="foto_peralatan" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Simpan</button>
				<button type="reset" class="btn btn-success">Reset</button>
			</div>


			<?php echo form_close(); ?>
		</div>
	</div>