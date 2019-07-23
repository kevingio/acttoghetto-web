$(document).ready(function () {
    var $page = $('#adminProductDetailPage');

    var adminProductDetailPage = {
        init: function () {
            this.custom();
        },
        custom: function () {
            let self = this
            $(".image-detail-preview").on('click', function () {
                let thisImage = this
                
                $(".main-image-detail-preview").fadeOut("fast", function () {
                    $(".main-image-detail-preview").attr('src', $(thisImage).attr('src'));
                    $(".main-image-detail-preview").fadeIn("fast");
                });
            });

            $(document).on('click', '.btn-admin-delete-product', function () {
                dataId = $(this).attr('data-id')
                let gender = $(this).attr('gender')
                
                self.deleteProduct(dataId, gender);
            })
        },
        deleteProduct: function (dataId, gender) {
            swal({
                title: "Yakin akan menghapus item?",
                text: "Item yang sudah dihapus tidak bisa di kembalikan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/admin/product/" + dataId,
                        type: 'DELETE',
                        success: function (response) {
                            swal({
                                title: "Berhasil!",
                                text: "Product telah dihapus",
                                icon: "success"
                            }).then((isConfirm) => { 
                                if (isConfirm) {
                                    window.location.href = '/admin/product?type=' + gender
                                }
                            });
                            
                        }
                    });
                }
            });
        },
    };

    if ($page.length) {
        adminProductDetailPage.init();
    }
});
