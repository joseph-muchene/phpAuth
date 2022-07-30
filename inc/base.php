<?php
include 'config/database.php';
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loco </title>

    <!--bootstrap css  -->
    <!-- CSS only -->
    <link rel="stylesheet" href="inc/bootstrap.min.css">
    <!-- bootstrap js -->
    <!-- JavaScript Bundle with Popper -->

</head>

<body>

    <!-- navigation -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">loco</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="../authPhp/register.php">Register</a>
                    <a class="nav-link" href="../authPhp/login.php">Login</a>

                </div>
            </div>
        </div>
    </nav>
</body>

</html>