<div class="col-lg-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add</button>
		</div>
		<div class="panel-body">
			<?php

			if ($this->session->flashdata('pesan')) {
				echo '<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				echo $this->session->flashdata('pesan');
				echo '</div>';
			}

			?>
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>No</th>
						<th>Mata Kuliah</th>
						<th>Hari</th>
						<th>Jam</th>
						<th>SKS</th>
						<th>Semester</th>
						<th>Nama Lab</th>
						<th>Dosen</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($jadwal as $key => $value) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $value->nama_mk ?></td>
							<td><?= $value->hari ?></td>
							<td><?= $value->jam ?></td>
							<td><?= $value->sks ?></td>
							<td><?= $value->semester ?></td>
							<td><?= $value->nama_lab ?></td>
							<td><?= $value->dosen ?></td>
							<td>
								<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#edit<?= $value->id_jadwal ?>"><i class="fa fa-pencil"></i> Edit</button>
								<a href="<?= base_url('jadwal/delete/' . $value->id_jadwal) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus..?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>

			</table>

		</div>
	</div>
</div>





<!-- Modal Add -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Add Jadwal Praktikum</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('jadwal/add'); ?>
				<div class="form-group">
					<label>Mata Kuliah</label>
					<input class="form-control" type="text" name="nama_mk" placeholder="Mata Kuliah" required>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Hari</label>
							<select name="hari" class="form-control">
								<option value="">--Pilih Hari--</option>
								<option value="Senin">Senin</option>
								<option value="Selasa">Selasa</option>
								<option value="Rabu">Rabu</option>
								<option value="Kamis">Kamis</option>
								<option value="Jumat">Jumat</option>
								<option value="Sabtu">Sabtu</option>
								<option value="Minggu">Minggu</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Jam</label>
							<input class="form-control" type="time" name="jam" min="06:00" max="18:00" required>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>SKS</label>
							<select name="sks" class="form-control">
								<option value="">--Pilih SKS--</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
							</select>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<label>Semester</label>
							<select name="semester" class="form-control">
								<option value="">--Pilih Semester--</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label> Nama Lab</label>
					<select name="nama_lab" class="form-control">
						<option value="">--Pilih Lab--</option>
						<option value="Jaringan Komputer">Jaringan Komputer</option>
						<option value="Embeded System">Embeded System</option>
						<option value="Multimedia">Multimedia</option>
						<option value="Komputasi">Komputasi</option>
					</select>
				</div>
				<div class="form-group">
					<label>Dosen</label>
					<input class="form-control" type="text" name="dosen" placeholder="Dosen" required>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
			<?php echo form_close(); ?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal edit -->
<?php foreach ($jadwal as $key => $value) { ?>
	<div class="modal fade" id="edit<?= $value->id_jadwal ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Edit Jadwal Praktikum</h4>
				</div>
				<div class="modal-body">
					<?php echo form_open_multipart('jadwal/edit/' . $value->id_jadwal); ?>
					<div class="form-group">
						<label>Mata Kuliah</label>
						<input class="form-control" type="text" name="nama_mk" value="<?= $value->nama_mk ?>" placeholder="Mata Kuliah" required>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Hari</label>
								<select name="hari" class="form-control">
									<option value="<?= $value->hari ?>"><?= $value->hari ?></option>
									<option value="Senin">Senin</option>
									<option value="Selasa">Selasa</option>
									<option value="Rabu">Rabu</option>
									<option value="Kamis">Kamis</option>
									<option value="Jumat">Jumat</option>
									<option value="Sabtu">Sabtu</option>
									<option value="Minggu">Minggu</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Jam</label>
								<input class="form-control" type="time" name="jam" min="06:00" max="18:00" value="<?= $value->jam ?>" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>SKS</label>
								<select name="sks" class="form-control">
									<option value="<?= $value->sks ?>"><?= $value->sks ?></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label>Semester</label>
								<select name="semester" class="form-control">
									<option value="<?= $value->semester ?>"><?= $value->semester ?></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label> Nama Lab</label>
						<select name="nama_lab" class="form-control">
							<option value="<?= $value->nama_lab ?>"><?= $value->nama_lab ?></option>
							<option value="Jaringan Komputer">Jaringan Komputer</option>
							<option value="Embeded System">Embeded System</option>
							<option value="Multimedia">Multimedia</option>
							<option value="Komputasi">Komputasi</option>
						</select>
					</div>
					<div class="form-group">
						<label>Dosen</label>
						<input class="form-control" type="text" name="dosen" placeholder="Dosen" value="<?= $value->dosen ?>" required>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
				<?php echo form_close(); ?>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>