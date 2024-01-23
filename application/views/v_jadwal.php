<div class="col-lg-12 text-center">
	<h2>Jadwal Praktikum</h2><br>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th class="text-center" width="50px">No</th>
								<th class="text-center">Mata Kuliah</th>
								<th class="text-center">Hari</th>
								<th class="text-center">Jam</th>
								<th class="text-center">SKS</th>
								<th class="text-center">Semester</th>
								<th class="text-center">Nama Lab</th>
								<th class="text-center">Dosen</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($download as $key => $value) { ?>


								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td><?= $value->nama_mk ?></td>
									<td><?= $value->hari ?></td>
									<td><?= $value->jam ?></td>
									<td><?= $value->sks ?></td>
									<td><?= $value->semester ?></td>
									<td><?= $value->nama_lab ?></td>
									<td><?= $value->dosen ?></td>

								</tr>

							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>