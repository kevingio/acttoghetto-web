$(document).ready(function () {
    var $page = $('#adminSizePage');

    var sizePage = {
        dtTable: {},
        init: function () {
            this.initDatatable();
            this.customFunction();
        },
        customFunction: function () {
            let self = this;
            let dataId = null

            $(document).on('click', '.btn-admin-edit-size', function () {
                dataId = $(this).attr('data-id')
                let name = $(this).attr('name')
                let size = $(this).attr('size')
                $('#form-edit-size input[name=name]').val(name)
                $('#form-edit-size input[name=size]').val(size)
                $('#adminModalEditSize').modal('show');
            })

            $(document).on('click', '.btn-admin-add-size', function () {
                $('#adminModalAddSize').modal('show');
            })

            $(document).on('click', '.btn-admin-delete-size', function () {
                dataId = $(this).attr('data-id')
                self.deleteSize(dataId);
            })

            $(document).on('submit', '#form-edit-size', function (e) {
                self.editSize(e, dataId);
            })

            $(document).on('submit', '#form-add-size', function (e) {
                self.addSize(e);
            })
        },
        deleteSize: function (dataId) {
            swal({
                title: "Yakin akan menghapus item?",
                text: "Item yang sudah dihapus tidak bisa di kembalikan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        // $.ajax({
                        //     url: "/admin/category/" + dataId,
                        //     type: 'DELETE',
                        //     success: function (response) {
                        //         adminCategoryPage.dtTable.ajax.reload(null, false);
                        //         swal({
                        //             title: "Berhasil!",
                        //             text: "Kategori telah dihapus",
                        //             icon: "success"
                        //         });
                        //     }
                        // });
                    }
                });
        },
        editSize: function (e, dataId) {
            // e.preventDefault()
            // let data = $('#form-edit-category').serializeArray();
            // $.ajax({
            //     url: "/admin/category/" + dataId,
            //     data: data,
            //     type: 'PUT',
            //     success: function (response) {
            //         adminCategoryPage.dtTable.ajax.reload(null, false);
            //         $('#adminModalEditCategory').modal('hide');
                    swal({
                        title: "Berhasil!",
                        text: "Kategori telah diubah",
                        icon: "success"
                    });
            //     }
            // });
        },
        addSize: function (e) {
            // e.preventDefault()
            // let data = $('#form-add-category').serializeArray();
            // $.post('/admin/category', data)
            //     .done(function () {
            //         $('input[type=text]').val('')
            //         adminCategoryPage.dtTable.ajax.reload(null, false);
            //         $('#adminModalAddCategory').modal('hide');
                    swal({
                        title: "Berhasil!",
                        text: "Kategori telah ditambah",
                        icon: "success"
                    });
                // })
        },
        initDatatable: function () {
            var $table = $page.find('#adminSizeDataTable');
            sizePage.dtTable = $table.DataTable({
                // "aaSorting": [],
                // "processing": true,
                // "serverSide": true,
                "searching": true,
                "lengthChange": true,
                "responsive": true,
                "columns": [
                    { data: 'name', name: 'name' },
                    { data: 'size', name: 'size' },
                    { data: 'created_at', name: 'created_at' },
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
        sizePage.init();
    }
});
