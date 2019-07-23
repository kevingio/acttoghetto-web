$(document).ready(function () {
    var $modal = $('.topbar');

    var adminModal = {
        dtTable: {},
        init: function () {
            this.customFunction();
        },
        customFunction: function () {
            let self = this;
            $(document).on('click', '.btn-profile-admin', function () {
                dataId = $(this).attr('data-id')
                let name = $(this).attr('data-name')
                let email = $(this).attr('data-email')

                
                $('#form-profile input[name=name]').val(name)
                $('#form-profile input[name=email]').val(email)
                $('#adminModalProfile').modal('show');
            })

            $(document).on('click', '.btn-password-admin', function () {
                
                $('#adminModalPassword').modal('show');
            })
        },
    };

    if ($modal.length) {
        adminModal.init();
    }
});
