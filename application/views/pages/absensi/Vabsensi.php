<html>
<head>
	<title>IMPORT EXCEL ABSENSI</title>
</head>
<body>
	<h1>Data Absensi</h1><hr>
	<a href="<?php echo base_url("index.php/Absensi/form"); ?>">Import Data</a><br><br>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/r-2.2.2/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/r-2.2.2/datatables.min.js"></script>

 	<div class="row">
	<div class="col-md-8">
	<table id="myTable" border="1" cellpadding="8">
	<thead>
	<tr>
		<th>#</th>
		<th>No Akun</th>
		<th>Nama Lengkap</th>
		<th>Waktu</th>
		<th>Kondisi</th>
		<th>Kondisi Baru</th>
		<th>Status</th>
		<th>Operasi</th>
	</tr>
	</thead>
	<?php
	echo "<tbody>";
	$i=1;
	if( ! empty($Absensi)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
		foreach($Absensi as $data){ // Lakukan looping pada variabel siswa dari controller
			
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$data->no_akun."</td>";
			echo "<td>".$data->nama."</td>";
			echo "<td>".$data->waktu."</td>";
			echo "<td>".$data->kondisi."</td>";
			echo "<td>".$data->kondisi_baru."</td>";
			echo "<td>".$data->status."</td>";
			echo "<td>".$data->operasi."</td>";
			echo "</tr>";
			
			$i++;
		}
	}
	echo "</tbody>";
	?>
	</table>

</div>
</div>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#myTable').DataTable({
	    	responsive: true,
	    	 "searching": false,
	    	 "ordering": false,
	    });
	} );
</script>
</body>
</html>
