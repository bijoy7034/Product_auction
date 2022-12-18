<?php
$con = new mysqli('localhost','root','','auction');


if (!$con) 
{
  die("Connection failed: " . mysqli_connect_error());
}



session_start();
if(isset($_POST['submit2']))
{
            $username1=mysqli_real_escape_string($con,$_POST['username1']);
            $password=mysqli_real_escape_string($con,$_POST['password1']);
            $a = "SELECT * FROM `users` WHERE username = '".$username1."' AND password = '".$password."'";
            $res = mysqli_query($con, $a);
            
            
            if(mysqli_num_rows($res)>0)
            {
                $row=mysqli_fetch_assoc($res);
                
                    $_SESSION['IS_LOGIN']=true;
                    $_SESSION['username']=$row['username'];
                    sleep(1);
                    header('location:home.php');
                    
               
            }
            else
            {
                echo "<script>confirm('Please enter correct username and password')</script>";
                
            }
}


?>
