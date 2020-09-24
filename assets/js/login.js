$(document).on("click", "#auth-btn", function(e){
    e.preventDefault();
    
    var username = $("#username").val();
    var password = $("#password").val();
    
    if(username && password){
        $.ajax({
            url: BASE_URL + "/api/auth",
            data: { username, password, cart: window.localStorage.getItem("cart")},
            type: "POST",
            dataType: "json",
            success: function (data) {
                
                if(data.error){
                    alert(data.message);
                }
                else{
                    window.localStorage.removeItem('cart');
                    fillKart();
                    
                    setTimeout(function(){
                        alert("Successfull");
                         window.location.reload();
                    }, 2000)
                   
                }
            }
        });
    }
})