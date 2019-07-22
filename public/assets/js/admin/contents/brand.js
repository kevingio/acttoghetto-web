$(document).ready(function () {
    var $page = $('#adminBrandPage');

    var brandsPage = {
        dtTable: {},
        init: function () {
            this.initDatatable();
            this.customFunction();
        },
        customFunction: function () {
            let self = this;
            var dataId = null;
            var count = 1

            $("#form-edit-brand input[name=image]").on('change', function () {
                self.readEditURL(this);
            });

            $("#form-add-brand input[name=image]").on('change', function () {
                self.readAddURL(this);
            });

            $(document).on('click', '.btn-admin-edit-brand', function () {
                dataId = $(this).attr('data-id')
                let brandName = $(this).attr('name')
                let gender = $(this).attr('gender')
                let dataImg = $(this).attr('data-img')

                $('#previewEditImageBrandAdmin').attr('src', dataImg);
                $('#form-edit-brand input[name=name]').val(brandName)
                $('#form-edit-brand input[value=' + gender + ']').prop('checked', true)
                $('#adminModalEditBrand').modal('show');
            })

            $(document).on('click', '.btn-admin-add-brand', function () {
                count = 1;
                $('.btn-admin-save-add-brand').attr('type', 'submit')
                $('.btn-admin-save-add-brand').attr('disabled', false)
                $('.btn-admin-save-add-brand').text('Tambah')
                $('#previewAddImageBrandAdmin').attr('src', 'https://dummyimage.com/200x100/ffffff/fff');
                $('#adminModalAddBrand').modal('show');
            })

            $(document).on('click', '.btn-admin-save-add-brand', function () {
                if(count == 2) {
                    $(this).removeAttr('type')
                    $(this).attr('disabled', true)
                    $(this).text('Mohon tunggu')
                }
                count++
            })

            $(document).on('submit', '#form-add-brand', function (e) {
                e.preventDefault();
				var formData = new FormData(this);
                self.addBrand(formData);
            })

            $(document).on('click', '.btn-admin-delete-brand', function () {
                dataId = $(this).attr('data-id')
                self.deleteBrand(dataId);
            })

            $(document).on('submit', '#form-edit-brand', function (e) {
                e.preventDefault();
				var formData = new FormData(this);
				formData.append('_method', 'PATCH');
                self.editBrand(formData, dataId);
            })
        },
        readEditURL: function (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    if (e.target.result) {
                        $('#previewEditImageBrandAdmin').attr('src', e.target.result);
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
                        $('#previewAddImageBrandAdmin').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        },
        deleteBrand: function (dataId) {
            swal({
                title: "Yakin akan menghapus item?",
                text: "Item yang sudah dihapus tidak bisa di kembalikan !!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
					    url: '/admin/brand/' + dataId,
					    type: 'DELETE',
					    success: function(response) {
							swal({
								title: "Berhasil!",
								text: "Brand berhasil dihapus!",
								icon: "success"
							});
							brandsPage.dtTable.ajax.reload(null, false);
					    }
					});
                }
            });
        },
        addBrand: function (data) {
            $.ajax({
                url: "/admin/brand",
                type: "POST",
                data:  data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $('#form-add-brand').find("input[name!=type]").val('');
                    $('button.close').click();
                    brandsPage.dtTable.ajax.reload(null, false);
                    swal({
                        title: "Berhasil!",
                        text: "Brand telah ditambah!",
                        icon: "success"
                    });
                },
            });
        },
        editBrand: function (data, dataId) {
            $.ajax({
                url: "/admin/brand/" + dataId,
                type: "POST",
                data:  data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $('#form-edit-brand').find("input[type=text]").val('');
                    $('button.close').click();
                    swal({
                        title: "Berhasil!",
                        text: "Brand telah diubah!",
                        icon: "success"
                    });
                    brandsPage.dtTable.ajax.reload(null, false);
                },
            });
        },
        initDatatable: function () {
            var $table = $page.find('#adminBrandDataTable');
            brandsPage.dtTable = $table.DataTable({
                "aaSorting": [],
                "pageLength": 5,
                "processing": true,
                "serverSide": true,
                "searching": true,
                "lengthChange": false,
                "oLanguage": {
                    "sSearch": "Cari Brand"
                },
                "ajax": {
                    url: "/admin/ajax/brand",
                    type: "POST",
                    data: function (d) { d.mode = 'datatable'; }
                },
                "columns": [
                    { data: 'name', name: 'name' },
                    { data: 'type', name: 'type' },
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
        brandsPage.init();
    }
});
