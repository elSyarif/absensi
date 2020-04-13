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
			            <a href="<?= base_url($title . '/create') ?>" class="btn btn-success pull-right modal-show" title="<?= $create ?>"><?= $create ?></a>
                </div>
                <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="myTable" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th style="width:30px;">#</th>
                        <th data-priority="1">Nama Instansi</th>
                        <th>Alamat</th>
                        <!-- <th data-breakpoints="xs">Job Title</th> -->
                        <th>Telphone</th>
                        <th style="width:50px; text-align: center;" data-priority="2" >Action</th>
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

<script src="<?= base_url('/assets/pages/js/outsorsing.js') ?>"></script>

<script>
  $(document).ready(function() {
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
    $('input').change(function(){
      $(this),parent().parent().removeClass('has-danger');
      $(this).next().empty();
    });
    $('select').change(function(){
      $(this),parent().parent().removeClass('has-danger');
      $(this).next().empty();
    });

  // menampilkan Mdoal
	$('body').on('click','.modal-show',function(event){
		event.preventDefault();

		var me = $(this),
				url = me.attr('href'),
				title =me.attr('title');

    $('.form-control').removeClass('has-danger');
    $('.messages').empty();

		$('#modal-title').text(title);
		$('#modal-btn-save').removeClass('hide')
    .text(me.hasClass('edit') ? 'Update' : 'Create');

		$.ajax({
			url:url,
			dataType: 'html',
			success: function(response){
				$('#modal-body').html(response);
			}
		})
		$('#modal').modal('show');
	});

  // funsi simpan dan update
$('#modal-btn-save').click(function(event){
		event.preventDefault();

    var form = $('#modal-body form'),
				url = form.attr('action'),
				method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    $.ajax({
      url:url,
    	method:method,
    	data : form.serialize(),
      dataType:"JSON",
    	success:function(data){
        if(data.status){
            $('#modal').modal('hide');
            showData();
            Swal.fire(
              'Berhasil Simpan',
              'Data Berhasil disimpan!',
              'success'
            )
        }else
            {
              for (var i = 0; i < data.inputerror.length; i++) 
              {
                  $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-danger'); //select parent twice to select div form-group class and add has-error class
                  $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
              }
            }
      },
        error: function (jqXHR, textStatus, errorThrown)
          {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Error adding / update data',
              })
          }
    })
});
// DELETE
$('body').on('click', '.btn-delete', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

        Swal.fire({
            title: 'Are you sure want to delete ' + title + ' ?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                success: function (data) {
                    showData();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                },error: function (jqXHR, textStatus, errorThrown)
                  {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Data Gagal Terhapus!',
                      })
                  }
            
          })
        }
      })    
  });
	//function Menampilkan
	function showData() {
		$.ajax({
			type: "ajax",
			url: "<?php echo base_url() ?>outsorsing/dataTable",
			async: false,
			dataType: "json",
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
						data[i].nama +
						"</td>" +
						"<td>" +
						data[i].alamat +
						"</td>" +
						"<td>" +
						data[i].no_telp +
						"</td>" +
						"<td>" +
						'<a href="<?= base_url("Outsorsing/edit/") ?>' +
						data[i].id +
						' " class="btn btn-sm btn-info btn-outline-info modal-show edit" title="Edit ' +
						data[i].nama +
						'">Edit </a>' +
						" " +
						'<a href="<?= base_url("Outsorsing/delete/") ?>' +
						data[i].id +
						'" class="btn-delete btn-sm btn btn-danger btn-outline-danger" title="' +
						data[i].nama +
						'">Delete</a>' +
						"</td>" +
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
});

</script>