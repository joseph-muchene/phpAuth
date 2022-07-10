<?php
include 'inc/base.php'
?>
<?php
session_start();
// check if user in session
if (!$_SESSION['auth']) {
    header('Location:login.php');
}
$sessionemail = $_SESSION["email"];
$user = "SELECT * FROM users WHERE email = '$sessionemail' ";
$result = mysqli_query($conn, $user);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);


$username = "";
foreach ($users as $user) {
    $username = $user["name"];
}

?>

<header class="jumbotron bg-secondary p-4">

    <h1 class="text-center">Welcome <?php
                                    echo $username;
                                    ?>
    </h1>

</header>


<section class="d-flex justify-content-center mt-3 ">
    <button class="btn btn-danger">
        <a class="text-decoration-none text-white" href="logout.php">logout</a>
    </button>
</section>