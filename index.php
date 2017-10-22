<!DOCTYPE html>

<?php
session_start();
include("includes/user_function.php")
?>

<html>
<head>
	<title>Chatty Boy</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<div class = "container">
        <?php include ("template/header.php"); ?>
        <?php include ("template/content.php"); ?>
        <?php include ("template/footer.php"); ?>
        <?php include ("login.php"); ?>
    </div>
</body>
</html>