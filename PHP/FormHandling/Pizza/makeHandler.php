<?php
session_start();
$size = $_POST['size'];
$cheese = $_POST['cheese'];
$sauce = $_POST['sauce'];
$toppings = $_POST['toppings'];
if ($size == "Small") {
    $price = 20;
} elseif ($size == "Medium") {
    $price = 40;
} elseif ($size == "Large") {
    $price = 60;
}elseif ($size == "XLarge"){
    $price = 80;
}
$_SESSION['cart'][] = array(
    'info' => array(
        'size' => $size,
        'cheese' => $cheese,
        'sauce' => $sauce,
        'toppings' => $toppings,
    ),
    'price' => $price
);
header('Location: cart.php');
die();
?>
