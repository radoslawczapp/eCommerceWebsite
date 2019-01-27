$(document).ready(function(){
    var DOMAIN = "http://localhost/eCommerceWebsite/public_html";

    // Register Validation
    $("#register_form").on("submit", function(){
        var status = false;
        var name = $("#username");
        var email = $("#email");
        var pass1 = $("#password1");
        var pass2 = $("#password2");
        var type = $("#usertype");
        var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

        // Name validation
        if (name.val() == "" || name.val().length < 6) {
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Name should be more than 6 characters.</span>");
            status = false;
        } else{
            name.removeClass("border-danger");
            $("#u_error").html("");
            status = true;
        }
        // Email validation
        if (!e_patt.test(email.val())) {
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please Enter Valid Email Address.</span>");
            status = false;
        } else{
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }
        // Password1 validation
        if (pass1.val() == "" || pass1.val().length < 9) {
            pass1.addClass("border-danger");
            $("#p1_error").html("<span class='text-danger'>Password should have more than 9 characters.</span>");
            status = false;
        } else{
            pass1.removeClass("border-danger");
            $("#p1_error").html("");
            status = true;
        }
        // Password2 validation
        if (pass2.val() == "" || pass2.val().length < 9) {
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Password should have more than 9 characters.</span>");
            status = false;
        } else{
            pass2.removeClass("border-danger");
            $("#p2_error").html("");
            status = true;
        }
        // Usertype validation
        if (type.val() == "") {
            type.addClass("border-danger");
            $("#t_error").html("<span class='text-danger'>Please choose User type.</span>");
            status = false;
        } else{
            type.removeClass("border-danger");
            $("#t_error").html("");
            status = true;
        }
        // Password match
        if ((pass1.val() == pass2.val()) && status == true) {
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : $("#register_form").serialize(),
                success : function(data){
                    if (data == "EMAIL_ALREADY_EXISTS") {
                        alert("It seems like your email is already used.")
                    } else if (data == "SOME_ERROR") {
                        alert("Something Wrong");
                    } else {
                        window.location.href = encodeURI(DOMAIN+"/index.php?msg=You are registered! Now you can login");
                    }
                }
            })
        } else{
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Password is not matched.</span>");
            status = true;
        }
    })

    // Login Validation
    $("#login_form").on("submit", function(){
        var email = $("#log_email");
        var pass = $("#log_password");
        var status = false;
        // Email Validation
        if (email.val() == "") {
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please Enter Valid Email Address.</span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }
        // Password validation
        if (pass.val() == "") {
            pass.addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>Please Enter Valid Password.</span>");
            status = false;
        } else {
            pass.removeClass("border-danger");
            $("#p_error").html("");
            status = true;
        }
        if (status) {
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : $("#login_form").serialize(),
                success : function(data){
                    if (data == "NOT_REGISTERED") {
                        email.addClass("border-danger");
                        $("#e_error").html("<span class='text-danger'>It seems like you are not registered.</span>");
                    } else if (data == "PASSWORD_NOT_MATCHED") {
                        pass.addClass("border-danger");
                        $("#p_error").html("<span class='text-danger'>Please Enter Correct Password.</span>");
                        status = false;
                    } else {
                        console.log(data);
                        // alert(data);
                        window.location.href = encodeURI(DOMAIN+"/dashboard.php");
                    }
                }
            })
        }
    });

    // Fetch category
    fetch_category();
    function fetch_category(){
        $.ajax({
            url : DOMAIN+"/includes/process.php",
            method : "POST",
            data : {getCategory:1},
            success : function(data){
                var root = "<option value ='0'>Root</option>";
                $('#parent_cat').html(root+data);
            }
        })
    }
})
