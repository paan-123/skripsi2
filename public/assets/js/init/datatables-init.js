(function ($) {
	//    "use strict";


	/*  Data Table
	-------------*/




	$('#bootstrap-data-table').DataTable({
		lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
	});

	$('#bootstrap-data-transaksi').DataTable({
		order: [[2, 'asc']],
		rowGroup: {
			dataSrc: 0
		}

	});

	// $('#bootstrap-data-table2').DataTable({
	// 	lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
	// });
	var max_tab_table = 10
	for (let x of Array(max_tab_table).keys()) {
		slc = '#bootstrap-data-table' + (x + 2)

		try {
			$(slc).DataTable({
				lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
			});
		} catch (err) {
			console.log(err)
		}
	}

	$('#bootstrap-data-table-export').DataTable({
		dom: 'lBfrtip',
		lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});

	$('#row-select').DataTable({
		initComplete: function () {
			this.api().columns().every(function () {
				var column = this;
				var select = $('<select class="form-control"><option value=""></option></select>')
					.appendTo($(column.footer()).empty())
					.on('change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
					});

				column.data().unique().sort().each(function (d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		},
		"autoWidth": false
	});






})(jQuery);