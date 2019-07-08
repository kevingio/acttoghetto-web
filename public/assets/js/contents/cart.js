$(document).ready(function () {
    let $pageCart = $('.cart-header');

    let myProductsPage = {
        product: {},
        products: [],
        init: function () {
            this.initProduct();
        },
        initProduct: function () {
            let data = JSON.parse(localStorage.getItem('listProducts'));
            myProductsPage.products = data == null ? [] : data ;
            console.log(myProductsPage.products);
            
            $('.block2-btn-addcart').on('click', function () {
                
                let nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                let priceProduct = $(this).parent().parent().parent().find('.block2-price').html();
                let imgProduct = $(this).parent().parent().find('img').attr('src');
                
                myProductsPage.product.id = $(this).attr('data-id');
                myProductsPage.product.name = nameProduct;
                myProductsPage.product.price = priceProduct;
                myProductsPage.product.img = imgProduct;
                myProductsPage.product.qty = 1;

                console.log(myProductsPage.product.id);

                if (myProductsPage.products.length == 0) {
                    console.log('pertama');
                    
                    myProductsPage.products.push(myProductsPage.product);
                } else {
                    var temp = -1
                    console.log(myProductsPage.products);
                    
                    myProductsPage.products.map((item, index) => {
                        console.log('id :' + myProductsPage.product.id);
                        console.log('item-id :' + item.id);
                        if (myProductsPage.product.id == item.id) {
                            temp = index
                            
                        }
                    })

                    console.log('temp : ' + temp);
                    
                    if (temp != -1) {
                        console.log('kedua');
                        myProductsPage.products[temp].qty += 1
                    } else {
                        console.log('ketiga');
                        myProductsPage.products.push(myProductsPage.product);
                    }
                }
                
                localStorage.setItem("listProducts", JSON.stringify(myProductsPage.products));

                // swal(nameProduct, "is added to cart !", "success").then(function () {
                //     location.reload();                    
                // });

            });
        }
    };

    if ($pageCart.length) {
        myProductsPage.init();
    }
});
