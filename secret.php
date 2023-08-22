<?php
session_start();
require 'vendor/autoload.php';

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Page</title>
</head>
<body>
    <h1>Page secrete non accessible aux utilisateurs non connectés</h1>
    <?= var_dump($_SESSION) ?>
</body>
</html>
