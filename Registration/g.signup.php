<?php

require "C:/xampp/htdocs/Lost-and-Found/Registration/vendor/autoload.php";

$client = new Google\Client;

$client->setClientId("1010807943748-aevbn48266nm2p9gr909g7966pieojcm.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://localhost/Lost-and-Found/Registration/redirect.php");

$client->addScope("email");
$client->addScope("profile");

$url = $client->createAuthUrl();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .google-login-container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .google-login-btn {
            display: inline-flex;
            align-items: center;
            background-color: #4285f4;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .google-login-btn i {
            margin-right: 10px;
            font-size: 18px;
        }
        .google-login-btn:hover {
            background-color: #3367d6;
        }
        .google-login-title {
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="google-login-container">
        <div class="google-login-title">Sign in with Google</div>
        <a href="<?= $url ?>" class="google-login-btn">
            <i class="fa-brands fa-google"></i> Sign in with Google
        </a>
    </div>
</body>
</html>
