$(document).ready(function () {
    var $page = $('#adminBannerPage');

    var adminBannerPage = {
        init: function () {
            this.customFunction(); 
        },
        customFunction: function () {
            let self = this;

            $("#form-edit-banner input[name=image]").on('change', function () {
                self.readEditURL(this);
            });

            $("#form-add-banner input[name=image]").on('change', function () {
                self.readAddURL(this);
            });

            var $dialog = $('#imagePreviewModal').find(".modal-dialog");
            var offset = ($(window).height() / 4);
            $dialog.css("margin-top", offset);

            $(".pop").on("click", function () {
                $('#imagePreview').attr('src', $('.image-preview-banner').attr('src'));
                $('#imagePreviewModal').modal('show');
            });

            $(document).on('click', '.btn-admin-add-banner', function () {
                $("#form-add-banner input[name=image]").val('');
                $('#previewAddImageBannerAdmin').attr('src', 'https://dummyimage.com/200x100/ffffff/fff');
                $('#adminModalAddBanner').modal('show');
            })

            $(document).on('click', '.btn-admin-edit-banner', function () {
                $("#form-edit-banner input[name=image]").val('');
                $('.wrapper-preview').empty();
                $('.wrapper-preview').append('<img id="previewEditImageBannerAdmin" class="pt-3 w-100" src="https://dummyimage.com/200x100/ffffff/fff" alt="your image" />');
                $('#adminModalEditBanner').modal('show');
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
    };

    if ($page.length) {
        adminBannerPage.init();
    }
});
