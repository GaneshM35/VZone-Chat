<?php
/**
 * Created by IntelliJ IDEA.
 * User: ganesh
 * Date: 04-11-2017
 * Time: 21:39
 */

    $query = "select *from post";
    $result = mysqli_query($con, $query);

    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records/$eachPage);

    echo "<center>
            <div id='pagination'>
            <a href='home.php?page=1'>First Page</a>
            ";

    for($i=1; $i<=$total_pages; $i++){
        echo "<a href='home.php?page=$i'>$i</a>";
    }

    echo "<a href='home.php?page=$total_pages'>Last Page</a>
            </div>
           </center>
            ";
?>