function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function matchPassword(password, confirm_password) {  
    if(password != confirm_password)  
    {   
      return false;  
    } else {  
      return true;  
    }  
}  

$("#bt_user_registration").click(function(){
    signup();
});

function signup()
{
    if(!$("#user_reg_name").val()){
        alert("Please enter  user_name.")
        return false;
    }
    
    if(!isEmail($("#user_reg_email").val())){
            alert("Please enter correct email.")
            return false;
    }

    if(!$("#user_reg_password").val()){
            alert("Please enter password.")
            return false;
    }

    if(!$("#user_reg_confirm_password").val()){
        alert("Please enter confirm password.")
        return false;
    }

    if(!matchPassword($("#user_reg_password").val(),$("#user_reg_confirm_password").val())){
        alert("Entered password did not match.")
        return false;
    }

    var data_frm = new FormData($("form#user_registration")[0]);
    $.ajax({
            url: "api/authenticate.php",
            type: "POST",
            data: data_frm,
            processData: false,
            contentType: false,
            success: function(data) {
                var details = JSON.parse(data);
    
                if (details["status"] == "200") {
                    alert(details["message"]);
                    window.location.replace("login.php");
                } else {
                    alert(details["message"]);
                }
            },
            error: function() {
                alert("ERROR: User signup error.");
                return false;
            }
    });
}


$("#bt_user_login").click(function(){
    login();

    // $.ajax({
    //     url: "api/v2/user-login.php",
    //     type: "POST",
    //     data: {
    //             user_email: "user@login.com", 
    //             user_password: "3112",
    //             user_platform: "mobile"
    //          },
    //     processData: true,
    //     success: function(data) {    
    //          console.log(data);
    //     },
    //     error: function() {
    //          alert("Error");
    //          return false;
    //     }
    // });

});

function login()
{
  
    
    if(!isEmail($("#user_email").val())){
            alert("Please enter correct email.")
            return false;
    }

    if(!$("#user_password").val()){
            alert("Please enter password.")
            return false;
    }

    var data_frm = new FormData($("form#user_login")[0]);
    $.ajax({
            url: "api/authenticate.php",
            type: "POST",
            data: data_frm,
            processData: false,
            contentType: false,
            success: function(data) {
                var details = JSON.parse(data);
    
                if (details["status"] == "200") {
                    alert(details["message"]);
                    window.location.replace("index.php");
                } else {
                    alert(details["message"]);
                }
            },
            error: function() {
                alert("ERROR: User signup error.");
                return false;
            }
    });
}

$("#bt_admin_login").click(function(){
    admin_login();
});

function admin_login()
{
  
    
    if(!isEmail($("#admin_email").val())){
            alert("Please enter correct email.")
            return false;
    }

    if(!$("#admin_password").val()){
            alert("Please enter password.")
            return false;
    }

    var data_frm = new FormData($("form#admin_login")[0]);
    $.ajax({
            url: "../api/authenticate.php",
            type: "POST",
            data: data_frm,
            processData: false,
            contentType: false,
            success: function(data) {
                var details = JSON.parse(data);
    
                if (details["status"] == "200") {
                    alert(details["message"]);
                    window.location.replace("index.php");
                } else {
                    alert(details["message"]);
                }
            },
            error: function() {
                alert("ERROR: User signup error.");
                return false;
            }
    });
}

$("#bt_Add_Vendor").click(function(){
    Add_Vendor();
});

function Add_Vendor()
{
  
    
    if(!isEmail($("#vendor_email").val())){
            alert("Please enter correct email.")
            return false;
    }

    if(!$("#vendor_firstname").val()){
            alert("Please enter firstname.")
            return false;
    }

    if(!$("#vendor_lastname").val()){
        alert("Please enter lastname.")
        return false;
    }

    if(!$("#vendor_bussiness").val()){
        alert("Please enter VendorBussiness.")
        return false;
    }

    var data_frm = new FormData($("form#Add_vendor")[0]);
    $.ajax({
            url: "../api/vendor.php",
            type: "POST",
            data: data_frm,
            processData: false,
            contentType: false,
            success: function(data) {
                var details = JSON.parse(data);
    
                if (details["status"] == "200") {
                    alert(details["message"]);
                    window.location.replace("index.php");
                } else {
                    alert(details["message"]);
                }
            },
            error: function() {
                alert("ERROR: User signup error.");
                return false;
            }
    });
}

$("#bt_reset_password").click(function(){
    reset_password();
});

function reset_password()
{
  
    if(!$("#vendor_password").val()){
        alert("Please enter the password.")
        return false;
    }

    if(!$("#vendor_cpassword").val()){
            alert("Please confirm the password.")
            return false;
    }

    var data_frm = new FormData($("form#reset_password")[0]);
    $.ajax({
            url: "../api/vendor.php",
            type: "POST",
            data: data_frm,
            processData: false,
            contentType: false,
            success: function(data) {
                var details = JSON.parse(data);
    
                if (details["status"] == "200") {
                    alert(details["message"]);
                    window.location.replace("login.php");
                } else {
                    alert(details["message"]);
            }
        },
        error: function() {
            alert("ERROR: User signup error.");
            return false;
        }
    });
}

$("#bt_vendor_login").click(function(){
    vendor_login();
});

function vendor_login()
{
  
    
    if(!isEmail($("#vendor_email").val())){
            alert("Please enter correct email.")
            return false;
    }

    if(!$("#vendor_password").val()){
            alert("Please enter password.")
            return false;
    }

    var data_frm = new FormData($("form#vendor_login")[0]);
    $.ajax({
            url: "../api/authenticate.php",
            type: "POST",
            data: data_frm,
            processData: false,
            contentType: false,
            success: function(data) {
                var details = JSON.parse(data);

                if (details["status"] == "200") {
                       if(details["cstatus"] == "Reset")
                       {
                            var vendor_id = details["vendor_id"];
                            alert(details["message"]);
                            window.location.replace("reset.php?id="+vendor_id);
                       }else{
                            alert(details["message"]);
                            window.location.replace("index.php");
                       }
                } else {
                   alert( details["message"]);
   
                }
            },
            error: function() {
                alert("ERROR: User signup error.");
                return false;
            }
    });
}

$("#bt_admin_profile").click(function(){
    admin_profile();
});

function admin_profile(){

    
    if(!isEmail($("#admin_profile_email").val())){
        alert("Please enter correct email.")
        return false;
    }

    if(!$("#admin_firstname").val()){
        alert("Please enter password.")
        return false;
    }

    if(!$("#admin_lastname").val()){
        alert("Please enter password.")
        return false;
    }

    var data_frm = new FormData($("form#admin_profile")[0]);
    $.ajax({
            url: "../api/profile.php",
            type: "POST",
            data: data_frm,
            processData: false,
            contentType: false,
            success: function(data) {
                var details = JSON.parse(data);

                if (details["status"] == "200") {
                       
                    alert(details["message"]);
                    window.location.replace("profile.php");
                       
                } else {
                   alert( details["message"]);
   
                }
            },
            error: function() {
                alert("ERROR: User signup error.");
                return false;
            }
    });
}

$("#bt_profile_password").click(function(){
    profile_password();
});

function profile_password()
{
    if(!$("#update_password").val()){
        alert("Please enter password.")
        return false;
    }

    if(!$("#update_cpassword").val()){
        alert("Please enter confirm password.")
        return false;
    }

    if(!matchPassword($("#update_password").val(),$("#update_cpassword").val())){
        alert("Entered password did not match.")
        return false;
    }

    var data_frm = new FormData($("form#my_profile_password")[0]);
    $.ajax({
            url: "../api/profile.php",
            type: "POST",
            data: data_frm,
            processData: false,
            contentType: false,
            success: function(data) {
                var details = JSON.parse(data);

                if (details["status"] == "200") {
                       
                    alert(details["message"]);
                    window.location.replace("logout.php");
                       
                } else {
                   alert( details["message"]);
   
                }
            },
            error: function() {
                alert("ERROR: User signup error.");
                return false;
            }
    });
}

$("#bt_add_category").click(function(){
    add_category();
});

function add_category()
{
    var data_frm = new FormData($("form#new_category")[0]);
    $.ajax({
            url: "../api/common.php",
            type: "POST",
            data: data_frm,
            processData: false,
            contentType: false,
            success: function(data) {
                var details = JSON.parse(data);

                if (details["status"] == "200") {

                    alert(details["message"]);
                    window.location.replace("content.php");

                } else {
                   alert( details["message"]);
   
                }
            },
            error: function() {
                alert("ERROR: User signup error.");
                return false;
            }
    });
}

$("#bt_add_sub_category").click(function(){
    add_sub_category();
});

function add_sub_category()
{
    var data_frm = new FormData($("form#add_sub_category")[0]);
    $.ajax({
            url: "../api/common.php",
            type: "POST",
            data: data_frm,
            processData: false,
            contentType: false,
            success: function(data) {
                var details = JSON.parse(data);

                if (details["status"] == "200") {

                    alert(details["message"]);
                    window.location.replace("content.php");

                } else {
                   alert( details["message"]);
   
                }
            },
            error: function() {
                alert("ERROR: User signup error.");
                return false;
            }
    });
}

$("#service_category").change(function(){

    $.ajax({
        url: "../api/common.php",
        type: "POST",
        data: {
                  action: "get_sub_categories", 
                  id: $(this).val(),
             },
      
        success: function(data) {
             var details = JSON.parse(data);
            var html_content = "";

            if (details["status"] == "200") 
            {   
                $("#service_sub_category_holder").empty();

                html_content += '<select class="nice-select w-100" name="service_sub_category" id="service_sub_category">';
                html_content += '<option value="">Select Sub Category...</option>';
          
                $.each(details["data"], function (key, val) 
                {
                    html_content += '<option value="'+val.id+'">'+val.dislay_name+'</option>';
                });
                
                html_content += '</select>';

                $("#service_sub_category_holder").html(html_content);
            }else{
                alert( details["message"]);
            }
        },
        error: function() {
             alert("E4: Add Favourite Error.");
             return false;
        }
    });
});

$("#bt_add_service").click(function(){
    add_service();
});

function add_service(){
    var data_frm = new FormData($("form#add_service")[0]);
    $.ajax({
            url: "../api/common.php",
            type: "POST",
            data: data_frm,
            processData: false,
            contentType: false,
            success: function(data) {
                var details = JSON.parse(data);

                if (details["status"] == "200") {

                    alert(details["message"]);
                    window.location.replace("service.php");

                } else {
                   alert( details["message"]);
   
                }
            },
            error: function() {
                alert("ERROR: User signup error.");
                return false;
            }
    });
}

$("#bt_user_profile").click(function(){
    user_profile();
});

function user_profile(){

    
    if(!isEmail($("#admin_profile_email").val())){
        alert("Please enter correct email.")
        return false;
    }

    if(!$("#admin_firstname").val()){
        alert("Please enter password.")
        return false;
    }

    if(!$("#admin_lastname").val()){
        alert("Please enter password.")
        return false;
    }

    var data_frm = new FormData($("form#user_profile")[0]);
    $.ajax({
            url: "api/profile.php",
            type: "POST",
            data: data_frm,
            processData: false,
            contentType: false,
            success: function(data) {
                var details = JSON.parse(data);

                if (details["status"] == "200") {
                       
                    alert(details["message"]);
                    window.location.replace("profile.php");
                       
                } else {
                   alert( details["message"]);
   
                }
            },
            error: function() {
                alert("ERROR: User signup error.");
                return false;
            }
    });
}

function add_to_cart(user, id, vendor, category){
    $.ajax({
        url: "api/common.php",
        type: "POST",
        data: {
                  action: "add_to_cart", 
                  user: user, 
                  id: id,
                  vendor: vendor
             },
      
        success: function(data) {
             var details = JSON.parse(data);
   
             if (details["status"] == "200") {
   
                  window.location.replace("events.php?c="+category);
   
             } else {
                  alert( details["message"]);
             }
        },
        error: function() {
             alert("E4: Add Favourite Error.");
             return false;
        }
   });
}

function remove_from_cart(user, id, vendor, category){
    $.ajax({
        url: "api/common.php",
        type: "POST",
        data: {
                  action: "remove_from_cart", 
                  user: user, 
                  id: id,
                  vendor: vendor
             },
      
        success: function(data) {
             var details = JSON.parse(data);
   
             if (details["status"] == "200") {
   
                  window.location.replace("events.php?c="+category);
   
             } else {
                  alert( details["message"]);
             }
        },
        error: function() {
             alert("E4: Add Favourite Error.");
             return false;
        }
   });
}

function add_to_cart_v2(user, id, vendor, service){
    $.ajax({
        url: "api/common.php",
        type: "POST",
        data: {
                  action: "add_to_cart", 
                  user: user, 
                  id: id,
                  vendor: vendor
             },
      
        success: function(data) {
             var details = JSON.parse(data);
   
             if (details["status"] == "200") {
   
                window.location.replace("event-details.php?s="+service);
   
             } else {
                  alert( details["message"]);
             }
        },
        error: function() {
             alert("E4: Add Favourite Error.");
             return false;
        }
   });
}

function remove_from_cart_v2(user, id, vendor, service){
    $.ajax({
        url: "api/common.php",
        type: "POST",
        data: {
                  action: "remove_from_cart", 
                  user: user, 
                  id: id,
                  vendor: vendor
             },
      
        success: function(data) {
             var details = JSON.parse(data);
   
             if (details["status"] == "200") {
   
                  window.location.replace("event-details.php?s="+service);
   
             } else {
                  alert( details["message"]);
             }
        },
        error: function() {
             alert("E4: Add Favourite Error.");
             return false;
        }
   });
}

function remove_item(id){
    $.ajax({
        url: "api/common.php",
        type: "POST",
        data: {
                  action: "remove_item", 
                  id: id,
             },
      
        success: function(data) {
             var details = JSON.parse(data);
   
             if (details["status"] == "200") {
   
                  window.location.replace("cart.php");
   
             } else {
                  alert( details["message"]);
             }
        },
        error: function() {
             alert("E4: Add Favourite Error.");
             return false;
        }
   });
}