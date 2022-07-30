<?php
include 'config/database.php';
session_start();

?>

<?php
$success = "";
if (isset($_GET["submit"])) {
    $text = $_GET["text"];
    $title = $_GET["title"];
    $description = $_GET["description"];
    $query = "INSERT INTO posts(title,description,text) VALUES ('$title','$description','$text')";
    if (mysqli_query($conn, $query)) {
        $success = "post created succesfully";
    } else {
        echo 'post creation error' . mysqli_error($conn);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loco</title>

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
    <!-- section -->
    <div class="container">
        <h3 class="text-center my-3 text-info">
            <?php if ($success) : ?>
                <?php echo $success ?>
            <?php endif ?>
        </h3>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])  ?>" method="get">
            <div class="mt-3">
                <label for="title">title:</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mt-3">
                <label for="description">description:</label>
                <input type="text" class="form-control" name="description">
            </div>


            <div class="mt-3">
                <label for="text">text:</label>
                <textarea name="text" id="text" cols="20" rows="5" class="form-control " style="resize:none ;"></textarea>
            </div>

            <div class="mt-3">
                <input type="submit" class="btn btn-primary" name="submit">
            </div>

        </form>

        <p class="lead text-center"><a href="index.php" class="text-decoration-none">Back home </a></p>
    </div>



</body>

</html>