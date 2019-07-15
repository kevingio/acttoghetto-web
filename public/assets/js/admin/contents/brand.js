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

            $("#editImageBrandUpload").on('change', function () {
                self.readEditURL(this);
            });

            $("#addImageBrandUpload").on('change', function () {
                self.readAddURL(this);
            });
            
            $(document).on('click', '.btn-admin-edit-brand', function () {
                let dataId = $(this).attr('data-id')
                let dataImg = $(this).attr('data-img')

                if (dataImg == '' || dataImg == null) {
                    $('#previewEditImageBrandAdmin').attr('src', 'https://dummyimage.com/200x100/ffffff/fff');
                } else {
                    $('#previewEditImageBrandAdmin').attr('src', dataImg);
                }
                
                // $('#form-upload-proof').attr('action', '/transaction/' + dataId + '/upload')
                $('#adminModalEditBrand').modal('show');
            })

            $(document).on('click', '.btn-admin-add-brand', function () {
                let dataId = $(this).attr('data-id')
                $('#previewAddImageBrandAdmin').attr('src', 'https://dummyimage.com/200x100/ffffff/fff');
                $('#adminModalAddBrand').modal('show');
            })

            $(document).on('click', '.btn-admin-delete-brand', function () {
                self.deleteBrand(this);
            })

            $(document).on('click', '.close', function () {
                $('#adminModalEditBrand').modal('hide');
            })

            $(document).on('click', '.btn-admin-save-change-brand', function () {
                self.editBrand(this);
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
        deleteBrand: function (input) {
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
        addBrand: function (input) {
            $(document).on('click', '.close', function () {
                $('#adminModalAddBrand').modal('hide');

                swal("Berhasil menambahkan item!", "success");
            })
        },
        editBrand: function (input) {
            // $.ajax({
            //     url: "",
            //     type: "POST",
            //     data: ,
            //     contentType: false,
            //     cache: false,
            //     processData: false,
            //     success: function (response) {
            //         $(this).find("").val('');
            //         $('#adminModalEditBrand').modal('hide');
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
                title: "Item Berhasil Diperbaharui",
                icon: "success",
            });
                    
        },
        initDatatable: function () {
            var $table = $page.find('#adminBrandDataTable');
            brandsPage.dtTable = $table.DataTable({
                // "aaSorting": [],
                // "processing": true,
                // "serverSide": true,
                "searching": true,
                "lengthChange": true,
                "responsive": true,
                "columns": [
                    { data: 'name', name: 'name' },
                    { data: 'type', name: 'type' },
                    { data: 'image', name: 'image' },
                    { data: 'actions', name: 'actions' },
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
