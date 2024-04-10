<?php

session_start();
include '../app/model/User.php';
if(isset($_POST["login"]) ){

   
if(empty($_POST['email'])){

    header('location:../login.php?email_login=this email require'); 
    // $_SESSION['email_login'] = 'this eamil require';

   
}elseif(empty($_POST['password'])){
    header('location:../login.php?password_login=this password require'); 
}
elseif(empty($_GET)){

    $objectuser = new User();

    $objectuser->setEmail($_POST['email']);
    $objectuser->setPassword($_POST['password']);
  $result=   $objectuser->login();

//   print_r($result);die;

    if($result){

        $user = $result->fetch_assoc();
        // print_r($user);
        // echo $user['statues'];
        if($user['statues'] ==2){

            if(isset($_POST['remeper_me'])){
                setcookie('remeper_me',$_POST['email'],time() + (24*60*60) *30 *12 ,'/');
            }
            $_SESSION['user'] = $user;
            header("location:../index.php");

        }elseif($user['statues'] ==1){
            $_SESSION['user'] = $user['email'];
            header("location:../cheak_code.php");

        }else{
            header("location:../desgin/error.php");
        }

    }else{
        header('location:../login.php?wrong_login=wrong login'); 
    }
}





   

 
}else{
  header('location:../desgin/error.php') ;
}





?>