<?php

$host="localhost";
$user="root";
$pass="Root123";
$db="schoolproject";
$port="3307";

$con=mysqli_connect($host,$user,$pass,$db,$port);

if($_GET['student_id']){

    $user_id=$_GET['student_id'];
    $sql="delete from user where id='$user_id'";

    $result=mysqli_query($con,$sql);

    if($result){
        header("location:view_student.php");
    }

}
?>