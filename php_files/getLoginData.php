<?php	
    session_start();
	include('db.php');
	
	if($_POST["action"] == "login")
	{
	$userName = $_POST['username'];
	$password = $_POST['password'];
	$sel = mysqli_query($con,"SELECT `id`, `username`, `password` FROM `tbl_user` where username='$userName' and password='$password'");
	$data = array(); 
	if($sel->num_rows > 0)
	{
	   $_SESSION['username']=$userName;
		
		echo "1";
	}
	else
	{
		echo "0";
	}
	}
	else if($_POST["action"] == "logout"){
	session_destroy();
	echo "1";
	}
	
?>