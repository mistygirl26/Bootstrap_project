<?php
$servername="localhost";
$username="root";
$password="root";
$dbname="userinfo";


$connect= new mysqli($servername,$username,$password,$dbname);

if($connect->connect_error)
{
    die("connection error" . $connect->connect_error);
}
?>
