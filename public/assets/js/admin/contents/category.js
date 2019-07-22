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
            let dataId = null;
            var count = 1

            $(document).on('click', '.btn-admin-edit-category', function () {
                dataId = $(this).attr('data-id')
                let name = $(this).attr('name')
                let type = $(this).attr('gender')
                $('#form-edit-category input[name=name]').val(name)
                $('#form-edit-category input[name=type]').val(type)
                $('#adminModalEditCategory').modal('show');
            })

            $(document).on('click', '.btn-admin-add-category', function () {
                count = 1;
                $('.btn-admin-save-add-category').attr('type', 'submit')
                $('.btn-admin-save-add-category').attr('disabled', false)
                $('.btn-admin-save-add-category').text('Tambah')
                $('#adminModalAddCategory').modal('show');
            })

            $(document).on('click', '.btn-admin-delete-category', function () {
                dataId = $(this).attr('data-id')
                self.deleteCategory(dataId);
            })

            $(document).on('submit', '#form-edit-category', function (e) {
                self.editCategory(e, dataId);
            })

            $(document).on('submit', '#form-add-category', function (e) {
                self.addCategory(e);
            })

            $(document).on('click', '.btn-admin-save-add-category', function () {
                if (count == 2) {
                    $(this).removeAttr('type')
                    $(this).attr('disabled', true)
                    $(this).text('Mohon tunggu')
                }
                count++
            })
        },
        deleteCategory: function (dataId) {
            swal({
                title: "Yakin akan menghapus item?",
                text: "Item yang sudah dihapus tidak bisa di kembalikan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/admin/category/" + dataId,
                        type: 'DELETE',
                        success: function(response) {
                            adminCategoryPage.dtTable.ajax.reload(null, false);
                            swal({
                                title: "Berhasil!",
                                text: "Kategori telah dihapus",
                                icon: "success"
                            });
                        }
                    });
                }
            });
        },
        editCategory: function (e, dataId) {
            e.preventDefault()
            let data = $('#form-edit-category').serializeArray();
            $.ajax({
                url: "/admin/category/" + dataId,
                data: data,
                type: 'PUT',
                success: function(response) {
                    adminCategoryPage.dtTable.ajax.reload(null, false);
                    $('#adminModalEditCategory').modal('hide');
                    swal({
                        title: "Berhasil!",
                        text: "Kategori telah diubah",
                        icon: "success"
                    });
                }
            });
        },
        addCategory: function(e) {
            e.preventDefault()
            let data = $('#form-add-category').serializeArray();
            $.post('/admin/category', data)
            .done(function () {
                $('input[type=text]').val('')
                adminCategoryPage.dtTable.ajax.reload(null, false);
                $('#adminModalAddCategory').modal('hide');
                swal({
                    title: "Berhasil!",
                    text: "Kategori telah ditambah",
                    icon: "success"
                });
            })
        },
        initDatatable: function () {
            var $table = $page.find('#adminCategoryDataTable');
            adminCategoryPage.dtTable = $table.DataTable({
                "aaSorting": [],
                "pageLength": 5,
                "processing": true,
                "serverSide": true,
                "searching": true,
                "lengthChange": false,
                "oLanguage": {
                    "sSearch": "Cari Nama Kategori"
                },
                "columns": [
                    { data: 'name', name: 'name' },
                    { data: 'type', name: 'type' },
                    { data: 'action', name: 'action' },
                ],
                "ajax": {
                    url: "/admin/ajax/category",
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
        adminCategoryPage.init();
    }
});
