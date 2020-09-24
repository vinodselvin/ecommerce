        const SITE_NAME = "fynestore";
        const BASE_URL = window.location.origin + "/" + SITE_NAME;
        const LOGGED_IN = getCookie('loggedIn');

        $(document).ready(function () {
            
            updateCartCount();
            customSort('price');
        });
        
        function fillKart(){
            if(LOGGED_IN === "1"){
                addCartToLocalStorage();
            }
        }
        
        function addCartToLocalStorage(){
            $.ajax({
                url: BASE_URL + "/api/cart",
                type: "get",
                success: function (data) {
                    if(data){
                        data = JSON.parse(data);
                        $.each(data, function(k,v){
                            addProductToCart(v.productId, v.quantity);
                        });
                    }
                }
            });
        }
        
        function addProduct(product_id, quantity = 1){
            
            var success = "Product updated to Cart!";
            
            if(LOGGED_IN == "1"){
                $.ajax({
                    url: BASE_URL + "/api/cart/new",
                    data: {
                        productId: product_id,
                        quantity: quantity
                    },
                    type: "POST",
                    success: function (data) {
                        showToast(success);
                    }
                });
            }
            else{
                showToast(success);
            }

            addProductToCart(product_id);
            
            
        }

        $(document).on("click", ".add-to-cart-btn", function () {

            var product_id = $(this).data('product-id');

            if (product_id) {
                
                addProduct(product_id, 1);
                
            } else {
                window.location.reload();
            }
        });

        function showToast(message) {

            var $toast = $("#snackbar");
            $toast.html(message);

            $toast.addClass("show");

            setTimeout(function () {
                $toast.removeClass("show");
            }, 3000);

        }

        function addProductToCart(product_id, quantity = 1) {

            var cart_obj = window.localStorage.getItem("cart");

            cart_obj = cart_obj ? JSON.parse(cart_obj) : {};

            if (!cart_obj[product_id]) {
                cart_obj[product_id] = {quantity: 0, productId: product_id};
            }

            cart_obj[product_id].quantity += quantity;

            window.localStorage.setItem("cart", JSON.stringify(cart_obj));
            
            updateCartCount();
        }

        function updateCartCount() {

            var cart_obj = window.localStorage.getItem("cart");

            var total = 0;

            if (cart_obj) {

                cart_obj = JSON.parse(cart_obj);

                for (var key in cart_obj) {
                    total += cart_obj[key].quantity;
                }
            }

            var cart = $(".total-items-in-cart");

            cart.html(total);

        }

        $(document).on("click", ".clear-filter", function (e) {
            clearFilters();
        });

        function clearFilters() {

            $(".sort_by_price").val('asc').trigger("change");

            //clear checkboxes
            $(".categ-container").each(function () {
                $(this).find("input[type='checkbox']").prop("checked", false);
            });
            
            $(".categ-container .custom-control-input").trigger("change");
        }

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }
        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ')
                    c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0)
                    return c.substring(nameEQ.length, c.length);
            }
            return null;
        }
        function eraseCookie(name) {
            document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }

        function filterProductCategory(options) {
            $(".product-container *").filter(function () {
                if ($(this).data('category')) {
                    if (options.length == 0) {
                        $(this).toggle(true);
                    } else {
                        $(this).toggle($.inArray($(this).data('category'), options) !== -1);
                    }
                }
            });
        }

        $(document).on("change", ".categ-container > .custom-control-input", function (e) {
            e.preventDefault();

            var categ = [];

            $(".categ-container").each(function () {

                var $checkbox = $(this).find("input[type='checkbox']");

                if ($checkbox.is(":checked")) {
                    categ.push($checkbox.attr('id'));
                }

            });

            filterProductCategory(categ);

        });

        $(document).on("change", ".sort_by_price", function (e) {
            e.preventDefault();

            var type = $(this).val();
            customSort('price', type);
        });


        function customSort(data, type = 'asc') {

            var data = $('.product-card');

            data.sort(function (a, b) {

                var contentA = parseFloat($(a).data('price'));
                var contentB = parseFloat($(b).data('price'));

                var sort_asc = (contentA < contentB) ? -1 : (contentA > contentB) ? 1 : 0;
                var sort_desc = (contentA > contentB) ? -1 : (contentA < contentB) ? 1 : 0;

                return type === 'desc' ? sort_desc : sort_asc;
            });

            data.prependTo($(".all-products"));
        }

function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

$(document).on("click", ".logout", function(){
    deleteAllCookies();
    window.localStorage.removeItem('cart');
    
    $.ajax({
        url: BASE_URL + "/logout",
        type: "POST",
        success: function (data) {
            window.location.href= "/"+SITE_NAME;
        }
    });
    
    
});