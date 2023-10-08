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

$data=mysqli_connect($host,$user,$pass,$db,$port);


    if(isset($_POST['add_teacher']))
    {
    $t_name=$_POST['name'];
    $t_description=$_POST['description'];

    $sql="Insert into teacher (name,description) values ('$t_name','$t_description')";

    $result=mysqli_query($data,$sql);

    if($result){
        header('location:admin_add_teacher.php');
    }
    
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Teacher</title>

	<?php
	include 'admin_css.php';
	?>
</head>
<body>
<?php

include 'admin_sidebar.php';

?>

	<div class="content">
		
		<h1>Add Teacher</h1>
        <div>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Teacher Name</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label> Description</label>
                    <textarea name="description"></textarea>
                </div>
                
                <div>
                    <input type="submit" name="add_teacher"
                    value="Add teacher">
                </div>
            </form>        
       </div>       

	</div> 

</body>
</html>