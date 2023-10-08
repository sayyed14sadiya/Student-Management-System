<?php

session_start();

$host="localhost";
$user="root";
$pass="Root123";
$db="schoolproject";
$port="3307";

$con=mysqli_connect($host,$user,$pass,$db,$port);

if($con===false){
    die("Connection error");
}

if(isset($_POST['apply'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $message=$_POST['message'];

    $sql="INSERT into admission(name,mail,phone,message) values('$name','$email','$phone','$message')";

    $result=mysqli_query($con,$sql);

    if($result){

        //$_SESSION['message']="Your data is submitted successfully";
        echo "admission success";
        //header("location:index.php");

    }
    else{

        //$_SESSION['message']="Your data is not submitted";
        //header("location:index.php");
    }
}


?>
