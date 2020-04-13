<html>
<head>
	<title>Form Import</title>
	
	<!-- Load File jquery.min.js yang ada difolder js -->
	<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/r-2.2.2/datatables.min.css"/>
 
	<script>

	$(document).ready(function(){
		// Sembunyikan alert validasi kosong
		$("#kosong").hide();
	});
	</script>
</head>
<body>
<h3>Form Import</h3>
	<hr>

	<form method="post" action="<?= base_url('index.php/Absensi/form') ?>" enctype="multipart/form-data">
		<!--- Buat sebuah input type file
		class pull-left berfungsi agar file input berada di sebelah kiri
		-->
		<input type="file" name="file">
		
		<!--- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
		-->
		<input type="submit" name="preview" value="Preview">
	</form>

	<?php
if (isset($_POST['preview'])) {
  if (isset($upload_error)) {
    echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
    die;
  }
  echo "<form method='post' action='" . base_url("index.php/Absensi/import") . "'>";

  echo "<div style='color: red;' id='kosong'>
			Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
			</div>";

  echo "<table id='myTable' class='display' border='1' cellpadding='5'>
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
					</tr>";

  echo "</thead>";

  $numrow = 1;
  $kosong = 0;

  echo "<tbody>";
  $i = 0;
  foreach ($sheet as $row) {
    $no_akun = $row['A'];
    $nama = $row['B'];
    $waktu = $row['C'];
    $kondisi = $row['D'];
    $kondisi_baru = $row['E'];
    $status = $row['F'];
    $operasi = $row['G'];

    if (empty($no_akun) && empty($nama) && empty($waktu) && empty($kondisi)) continue;

    if ($numrow > 1) {
      $no_akun_td = (!empty($no_akun)) ? "" : "style='background: #E07171;'";
      $nama_td = (!empty($nama)) ? "" : " style='background: #E07171;'";
      $waktu_td = (!empty($waktu)) ? "" : "style='background: #E07171;'";
      $kondisi_td = (!empty($kondisi)) ? "" : "style='background: #E07171;'";

      if (empty($no_akun) or empty($nama) or empty($waktu) or empty($kondisi)) {
        $kosong++;
      }
      ?>
						
							<tr>
								<td><?= $i ?></td>
								<td<?= $no_akun_td; ?>> <?= $no_akun ?></td>
								<td<?= $nama_td; ?>><?= $nama ?></td>
								<td<?= $waktu_td; ?>><?= $waktu ?></td>
								<td<?= $kondisi_td; ?>><?= $kondisi ?></td>
								<td><?= $kondisi_baru ?></td>
								<td><?= $status ?></td>
								<td><?= $operasi ?></td>
							</tr>
				<?php	
  }
  $numrow++;
  $i++;
}
echo "</tbody>";
echo "</table>";

if ($kosong > 0) {
  ?>
					<script>
						$(document).ready(function(){
							// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
							$("#jumlah_kosong").html('<?php echo $kosong; ?>');
							
							$("#kosong").show(); // Munculkan alert validasi kosong
						});
				</script>
				<?php

  } else {
    echo "<hr>";
			
				// Buat sebuah tombol untuk mengimport data ke database
    echo "<button type='submit' name='import'>Import</button>";
    echo "<a href='" . base_url("index.php/Absensi") . "'>Cancel</a>";
  }

  echo "</form>";
}
?>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/r-2.2.2/datatables.min.js"></script>


	<script type="text/javascript">
	$(document).ready( function () {
	    $('#myTable').DataTable({
	    	"searching": false,
	    });
	} );
</script>
</body>
</html>