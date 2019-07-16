$(document).ready(function () {
    var $page = $('#adminSizePage');

    var sizePage = {
        dtTable: {},
        init: function () {
            this.initDatatable();
            this.customFunction();
            this.initSelect2();
        },
        customFunction: function () {
            let self = this;
            let dataId = null

            $(document).on('click', '.btn-admin-edit-size', function () {
                dataId = $(this).attr('data-id')
                let size = $(this).attr('text')
                let category = $(this).attr('category-id')
                $('#form-edit-size input[name=text]').val(size)
                $('#form-edit-size input[name=category_id]').val(category)
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
                        $.ajax({
                            url: "/admin/size/" + dataId,
                            type: 'DELETE',
                            success: function (response) {
                                sizePage.dtTable.ajax.reload(null, false);
                                swal({
                                    title: "Berhasil!",
                                    text: "Size telah dihapus",
                                    icon: "success"
                                });
                            }
                        });
                    }
                });
        },
        editSize: function (e, dataId) {
            e.preventDefault()
            let data = $('#form-edit-size').serializeArray();
            $.ajax({
                url: "/admin/size/" + dataId,
                data: data,
                type: 'PUT',
                success: function (response) {
                    sizePage.dtTable.ajax.reload(null, false);
                    $('#adminModalEditSize').modal('hide');
                    swal({
                        title: "Berhasil!",
                        text: "Kategori telah diubah",
                        icon: "success"
                    });
                }
            });
        },
        addSize: function (e) {
            e.preventDefault()
            let data = $('#form-add-size').serializeArray();
            $.post('/admin/size', data)
                .done(function () {
                    $('input[type=text]').val('')
                    sizePage.dtTable.ajax.reload(null, false);
                    $('#adminModalAddSize').modal('hide');
                    swal({
                        title: "Berhasil!",
                        text: "Size telah ditambah",
                        icon: "success"
                    });
                })
        },
        initSelect2: function () {
            $('select[name=category_id]').select2({
                dropdownParent: $('.modal')
            });
        },
        initDatatable: function () {
            var $table = $page.find('#adminSizeDataTable');
            sizePage.dtTable = $table.DataTable({
                "aaSorting": [],
                "pageLength": 5,
                "processing": true,
                "serverSide": true,
                "searching": true,
                "lengthChange": false,
                "oLanguage": {
                    "sSearch": "Cari Size"
                },
                "ajax": {
                    url: "/admin/ajax/size",
                    type: "POST",
                    data: function (d) { d.mode = 'datatable'; }
                },
                "columns": [
                    { data: 'text', name: 'text' },
                    { data: 'category', name: 'category' },
                    { data: 'action', name: 'action' },
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
