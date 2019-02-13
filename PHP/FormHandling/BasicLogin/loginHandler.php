<?php
session_start();
$formUsername = $_POST['username'];
$formPassword = $_POST['password'];
$accounts = array(
    'sreegrandhe' => 'password',
);
if (isset($accounts[$formUsername]) && $formPassword == $accounts[$formUsername]) {
    $_SESSION['username'] = $formUsername;
    header('Location: landing.php');
} else {
    header('Location: login.php?invalid');
}
die();
?>
