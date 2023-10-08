<?php

session_start();

//establish database connection
$host = "localhost";
$user = "root";
$password = "Root123";
$db = "schoolproject";
$port = "3307";
$con = mysqli_connect($host, $user, $password, $db, $port);

//to check if connection is established or not
if ($con === false) {
    die("Connection Error");
}

//$_server gives additional info about server check if method is post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //form data would be stored as array access it and store in some variable

    $name = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "Select * from user where username ='" . $name . "' and password='" . $pass . "'";

    //query execution
    $result = mysqli_query($con, $sql);

    //result array returned
    $row = mysqli_fetch_array($result);
}

//if result usertype in array is student move to studenthome.php
if ($row["usertype"] == "student")
{
    // $_SESSION['username']=$name;
    // $_SESSION['usertype']="student";
    header("location:studenthome.php");
} 

else if ($row["usertype"] == "admin")
{
    // $_SESSION['username']=$name;
    // $_SESSION['usertype']="admin";
    header("location:adminhome.php");
} 
else

//session is created and error message is to be displayed on login page so creat session with id loginmessage and value as message go to login page display it.
{
    $message= "username or password do not match";
			$_SESSION['loginMessage']=$message;

			header("location:login.php");
}

?>