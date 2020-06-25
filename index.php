<?php
session_start();
if(!((isset($_SESSION['admin'])OR isset($_SESSION['Patient']))))
{
    header('location:login.php');
}else{
include 'header.php';
include 'footer.php';
}

?>