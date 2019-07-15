$(document).ready(function () {
    var $page = $('#adminCategoryPage');

    var adminCategoryPage = {
        dtTable: {},
        init: function () {
            this.initDatatable();
            this.customFunction();
        },
        customFunction: function () {
            let self = this;

            $(document).on('click', '.btn-admin-edit-category', function () {
                let dataId = $(this).attr('data-id')
                $('#adminModalEditCategory').modal('show');
            })

            $(document).on('click', '.btn-admin-add-category', function () {
                let dataId = $(this).attr('data-id')
                $('#adminModalAddCategory').modal('show');
            })

            $(document).on('click', '.btn-admin-delete-category', function () {
                self.deleteCategory(this);
            })

            $(document).on('click', '.close', function () {
                $('#adminModalEditCategory').modal('hide');
            })

            $(document).on('click', '.btn-save-change-category-admin', function () {
                self.editCategory(this);
            })
        },
        deleteCategory: function (input) {
            swal({
                title: "Yakin akan menghapus item?",
                text: "Item yang sudah dihapus tidak bisa di kembalikan !!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal({
                            title: "Item Berhasil Dihapus",
                            icon: "success",
                        });
                    }
                });
        },
        editCategory: function (input) {
            // $.ajax({
                //     url: "",
                //     type: "POST",
                //     data: ,
                //     contentType: false,
                //     cache: false,
                //     processData: false,
                //     success: function (response) {
                //         $(this).find("").val('');
                //         $('#adminModalCategory').modal('hide');
                //         swal({
                //             title: "Success!",
                //             text: "Kategori Berhasil Dirubah",
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
            swal({
                title: "Yakin akan menghapus item?",
                text: "Item yang sudah dihapus tidak bisa di kembalikan !!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal({
                            title: "Item Berhasil Dihapus",
                            icon: "success",
                        });
                    }
                });
        },
        addCategory: function(input) {
            $(document).on('click', '.close', function () {
                $('#adminModaAddlCategory').modal('hide');

                swal("Berhasil menambahkan item!", "success");
            })
        },
        initDatatable: function () {
            var $table = $page.find('#adminCategoryDataTable');
            adminCategoryPage.dtTable = $table.DataTable({
                // "aaSorting": [],
                // "processing": true,
                // "serverSide": true,
                "searching": true,
                "lengthChange": true,
                "responsive": true,
                "columns": [
                    { data: 'name', name: 'name' },
                    { data: 'type', name: 'type' },
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
        adminCategoryPage.init();
    }
});
