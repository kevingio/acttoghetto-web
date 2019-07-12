$(document).ready(function () {
    let $pageCart = $('.wrap-table-shopping-cart');

    let myCartDetailsPage = {
        products: [],
        init: function () {
            let self = this
            this.initProduct();
            this.deleteCartItem();
            $(document).on('change', '.selection-2', function () {
                let value = $(this).val()
                let index = $(this).attr('name')
                myCartDetailsPage.products[index].size = value

                localStorage.setItem("listProducts", JSON.stringify(myCartDetailsPage.products));
                self.displayCartHeaderItem();
            })

            $(document).on('change', '.item-qty', function () {
                let value = $(this).val()
                let index = $(this).attr('name')

                if(value < 1) {
                    value = 1
                    $(this).val(value)
                }

                myCartDetailsPage.products[index].qty = value
                self.totalPrice(index + 1)

                localStorage.setItem("listProducts", JSON.stringify(myCartDetailsPage.products));
                self.displayCartHeaderItem();
            })
        },
        initSelect2: function ($elem) {
            $('.selection-2').select2({
                minimumResultsForSearch: -1,
                width: 'resolve'
            });
        },
        displayCartHeaderItem: function () {
            $('.header-cart-wrapitem').children().remove();
            myCartDetailsPage.products.map((item, index) => {
                let html = '<li class="header-cart-item" data-id="' + item.id + '">'
                    + '<div class="header-cart-item-img">'
                    + '<img src="' + item.img + '" alt="IMG">'
                    + '</div>'
                    + '<div class="header-cart-item-txt">'
                    + '<a href="/product/' + item.id + '" class="header-cart-item-name">'
                    + item.name
                    + '</a>'
                    + '<p class="font-weight-bold">Size: ' + item.size + '</p>'
                    + '<span class="header-cart-item-info">'
                    + item.price
                    + ' x '
                    + item.qty
                    + '</span>'
                    + '</div>'
                    + '</li>';
                $('.header-cart-wrapitem').append(html);

            })
        },
        displayCartItem: function () {
            let total = 0

            myCartDetailsPage.products.map((item, index) => {
                total = (item.qty * item.rawPrice)

                let sizeOption = JSON.parse(item.sizeOption)
                let sizeOptionHtml = ''

                sizeOption.map(size => {
                    if(size.text == item.size) {
                        sizeOptionHtml += '<option class="selected-size-detail" value"' + size.text + '" selected>' + size.text + '</option>'
                    } else {
                        sizeOptionHtml += '<option value="' + size.text + '">' + size.text + '</option>'
                    }
                })

                let html = '<tr class="table-row-item-cart" data-id="' + item.id + '">'
                    + '<td>'
                    + '<div class="b-rad-4 o-f-hidden">'
                    + '<a href="/product/' + item.id + '"><img class="max-w-200" src="' + item.img + '" alt="IMG-PRODUCT"></a>'
                    + '</div>'
                    + '</td>'
                    + '<td><a href="/product/' + item.id + '">' + item.name + '</a></td>'
                    + '<td class="text-center" width="15%">'
                    + '<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">'
                    + '<select class="selection-2" name="' + index + '">'
                    + sizeOptionHtml
                    + '</select>'
                    + '</div>'
                    + '</td>'
                    + '<td width="15%">'+ item.price +'</td>'
                    + '<td class="text-center" width="9%">'
                    + '<div class="w-100 p-2 bo4 m-b-12">'
                    + '<input class="sizefull s-text7 p-l-15 p-r-15 item-qty" type="text" name="' + index + '" autocomplete="off" value="' + item.qty + '" required>'
                    + '</div>'
                    + '</td>'
                    + '<td class="total-price-qty-list-cart" width="15%">Rp ' + total.toLocaleString("de-DE", { minimumFractionDigits: 0 }) +'</td>'
                    + '<td class="cart-list-delete-icon text-center">'
                    + '<a href="javascript: void(0)"><i class="fas fa-trash"></i></a>'
                    + '</td>'
                    + '</tr>';
                $('.table-shopping-cart tbody').append(html);
            })
            this.initSelect2()
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
        totalPrice: function (idx = -1) {
            var totalCart = 0

            myCartDetailsPage.products.map((item, index) => {
                totalCart += (item.qty * item.rawPrice)
            })

            $('.header-cart-total .total-cart').text('Rp ' + totalCart.toLocaleString(
                "de-DE", { minimumFractionDigits: 0 }
            ));
            $('.subtotal-cart-list-wrapper .subtotal-cart-list').text('Rp ' + totalCart.toLocaleString(
                "de-DE", { minimumFractionDigits: 0 }
            ));
            $('.total-cart-list-wrapper .total-cart-list').text('Rp ' + totalCart.toLocaleString(
                "de-DE", { minimumFractionDigits: 0 }
            ));

            if(idx != -1) {
                $('tr:nth-of-type(' + idx +') .total-price-qty-list-cart').text('Rp ' + totalCart.toLocaleString(
                    "de-DE", { minimumFractionDigits: 0 }
                ))
            }
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
