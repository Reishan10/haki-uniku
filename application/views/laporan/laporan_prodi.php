<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title_pdf; ?></title>
	<style>
		#table {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#table td,
		#table th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#table tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#table tr:hover {
			background-color: #ddd;
		}

		#table th {
			padding-top: 10px;
			padding-bottom: 10px;
			text-align: left;
			background-color: #000000;
			color: white;
		}
	</style>
</head>

<body>
	<div style="text-align:center">
		<h3>Laporan Permohonan</h3>
	</div>
	<table id="table">
		<thead>
			<tr>
				<th>No.</th>
				<th>Judul</th>
				<th>Jenis</th>
				<th>Subjenis</th>
				<th>Prodi</th>
				<th>Status</th>
				<th>User</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($data_permohonan as $row) : ?>
				<tr>
					<td scope="row"><?= $no++; ?></td>
					<td><?= $row->permohonan_judul; ?></td>
					<td><?= $row->nama_jenis_permohonan; ?></td>
					<td><?= $row->nama_subjenis; ?></td>
					<td><?= $row->prodi; ?></td>
					<td><?= $row->permohonan_status == '0' ? 'Pending' : 'Diterima' ?></td>
					<td><?= $row->nama_user; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>

</html>
