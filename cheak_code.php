
    <?php

    session_start();

    include "app/model/User.php";

    // echo $_SESSION['cheak_code'];
    if($_POST){

        $errors = [];

        if(empty($_POST['code'])){

          $errors['requiere']= "<div class='alert alert-danger'> this inpt require  </div>";

        }else{

            if(strlen($_POST['code']) != 5){

                $errors['digest'] = "<div class='alert alert-danger'> must be code = 5 digest  </div>";


            }


        }

        if(empty($errors)){
            $opject_suser = new User;
            $opject_suser->setCode($_POST['code']);
            $opject_suser->setEmail($_SESSION['cheak_code']);

            $result = $opject_suser->cheak_code();
            // print_r($result);

            if($result){
                $opject_suser->setStatues(2);
                $opject_suser->setEmail_verfiy(date('Y-m-d H:i:s'));
               $updateresult = $opject_suser->makeusersverfiy();
            //    print_r( $updateresult);
            if($updateresult)
            {

                header('location:login.php');

            }
               




            }else{
                $errors['wrong'] = "<div class='alert alert-danger'> wrong code  </div>";
            }


        }

        // print_r( $errors);

    }

    $titel = 'cheak_code';

    // include 'desgin/header.php';
    // include 'desgin/breadcrumb.php';

    ?>
    <!doctype html>
<html class="no-js" lang="zxx">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $titel ?></title>
        <meta name="description" content="">
        <meta name="robots" content="noindex, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- all css here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/chosen.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/ionicons.min.css">
		<link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
		<!-- header end -->
        <!-- Breadcrumb Area Start -->
    
		<!-- Breadcrumb Area End -->
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> <?php   echo $titel ?> </h4>
                                </a>
                              
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form  method="post">
                                                <input type="number" name="code" placeholder="<?php echo $titel ?>">

                                                <?php  if(!empty($errors)){
                                                    foreach($errors as $error){
                                                        echo $error;
                                                    }

                                                } ?>
                                  
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                    
                                                       
                                                    </div>
                                                    <button class="login-toggle-btn" type="submit"><span>Login</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer style Start -->
      
         
		<!-- Footer style End -->
        
        
		<!-- all js here -->
        <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/ajax-mail.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

</html>
