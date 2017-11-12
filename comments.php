<?php
/**
 * Created by IntelliJ IDEA.
 * User: ganesh
 * Date: 06-11-2017
 * Time: 22:24
 */

    $getId = $_GET['post_id'];
    $getComment = "select * from comments where post_id = '$getId' ORDER by 1 DESC ";
    $runGetCom = mysqli_query($con,$getComment);

    while($row_comment = mysqli_fetch_array($runGetCom)){

        $comment = $row_comment['comment'];
        $user_name = $row_comment['comment_auth'];
        $comment_date = $row_comment['date'];

        echo "<div id='comments'>
            <h3>$user_name</h3>
            <i>Said on </i> $comment_date;
            <p>$comment</p>
          </div>";

    }

?>