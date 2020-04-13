$(document).ready(function() {
	showData();
	var table = $("#myTable").DataTable({
		responsive: true,
		columnDefs: [
			{ responsivePriority: 1, targets: 0 },
			{ responsivePriority: 2, targets: -1 }
		]
	});

	$("input").change(function() {
		$(this),
			parent()
				.parent()
				.removeClass("has-danger");
		$(this)
			.next()
			.empty();
	});
	$("select").change(function() {
		$(this),
			parent()
				.parent()
				.removeClass("has-danger");
		$(this)
			.next()
			.empty();
	});

	// Menampilkan form ke dalam modal
	$("body").on("click", ".modal-show", function(event) {
		event.preventDefault();

		var me = $(this),
			url = me.attr("href"),
			title = me.attr("title");

		$(".form-control").removeClass("has-danger");
		$(".messages").empty();

		$("#modal-title").text(title);
		$("#modal-btn-save")
			.removeClass("hide")
			.text(me.hasClass("edit") ? "Update" : "Create");

		$.ajax({
			url: url,
			dataType: "html",
			success: function(response) {
				$("#modal-body").html(response);
			}
		});
		$("#modal").modal("show");
	});

	// funsi simpan dan update
	$("#modal-btn-save").click(function(event) {
		event.preventDefault();

		var form = $("#modal-body form"),
			url = form.attr("action"),
			method = $("input[name=_method]").val() == undefined ? "POST" : "PUT";

		$.ajax({
			url: url,
			method: method,
			data: form.serialize(),
			dataType: "JSON",
			success: function(data) {
				if (data.status) {
					$("#modal").modal("hide");
					showData();
					Swal.fire("Berhasil Simpan", "Data Berhasil disimpan!", "success");
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]')
							.parent()
							.parent()
							.addClass("has-danger"); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]')
							.next()
							.text(data.error_string[i]); //select span help-block class set text error string
					}
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert("Error adding / update data");
			}
		});
	});

	// DELETE
	$("body").on("click", ".btn-delete", function(event) {
		event.preventDefault();

		var me = $(this),
			url = me.attr("href"),
			title = me.attr("title");

		Swal.fire({
			title: "Are you sure want to delete " + title + " ?",
			text: "You won't be able to revert this!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!"
		}).then(result => {
			if (result.value) {
				$.ajax({
					url: url,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						showData();
						Swal.fire("Deleted!", "Your file has been deleted.", "success");
					},
					error: function(jqXHR, textStatus, errorThrown) {
						Swal.fire({
							type: "error",
							title: "Oops...",
							text: "Something went wrong!"
						});
					}
				});
			}
		});
	});
	//function Menampilkan
	function showData() {
		$.ajax({
			type: "ajax",
			url: "<?php echo base_url() ?>user/ajax_list",
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
						data[i].username +
						"</td>" +
						"<td>" +
						data[i].nama +
						"</td>" +
						"<td>" +
						data[i].role +
						"</td>" +
						"<td>" +
						'<a href="<?= base_url("user/edit/") ?>' +
						data[i].id +
						' " class="btn btn-sm btn-info btn-outline-info modal-show edit" title="Edit ' +
						data[i].nama +
						'">Edit </a>' +
						" " +
						'<a href="<?= base_url("user/delete/") ?>' +
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
				alert("Could not get Data from Database");
			}
		});
	}
});
