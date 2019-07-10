$(document).ready(function () {
    let $pageCart = $('.cart-header');

    let myProductPageDetail = {
        product: {},
        products: [],
        init: function () {
            this.initProduct();
            this.totalPrice();
        },
        displayCartItem: function () {
            $('.header-cart-wrapitem').children().remove();
            myProductPageDetail.products.map((item, index) => {
                let html = '<li class="header-cart-item" data-id="' + item.id + '">'
                    + '<div class="header-cart-item-img">'
                    + '<img src="' + item.img + '" alt="IMG">'
                    + '</div>'
                    + '<div class="header-cart-item-txt">'
                    + '<a href="#" class="header-cart-item-name">'
                    + item.name
                    + '</a>'
                    + '<span class="header-cart-item-info">'
                    + item.price
                    + ' x '
                    + item.qty
                    + '</span>'
                    + '</div>'
                    + '</li>';
                $('.header-cart-wrapitem').append(html);

                this.deleteCartItem();

            })
        },
        deleteCartItem: function () {
            let self = this
            $('.header-cart-item-img').on('click', function () {
                let cartId = $(this).parent().attr('data-id')

                myProductPageDetail.products.map((item, index) => {
                    if (cartId == item.id) {
                        myProductPageDetail.products.splice(index, 1)
                        $(this).parent().remove()
                        return
                    }
                })
                $('.header-wrapicon2 .header-icons-noti').text(myProductPageDetail.products.length)

                self.totalPrice();
                localStorage.setItem("listProducts", JSON.stringify(myProductPageDetail.products));
            })
        },
        totalPrice: function () {
            var totalCart = 0

            myProductPageDetail.products.map((item, index) => {
                totalCart += (item.qty * item.rawPrice)
            })

            $('.header-cart-total .total-cart').text('Rp ' + totalCart.toLocaleString(
                "de-DE", { minimumFractionDigits: 2 }
            ));
        },
        initProduct: function () {
            let self = this;
            let data = JSON.parse(localStorage.getItem('listProducts'));
            myProductPageDetail.products = data == null ? [] : data;
            $('.header-wrapicon2 span').text(myProductPageDetail.products.length);
            this.displayCartItem()
            $('.btn-addcart-product-detail').on('click', function () {
                data = JSON.parse(localStorage.getItem('listProducts'));
                myProductPageDetail.products = data == null ? [] : data;

                let nameProduct = $(this).parent().parent().parent().parent().parent().find('.product-detail-name').html();
                let priceProduct = $(this).parent().parent().parent().parent().parent().find('.product-detail-price').html();
                let qty = $(this).parent().parent().find('.wrapper-num-product .num-product').val();
                let imgProduct = $(this).parent().parent().parent().parent().parent().find('.product-detail-main-img').attr('src');
                let size = $(this).parent().parent().parent().find('select.selection-2').val();
                
                

                myProductPageDetail.product.id = $(this).attr('data-id');
                myProductPageDetail.product.rawPrice = $(this).attr('data-price');
                myProductPageDetail.product.name = nameProduct;
                myProductPageDetail.product.price = priceProduct;
                myProductPageDetail.product.img = imgProduct;
                myProductPageDetail.product.qty = parseInt(qty);
                myProductPageDetail.product.size = size;

                if (myProductPageDetail.products.length == 0) {
                    myProductPageDetail.products.push(myProductPageDetail.product);
                } else {
                    var temp = -1

                    myProductPageDetail.products.map((item, index) => {
                        if (myProductPageDetail.product.id == item.id) {
                            temp = index
                        }
                    })

                    if (temp != -1) {
                        myProductPageDetail.products[temp].qty += myProductPageDetail.products[temp].qty
                    } else {
                        myProductPageDetail.products.push(myProductPageDetail.product);
                    }
                }

                localStorage.setItem("listProducts", JSON.stringify(myProductPageDetail.products));

                swal(nameProduct, "is added to cart !", "success").then(function () {
                    $('.header-wrapicon2 span').text(myProductPageDetail.products.length)

                    console.log(myProductPageDetail.products);
                    
                    self.totalPrice()
                    self.deleteCartItem()
                    self.displayCartItem()
                });

            });
        }
    };

    if ($pageCart.length) {
        myProductPageDetail.init();
    }
});
