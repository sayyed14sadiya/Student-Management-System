<?php

// if(!isset($_SESSION['username']))
// {
//     header("location:login.php");
// }
// else if($_SESSION['usertype']=='admin')
// {
//     header("location:login.php");
// }
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
</head>
<body>
<?php
	include 'student_sidebar.php';
?>
</body>
</html>
