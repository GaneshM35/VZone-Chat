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

            $title = addslashes($_POST['title']);
            $content = addslashes($_POST['content']);
            $topic = $_POST['topic'];

            $insert = "insert into post (user_id,topic_id,post_title,post_content,post_date) values ('$user_id','$topic','$title','$content',NOW())";

            $runInsert = mysqli_query($con,$insert);

            if($runInsert){

                $update = "update users set posts ='yes' where user_id='$user_id'";
                if(mysqli_query($con,$update)){
                    echo "<h3>Posted to timeline, Great!</h3>";
                }
            }else{
                echo "<h3>Something went wrong, Try Later!</h3>";
            }
        }
    }

    function getPost(){
        global $con;

        $eachPage = 5;

        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }

        $start_from = ($page - 1) * $eachPage;

        $getPost = "select * from post order by 1 desc limit $start_from, $eachPage";
        $runGetPost = mysqli_query($con,$getPost);

        while($row_post = mysqli_fetch_array($runGetPost)){
            $post_id = $row_post['post_id'];
            $user_id = $row_post['user_id'];
            $post_title = $row_post['post_title'];
            $content = $row_post['post_content'];
            $post_date = $row_post['post_date'];

            $user = "select * from users where user_id = '$user_id' and posts='yes'";

            $runUser = mysqli_query($con,$user);
            $row_user = mysqli_fetch_array($runUser);
            $user_name = $row_user['user_name'];
            $user_image = $row_user['user_image'];

            echo "<div id='posts'>
                    <p><img src='user/user_images/$user_image' width='50' height='50'></p>
                    <h3><a href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
                    <h3>$post_title</h3>
                    <p>$post_date</p>
                    <p>$content</p>
                    <a href='single.php?post_id=$post_id' style='float:right;'><button>See Replies or Reply to this</button></a>
                    </div><br/>
                    ";
        }
        include ("pagination.php");
    }

?>