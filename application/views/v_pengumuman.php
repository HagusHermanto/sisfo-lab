<div class="col-lg-12 text-center">
	<h2>Pengumuman</h2><br>
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-primary">
			<?php foreach ($pengumuman as $key => $value) { ?>
				<div class="panel-heading">
				</div>
				<div class="panel-body">
					<h4><b><?= $value->judul_pengumuman ?></b></h4>
					<p><?= $value->isi_pengumuman ?></p>
				</div>
				<div class="panel-footer">
					<?= $value->tgl ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>