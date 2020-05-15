<?php
 include('connection.php');
 session_start();
 
if(!isset($_SESSION['uname']))
{
   header('Location:login.php');
}
?>

<?php 
$id=$_GET['tid'];

if($conn)
{
	$sql="delete from myrecord where id='$id'";
	$res=mysqli_query($conn,$sql);
	if($res)
	{
		header('Location:dashboard.php');
	}
	else
	{
		echo"unable to delete record";
	}
}
else
{
	echo"connection unsccesully";
}

?>