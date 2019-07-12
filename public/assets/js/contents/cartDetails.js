$(document).ready(function () {
    let $pageCart = $('.wrap-table-shopping-cart');

    let myCartDetailsPage = {
        products: [],
        init: function () {
            this.initProduct();
        },
        displayCartItem: function () {
            let total = 0
            myCartDetailsPage.products.map((item, index) => {
                total = (item.qty * item.rawPrice)

                let html = '<tr class="table-row-item-cart" data-id="' + item.id + '">'
                    + '<td>'
                    + '<div class="b-rad-4 o-f-hidden">'
                    + '<a href="/product/' + item.id + '"><img class="max-w-200" src="' + item.img + '" alt="IMG-PRODUCT"></a>'
                    + '</div>'
                    + '</td>'
                    + '<td><a href="/product/' + item.id + '">'+ item.name +'</a></td>'
                    + '<td class="text-center">'+ item.size +'</td>'
                    + '<td>'+ item.price +'</td>'
                    + '<td class="text-center">'+ item.qty +'</td>'
                    + '<td class="total-price-qty-list-cart">Rp '+ total.toLocaleString("de-DE", { minimumFractionDigits: 2 }) +'</td>'
                    + '<td class="cart-list-delete-icon text-center">'
                    + '<a href="javascript: void(0)"><i class="fas fa-trash"></i></a>'
                    + '</td>'
                    + '</tr>';
                $('.table-shopping-cart tbody').append(html);

                this.deleteCartItem();
            })
        },
        deleteCartItem: function () {
            let self = this
            $('.cart-list-delete-icon').on('click', function () {
                let cartListId = $(this).parent().attr('data-id')

                myCartDetailsPage.products.map((item, index) => {

                    if (cartListId == item.id) {
                        myCartDetailsPage.products.splice(index, 1)
                        $(this).parent().remove()
                        $('.header-cart-item[data-id="' + item.id + '"]').remove();
                        return
                    }
                })
                $('.header-wrapicon2 .header-icons-noti').text(myCartDetailsPage.products.length)

                self.totalPrice();
                localStorage.setItem("listProducts", JSON.stringify(myCartDetailsPage.products));
            })
        },
        totalPrice: function () {
            var totalCart = 0

            myCartDetailsPage.products.map((item, index) => {
                totalCart += (item.qty * item.rawPrice)
            })

            $('.header-cart-total .total-cart').text('Rp ' + totalCart.toLocaleString(
                "de-DE", { minimumFractionDigits: 2 }
            ));
            $('.subtotal-cart-list-wrapper .subtotal-cart-list').text('Rp ' + totalCart.toLocaleString(
                "de-DE", { minimumFractionDigits: 2 }
            ));
            $('.total-cart-list-wrapper .total-cart-list').text('Rp ' + totalCart.toLocaleString(
                "de-DE", { minimumFractionDigits: 2 }
            ));
        },
        initProduct: function () {
            let self = this;
            let data = JSON.parse(localStorage.getItem('listProducts'));
            myCartDetailsPage.products = data == null ? [] : data;
            this.displayCartItem()
            $('.header-cart-wrap-btn').on('click', function () {
                data = JSON.parse(localStorage.getItem('listProducts'));
                myCartDetailsPage.products = data == null ? [] : data;
            });

            self.totalPrice()
            self.deleteCartItem()
        }
    }

    if ($pageCart.length) {
        myCartDetailsPage.init();
    }
})
