$(document).ready(function () {
    var $page = $('#adminCollectionPage');

    var adminCollectionPage = {
        dtTable: {},
        init: function () {
            this.initDatatable();
            this.customFunction();
        },
        customFunction: function () {
            let self = this;
            let dataId = null;
            var count = 1

            $("#form-edit-collection input[name=image]").on('change', function () {
                self.readEditURL(this);
            });
 
            $("#form-add-collection input[name=image]").on('change', function () {
                self.readAddURL(this);
            });

            $(document).on("click", '.pop', function () {
                var $dialog = $('#imagePreviewModal').find(".modal-dialog");
                var offset = ($(window).height() / 4);
                let img = $(this).attr('src')
                $dialog.css("margin-top", offset);

                $('#imagePreview').attr('src', img);
                $('#imagePreviewModal').modal('show');
            });

            $(document).on('click', '.btn-admin-edit-collection', function () {
                dataId = $(this).attr('data-id')
                $('#adminModalEditCollection').modal('show');
            })

            $(document).on('click', '.btn-admin-add-collection', function () {
                count = 1;
                $('.btn-admin-save-add-collection').attr('type', 'submit')
                $('.btn-admin-save-add-collection').attr('disabled', false)
                $('.btn-admin-save-add-collection').text('Tambah')
                $('#adminModalAddCollection').modal('show');
            })

            $(document).on('click', '.btn-admin-delete-collection', function () {
                dataId = $(this).attr('data-id')
                self.deleteCollection(dataId);
            })

            $(document).on('submit', '#form-edit-collection', function (e) {
                self.editCollection(e, dataId);
            })

            $(document).on('submit', '#form-add-collection', function (e) {
                self.addCollection(e);
            })

            $(document).on('click', '.btn-admin-save-add-collection', function () {
                if (count == 2) {
                    $(this).removeAttr('type')
                    $(this).attr('disabled', true)
                    $(this).text('Mohon tunggu')
                }
                count++
            })
        },
        readEditURL: function (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    if (e.target.result) {
                        $('#previewEditImageCollectionAdmin').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        },
        readAddURL: function (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    if (e.target.result) {
                        $('#previewAddImageCollectionAdmin').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        },
        deleteCollection: function (dataId) {
            swal({
                title: "Yakin akan menghapus item?",
                text: "Item yang sudah dihapus tidak bisa di kembalikan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                // .then((willDelete) => {
                //     if (willDelete) {
                //         $.ajax({
                //             url: "/admin/collection/" + dataId,
                //             type: 'DELETE',
                //             success: function (response) {
                //                 adminCollectionPage.dtTable.ajax.reload(null, false);
                //                 swal({
                //                     title: "Berhasil!",
                //                     text: "Collection telah dihapus",
                //                     icon: "success"
                //                 });
                //             }
                //         });
                //     }
                // });
        },
        editCollection: function (e, dataId) {
            e.preventDefault()
            let data = $('#form-edit-collection').serializeArray();
            // $.ajax({
            //     url: "/admin/collection/" + dataId,
            //     data: data,
            //     type: 'PUT',
            //     success: function (response) {
            //         adminCollectionPage.dtTable.ajax.reload(null, false);
            //         $('#adminModalEditCollection').modal('hide');
            //         swal({
            //             title: "Berhasil!",
            //             text: "Collection telah diubah",
            //             icon: "success"
            //         });
            //     }
            // });
        },
        addCollection: function (e) {
            e.preventDefault()
            let data = $('#form-add-collection').serializeArray();
            // $.post('/admin/collection', data)
            //     .done(function () {
            //         $('input[type=text]').val('')
            //         adminCollectionPage.dtTable.ajax.reload(null, false);
            //         $('#adminModalAddCollection').modal('hide');
            //         swal({
            //             title: "Berhasil!",
            //             text: "Collection telah ditambah",
            //             icon: "success"
            //         });
            //     })
        },
        initDatatable: function () {
            var $table = $page.find('#adminCollectionDataTable');
            adminCollectionPage.dtTable = $table.DataTable({
                "aaSorting": [],
                "pageLength": 5,
                // "processing": true,
                // "serverSide": true,
                "searching": false,
                "lengthChange": false,
                "oLanguage": {
                    "sSearch": "Cari Edisi :"
                },
                "columns": [
                    { data: 'name', name: 'name' },
                    { data: 'type', name: 'type' },
                    { data: 'action', name: 'action' },
                ],
                // "ajax": {
                //     url: "/admin/ajax/collection",
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
        adminCollectionPage.init();
    }
});
