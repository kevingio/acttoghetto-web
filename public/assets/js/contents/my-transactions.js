$(document).ready(function () {
    var $page = $('#my-transactions-page');

    var myTransactionsPage = {
        dtTable: {},
        init: function () {
            this.initDatatable();
            this.customFunction();
        },
        customFunction: function () {
            let self = this;
            $("#imageUpload").on('change', function () {
                self.readURL(this);
            });
        },
        readURL: function (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#previewImage').attr('src', e.target.result);
                }
            }
        },
        initDatatable: function () {
            $table = $page.find('#transactionDatatable');
            myTransactionsPage.dtTable = $table.DataTable({
                "aaSorting": [],
                "processing": true,
                "serverSide": true,
                "searching": false,
                "lengthChange": false,
                "responsive": true,
                "ajax": {
                    url: "/ajax/transaction",
                    type: "POST",
                    data: function (d) { d.mode = 'datatable'; }
                },
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
        myTransactionsPage.init();
    }
});
