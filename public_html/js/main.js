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
            $(".overlay").show();
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : $("#register_form").serialize(),
                success : function(data){
                    if (data == "EMAIL_ALREADY_EXISTS") {
                        $(".overlay").hide();
                        alert("It seems like your email is already used.")
                    } else if (data == "SOME_ERROR") {
                        $(".overlay").hide();
                        alert("Something Wrong");
                    } else {
                        $(".overlay").hide();
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
            $(".overlay").show();
            function sleep(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }

            async function demo() {
                await sleep(5000);
            }

            demo();
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : $("#login_form").serialize(),
                success : function(data){
                    if (data == "NOT_REGISTERED") {
                        $(".overlay").hide();
                        email.addClass("border-danger");
                        $("#e_error").html("<span class='text-danger'>It seems like you are not registered.</span>");
                    } else if (data == "PASSWORD_NOT_MATCHED") {
                        $(".overlay").hide();
                        pass.addClass("border-danger");
                        $("#p_error").html("<span class='text-danger'>Please Enter Correct Password.</span>");
                        status = false;
                    } else {
                        $(".overlay").hide();
                        console.log(data);
                        window.location.href = encodeURI(DOMAIN+"/dashboard.php");
                    }
                }
            })
        }
    });

    // Fetch Category
    fetch_category();
    function fetch_category(){
        $.ajax({
            url : DOMAIN+"/includes/process.php",
            method : "POST",
            data : {getCategory:1},
            success : function(data){
                var root = "<option value ='0'>Root</option>";
                var choose = "<option value =''>Choose Category</option>";
                $('#parent_cat').html(root+data);
                $('#select_cat').html(choose+data);
            }
        })
    }

    // Fetch Brand
    fetch_brand();
    function fetch_brand(){
        $.ajax({
            url : DOMAIN+"/includes/process.php",
            method : "POST",
            data : {getBrand:1},
            success : function(data){
                var choose = "<option value =''>Choose Brand</option>";
                $('#select_brand').html(choose+data);
            }
        })
    }

    // Add Category
    $("#category_form").on("submit", function(){
        if ($("#category_name").val() === ""){
            $("#category_name").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please Enter Category Name</span>");
        } else{
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method: "POST",
                data : $("#category_form").serialize(),
                success :function(data){
                    if(data == "CATEGORY_ADDED"){
                        $("#category_name").removeClass("border-danger");
                        $("#cat_error").html("<span class='text-success'>New Category Added Successfully!</span>");
                        $("#category_name").val("");
                        fetch_category();
                    } else{
                        alert(data);
                    }
                }
            })
        }
    })

    // Add Brand
    $("#brand_form").on("submit", function(){
        if($("#brand_name").val() === ""){
            $("#brand_name").addClass("border-danger");
            $("#brand_error").html("<span class='text-danger'>Please Enter Brand Name</span>");
        } else{
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : $("#brand_form").serialize(),
                success : function(data){
                    if(data == "BRAND_ADDED"){
                        $("#brand_name").removeClass("border-danger");
                        $("#brand_error").html("<span class='text-success'>New Band Added Successfully!</span>");
                        $("#brand_name").val("");
                        fetch_brand();
                    } else{
                        alert(data);
                    }
                }
            })
        }
    })

    // Add Product
    $("#product_form").on("submit", function(){
        if($("#product_name").val() === ""){
            $("#product_name").addClass("border-danger");
            $("#product_error").html("<span class='text-danger'>Please Enter Brand Name</span>");
        } else{
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : $("#product_form").serialize(),
                success : function(data){
                    if(data == "NEW_PRODUCT_ADDED"){
                        $("#product_name").removeClass("border-danger");
                        $("#product_error").html("<span class='text-success'>New Product Added Successfully!</span>");
                        $("#product_name").val("");
                        $("#select_cat").val("");
                        $("#select_brand").val("");
                        $("#product_price").val("");
                        $("#product_qty").val("");
                    } else{
                        alert(data);
                    }
                }
            })
        }
    })

})
