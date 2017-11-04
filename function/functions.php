<?php
/**
 * Created by IntelliJ IDEA.
 * User: ganesh
 * Date: 04-11-2017
 * Time: 18:29
 */

    function getTopics(){
        global $con;
        $getTopics = "SELECT * from topics";
        $runTopics = mysqli_query($con,$getTopics);

        while ($row = mysqli_fetch_array($runTopics)) {
            $topic_id = $row['topic_id'];
            $topic_title = $row['topic_title'];

            echo "<option value='$topic_id'>$topic_title</option>";
        }
    }

    function insertPost(){

        if(isset($_POST['postSub'])){

            global $con;
            global $user_id;

            $title = $_POST['title'];
            $content = $_POST['content'];
            $topic = $_POST['topic'];

            $insert = "insert into post (user_id,topic_id,post_title,post_content,post_date) values ('$user_id','$topic','$title','$content',NOW())";

            $runInsert = mysqli_query($con,$insert);

            if($runInsert){
                echo "<h3>Posted to timeline, Great!</h3>";
            }else{
                echo "<h3>Something went wrong, Try Later!</h3>";
            }

        }
    }

?>