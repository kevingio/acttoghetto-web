$(document).ready(function () {
    var $page = $('#rekap-transactions-page');

    var rekapTransactionsPage = {
        dtTable: {},
        init: function () {
            this.initDatatable();
        },
        initDatatable: function () {
            var $table = $page.find('#rekapTransactionDataTable');
            rekapTransactionsPage.dtTable = $table.DataTable({
                // "aaSorting": [],
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
                ],
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
