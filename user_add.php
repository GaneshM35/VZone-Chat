<?php
/**
 * Created by IntelliJ IDEA.
 * User: ganesh
 * Date: 22-10-2017
 * Time: 16:42
 */
include ("config/connection.php");

$erMail = "This email is already associate with other account.!!";
if(isset($_POST['sign_up'])){

    $name = mysqli_real_escape_string($con,$_POST['User_name']);
    $email = mysqli_real_escape_string($con,$_POST['User_mail']);
    $pass = mysqli_real_escape_string($con,$_POST['User_pswd']);
    $country = mysqli_real_escape_string($con,$_POST['User_country']);
    $gender = mysqli_real_escape_string($con,$_POST['User_gender']);
    $dob = mysqli_real_escape_string($con,$_POST['User_birth']);
    $date = date("d-m-y");
    $status = "unverified";
    $post = "NO";
    $image = "default.png";

    $getMail = "select * from users where user_mail = '$email'";
    $callMail = mysqli_query($con,$getMail);
    $checkMail = mysqli_num_rows($callMail);

    if($checkMail == 1){
        echo $erMail;
        exit();
    }

    if(strlen($pass)< 8 ){
        echo "Password should be minimum 8 Characters";
        exit();
    } else{
        $insert = "insert into users (user_name,user_mail,user_pass,user_country,user_gender,user_birth,user_image,registed_date,last_login,status,posts) VALUES ('$name','$email','$pass','$country','$gender','$dob','$image','$date','$date','$status','$post')";
        $run_insert = mysqli_query($con,$insert);

        if($run_insert){
            $_SESSION['user_mail'] = $email;
            echo "<script>alert('Registration Successful!');</script>";
            echo  "<script>window.open('home.php','_self' );</script>";
        }
    }

}

?>