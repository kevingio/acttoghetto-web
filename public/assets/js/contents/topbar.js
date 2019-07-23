$(document).ready(function () {
    var $page = $('#topbarMenu');

    var topbarMenu = {
        init: function () {
            this.customFunction();
        },
        customFunction: function () {
            $('#topbarMenu .btn-show-menu-mobile').on('click', function (e) {
                console.log('masuk');
                
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
