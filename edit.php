<?php
 include('connection.php');
 session_start();
if(!isset($_SESSION['uname']))
{
   header('Location:login.php');
}
?>

<?php
$uid=$_GET['tid'];

if($conn)
{
	$sql="select * from myrecord where id='$uid'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res); 

}
else
{
	echo"connection unsccesully";
}
?>
<html>
     <head>
     	<title>edit information </title>
          <link href="css/960_12_col.css" rel="stylesheet"/>
        <meta charset=utf8>
        <link href="css/form.css" rel="stylesheet"/>

     </head>
     <body>
          <body>
        <div class="container_12">
           <div class="grid_6">
            
                     <img src="image/stayhome.png" alt="logo" width="940px" height="300px" id="image" />
                 
               </div>
               
               <div id="clear"> </div>
               <div class="grid_6">
                 <div id="sign">
     	<form method="POST">
     		<table>
     			<tr>
     				<td>GOING TO:</td>
     				<td><input type="text" name="t" value="<?php echo $row['goingto']; ?>"></td>
     			</tr>
     			<tr>
     				<td>DETAIL:</td>
     				<td><input type="text" name="det" value="<?php echo $row['detail']; ?>"></td>
     			</tr>
     			<tr>
     				<td>DATE:</td>
     				<td><input type="date" name="dat" value="<?php echo $row['date']; ?>"></td>
     			</tr>
     			<tr>
     				<td><input type="submit" name="send" value="UPDATE"></td>
     			</tr>

     		</table>
     		
     	</form>
           </div>
       </div>
       </div>
     </body>
</html>
<?php
if(isset($_POST['send']))
{
     $ngoingto=$_POST['t'];
     $ndetail=$_POST['det'];
     $ndate=$_POST['dat'];
     if ($conn) 
     {
          $sql="update myrecord set goingto='$ngoingto',detail='$ndetail',date='$ndate' where id='$uid'";
          $res=mysqli_query($conn,$sql);
          if ($res)
          {
                 header('Location:dashboard.php');
          }
          else
          {
               echo"unable to update";
          }

     }
     else
     {
          echo"failed to connect";
     }
}
?>