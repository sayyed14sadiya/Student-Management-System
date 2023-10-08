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

$sql="select * from user where usertype='student'";

$result=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

	<style type="text/css">
		.table_th{
			padding: 20px;
			font-size: 20px;
		}
		.entries{
			padding: 20px;
			background-color: skyblue;
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
		
		<h1>Student Data</h1>
        <table border="1px">
            <tr>
                <th class="table_th">UserName</th>
                <th class="table_th">Email</th>
                <th class="table_th">Phone</th>
                <th class="table_th">Passsword</th>
				<th class="table_th">Delete</th>
				<th class="table_th">Update</th>
            </tr>
			
			<?php

			while($info=$result->fetch_assoc())
			{

			?>
			<tr >
			<td class="entries"><?php echo "{$info['username']}";?></td>
			<td class="entries"><?php echo "{$info['email']}";?></td>
			<td class="entries"><?php echo "{$info['phone']}";?></td>
			<td class="entries"><?php echo "{$info['password']}";?></td>
			<td class="entries">
				<?php echo "<a href='delete.php?student_id={$info['id']}'>Delete</a>";?></td>
			<td class="entries">
				<?php echo "<a href='update_Student.php?student_id={$info['id']}'> Update </a>";?> </td>
			</tr>

			<?php
			}
			?>

	</div>

</body>
</html>