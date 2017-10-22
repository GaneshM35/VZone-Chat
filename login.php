<?php
/**
 * Created by IntelliJ IDEA.
 * User: ganesh
 * Date: 22-10-2017
 * Time: 17:49
 */

    session_start();
    include ("config/connection.php");

    if(isset($_POST['Login'])) {

        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pass = mysqli_real_escape_string($con, $_POST['password']);

        $getUser = "select * from users where user_mail = '$email' AND user_pass ='$pass'";
        $runUser = mysqli_query($con,$getUser);
        $checkUser = mysqli_num_rows($runUser);

        if($checkUser == 1){
            $_SESSION['user_mail'] = $email;
            echo "<script>window.open('home.php','_self')</script>";
        } else{
            echo "<script>alert('Password or Mail is not correct') </script>";
        }
    }

?>