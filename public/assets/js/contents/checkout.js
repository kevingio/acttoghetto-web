$(document).ready(function () {
    let $pageCart = $('.wrapper-cart-totals');

    let myCartDetailsPage = {
        products: [],
        init: function () {
            this.initProduct();
        },
        initProduct: function () {
            let self = this;
            let totalInCart = 0
            
            let data = JSON.parse(localStorage.getItem('listProducts'));
            myCartDetailsPage.products = data == null ? [] : data;
            $('.wrapper-button-checkout-list-details').on('click', function () {
                
                data = JSON.parse(localStorage.getItem('listProducts'));
                myCartDetailsPage.products = data == null ? [] : data;
                
                myCartDetailsPage.products.map((item, index) => {
                    totalInCart += (item.qty * item.rawPrice)
                })

                let name = $(this).parent().parent().parent().find('.buyer-name').val()
                let contact = $(this).parent().parent().parent().find('.buyer-contact').val()
                let address = $(this).parent().parent().parent().find('.buyer-address').val()

                $.post('/cart', {
                    products: myCartDetailsPage.products,
                    total: totalInCart,
                    address: address,
                    receiver: name,
                    contact: contact
                }).done(function (response) {
                        if (response.status == 200) {
                            swal(nameProduct, "is added to cart !", "success").then(function () {
                                localStorage.clear();
                                $('.header-cart-wrapitem').empty();
                                $('.table-body-cart').empty();
                                location.reload();
                            });
                        }
                    });
            });
        }
    }

    if ($pageCart.length) {
        myCartDetailsPage.init();
    }
})