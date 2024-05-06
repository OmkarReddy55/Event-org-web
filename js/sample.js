
$.ajax({
    url: "api/v2/user-login.php",
    type: "POST",
    data: {
            user_email: "user@login.com", 
            user_password: "3112",
            user_platform: "mobile",
         },
  
    success: function(data) {
         var details = JSON.parse(data);

         console.log(details);
    
    },
    error: function() {
         alert("E4: Add Favourite Error.");
         return false;
    }
});
