<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="app/public/css/bulma.css">
    <link rel="stylesheet" href="app/public/css/font-awesome.min.css">
    <link rel="stylesheet" href="app/public/css/main.css">
    <link rel="icon" href="app/public/favicon.png">
    <title>Shit Pitch</title>
</head>
<body>
<?php if(isset($_SESSION['loggedIn'])) : ?>
    <em style="position: absolute; top: 10px; right: 10px;" >Logged in as: <?= $_SESSION['user']['username'] ?></em>
<?php endif; ?>
<?php require 'nav.php'; ?>
<header class="columns is-centered has-text-centered" style="padding-top: 3rem;">

    <div class="column is-10-tablet is-4-desktop">
        <h2 class="title is-1"><a href="/" style="color: #444">💩 Shit Pitch 📝 </a></h2>
    </div>
</header>
