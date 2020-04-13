<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= base_url('/assets/icon/favicon.ico'); ?>" type="image/x-icon">

    <title>Absensi : <?= $title; ?></title>

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css">    
    <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/pages/jquery-ui/jquery-ui.css') ?>">
    <?php $this->load->view('master/_meta'); ?>


  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
    <!-- Navbar -->
  <?php $data['picture'] = $users_auth['picture']; ?>
      <?php $this->load->view('master/_navbar', $data); ?>
    <!-- End Navbar -->
    <div class="pcoded-main-container">
      <div class="pcoded-wrapper">
    <!-- sidebar -->
      <?php $this->load->view('master/_sidebar') ?>
    <!-- End Sidebar -->
    <!-- content -->
      <div class="pcoded-content">
        <div class="pcoded-inner-content">

          <div class="main-body">
            <div class="page-wrapper">
            <div class="alert alert-success" style="display: none;">
		
	          </div>
              <div class="page-header">
                <div class="row align-items-end">
                  <div class="col-lg-8">
                    <div class="page-header-title">
                      <div class="d-inline">
                        <h4><?= $judul ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <div class="page-body">

              <div class="card">
                <div class="card-header">
			            <a href="<?= base_url($link . '/') ?>" class="btn btn-success pull-right" title="<?= $create ?>"><?= $create ?></a>
                  <a href="<?= base_url('Karyawan/libur') ?>" class="btn btn-outline-info modal-show" title="Atur Libur">Atur Libur</a>
                </div>
                <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="myTable" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th style="width:30px;">No Akun</th>
                        <th>NIP</th>
                        <th data-priority="1">Nama Lengkap</th>
                        <th>Waktu</th>
                        <th style="width:50px; text-align: center;" data-priority="2" >Kondisi</th>
                        <th>Kondisi Baru</th>
                        <th>Status</th>
                        <th>Operasi</th>
                      </tr>
                    </thead>
                    <tbody id="data-target">
                          
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>

            </div>
            <!-- Modal -->
            <div class="modal fade " tabindex="-1" id="modal">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                      </button>
                  </div>
                  <div class="modal-body" id="modal-body">
                    <form action="<?php echo base_url('Karyawan/set_libur');?>" method="POST">

                    <div class="form-group row">
                      <label for="nama" class="col-md-1 col-form-label">Nama</label>
                      <div class="col-sm-4">
                        <input id="nama" name="nama" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_akun" class="col-sm-1 col-form-label">No Akun</label>
                          <div class="col-sm-2">
                        <input id="no_akun" name="no_akun" class="form-control" type="text" readonly>
                      </div>
                      </div>
                      <div class="form-group row">
                        <label for="nip" class="col-sm-1 col-form-label">NIP</label>
                        <div class="col-sm-2">
                        <input type="text" id="nip" name="nip" class="form-control" readonly>
                      </div>
                      </div>
                    <div class="form-group row">
                        <label for="waktu" class="col-sm-1 col-form-label">Tanggal</label>
                        <div class="col-sm-4">
                        <input type="date" id="waktu" name="waktu" class="form-control" autocomplete="off">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="status" class="col-sm-1 col-form-label">Status</label>
                      <div class="col-sm-3">
                      <select name="status" id="status" class="form-control">
                        <option value="Libur">Libur</option>
                        <option value="Ijin">Ijin</option>
                        <option value="Alfa">Alfa</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Cuti">Cuti</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-1">
                        <input type="submit" id="simpan" name="simpan" value="simpan" class="btn btn-info">
                      </div>
                    </div>
                    </div>
                    </div> 
                    </form>
                  </div>
                  <div class="modal-footer" id="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-btn-save">Save changes</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            </div>
          </div>
        </div>
      </div>
    
    <!--  -->
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('master/_js');
  ?>
<script src="<?= base_url() ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/pages/data-table/extensions/responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?= base_url('/assets/pages/jquery-ui/jquery-ui.js') ?>"></script>
<script src="<?= base_url('/assets/pages/js/outsorsing.js') ?>"></script>
  <script>
    $(document).ready(function(){ 
      showData();
        var table = $("#myTable").DataTable({
            responsive: true,
            columnDefs: [
                {
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: -1
                }
            ]
        });

    	//function Menampilkan
	function showData() {
		$.ajax({
			type: "ajax",
			url: "<?php echo base_url($link) ?>/dataTable",
			async: false,
			dataType: "json",
      dateFormat:"d/F/Y",
			success: function(data) {
				var html = "";
				var j = 1;
				var i;
				for (i = 0; i < data.length; i++) {
					html +=
						"<tr>" +
						"<td>" +
						j++ +
						"</td>" +
						"<td>" +
						data[i].no_akun +
						"</td>" +
            "<td>" +
						data[i].nip +
						"</td>" +
            "<td>" +
						data[i].nama +
						"</td>" +
						"<td>" +
						data[i].waktu +
						"</td>" +
            "<td>" +
						data[i].kondisi +
						"</td>" +
            "<td>" +
						data[i].kondisi_baru +
						"</td>" +
						"<td>" +
						data[i].status +
						"</td>" +
            "<td>" +
						data[i].operasi +
						"</td>" +
            
						// "<td>" +
						// '<a href="<?= base_url($link . "/edit/") ?>' +
						// data[i].id +
						// ' " class="btn btn-sm btn-info btn-outline-info modal-show edit" title="Edit ' +
						// data[i].nama_lengkap +
						// '">Edit </a>' +
						// " " +
						// '<a href="<?= base_url($link . "/delete/") ?>' +
						// data[i].id +
						// '" class="btn-delete btn-sm btn btn-danger btn-outline-danger" title="' +
						// data[i].nama_lengkap +
						// '">Delete</a>' +
						// "</td>" +
						"</tr>";
				}
				$("#data-target").html(html);
			},
			error: function() {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Could not get Data from Database',
          })
			}
		});
	}
  
    })
    $(document).ready(function(){ 
        $('#nama').autocomplete({
              source: "<?php echo base_url('Karyawan/get_auto?');?>",
              select: function (event, ui) {
                    $('[name="nama"]').val(ui.item.label);
                    $('[name="no_akun"]').val(ui.item.akun);
                    $('[name="nip"]').val(ui.item.nip); 
                }
            });
    })
  </script>