<?php

// if(!isset($_SESSION['username']))
// {
//     header("location:login.php");
// }
// else if($_SESSION['usertype']=='admin')
// {
//     header("location:login.php");
// }

$host="localhost";
$user="root";
$pass="Root123";
$db="schoolproject";
$port="3307";

$data=mysqli_connect($host,$user,$pass,$db,$port)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
	include 'admin_css.php';
	?>
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>    
</head>
<body>
<?php
	include 'student_sidebar.php';
?>

<div class="content">
    <h1>Update Student</h1>
    <form>
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label>Phone</label>
            <input type="number" name="phone">
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="password">
        </div>
        <div>
            <input type="submit" name="update_profile">
        </div>
    </form>
</div>
</body>
</html>