

$(document).ready(function () {
    var $page = $('#editProductPage');
    
    var editProductPage = {
        dtTable: {},
        init: function () {
            this.customFunction();
            
        },
        customFunction: function () {
            let self = this;
            let optionSelected

            this.initSize(optionSelected);

            $('.custom-file-input').on('change', function (e) {
                var fileName = e.target.files[0].name;
                $(this).siblings().text(fileName);
                self.readURL(this);
            });

            $('.select-category').on('change', function (e) {
                optionSelected = $("option:selected", this).val();
                $('.select-size').empty();
                self.initSize(optionSelected);
            });

            $('.btn-back').on('click', function (e) {
                window.location.replace("/admin/product/" + $(this).attr("data-id") + "?type=" + $(this).attr("data-type"));
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
        initSize: function (value) {
            $.post({
                url: '/admin/ajax/size',
                data: { mode: 'select-size', category_id: value },
            }).done((res) => {
                console.log(res);
                res.map((item, index) => {
                    $('.select-size').append('<option value="' + item.id +'">' + item.text + '</option>');
                });
            })
        },
    };

    if ($page.length) {
        editProductPage.init();
    }
});
