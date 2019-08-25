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

            $(document).on('change', 'select[name=volume]', function () {
                adminCollectionPage.dtTable.ajax.reload(null, false);
            });

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
                let volume = $(this).attr('data-volume')
                let dataImg = $(this).attr('data-img')

                $('#previewEditImageCollectionAdmin').attr('src', dataImg);
                $('#form-edit-collection select[name=volume]').val(volume)
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
                e.preventDefault()
                var formData = new FormData(this);
                formData.append('_method', 'PATCH')
                self.editCollection(e, formData);
            })

            $(document).on('submit', '#form-add-collection', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                self.addCollection(formData);
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
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/admin/collection/" + dataId,
                        type: 'DELETE',
                        success: function (response) {
                            adminCollectionPage.dtTable.ajax.reload(null, false);
                            swal({
                                title: "Berhasil!",
                                text: "Collection telah dihapus",
                                icon: "success"
                            });
                        }
                    });
                }
            });
        },
        editCollection: function (dataId, data) {
            $.ajax({
                url: "/admin/collection/" + dataId,
                type: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    $('#form-edit-collection').find("input").val('');
                    $('button.close').click();
                    adminCollectionPage.dtTable.ajax.reload(null, false);
                    $('#previewEditImageCollectionAdmin').attr('src', 'https://dummyimage.com/200x100/ffffff/fff');
                    swal({
                        title: "Berhasil!",
                        text: "Collection telah diubah!",
                        icon: "success"
                    });
                },
                error: function (reponse) {
                    swal({
                        title: "Gagal!",
                        text: "Ada masalah pada server!",
                        icon: "success"
                    });
                }
            });
        },
        addCollection: function (data) {
            $.ajax({
                url: "/admin/collection",
                type: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    $('#form-add-collection').find("input").val('');
                    $('button.close').click();
                    adminCollectionPage.dtTable.ajax.reload(null, false);
                    $('#previewAddImageCollectionAdmin').attr('src', 'https://dummyimage.com/200x100/ffffff/fff');
                    swal({
                        title: "Berhasil!",
                        text: "Collection telah ditambah!",
                        icon: "success"
                    });
                },
                error: function (reponse) {
                    swal({
                        title: "Gagal!",
                        text: "Telah mencapai 9 gambar pada edisi ini!",
                        icon: "error"
                    });
                }
            });
        },
        initDatatable: function () {
            var $table = $page.find('#adminCollectionDataTable');
            adminCollectionPage.dtTable = $table.DataTable({
                "aaSorting": [],
                "pageLength": 5,
                "processing": true,
                "serverSide": true,
                "searching": false,
                "lengthChange": false,
                "columns": [
                    { data: 'volume', name: 'volume' },
                    { data: 'image', name: 'image' },
                    { data: 'action', name: 'action' },
                ],
                "ajax": {
                    url: "/admin/ajax/collection",
                    type: "POST",
                    data: function (d) { d.mode = 'datatable'; d.volume = $('select[name=volume]').val() }
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
        adminCollectionPage.init();
    }
});
