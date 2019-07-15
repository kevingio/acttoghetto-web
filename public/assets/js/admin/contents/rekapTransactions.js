$(document).ready(function () {
    var $page = $('#rekapTransactionsPage');

    var rekapTransactionsPage = {
        dtTable: {},
        init: function () {
            this.initDatatable();
            this.customFunction();
        },
        customFunction: function () {
            let self = this; 

            $(document).on('click', '.btn-admin-transactions', function () {
                let dataId = $(this).attr('data-id')
                $('#adminModalTransactions').modal('show');
            })
            
            $(document).on('click', '.close', function () {
                $('#adminModalTransactions').modal('hide');
            })

            $(document).on('click', '.btn-save-change-transaction-admin', function () {
                // $.ajax({
                //     url: "",
                //     type: "POST",
                //     data: ,
                //     contentType: false,
                //     cache: false,
                //     processData: false,
                //     success: function (response) {
                //         $(this).find("").val('');
                //         $('#adminModalTransactions').modal('hide');
                //         swal({
                //             title: "Success!",
                //             text: "Status Pesan Berhasil Dirubah",
                //             icon: "success"
                //         });
                //     },
                //     error: function (response) {
                //         if (typeof response.responseJSON.errors.file !== 'undefined') {
                //             var error = response.responseJSON.errors.file[0]
                //             $('#error_message').text(error);
                //         }
                //     }
                // });
            })
        },
        initDatatable: function () {
            var $table = $page.find('#rekapTransactionDataTable');
            
            rekapTransactionsPage.dtTable = $table.DataTable({
                "aaSorting": [],
                // "processing": true,
                // "serverSide": true,
                "searching": true,
                "lengthChange": true,
                "responsive": true,
                "columns": [
                    { data: 'number', name: 'number' },
                    { data: 'total', name: 'total' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'status', name: 'status' },
                    { data: 'is_paid', name: 'is_paid' },
                    { data: 'updated_at', name: 'updated_at' },
                ],
                // "ajax": {
                //     url: "/ajax/transaction",
                //     type: "POST",
                //     data: function (d) { d.mode = 'datatable'; }
                // },
                "columnDefs": [
                    { targets: 'no-sort', orderable: false },
                    { targets: 'no-search', searchable: false },
                    { targets: 'text-center', className: 'text-center' },
                ]
            });
        }
    };

    if ($page.length) {
        rekapTransactionsPage.init();
    }
});
