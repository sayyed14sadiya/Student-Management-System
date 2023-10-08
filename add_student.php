<?php

// if(!isset($_SESSION['username']))
// {
//     header("location:login.php");
// }
// else if($_SESSION['usertype']=='student')
// {
//     header("location:login.php");
// }

$host="localhost";
$user="root";
$pass="Root123";
$db="schoolproject";
$port="3307";

$con=mysqli_connect($host,$user,$pass,$db,$port);

if($con===false){
    die("Connection error");
}


if(isset($_POST['add_student']))
{

    $username=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $usertype='student';

    $check="select * from user where username='$username'";

    $check_user=mysqli_query($con,$check);

    $row_count=mysqli_num_rows($check_user);

    if($row_count==1){
        echo "Username already exists";
    }
    else{

    $sql="INSERT into user(username,email,phone,usertype,password) values('$username','$email','$phone','$usertype','$password')";


    $result=mysqli_query($con,$sql);

    if($result){

        echo "successfull";

    }
    else{
        echo " Upload failed!!";
    }
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
	<?php
	include 'admin_css.php';
	?>
</head>
<body>
<?php

include 'admin_sidebar.php';

?>
	<div class="content">
		
		<h1>Add Student </h1>

        <div>
            <form action="#" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label> Email</label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone">
                </div>
                <div>
                    <label> Password</label>
                    <input type="text" name="password">
                </div>
                <div>
                    <input type="submit" name="add_student" value="Add Student">
                </div>

        </div>
	</div>

</body>
</html>