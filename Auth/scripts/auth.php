<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("Location: /events_app/?p=login");
}
?>