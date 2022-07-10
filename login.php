<?php include 'inc/base.php'; ?>

<?php

$emailErr = $passwordErr = "";
$success = "";
$errorMessage = "";


//check for submit
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (empty($email)) {
        $emailErr = "Email should not be empty";
    }
    if (empty($password)) {
        $passwordErr = "Password should not be empty";
    }

    $verifiedPass = md5($password);
    // check if the user with the email exists
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$verifiedPass' ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        session_start();
        $_SESSION['auth'] = 'true';
        $_SESSION["email"] = $email;


        // redirect
        header('Location:index.php');
    } else {
        $errorMessage = "Wrong email or password";
    }
}




?>
<h1 class="text-center my-3 h3 text-danger">
    <?php if (!$errorMessage == "") : ?>
        <?php echo $errorMessage; ?>
    <?php endif; ?>
</h1>
<div class="d-flex justify-content-center mt-4">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

        <div class="mt-3">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email">
            <span class="text-danger">
                <?php if (!$emailErr == "") : ?>
                    <?php echo $emailErr; ?>
                <?php endif; ?>
            </span>
        </div>

        <div class="mt-3">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password">
            <span class="text-danger">
                <?php if (!$passwordErr == "") : ?>
                    <?php echo $passwordErr; ?>
                <?php endif; ?>
            </span>
        </div>
        <div class="mt-3">

            <input type="submit" class="btn btn-primary" name="submit" id="submit">
        </div>
        <p class="lead text-center">Dont have an account? <a href="register.php" class="text-decoration-none">Register here</a></p>
    </form>

</div>