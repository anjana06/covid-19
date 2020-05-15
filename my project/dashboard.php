<?php
 include ('connection.php');
 session_start();
if(!isset($_SESSION['uname']))
{
   header('Location:login.php');
}
?>

<?php
$id=$_SESSION['userid']; 
if($conn)
{
	$sql="select * from myrecord where uid='$id'";
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
          <link href="css/960_12_col.css" rel="stylesheet"/>
         <title> DASHBOARD </title>
         <link href="css/dashboard.css" rel="stylesheet"/>
   </head>
   <body>
    <div class="container_12">
      <header>
                 <div class="grid_3">
                     <img src="image/heading.jpg" alt="logo" width="950px" height="300px"/>
                 </div>
                 <div class="grid_3">
                 <h1 align="center"> DASHBOARD</h1><br><br>
                </div>
                <div class="grid_3">
                 <a href="logout.php"><button class="button button1">LOGOUT</button></a>
               </div>
               <div class="grid_3">
               <h3><a href="formnew.php" target="_blank"><button class="button button2">ADD TASK</button></a></h3>
             </div>
             <div class="clear"></div>
       </header>    
       <br>  
      <table border=1 align="center">
      <tr> 
           <th> Serial No. </th>
           <th>GOING TO</th>
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
           <td align="center"> <?php echo $sr; ?>
           <td> <?php echo $row['goingto'];?></td>
           <td><?php echo $row['detail'];?></td>
           <td><?php echo $row['date'];?></td>
           <td><a href="edit.php?tid=<?php echo$row['id']?>">Edit</a></td>
           <td><a href="delete.php?tid=<?php echo$row['id'] ?>">Delete</a></td>
          </tr>
          <?php
             $sr++;
              }
          ?>
      </table>
    </div>
   </body>


</html>