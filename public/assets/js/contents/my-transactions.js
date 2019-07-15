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

            $(document).on('click', '.btn-upload', function () {
                let dataId = $(this).attr('data-id')
                $('#previewImage').attr('src', 'https://dummyimage.com/200x100/ffffff/fff');
                $('#form-upload-proof').attr('action', '/transaction/' + dataId + '/upload')
                $('#modalUpload').modal('show');
            })

            $(document).on('click', '.close', function () {
                $('#modalUpload').modal('hide');
            })
        },
        readURL: function (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    if(e.target.result) {
                        $('#previewImage').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        },
        initDatatable: function () {
            var $table = $page.find('#transactionDatatable');
            myTransactionsPage.dtTable = $table.DataTable({
                "aaSorting": [],
                "pageLength": 5,
                "processing": true,
                "serverSide": true,
                "searching": true,
                "lengthChange": false,
                "oLanguage": {
                    "sSearch": "Cari Nomor Transaksi"
                },
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
