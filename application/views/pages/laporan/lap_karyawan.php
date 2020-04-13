    <link rel="stylesheet" type="text/css" href="<?= base_url('/bower_components/bootstrap/css/bootstrap.min.css') ?>">
    <?php
    echo "<h4 class='text-center'>$judul</h4>";
    echo "<h5 class='text-center text-uppercase'>$instansi</h5>";
    ?>

    <table border='1' width='100%' style='font-size:10px;'>
        <tr>
            <th class='text-uppercase' align=center width=2%><strong>No</strong></th>
            <th class='text-uppercase' align=center width=10%><b><?= $namalengkap ?></b></th>
            <th class='text-uppercase' align=center width=10%><b><?= $ttl ?></b></th>
            <th class='text-uppercase' align=center width=10%><b><?= $nik ?></b></th>
            <th class='text-uppercase' align=center width=10%><b><?= $alamat ?></b></th>
            <th class='text-uppercase' align=center width=10%><b><?= $cv ?></b></th>
            <th class='text-uppercase' align=center width=10%><b><?= $divisi ?></b></th>
        </tr>
        <?php $i = 1;
        foreach ($PerInstansi as $row) { ?>
        <tr>
            <td align=center><?= $i ?></td>
            <td><?= $row->nama_lengkap ?></td>
            <td><?= $row->tmpt_lahir . ', ' . date('d-m-Y', strtotime(date($row->tgl_lahir))) ?></td>
            <td><?= $row->nip ?></td>
            <td><?= $row->alamat ?></td>
            <td><?= $row->nama ?></td>
            <td class='text-uppercase'><?= $row->divisi ?></td>
        </tr>
        <?php 
        $i++;
      } ?>
    </table> 