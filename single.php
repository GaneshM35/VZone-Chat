<?php
/**
 * Created by IntelliJ IDEA.
 * User: ganesh
 * Date: 06-11-2017
 * Time: 20:20
 */

    session_start();
    include ("config/connection.php");
    include ("function/functions.php");
    //$user_id = $_SESSION['user_id'];

    if(!isset($_SESSION['user_mail'])){
        header("location: index.php");
    }else{

?>

<!DOCTYPE html>
<html>
<head>
    <title>VZone Chat!</title>
    <link rel="stylesheet" type="text/css" href="styles/home_style.css">
</head>
<body>

<div class="container">

    <div id = "head_wrap">
        <div id = "header">
            <ul id="menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="members.php">Members</a></li>
                <strong>Topics</strong>
                <?php

                $getTopics = "SELECT * from topics";
                $runTopics = mysqli_query($con,$getTopics);

                while ($row = mysqli_fetch_array($runTopics)) {
                    $topic_id = $row['topic_id'];
                    $topic_title = $row['topic_title'];

                    echo "<li><a href='home.php?topic=$topic_id'>$topic_title</a></li>";
                }

                ?>
            </ul>
            <form method="get" action="results.php" id="form1">
                <input type="text" name="user_query" placeholder="Search a Topic"/>
                <input type="submit" name="search" value="Search"/>
            </form>
        </div>
    </div>

    <div class="content">
        <div id="user_timeline">
            <div id="user_details">
                <?php
                $user = $_SESSION['user_mail'];
                $getUser = "SELECT * from users where user_mail='$user'";
                $runUser = mysqli_query($con,$getUser);
                $row = mysqli_fetch_array($runUser);

                $user_id = $row['user_id'];
                $name = $row['user_name'];
                $country = $row["user_country"];
                $image = $row['user_image'];
                $register = $row['registed_date'];
                $last = $row['last_login'];

                // echo $name;

                echo "<center><img src='user/user_images/$image' width='200px' height='200px' /></center>
                      <div id='user_details_block'>
                      <p><strong>Name : </strong> $name </p>
                      <p><strong>Country : </strong> $country</p>
                      <p><strong>Last Login : </strong> $last</p>
                      <p><strong>Member Since : </strong> $register</p>
                      
                      <p><a href='my_messages.php'>Messages</a> </p>
                      <p><a href='my_posts.php'>My Post</a> </p>
                      <p><a href='edit_profile.php'>Edit My Account</a> </p>
                      <p><a href='logout.php'>Logout</a> </p>
                      </div>";

                ?>
            </div>
        </div>
        <div id="content_timeline">

            <?php singlePost(); ?>

        </div>
    </div>
    <?php include 'template/footer.php'; ?>
</div >
</body>
</html>

<?php } ?>
