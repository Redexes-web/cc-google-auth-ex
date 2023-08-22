<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Se connecter via Google</h1>
    <a href="https://accounts.google.com/o/oauth2/v2/auth?response_type=code&client_id=<?= GOOGLE_ID ?>&redirect_uri=http://localhost:8000/connect.php&scope=openid%20email&state=some_state_value">Se connecter avec Google</a>
</body>
</html>
