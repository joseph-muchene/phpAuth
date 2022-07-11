<?php include 'inc/base.php'; ?>
<?php


$nameErr = $emailErr = $passwordErr = "";
$success = "";
$errorMessage = "";
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // password hash
    $password_hash = md5($password);

    if (empty($name)) {
        $nameErr = "name cannot be empty";
    }

    if (empty($email)) {
        $emailErr = "Email cannot be empty";
    }

    if (empty($password)) {
        $passwordErr = "password cannot be empty";
    }

    // check if the user exists



    // perform the query
    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' ");

    if (mysqli_num_rows($check_email) > 0) {
        $errorMessage = 'Email already exists';
    } else {

        $query = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$password_hash')";

        if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
            // if connection was succesfull
            if (mysqli_query($conn, $query)) {

                $success = "user was created succesfully";
                header("location:login.php");
            } else {
                echo "An error has occured" . mysqli_error($conn);
            }
        }
    }
}

?>


<h1 class="text-center my-3 h3 text-success">
    <?php if (!$success == "") : ?>
        <?php echo $success; ?>
    <?php endif; ?>
</h1>
<h1 class="text-center my-3 h3 text-danger">
    <?php if (!$errorMessage == "") : ?>
        <?php echo $errorMessage; ?>
    <?php endif; ?>
</h1>
<div class="d-flex justify-content-center mt-4">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="mt-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name">

            <span class="text-danger">
                <?php if (!$nameErr == "") : ?>
                    <?php echo $nameErr; ?>
                <?php endif; ?>
            </span>
        </div>
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
        <p class="lead text-center">Already have an account? <a href="login.php" class="text-decoration-none">login</a></p>
    </form>

</div>