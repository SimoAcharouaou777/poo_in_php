<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../../vue/login.php");
    exit();
}
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../../vue/user/user.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>hello admin </h1>
</body>
</html>