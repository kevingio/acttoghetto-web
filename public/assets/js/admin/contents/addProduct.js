

$(document).ready(function () {
    var $page = $('#addProductPage');

    var addProductPage = {
        dtTable: {},
        init: function () {
            this.customFunction();
        },
        customFunction: function () {
            let self = this;
            let dataId = null
            $('.custom-file-input').on('change', function (e) {
                var fileName = e.target.files[0].name;
               $(this).siblings().text(fileName);
                self.readURL(this);
            });
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
    };

    if ($page.length) {
        addProductPage.init();
    }
});
