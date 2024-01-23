<div class="col-lg-12 text-center">
	<h2>Download Modul</h2><br>
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
								<th class="text-center">Keterangan File</th>
								<th class="text-center" width="100px">Download</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($download as $key => $value) { ?>


								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td><?= $value->ket_file ?></td>
									<td class="text-center"><a href="<?= base_url('file/' . $value->file); ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a></td>
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