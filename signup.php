<?php
$conn = mysqli_connect('localhost','root','','auction');
if(!$conn){
    die("error in connection".mysqli_connect_error($conn));
}else{
    echo "connected";
}

if(isset($_POST['submit1'])){
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

    $check_user = mysqli_query($conn, "SELECT username FROM users where username = '$email' ");
        if(mysqli_num_rows($check_user) > 0){
                 echo('Username Already exists');
        }

    else{
        $query = "INSERT into `users` (name,username, password,email) VALUES ('$name', '$email', '$pass','$email');";
        $result = mysqli_query($conn,$query);
         if($result){
          header('Location: index.php');
        }
    }
}

?>