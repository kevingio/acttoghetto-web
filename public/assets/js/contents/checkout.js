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

                if(data != null) {
                    $.post('/transaction', {
                        products: myCartDetailsPage.products,
                        total: totalInCart,
                        address: address,
                        receiver: name,
                        contact: contact,
                        _token: $('meta[name=csrf-token]').attr('content')
                    }).done(function (response) {
                        if (response.status == 'data created') {
                            swal("Transaksi Berhasil", "Segera lakukan pembayaran terhadap transaksi Anda!", "success").then(function () {
                                localStorage.clear();
                                $('.header-cart-wrapitem').empty();
                                $('.header-cart-total span.total-cart').text('0');
                                $('.cart-header span.header-icons-noti').text('0');
                                $('#transaction-number').text(response.number);
                                $('#transaction-total').text('Rp ' + totalInCart.toLocaleString(
                                    "de-DE", { minimumFractionDigits: 2 }
                                ));
                                $('#checkout-section').hide();
                                $('#payment-info').show(500);
                            });
                        }
                    });
                } else {
                    swal("Keranjang masih kosong", "", "error")
                }
            });
        }
    }

    if ($pageCart.length) {
        myCartDetailsPage.init();
    }
})
