<?php
 include ('connection.php');
 session_start();
if(!isset($_SESSION['uname']))
{
   header('Location:index.php');
}
?>

<?php
$id=$_SESSION['userid']; 
if($conn)
{
	$sql="select * from task where uid='$id'";
	$res=mysqli_query($conn,$sql);
	$n=mysqli_num_rows($res);
	if($n==0)
	{
		echo"no record found";
	}
}
else
{
	echo"failed to connect";
}

?>
<html>
   <head>
         <title> DASHBOARD </title>
   </head>
   <body>
      <h2 align="center"> DASHBOARD</h2><br><br>
      <a href="logout.php">LOGOUT</a>
      <h3><a href="formnew.php" target="_blank">ADD TASK</a></h3>
      <table border=1 align="center">
      <tr> 
           <th> serial no.</th>
           <th>TITLE</th>
           <th>DETAIL</th>
           <th>DATE</th>
           <th>EDIT</th>
           <th>DELETE</th>
      </tr>
         <?php
          $sr=1;
         while($row=mysqli_fetch_assoc($res))
         {
         ?>
          <tr>
           <td> <?php echo $sr; ?>
           <td> <?php echo $row['title'];?></td>
           <td><?php echo $row['detail'];?></td>
           <td><?php echo $row['date'];?></td>
           <td><a href="edit.php?tid=<?php echo$row['id']?>"> Edit</a></td>
           <td><a href="delete.php?tid=<?php echo$row['id'] ?>">Delete</a></td>
          </tr>
          <?php
             $sr++;
              }
          ?>
      </table>
   </body>


</html>