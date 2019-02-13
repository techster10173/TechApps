<?php ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <div>
        <?php
            if (isset($_GET['invalid'])) { ?>
                <div role="alert">
                    Wrong Credentials...Try again
                </div>
            <?php }
        ?>
        <form method="post" action="loginHandler.php">
            <div>
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter username">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password">
            </div>
            <button type="submit">Submit</button>
        </form>
    <div>
</body>

</html>
