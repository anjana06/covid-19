<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html>
  <head> 
      <title> login </title>
       <link href="css/960_12_col.css" rel="stylesheet"/>
       <link href="css/login.css" rel="stylesheet"/>


   </head>
      <body>
        <div class="container_12">
           <div class="grid_6">
            
                     <img src="image/stay.gif" alt="image" id="image" />
                 
               </div>
               
               <div id="clear"> </div>

                  <div class="grid_6">
                    <div id="sign">
          <form method="POST" >
            <h2> SIGN IN </h2>
            <div class="imgcontainer">
    <label><img src="image/img_avatar2.png" alt="Avatar" class="avatar"> </lable>
  </div>
             <table>
                  <tr>
                      <td> Username:</td>
                      <td><input type="text" name="user" required></td>
                      
                 </tr>  
                   <tr>
                      <td>Password:</td>
                      <td><input type="Password" name="pass" placeholder="@abc123" id="myInput" required> 
                      <input type="checkbox" onclick="myFunction()">Show password </td>   

                                            
                  </tr>  
                  
                
                  <tr>
                       <td><input type="submit" name="send" value="LOGIN"></td>
                 </tr>   
                
                 <tr>
                   <td> New User?<a href="register.php"> Register </a> </td>
                 </tr>
                   
            </table> 
                 
                   
            
         </form>
       </div>
         
       </div>
       <div id="clear"></div>

       </div>
       <script type="text/javascript" src="js/register.js"></script>
      </body>   


 </html>   
 <?php
 if (isset($_POST['send']))
  {
     $u=$_POST['user'];
     $p=$_POST['pass'];

     if($conn)
     {
        $sql="select * from login where Username='$u' && Password='$p'";
        $res=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($res);
        $row=mysqli_fetch_assoc($res);
        $uid=$row['uid'];
          if($num)
          {
             $_SESSION['uname']=$u;
             $_SESSION['userid']=$uid;
             header('Location:dashboard.php');
          }
           else
          {
            echo"invalid Username and Password";
          }
     }
     else
     {
         echo"connection failed";
     }

  } 
 ?>
 