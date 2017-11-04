<?php
    session_start();
    include ("config/connection.php");
    include ("function/functions.php");
    //$user_id = $_SESSION['user_id'];
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
                <form action="home.php?id=<?php echo $user_id; ?>" method="post" id="postForm">
                    <h2>Do you have any question today? </h2>
                    <input type="text" name="title" placeholder="Question about??" size="82"/>
                    <br>
                    <textarea cols="83" rows="4" name="content" placeholder="Description.."></textarea>
                    <br>
                    <select name="topic">
                        <option>Select Topic</option>
                        <?php getTopics(); ?>
                    </select>
                    <input type="submit" name="postSub" value="Post to Timeline" />
                </form>
                <?php insertPost(); ?>

                <h3>Most recent Disscussions!!</h3>
                <?php getPost(); ?>

            </div>
        </div>
    <?php include 'template/footer.php'; ?>
    </div >
</body>
</html>