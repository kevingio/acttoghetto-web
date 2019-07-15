$(document).ready(function () {
    var $page = $('#transaction-recap-page');

    var transactionRecapPage = {
        dtTable: {},
        init: function () {
            this.initDatatable();
            this.customFunction();
        },
        customFunction: function () {
            let self = this;
            let dataId = null
            $(document).on('click', '.btn-admin-transactions', function () {
                dataId = $(this).attr('data-id')
                let status = $(this).attr('status')
                let isPaid = $(this).attr('is-paid')
                let transactionNumber = $(this).attr('transaction-number')
                let proofImage = $(this).attr('proof')
                $('select[name=status]').val(status)
                $('select[name=is_paid]').val(isPaid)
                $('#transactionNumber').text(transactionNumber)
                if (proofImage != '') {
                    $('#previewImage').attr('src', proofImage)
                    $('#transactionProofSection').show()
                } else {
                    $('#transactionProofSection').hide()
                }
                $('#adminModalTransactions').modal('show');
            })

            $(document).on('submit', '#form-edit-status-transaction', function (e) {
                e.preventDefault()
                var data = $(this).serializeArray();
				$.ajax({
					url: "/admin/transaction/" + dataId,
					data: data,
					type: 'PUT',
					success: function(response) {
						transactionRecapPage.dtTable.ajax.reload(null, false);
                        $('#adminModalTransactions').modal('hide');
                        swal({
                            title: "Berhasil!",
                            text: "Status Pesan Berhasil diubah",
                            icon: "success"
                        });
					}
				});
            })
        },
        initDatatable: function () {
            var $table = $page.find('#transactionRecapDatatable');
            transactionRecapPage.dtTable = $table.DataTable({
                "aaSorting": [],
                "pageLength": 5,
                "processing": true,
                "serverSide": true,
                "searching": true,
                "lengthChange": false,
                "oLanguage": {
                    "sSearch": "Cari Nomor Transaksi"
                },
                "columns": [
                    { data: 'number', name: 'number' },
                    { data: 'total', name: 'total' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'status', name: 'status' },
                    { data: 'is_paid', name: 'is_paid' },
                    { data: 'action', name: 'action' },
                ],
                "ajax": {
                    url: "/admin/ajax/transaction",
                    type: "POST",
                    data: function (d) { d.mode = 'datatable'; }
                },
                "columnDefs": [
                    { targets: 'no-sort', orderable: false },
                    { targets: 'no-search', searchable: false },
                    { targets: 'text-center', className: 'text-center' },
                ]
            });
        }
    };

    if ($page.length) {
        transactionRecapPage.init();
    }
});
