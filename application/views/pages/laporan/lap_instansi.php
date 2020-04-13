    <link rel="stylesheet" type="text/css" href="<?= base_url('/bower_components/bootstrap/css/bootstrap.min.css') ?>">

    <?php
 // $tgl_terakhir = date('t', strtotime(date($get_tanggal)));
    $tgl_terakhir = date('t', strtotime(date($getBulan))); ?>
    <?php
    echo "<h4 class='text-center'>$judul</h4>";
    echo "<h5 class='text-center'>$instansi</h5>";

    echo "Bulan : " . date('F', strtotime(date($getBulan)));;
    echo "<table border='1' width='100%' style='font-size:10px;'>
			<tr>
				<td align=center width=2% rowspan='2'>No</td>
				<td align=center width=10% rowspan='2'>Nama</td>
				<td rowspan='2' width=3%></td>
				<td align=center width=55% colspan='$tgl_terakhir'>Tanggal</td>
				<td align=center width=30% colspan='5'>Ket</td>
			</tr>
			<tr>";
    for ($i = 1; $i <= $tgl_terakhir; $i++) {
      echo "<td align=center width=3%>$i</td>";
    }
    echo "<td width=2% align=center>S</td>
				<td width=2% align=center>I</td>
				<td width=2% align=center>C</td>
				<td width=2% align=center>A</td>
				<td width=2% align=center>H</td>
			";
    echo "</tr>";
    //Colom 
    $i = 1;
    foreach ($count as $key => $value) :
      echo "<tbody>";
      echo "<tr>";
      echo "<td align=center rowspan='2'>";
      echo $i;
      echo "</td>";
      echo "<td align=left rowspan='2'>";
      echo $value->nama_lengkap;
      echo "</td>";
      echo "<td align=center>$in</td>";
      foreach ($join as $row) {
        if ($value->no_akun == $row->no_akun) {
          if (date('H', strtotime(date($row->waktu))) <= 12 && $row->status != null) {
            echo "<td align=center style='background: #E07171;'>$row->status</td>";
          }
          if ($row->kondisi == "C/In") {
            echo "<td align=center>";
            echo date('H:i', strtotime(date($row->waktu)));
            echo "</td>";
          }
        }
      }
      echo "<td align=center rowspan='2'>$value->sakit</td>";
      echo "<td align=center rowspan='2'>$value->ijin</td>";
      echo "<td align=center rowspan='2'>$value->cuti</td>";
      echo "<td align=center rowspan='2'>$value->alfa</td>";
      echo "<td align=center rowspan='2'>$value->cek_in</td>";
      $i++;
      echo "</tr>";
      echo "<tr>";
      echo "<td align=center>$out</td>";
      foreach ($join as $row) {
        if ($value->no_akun == $row->no_akun) {
          if (date('H', strtotime(date($row->waktu))) >= 12 && $row->status != null) {
            echo "<td align=center style='background: #E07171;'>$row->status</td>";
          }
          if ($row->kondisi == "C/Out") {
            echo "<td align=center>";
            echo date('H:i', strtotime(date($row->waktu)));
            echo "</td>";
          }
        }
      }
      echo "</tr>";
      echo "</tbody>";
    endforeach;
    echo "</table>";
    ?> 