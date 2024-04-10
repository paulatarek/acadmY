<?php
$titel = 'my profile';
include 'desgin/header.php';
include 'app/midlleware/auth.php';
include "app/model/User.php";
// include 'desgin/breadcrumb.php.php';

?>
		<!-- Breadcrumb Area End -->
        <!-- my account start -->


        <?php 
        
               $opjectuser = new User();
               $opjectuser->setEmail($_SESSION['user']['email']);
            //    echo $_SESSION['user']['phone'];
            if($_REQUEST){

                // print_r($_FILES);die;

                $errors =[];

                if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['phone']) || empty($_POST['gender']) ){

                    $errors['all'] = "<div class= 'alert alert-danger'> all inpur require  </div>" ;                     
                }

                $opjectuser->setFirst_name($_POST['first_name']);
                $opjectuser->setLast_name($_POST['last_name']);
                $opjectuser->setPhone($_POST['phone']);
                 
          
                $opjectuser->setGender($_POST['gender']);
                if($_FILES['img']['error'] == 0){
                    $size_image = 10**6;
                    if($_FILES['img']['error'] > $size_image ){
                        $errors['size'] = "<div class= 'alert alert-danger'> size of image largest  </div>" ; 
                    }

                    $extention_img = pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION );
                    // echo  $extention_img ;

                    $extention = array('png','jpg','gif');

                    if(!in_array($extention_img, $extention)){
                        $errors['extention'] = "<div class= 'alert alert-danger'> extention not avalable  </div>" ; 


                    }

                    if(empty($errors)){
                        $photo_name = uniqid() . '.' . $extention_img;

                        $photo_path = "assets/img/$photo_name";
                        move_uploaded_file($_FILES['img']['tmp_name'],$photo_path);
                        $opjectuser->setImg($photo_name);
                    }

                  

                }

                if(empty($errors)){
                    $result =  $opjectuser->update();
                    if($result){
                        $success = "<div class= 'alert alert-success'> update success </div>";
        
                     }else{
                        $errors['update'] = "<div class= 'alert alert-danger'> update wrong </div>" ;
                     }
                }
            

       


            }
            // print_r($errors); die;

     
          $result=   $opjectuser->getuserbyemail();
        $userData =  $result->fetch_assoc();

         $userData;
        ?>
        <div class="checkout-area pb-80 pt-100">
            <div class="container">
                <div class="row">
                    <div class="ml-auto mr-auto col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                                    </div>
                                 
                                    <div id="my-account-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>My Account Information</h4>
                                                    <h5>Your Personal Details</h5>

                                                    <h5>

                                                    <?php
                                                    if(!empty($errors)){

                                                        foreach($errors as $errorss){

                                                            echo $errorss ;

                                                        }
                                                        if(isset($success)){

                                                            echo $success ;

                                                        }

                                                    }
                                                    
                                                    ?>
                                                    </h5>
                                                </div>

                                                <form action="" class="controle-group" method="post" enctype="multipart/form-data">
                                                <?php 
                                                // if(!empty($errors)){

                                                //     foreach($errors as $errorss){

                                                //     }

                                                // }
                                                ?>
                                                <div class="row" >
                                                    <div class="text-center col-md-12 col-lg-12">
                                                        <img name="image" id="img" width="200px" height="150px" src="assets/img/<?=  $userData['img'] ?>" style="cursor:pointer ; ">
                                                        <input id="file" value='$userData' name="img" type="file"  class="d-none"  >
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>First Name</label>
                                                            <input name="first_name" value=" <?php echo $userData['first_name'] ?>" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Last Name</label>
                                                            <input  name="last_name" value=" <?php echo $userData['last_name'] ?>" type="text">
                                                        </div>
                                                    </div>
                                                
                                                    </div>
                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="billing-info">
                                                        
                                                        <input type="number" name="phone" placeholder="phone" value="<?= $userData['phone'] ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label for="gender">gender</label>
                                                          <select name="gender" id="gender">
                                                        <option <?php if($userData['gender'] == 'm' ){ "selected" ;}  ?> value="m">male</option>
                                                        <option  <?php if($userData['gender'] == 'f' ){ "selected" ;}  ?> value="f">female</option>
                                                        
                                                          </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-btn">
                                                        <button type="submit">update</button>
                                                    </div>
                                                </form>
                                           
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                                    </div>
                                    <div id="my-account-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Change Password</h4>
                                                    <h5>Your Password</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Password</label>
                                                            <input type="password">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Password Confirm</label>
                                                            <input type="password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your address book entries   </a></h5>
                                    </div>
                                    <div id="my-account-3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Address Book Entries</h4>
                                                </div>
                                                <div class="entries-wrapper">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                            <div class="entries-info text-center">
                                                                <p>Farhana hayder (shuvo) </p>
                                                                <p>hastech </p>
                                                                <p> Road#1 , Block#c </p>
                                                                <p> Rampura. </p>
                                                                <p>Dhaka </p>
                                                                <p>Bangladesh </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                            <div class="entries-edit-delete text-center">
                                                                <a class="edit" href="#">Edit</a>
                                                                <a href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>4</span> <a href="wishlist.php">Modify your wish list   </a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- my account end -->
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

        <script>
          document.getElementById("img").onclick=function(){
            document.getElementById('file').click();
          }
        </script>
    </body>

</html>
