<?php
session_start();
$cart = $_SESSION['cart'];
$total = 0;
foreach ($cart as $i => $order) {
    $total += $order['price'];
    echo 'Successfully ordered a ' . $order['info']['size'] . ' pizza with ' . $order['info']['cheese'] . ' cheese and ' . $order['info']['sauce'] . ' sauce and ' . $order['info']['toppings'] .  'for $' . $order['price'];
    echo '<br>';
}
echo '<br>Total: $' . $total . '<br>';
$_SESSION['cart'] = array();
?>

<br>
<a href="make.html">Make another order</a>
