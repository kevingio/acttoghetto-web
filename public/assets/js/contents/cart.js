$(document).ready(function () {
    let $pageCart = $('.cart-header');

    let myProductsPage = {
        product: {},
        products: [],
        init: function () {
            this.initProduct();
            this.totalPrice();
        },
        displayCartItem: function () {
            $('.header-cart-wrapitem').children().remove();
            myProductsPage.products.map((item, index) => {
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
                
                myProductsPage.products.map((item, index) => {
                    if (cartId == item.id) {
                        myProductsPage.products.splice(index, 1)
                        $(this).parent().remove()
                        $('.table-row-item-cart[data-id="' + item.id +'"]').remove();
                        return
                    }
                })
                $('.header-wrapicon2 .header-icons-noti').text(myProductsPage.products.length)

                self.totalPrice();
                localStorage.setItem("listProducts", JSON.stringify(myProductsPage.products));
            })
        },
        totalPrice: function () {
            var totalCart = 0

            myProductsPage.products.map((item, index) => {
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
            myProductsPage.products = data == null ? [] : data ;
            $('.header-wrapicon2 span').text(myProductsPage.products.length);
            this.displayCartItem()
            $('.block2-btn-addcart').on('click', function () {
                data = JSON.parse(localStorage.getItem('listProducts'));
                myProductsPage.products = data == null ? [] : data ;
                
                let nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                let priceProduct = $(this).parent().parent().parent().find('.block2-price').html();
                let imgProduct = $(this).parent().parent().find('img').attr('src');
                
                myProductsPage.product.id = $(this).attr('data-id');
                myProductsPage.product.rawPrice = $(this).attr('data-price');
                myProductsPage.product.name = nameProduct;
                myProductsPage.product.price = priceProduct;
                myProductsPage.product.img = imgProduct;
                myProductsPage.product.qty = 1;

                if (myProductsPage.products.length == 0) {
                    myProductsPage.products.push(myProductsPage.product);
                } else {
                    var temp = -1
                    
                    myProductsPage.products.map((item, index) => {
                        if (myProductsPage.product.id == item.id) {
                            temp = index
                        }
                    })
                    
                    if (temp != -1) {
                        myProductsPage.products[temp].qty += 1
                    } else {
                        myProductsPage.products.push(myProductsPage.product);
                    }
                }
                
                localStorage.setItem("listProducts", JSON.stringify(myProductsPage.products));

                swal(nameProduct, "is added to cart !", "success").then(function () {
                    $('.header-wrapicon2 span').text(myProductsPage.products.length)
                    
                    self.totalPrice()
                    self.deleteCartItem()
                    self.displayCartItem()
                });

            });
        }
    };

    if ($pageCart.length) {
        myProductsPage.init();
    }
});
