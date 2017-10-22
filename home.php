<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>VZone Chat!</title>
</head>
<body>
    <h2>Welcome <?php echo $_SESSION['user_mail']; ?></h2>
</body>
</html>