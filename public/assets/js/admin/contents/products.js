$(document).ready(function () {
    var $page = $('#products-page');

    var productsPage = {
        dtTable: {},
        init: function () {
            this.initDatatable();
        },
        initDatatable: function () {
            var $table = $page.find('#productsDataTable');
            productsPage.dtTable = $table.DataTable({
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
        productsPage.init();
    }
});
