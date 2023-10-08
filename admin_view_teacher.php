<?php

// if(!isset($_SESSION['username']))
// {
//     header("location:login.php");
// }
// else if($_SESSION['usertype']=='student')
// {
//     header("location:login.php");
// }

error_reporting(0);
$host="localhost";
$user="root";
$pass="Root123";
$db="schoolproject";
$port="3307";

$con=mysqli_connect($host,$user,$pass,$db,$port);

$sql="Select * from teacher";

$result=mysqli_query($con,$sql);

if($_GET['teacher_id'])
{
    $t_id=$_GET['teacher_id'];

    $sql2="Delete from teacher where id='$t_id'";

    $result3=mysqli_query($con,$sql2);

    if($result3){
        echo "Delete Success";
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
    <style type="text/css">

        .table_th{
            padding: 20px;
            font-size: 20px;
        }
        .table_td{
            padding: 20px;
            font-size: 15px;
            background-color: skyblue;
        }

    </style>    
</head>
<body>
<?php

include 'admin_sidebar.php';

?>

	<div class="content">
		
		<h1>View All Teacher Data</h1>
        
        <table border="1px">
            <tr>
                <th class="table_th">Teacher Name</th>
                <th class="table_th">About Teacheer</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>  

            <?php

            while($info=$result->fetch_assoc())
            {

            ?>
            
            <tr>
                <td class="table_td"><?php echo "{$info['name']}"?></td>
                <td class="table_td"><?php echo "{$info['description']}"?></td>
                <td>
                    <?php 
                    echo "<a href='admin_view_teacher.php?teacher_id={$info['id']}'> Delete </a>"; ?>
                </td> 
                <td>
                    <?php 
                    echo "<a href='admin_update_teacher.php?teacher_id={$info['id']}'> Update </a>"; ?>
                </td>    
            </tr> 
            <?php
            }
            ?>     
        </table>

	</div>

</body>
</html>