<?php 
session_start();
$DB_user = "root";
$DB_host="localhost";
$DB_password="root";
$DB_name="ecommerceprototype";


$conn = mysqli_connect($DB_host,$DB_user,$DB_password,$DB_name);

if(!$conn){
    die("Connection failed:" . mysqli_connect_error());
}
?>