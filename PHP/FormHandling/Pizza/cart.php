<?php
session_start();
$cart = $_SESSION['cart'];
foreach ($cart as $i => $order) {
    echo $order['info']['size'] . ' pizza with ' . $order['info']['cheese'] . ' cheese and ' . $order['info']['sauce'] . ' sauce and ' . $order['info']['toppings'];
    echo '<br>';
    echo '$' . $order['price'];
    echo '<br><br>';
}
?>

<?php if (sizeof($cart) == 0) { ?>
    No pizzas made yet
<?php } ?>
<br>
<a href="make.html">Make another pizza</a>
<br>
<?php if (sizeof($cart) > 0) { ?>
    <a href="checkout.php">Checkout</a>
<?php } ?>
