<?php include 'inc/base.php'; ?>

<?php



?>

<div class="d-flex justify-content-center mt-4">

    <form action="" method="post">

        <div class="mt-3">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>

        <div class="mt-3">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mt-3">

            <input type="submit" class="btn btn-primary" name="submit" id="submit">
        </div>
        <p class="lead text-center">Dont have an account? <a href="register.php" class="text-decoration-none">Register here</a></p>
    </form>

</div>