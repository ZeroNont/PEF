<!--
/*
*v_user_login
* Display login for user
* @input User_login and Pass_login
* @output  -
* @author Niphat Kuhokciw
* @Create @Create Date 2564-08-12
*/ -->
<!DOCTYPE html>
<html lang="en">
<style>

    #bg_login
    {/*blackguard login*/ 
        
        background-image:url("<?php echo base_url()?>pic/bg-login.jpg") ;
        background-attachment: fixed;
        background-position: top center;
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }/*end blackguard login*/ 
    .container
    {/*container*/
        position: fixed;
        width: 800px;
        height: 500px;
        margin: 15% 35%;
        padding: 10px;
    }/*end container*/
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" >
    function login() 
    { //login user
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url() . 'Login/Login/login' ?>',
            data: {
                User_login: $('#User_login').val(),
                Pass_login: $('#Pass_login').val()
            },
            success: function(data,status) 
            {// function success
                var obj = JSON.parse(data)
                if (obj.length != 0){  
                        setTimeout(function() 
                        {
                                window.location.href =
                                '<?php echo site_url() . 'Login/Login/show_user_home/' ?>'+obj.Enp_ID
                        }, 500)//function set
                     } //if
                    else{
                        alert('You entered incorrect information.')
                     } //else
            },//end success
            error: function(status) 
            {//function error
                alert('You entered incorrect information.')
            }//end error
        });
        
    } //end login user
    </script>
</head>

<body id = "bg_login">
    <!-- Login -->
    <div class="container">
        <div class="col-lg-8 col-md-7">
            <div class="card bg-secondary border-0 mb-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center mb-4">
                        
                        <h3 style = "font-size : 30px;font-family:Helvetica;color:black;">Login</h3>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><img src="<?php echo base_url()?>pic/user.png"width="20" height="20"></span>
                            </div>
                            <input class="form-control" id="User_login" placeholder="  Username" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><img src="<?php echo base_url()?>pic/password.png"width="20" height="20"></span>
                            </div>
                            <!-- Insert password -->
                            <input class="form-control" id="Pass_login" placeholder="  Password" type="password" required>
                            
                        </div>
                    </div>
                    <div class="text-center">
                        <!-- Button login -->
                        <button type="submit" class="btn btn-danger my-4" onclick='login()'>Sign In</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------------------------------------------- End Login --------------------------------------------------->
</body>
</html>

