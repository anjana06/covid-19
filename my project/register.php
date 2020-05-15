<?php

include('connection.php');

?>





<!DOCTYPE html>
<html>
  <head> 
      <title> Register </title>
     <link href="css/960_12_col.css" rel="stylesheet"/>
       <link href="css/register.css" rel="stylesheet"/>
   </head>
      <body>
         <div class="container_12">
           <div class="grid_6">
            
                     <img src="image/stay.gif" alt="image" id="image" />
                 
               </div>
               
               <div id="clear"> </div>

                  <div class="grid_6">
                     <div id="sign">
                      <h2> SIGN UP </h2>
          <form method="POST" >
                   <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <label><img src="image/img_avatar2.png" alt="Avatar" class="avatar"> </lable><br><br>
      <input type="file"  name="avatar" >
  </div>

              <table>
                  <tr>
                      <td> Name:</td>
                      <td><input type="text" name="name"  placeholder="Full Name....." required></td>
                      
                 </tr> 
                 <tr>
                      <td>Mobile:</td>
                      <td><input type="text" name="mno" placeholder="Mobile No..." required></td> 
                                       
                  </tr>  
                  <tr>
                      <td>Username(Email-ID):</td>
                      <td><input type="email" name="email" placeholder="Email-ID..." required></td>
                                           
                  </tr>  

                  <tr>
                      <td>Password:</td>
                     <td><input type="Password" name="pass" placeholder="e.g. @xxxZ123" id="myInput"  title= "Must contain at least one number, one special character  and one uppercase and lowercase letter, and at least 8 or more characters" required>
                      
  
                      <input type="checkbox" onclick="myFunction()">Show password </td>


                  </tr>  
                            
                   
                  
                  <tr>
                       <td colspan="2"><input type="submit" name="send" value="Register Now..."></td>
                 </tr> 
                  <tr>
                       <td colspan="2"><input type="submit" name="send" value="CANCLE"></td>
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
  if(isset($_POST['send']))
 {
   $n=$_POST['name'];
   $m=$_POST['mno'];
   $uname=$_POST['email'];
   $p=$_POST['pass'];
   
  if($conn)
  {
     
    $sqlchk="select * from login where Username='$uname'";
    $reschk=mysqli_query($conn,$sqlchk);
    $nckh=mysqli_num_rows($reschk);
    if($nckh==0)
       
    {
      $sql="insert into login(Name,Username,Password,mno) values('$n','$uname','$p','$m')";
      $res=mysqli_query($conn,$sql);
      if ($res)
      {
       

             
             echo"User Created Sucessfully....";
           
         
         
          
        
            
      }
         else
           {
            echo"Failed To Create User...";
           }

    }
    else
    {
      echo "username already exists";
    }
  }
  else
  {
    echo"connection unsuccesfully";
  }
  
 }
 ?>
