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

$sql="select * from admission";

$result=mysqli_query($con,$sql);

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
	
		<h1>Admission </h1>
		<h4>Applied For Admission</h4>

	<table border="1px">
		<tr>
		<th style="padding: 20px; font-size: 15px;">Name</th>
		<th style="padding: 20px; font-size: 15px;">Email</th>
		<th style="padding: 20px; font-size: 15px;">Phone</th>
		<th style="padding: 20px; font-size: 15px;">Message</th>
		</tr> 

		<?php
		while($info=$result->fetch_assoc())
		{
			?>
			<tr>
				<td style="padding: 20px;">
				<?php echo "{$info['name']}";?></td>
				<td style="padding: 20px;">
				<?php echo "{$info['mail']}";?></td>
				<td style="padding: 20px;">
				<?php echo "{$info['phone']}";?></td>
				<td style="padding: 20px;">
				<?php echo "{$info['message']}";?></td>
			</tr>
		<?php
			}
		?> 
	</table>

	</div>

</body>
</html>