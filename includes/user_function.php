<?php
/**
 * Created by IntelliJ IDEA.
 * User: ganesh
 * Date: 22-10-2017
 * Time: 13:57
 */

    include ("config/connection.php");

    function addUser(){
        global $con;
        $erMail = "This email is already associate with other account.!!";
        if(isset($_POST['sign_up'])){

            $name = $_POST['User_name'];
            $email = $_POST['User_mail'];
            $pass = $_POST['User_pswd'];
            $country = $_POST['User_country'];
            $gender = $_POST['User_gender'];
            $dob = $_POST['User_birth'];
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
                    echo "<script>alert('Registration Successful!')</script>";
                }
            }

        }
    }

?>