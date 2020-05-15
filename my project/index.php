<?php
include('connection.php');
session_start();



 if (isset($_POST['send']))
  {
     $u=$_POST['user'];
     $p=$_POST['pass'];

     if($conn)
     {
        $sql="select * from user where Username='$u' && Password='$p'";
        $res=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($res);
        /* Accessing uid from the user table*/
        $row=mysqli_fetch_assoc($res);
        $uid=$row['uid'];
          if($num)
          {
             $_SESSION['uname']=$u;
             $_SESSION['userid']=$uid;
             header('Location:dasboard.php');
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
 