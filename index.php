<?php 
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["restlogin"]) || $_SESSION["restlogin"] !== true){
    header("location: ./login");
    exit;
}else{
    header("location: ./home");
    exit;  
}
?>
