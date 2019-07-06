$(document).ready(function () {
    var $page = $('#my-transactions-page');

    var myTransactionsPage = {
        dtTable: {},
        init: function () {
            this.initDatatable();
            this.customFunction();
        },
        customFunction: function () {
            var data_id = null;

            $(document).on('click', '.edit', function () {
                data_id = $(this).attr('data-id');
                $.get('inventory/' + data_id)
                    .done(function (response) {
                        $('#edit-record-form input[name=name]').val(response.name);
                        $('#edit-record-form select[name=inventory_model_id]').val(response.inventory_model_id).trigger('change');
                        $('#edit-record-form input[name=qty]').val(response.qty);
                        $('#edit-record-form input[name=min_stock]').val(response.min_stock);
                        $('#editModal').modal('show');
                    });
            });

            $('#edit-record-form').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('_method', 'PATCH');
                $.ajax({
                    url: "/inventory/" + data_id,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: (response) => {
                        $(this).find("input, textarea").val('');
                        $('button.close').click();
                        myTransactionsPage.dtTable.ajax.reload(null, false);
                        swal(
                            "Success!",
                            "Data has been edited!",
                            "success"
                        );
                    },
                    error: function (response) {
                        swal(
                            "Oops!",
                            "Something went wrong, please refresh the page!",
                            "error"
                        );
                    }
                });
            });
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
