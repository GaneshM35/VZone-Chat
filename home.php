<?php
    session_start();
    include ("config/connection.php");
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
                    $getUser = 'SELECT * from users where user_mail="$user"';
                    $runUser = mysqli_query($con,$getUser);
                    $row = mysqli_fetch_array($runUser,MYSQLI_BOTH);

                    $id = $row['user_id'];
                    $name = $row[1];
                    $country = $row["user_country"];
                    $image = $row['user_image'];
                    $register = $row['registed_date'];
                    $last = $row['last_login'];

                    echo $name;

                    echo "<p><img src='user/user_images/$image' width='200px' height='200px' /></p>
                          <p><strong>Name : </strong> $name </p>
                          <p><strong>Country : </strong> $country</p>
                          <p><strong>Last Login : </strong> $last</p>
                          <p><strong>Member Since : </strong> $register</p>";

                    ?>
                </div>
            </div>
            <div id="content_timeline">
                <div id="post">

                </div>
            </div>
        </div>

    </div >
</body>
</html>