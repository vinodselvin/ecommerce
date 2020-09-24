$(document).on("click", ".remove-item-cart", function(){
    var id = $(this).data('cart-id');
    
    if(id){
        $.ajax({
            url: BASE_URL + "/api/cart/remove",
            data: {cart_id: id},
            type: "POST",
            success: function () {
                window.location.reload();
            }
        });
    }
    else{
        window.location.reload();
    }
})

$(document).on("click", ".start-payment", function(){
    
    var data = $("#user-details-form").serializeArray();
    
    var post = {};
    var validation = true;
    var config = {
//        user: {
            firstname: "user", lastname: "user", email: "user", phone_no: "user",
//        },
//        address:{
            number: "address", street: "address", city: "address", pincode: "address",
//        }
    };
    
    var user = {};
    var address = {};
    
    $.each(data, function(k, v){
       if(v.value === ""){
           alert("Error: " + v.name.toUpperCase() + " Field is required!");
           validation = false;
           return false;
       }
       else{
           if(config[v.name] == "user"){
               user[v.name] = v.value;
           }
           else{
               address[v.name] = v.value;
           }
       }
    });
    
    if(validation){
        
        post.user = user;
        post.address = address;
        
        $.ajax({
            url: BASE_URL + "/api/cart/pay",
            type: "POST",
            data: post,
            success: function (data) {
                
                data = JSON.parse(data);
                
                if(data && data.hasOwnProperty("url")){
                    
                    window.localStorage.removeItem("cart");
                
                    window.location.href= data.url;
                    
                }
                else{
                    window.location.reload();
                }
            }
        });
    }
    
})