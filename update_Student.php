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

$id=$_GET['student_id'];

$sql="select * from user where id='$id'";

$result=mysqli_query($con,$sql);

$info=$result->fetch_assoc();

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $query="update user set username='$name',email='$email',phone='$phone',password='$password' where id='$id'";

    $result2=mysqli_query($con,$query);

    if($result2){
        header("location:view_student.php");
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
		
		<h1>Update Student </h1>

        <div>
            <form action="#" method="POST">
                <div>
                    <Label>Username</label>
                    <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>">
                </div>
                
                <div>
                    <Label>Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>">
                </div>
                <div>
                    <Label>Phone</label>
                    <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>">
                </div>
                <div>
                    <Label>Password</label>
                    <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>">
                </div><div>
                    <input type="submit" name="update" value="update">
                </div>
            </form>
        </div>

	</div>

</body>
</html>