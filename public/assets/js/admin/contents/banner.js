$(document).ready(function () {
    var $page = $('#adminBannerPage');

    var adminBannerPage = {
        dtTable: {},
        lengthTable: 0,
        init: function () {
            this.customFunction();
            this.initDatatable();
        },
        customFunction: function () {
            let self = this;
            var dataId = null;
            var count = 1;

            $("#form-edit-banner input[name=image]").on('change', function () {
                self.readEditURL(this);
            });

            $("#form-add-banner input[name=image]").on('change', function () {
                self.readAddURL(this);
            });

            $(document).on("click", '.pop',function () {
                var $dialog = $('#imagePreviewModal').find(".modal-dialog");
                var offset = ($(window).height() / 4);
                let img = $(this).attr('data-img')
                $dialog.css("margin-top", offset);

                $('#imagePreview').attr('src', img);
                $('#imagePreviewModal').modal('show');
            });

            $(document).on('click', '.btn-admin-add-banner', function () {
                count = 1;
                $('.btn-admin-save-add-banner').attr('type', 'submit')
                $('.btn-admin-save-add-banner').attr('disabled', false)
                $('.btn-admin-save-add-banner').text('Tambah')
                $('#previewAddImageBannerAdmin').attr('src', 'https://dummyimage.com/200x100/ffffff/fff');
                $('#adminModalAddBanner').modal('show');
            })

            $(document).on('click', '.btn-admin-save-add-banner', function () {
                if (count == 2) {
                    $(this).removeAttr('type')
                    $(this).attr('disabled', true)
                    $(this).text('Mohon tunggu')
                }
                count++
            })

            $(document).on('submit', '#form-add-banner', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                self.addBanner(formData);
            })

            $(document).on('click', '.btn-admin-delete-banner', function () {
                dataId = $(this).attr('data-id')
                self.deleteBanner(dataId);
            })

            $(document).on('click', '.btn-admin-edit-banner', function () {
                dataId = $(this).attr('data-id')
                let title = $(this).attr('data-title')
                let subtitle = $(this).attr('data-subTitle')
                let image = $(this).attr('data-img')

                $('.wrapper-preview #previewEditImageBannerAdmin').attr('src', image);
                $("#form-edit-banner input[name=title]").val(title);
                $("#form-edit-banner input[name=subtitle]").val(subtitle);

                $('#adminModalEditBanner').modal('show');
            })

            $(document).on('submit', '#form-edit-banner', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('_method', 'PATCH');
                self.editBanner(formData, dataId);
            })
        },
        readURL: function (input) {
            let self = input

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    if (e.target.result) {
                        let previewImage = $(self).parent().parent().parent().find('.preview-image')
                        previewImage.attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        },
        readEditURL: function (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    if (e.target.result) {
                        $('.wrapper-preview').empty();
                        $('.wrapper-preview').append('<img id="previewEditImageBannerAdmin" class="pt-3 w-100" src="' + e.target.result + '" alt="your image" />');
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
                        $('.wrapper-preview').empty();
                        $('.wrapper-preview').append('<img id="previewAddImageBannerAdmin" class="pt-3 w-100" src="' + e.target.result + '" alt="your image" />');
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        },
        addBanner: function (data) {
            /**
             * Membatasi untuk menambah banner
             * jika banner yang sudah ada berjumlah 3
             */
            adminBannerPage.lengthTable = adminBannerPage.dtTable.data().count()
            if ( adminBannerPage.lengthTable >= 3 ) {
                adminBannerPage.dtTable.ajax.reload(null, false);
                $('#form-add-banner').find("input[name!=type]").val('');
                $('button.close').click();
                swal({
                    title: "Kuota Banner Sudah Mencapai Batas !!",
                    text: "Banner Promosi maksimal 3",
                    icon: "warning",
                })
            } else {
                $.ajax({
                    url: "/admin/banner",
                    type: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        $('#form-add-banner').find("input[name!=type]").val('');
                        $('button.close').click();
                        adminBannerPage.dtTable.ajax.reload(null, false);
                        swal({
                            title: "Berhasil!",
                            text: "Banner telah ditambah!",
                            icon: "success"
                        });

                         /**
                         * adminBannerPage.lengthTable
                         * tampungan jumlah item data table
                         * menggunakan data().count()
                         * untuk mengambil jumlah item data table
                         */
                        adminBannerPage.lengthTable = adminBannerPage.dtTable.data().count();
                    },
                });
            }
        },
        deleteBanner: function (dataId) {
            swal({
                title: "Yakin akan menghapus item?",
                text: "Item yang sudah dihapus tidak bisa di kembalikan !!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/admin/banner/' + dataId,
                        type: 'DELETE',
                        success: function (response) {
                            swal({
                                title: "Berhasil!",
                                text: "banner berhasil dihapus!",
                                icon: "success"
                            });

                            /**
                             * adminBannerPage.lengthTable
                             * tampungan jumlah item data table
                             * menggunakan data().count()
                             * untuk mengambil jumlah item data table
                             */
                            adminBannerPage.dtTable.ajax.reload(null, false);
                        }
                    });
                }
            });
        },
        editBanner: function (data, dataId) {
            $.ajax({
                url: "/admin/banner/" + dataId,
                type: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    $('#form-edit-banner').find("input[type=text]").val('');
                    $('button.close').click();
                    swal({
                        title: "Berhasil!",
                        text: "Banner telah diubah!",
                        icon: "success"
                    });
                    adminBannerPage.dtTable.ajax.reload(null, false);
                },
            });
        },
        initDatatable: function () {
            var $table = $page.find('#adminBannerDataTable');

            adminBannerPage.dtTable = $table.DataTable({
                "aaSorting": [],
                "pageLength": 5,
                "processing": true,
                "serverSide": true,
                "searching": true,
                "lengthChange": false,
                "ajax": {
                    url: "/admin/ajax/banner",
                    type: "POST",
                    data: function (d) { d.mode = 'datatable'; }
                },
                "columns": [
                    { data: 'title', name: 'title' },
                    { data: 'subtitle', name: 'subtitle' },
                    { data: 'image', name: 'image' },
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
        adminBannerPage.init();
    }
});
