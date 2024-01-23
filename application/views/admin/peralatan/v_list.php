<div class="col-lg-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<a href="<?= base_url('peralatan/add'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
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
						<th>Nama</th>
						<th>Jenis Barang</th>
						<th>Kondisi Barang</th>
						<th>Banyak Barang</th>
						<th>Kode Barang</th>
						<th>Tanggal Pembelian</th>
						<th>Harga Barang</th>
						<th>Foto</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($peralatan as $key => $value) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $value->nama ?></td>
							<td><?= $value->jenis ?></td>
							<td><?= $value->kondisi ?></td>
							<td><?= $value->banyak ?></td>
							<td><?= $value->kode ?></td>
							<td><?= $value->tanggal_pembelian ?></td>
							<td><?= $value->harga ?></td>
							<td><img src="<?= base_url('foto_peralatan/' . $value->foto_peralatan)  ?>" width="100px"></td>
							<td>
								<a href="<?= base_url('peralatan/edit/' . $value->id_peralatan) ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
								<a href="<?= base_url('peralatan/delete/' . $value->id_peralatan) ?>" onclick="return confirm('Apakah Data Ini Akan Dihapus..?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>