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
    <title>Auth </title>

    <!--bootstrap css  -->
    <!-- CSS only -->
    <link rel="stylesheet" href="inc/bootstrap.min.css">
    <!-- bootstrap js -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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
                    <a class="nav-link active" aria-current="page" href="index.php">Account</a>
                    <a class="nav-link active" aria-current="page" href="index.php">posts</a>
                    <a class="nav-link active" aria-current="page" href="index.php">users</a>

                    <a class="btn btn-danger text-decoration-none text-white" href="logout.php">logout</a>


                    <?php if (!$_SESSION["email"]) :  ?>
                        <a class="nav-link" href="../authPhp/register.php">Register</a>
                        <a class="nav-link" href="../authPhp/login.php">Login</a>
                    <?php endif ?>


                </div>
            </div>
        </div>
    </nav>

    <?php

    // check if user in session
    if (!$_SESSION['auth']) {
        header('Location:login.php');
    }
    $sessionemail = $_SESSION["email"];
    $user = "SELECT * FROM users WHERE email = '$sessionemail' ";
    $result = mysqli_query($conn, $user);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);


    $username = "";
    $userId = "";
    foreach ($users as $user) {
        $username = $user["name"];
        $userId = $user["id"];
    }

    ?>

    <header class="jumbotron bg-secondary p-4">

        <h1 class="text-center">Welcome <?php
                                        echo $username;
                                        ?>
        </h1>

    </header>

    <section class="container ">
        <button class="btn btn-primary mt-4">
            <a href='./post.php?<?php echo "userId=" ?><?php echo $userId ?>' class="text-decoration-none text-white">create a post</a>
        </button>
    </section>

    <?php
    include 'inc/posts.php'

    ?>
</body>

</html>