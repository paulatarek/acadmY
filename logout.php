<?php

session_start();
session_unset();
if(isset($_COOKIE['remeper_me'])){
    setcookie('remeper_me','',time()-100,'/');

}
session_destroy();

header('location:index.php')


?>