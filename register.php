<?php
// session_start();
ob_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


$titel = 'register';

include 'desgin/header.php';
include 'desgin/breadcrumb.php';
// include 'app/request/Valadtion.php';
include 'app/model/User.php';
include 'service/mail.php';
if($_POST){
//     $registerRequest = new valadton('email',$_POST['email']);
//    $resultRequier =  $registerRequest->Requier();
//    $resultRgex=  $registerRequest->rgex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');

// $resultunique =  $registerRequest->unique('users');

// if(empty($resultRequier)){
//     $resultRgex=  $registerRequest->rgex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');
// if(empty($resultRgex)){
//     $resultunique =  $registerRequest->unique('users');
//     if(empty($resultunique)){

//     }

// }

// }

// $registerRequestPhone = new valadton('phone',$_POST['phone']);
// $resultRequierPhone =  $registerRequest->Requier();
// $resultRgexPhone=  $registerRequest->rgex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');

// $resultuniquePhone =  $registerRequest->unique('users');

// if(empty($resultRequierPhone)){
//  $resultRgexPhone=  $registerRequest->rgex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');
// if(empty($resultRgexPhone)){
//  $resultuniquePhone =  $registerRequest->unique('users');
//  if(empty($resultuniquePhone)){

//  }

// }

// }
   
// $registerRequestPassword = new valadton('phone',$_POST['phone']);
// $resultRequierPassword =  $registerRequest->Requier();
// $resultRgexPassword=  $registerRequest->rgex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');

// $resultuniquePassword =  $registerRequest->unique('users');

// if(empty($resultRequierPassword)){
//     $resultRgexPassword=  $registerRequest->rgex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');
// if(empty($resultRgexPhone)){
//     $resultuniquePassword =  $registerRequest->unique('users');
//  if(empty($resultuniquePassword)){

//  }

// }

// }








$objectUser = new User;

$objectUser->setFirst_name($_POST['first_name']);
$objectUser->setLast_name($_POST['last_name']);
$objectUser->setEmail($_POST['email']);
$objectUser->setPhone($_POST['phone']);
$objectUser->setGender($_POST['gender']);
$objectUser->setPassword($_POST['password']);


$code = rand(10000,99999);
$objectUser->setCode($code);

$mail_result =  $objectUser->create();
$subject = 'vervy cood';
$body = "hellow mr  {$_POST['first_name']} {$_POST['last_name']}  your code =  $code ";


// $mail = new mail($_POST['email'],$subject,$body);


//  $mail->sendMail();

 if( $mail_result){
    $_SESSION['cheak_code'] = $_POST['email'] ;
    header("location:cheak_code.php");

 }



}
?>


		<!-- header end -->
        <!-- Breadcrumb Area Start -->
 
		<!-- Breadcrumb Area End -->
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                           
                                <a  class="active" data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                
                                <div id="lg2" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">

                                        
                                            <form  method="post">
                                                <input type="text" name="first_name" placeholder="first_name" value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name'] ;}else{'';} ?>">
                                                <input type="text" name="last_name" placeholder="last_name" value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name'] ;}else{'';} ?>">
                                                <input name="email" placeholder="email" type="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'] ;}else{'';} ?> ">
                                                
                                                <?=  empty($resultRequier) ? "" : "<div class='alert alert-danger'> $resultRequier  </div>"   ?>
                                                <?=  empty($resultRgex) ? "" : "<div class='alert alert-danger'> $resultRgex  </div>"   ?>
                                                <?=  empty($resultunique) ? "" : "<div class='alert alert-danger'> $resultunique  </div>"   ?>
                                                <input type="number" name="phone" placeholder="phone" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'] ;}else{'';} ?>" >
                                                <?=  empty($resultRequierPhone) ? "" : "<div class='alert alert-danger'> $resultRequierPhone  </div>"   ?>
                                                <?=  empty($resultRgexPhone) ? "" : "<div class='alert alert-danger'> $resultRgexPhone  </div>"   ?>
                                                <?=  empty($resultuniquePhone) ? "" : "<div class='alert alert-danger'> $resultuniquePhone  </div>"   ?>
                                                <input type="password" name="password" placeholder="Password">
                                                <?=  empty($resultRequierPassword) ? "" : "<div class='alert alert-danger'> $resultRequierPassword  </div>"   ?>
                                                <?=  empty($resultRgexPassword) ? "" : "<div class='alert alert-danger'> $resultRgexPassword  </div>"   ?>
                                                <?=  empty($resultuniquePassword) ? "" : "<div class='alert alert-danger'> $resultuniquePassword  </div>"   ?>
                                                <input type="password" name="password_confirm" placeholder="password_confirm">
                                                <select name="gender" class="form-control" id="" >
                                                    <option <?php if(isset($_POST['gender']) && $_POST['gender'] == 'm'){echo 'selected';}else{'';}  ?> value="m">Male</option>
                                                    <option <?php if(isset($_POST['gender']) && $_POST['gender'] == 'f'){echo 'selected';}else{'';}  ?> value="f">Female</option>
                                                </select>
                                                <br>
                                                <div class="button-box">
                                                    <button type="submit"><span>Register</span></button>
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
        <footer class="footer-area pt-75 gray-bg-3">
            <div class="footer-top gray-bg-3 pb-35">
                <div class="container">
                    <div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget mb-40">
                                <div class="footer-title mb-25">
                                    <h4>My Account</h4>
                                </div>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="my-account.php">My Account</a></li>
                                        <li><a href="about-us.php">Order History</a></li>
                                        <li><a href="wishlist.php">WishList</a></li>
                                        <li><a href="#">Newsletter</a></li>
                                        <li><a href="about-us.php">Order History</a></li>
                                        <li><a href="#">International Orders</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget mb-40">
                                <div class="footer-title mb-25">
                                    <h4>Information</h4>
                                </div>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="about-us.php">About Us</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Customer Service</a></li>
                                        <li><a href="#">Return Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget mb-40">
                                <div class="footer-title mb-25">
                                    <h4>Quick Links</h4>
                                </div>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="#">Support Center</a></li>
                                        <li><a href="#">Term & Conditions</a></li>
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Help</a></li>
                                        <li><a href="#">FAQS</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget footer-widget-red footer-black-color mb-40">
                                <div class="footer-title mb-25">
                                    <h4>Contact Us</h4>
                                </div>
                                <div class="footer-about">
                                    <p>Your current address goes to here,120 haka, angladesh</p>
                                    <div class="footer-contact mt-20">
                                        <ul>
                                            <li>(+008) 254 254 254 25487</li>
                                            <li>(+009) 358 587 657 6985</li>
                                        </ul>
                                    </div>
									<div class="footer-contact mt-20">
                                        <ul>
                                            <li>yourmail@example.com</li>
                                            <li>example@admin.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom pb-25 pt-25 gray-bg-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copyright">
                                <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="payment-img f-right">
                                <a href="#">
                                    <img alt="" src="assets/img/icon-img/payment.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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


    <?php  ob_flush()  ?>

</html>
