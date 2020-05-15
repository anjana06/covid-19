<?php
 include('connection.php');
 session_start();
if(!isset($_SESSION['uname']))
{
   header('Location:login.php');
}
?>

<!DOCTYPE html>
<html>
  <head> 
      <title> UPDATE</title>
      <link href="css/960_12_col.css" rel="stylesheet"/>
        <meta charset=utf8>
        <link href="css/form.css" rel="stylesheet"/>

   </head>
      <body>
        <div class="container_12">
           <div class="grid_6">
            
                     <img src="image/stayhome.png" alt="logo" width="940px" height="300px" id="image" />
                 
               </div>
               
               <div id="clear"> </div>
               <div class="grid_6">
                 <div id="sign">
          <form method="POST">
              <table >

                  <tr>
                      <td> GOING TO:</td>
                      <td><input type="text" name="t" required></td>
                      
                 </tr>  
                  <tr>
                      <td> DETAIL:</td>
                      <td><input type="text" name="det" required></td>
                      
                  </tr>  
                   <tr>
                       <td> DATE:</td>
                       <td><input type="date" name="dat" required></td>
                       
                  </tr>  
                  <tr>
                       <td><input type="submit" name="send" value="SAVE"></td>
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
  $t=$_POST['t'];
  $det=$_POST['det'];
  $dt=$_POST['dat'];
  $userid=$_SESSION['userid'];
  
  


if($conn)
{
          
           $sql="insert into myrecord(uid,goingto,detail,date)values('$userid','$t','$det','$dt')";
           $res=mysqli_query($conn,$sql);
               if($res)
                 {
                   header('Location:dashboard.php');
                 }
                   else
                 {
                   echo "failed to insert records...";
                 }
}
 else
{
  echo "connection failed";
}
}


?>
