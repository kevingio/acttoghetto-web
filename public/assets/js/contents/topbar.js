$(document).ready(function () {
    var $page = $('.nav-menu');

    var topbarMenu = {
        init: function () {
            this.customFunction();
        },
        customFunction: function () {
            $('.nav-menu .btn-show-menu-mobile').on('click', function (e) {
                if($(this).hasClass('change')){
                    $(this).removeClass('change')
                } else {
                    $(this).addClass('change')
                }
            });
        },
    };

    if ($page.length) {
        topbarMenu.init();
    }
});
