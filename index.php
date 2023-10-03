<?php
ob_start();
include "config.php";

if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    header("location:dashboard.php");
}


$errorMsg='';

if (isset($_POST['login'])) {

    $username = $_POST['uname'];
    $password = md5($_POST['password']);

    $check_email="SELECT * from user where email like ?";
    $emailStmt= $conn->prepare($check_email);
    $emailStmt->bind_param('s',$username);
    $emailStmt->execute();
    $result_email= $emailStmt->get_result();
    if($result_email->num_rows==1){
        $data = $result_email->fetch_array();
        if($password===$data['password']){
            $email= $data['email'];
            $lastName = $data['lastname'];
            $isAgent = $data['isAgent']; 

            $_SESSION['email'] = $email;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['$isAgent'] = $isAgent;
            header("location:dashboard.php");

        }else{
            $errorMsg="Entered incorrect password";
        }
    }else{
        $errorMsg="There is no account found on these email, please register";    
    }

    // $query = mysqli_query($conn, "SELECT * FROM `user` WHERE `email`='$username' and `password`='$password'");
    // if(mysqli_num_rows($query)==1){
    //     $data = mysqli_fetch_array($query);
    //     $email= $data['email'];
    //     $lastName = $data['lastname'];
    //     $isAgent = $data['isAgent']; 
    // }
    // else{
    //    $errorMsg=""; 
    // }


    // $profile_status = $data['pro_status'];
    // $user_status = $data['status'];
    // $user_type = $data['user_type'];

    // $count = mysqli_num_rows($query);
    // if ($count == '1') {


    //     if ($user_status == '1') {
    //     } else if ($profile_status == '0') {
    //         $_SESSION['username'] = $username;
    //         $_SESSION['p_status'] = $profile_status;
    //         if ($user_type == 'Employee') {
    //             header("location:employee_profile.php");
    //         } else {
    //             header("location:agent_profile.php");
    //         }
    //     } else {
    //         $_SESSION['username'] = $username;
    //         $_SESSION['p_status'] = $profile_status;
    //         header("location:index.php");
    //     }
    // }
}

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | GOGAGA</title>
    <link rel="shortcut icon" href="assets/images/fav.png">
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <style>
        .bg-primary {
            background-color: #1b9ea3 !important;
        }

        .sssss {
            background-image: url('assets/images/login_form_bg.png');
            background-size: contain;
            background-repeat: no-repeat;

        }

        .x {
            border: none;
            border-bottom: 1px solid grey;
            
            background-color: transparent;
        }
    </style>
</head>

<body>

    <!-- <body data-layout="horizontal"> -->
    <div class="auth-page ">
        <div class="container-fluid p-0 ">
            <div class="row g-0 ">
                <div class="col-xxl-3 col-lg-4 col-md-5 col-sm-12 ">
                    <div class="auth-full-page-content d-flex p-sm-5 pb-3 pt-4">
                        <div class="w-100  ">
                            <div class="d-flex flex-column h-100 sssss">
                                <div class="mb-0 mb-md-0 text-center">
                                    <a href="" class="d-block auth-logo">
                                        <img src="assets/images/logo_1.png" alt="" height="100">
                                    </a>
                                </div>
                                <div class="auth-content my-auto ">
                                    <div class="text-center" style="color:#384557;">
                                        <h5 class="mb-0 mt-0 fs-4" >Welcome Back !</h5>
                                        <p class=" mt-2">Sign in to continue to Gogaga.</p>
                                    </div>
                                    <form class="mt-4 pt-2" action="" method="post">
                                        <div class="mb-3">

                                            <input type="text" class="form-control x" id="username" name="uname" placeholder="Mail ID">
                                        </div>
                                        <style>

                                        </style>
                                        <div class="mb-3">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    
                                                </div>
                                               
                                            </div>

                                            <div class="input-group auth-pass-inputgroup ">
                                                <input type="password" name="password" class="form-control x" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn  shadow-none ms-0 x" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>
                                        <p class="text-danger"><?php echo $errorMsg; ?></p>
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light mt-2" name="login" type="submit">Log In</button>
                                        </div>

                                        <div class="row mb-4">
                                        <div class="col">
                                                <div class="form-check"  style="color:#384557;">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label " for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col text-end">
                                            <div class="flex-shrink-0">
                                                    <div class="">
                                                        <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 font-size-11">
                                            <p>* By Logging in you agree our <a href="">Terms of Use</a> and to receive Gogaga Holidays Membership promotional emails and updates bby mail or whatsapp or message and acknowledge that you read our <a href="">Privacy Policy</a></p>
                                            <p>All rights reserved by Gogaga Holidays Membership Program owned by Gogaga Holidays Private Limited.</p>
                                            </div>
                                           

                                        </div>
                                    </form>
                                    


                                </div>
                                <div class="mt-2 text-center">
                                    <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script> Gogaga.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                <!-- end col -->
                <div class="col-xxl-9 col-lg-8 col-md-7">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="bg-overlay description-container d-flex flex-column justify-content-center">
                            <h1 class="Description_text">travel <br>made <br> easy</h1>
                            <p class="Sub-text">Making thrilling travel experiences <br> Discover the World with Gogaga <br> Where Your Holiday Dreams Come True</p>
                        </div>
                        <style>
                            .description-container {
                                background-color: #0275d8;
                                font-family: poppins;

                            }

                            .Description_text {
                                margin: 0px 25px 50px 0px;
                                color: white;
                                text-align: right;
                                font-size: 130px;
                                line-height: 110px;
                                font-family: 'Poppins', sans-serif;
                            }

                            .Sub-text {
                                font-style: italic;
                                line-height: 30px;
                                margin: 0px 25px 0px 0px;
                                font-weight: 400;
                                color: white;
                                text-align: right;
                                font-family: 'Poppins', sans-serif;
                            }
                        </style>
                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>



                        </ul>
                        <!-- end bubble effect -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
    </div>
    <!-- end row -->
    </div>
    <!-- end container fluid -->
    </div>


    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="assets/libs/pace-js/pace.min.js"></script>
    <!-- password addon init -->
    <script src="assets/js/pages/pass-addon.init.js"></script>

</body>

</html>