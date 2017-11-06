<?php
/**
 * Created by IntelliJ IDEA.
 * User: ganesh
 * Date: 06-11-2017
 * Time: 20:08
 */

session_start();

session_destroy();

header("location: index.php");

?>