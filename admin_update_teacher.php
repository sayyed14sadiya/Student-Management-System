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

// GET request from admin_view_teacher
if($_GET['teacher_id'])
{
    $t_id=$_GET['teacher_id'];

    $sql="select * from teacher where id='$t_id' ";

    $result=mysqli_query($con,$sql);

    $info=$result->fetch_assoc();
}

//issi page se post request ayegi updated data hoga usme
if(isset($_POST['update_teacher']))
{
    $t_name=$_POST['name'];
    $t_desc=$_POST['description'];
    $t_id=$_POST['id'];

    $sql2="Update teacher SET name='$t_name',description='$t_desc' where id='$t_id'";

    $result2=mysqli_query($con,$sql2);

    if($result2){

        header('location:admin_view_teacher.php');
        
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

	<?php
	include 'admin_css.php';
	?>
</head>
<body>
<?php

include 'admin_sidebar.php';

?>

	<div class="content">
		
		<h1>Update Teacher Data </h1>

        <form action="admin_update_teacher.php" method="POST">

            <input type="text" name="id" value="<?php echo "{$info['id']}" ?>" hidden>
            <!-- pass id from here which is required for update query -->
            <div>
                <label> Teacher Name</label>
                <input type="text" name="name" value="<?php echo "{$info['name']}" ?>">
            </div>
            <div>
                <!-- for textarea cannot use value  -->
                <label>About Teacher</label>
                <textarea name="description" rows=4>
                <?php echo "{$info['description']}" ?> 
                </textarea>
            </div>
            <div>
                <input type="submit" name="update_teacher">
            </div>
        </form>    
	</div>

</body>
</html>