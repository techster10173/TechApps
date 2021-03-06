<?php
/*
The menu at a lunch counter includes a variety of sandwiches, salads, and drinks.
The menu also allows a customer to create a "trio," which consists of three
menu items: a sandwich, a salar, and a drink. The price of the trio is the
sum of the two highest-priced menu items in the trio; one item with the lowest
price is free.

Each menu item has a name and a price. The four types of menu items are represented
by the four classes Sandwich, Salad, Drink, and Trio. All four classes implement
the MenuItem iterface.
*/

interface MenuItem
{
  /** @return the name of the menu item */
  public function getName();

  /** @return the price of the menu item */
  public function getPrice();
}

class Sandwich implements MenuItem
{
  private $name, $price;

  public function __construct($name, $price)
  {
    $this->name = $name;
    $this->price = $price;
  }

  public function getName()
  { return $this->name; }

  public function getPrice()
  { return $this->price; }
}

class Salad implements MenuItem
{
  private $name, $price;

  public function __construct($name, $price)
  {
    $this->name = $name;
    $this->price = $price;
  }

  public function getName()
  { return $this->name; }

  public function getPrice()
  { return $this->price; }
}

class Drink implements MenuItem
{
  private $name, $price;

  public function __construct($name, $price)
  {
    $this->name = $name;
    $this->price = $price;
  }

  public function getName()
  { return $this->name; }

  public function getPrice()
  { return $this->price; }
}

/*
The menu allows customers to create Trio menu items, each of which includes a
sandwich, a salad, and a drink. The name of the Trio consists of the names of
the sandwich, salad, and drink, in that order, each separated by "/" and
followed by a space and then "Trio"/ The price of the Trio is the sum of the two
highest-priced items in the Trio; one item with the lowest price is free.

A trio consisting of a cheeseburger ($2.75), spinach salad ($1.25), and an
orange sode ($1.25) would have the name "Cheeseburger/Spinach Salad/Orange Soda Trio"
and a price of $4.00 (the two hghest prices are $2.75 and $1.25). Similarly, a
trio consisting of a club sandwich ($2.75), coleslaw ($1.25), and a cappuccino ($3.50)
would have the name "Club Sandwich/Coleslaw/Cappuccino Trio" and a price of
$6.25 (the two highest prices are $2.75 and $3.50)

Write the Trio class that implements the MenuItem interface. Your implementation
must include a constructor that takes three parameters representing a sandwich,
salad, and drink (in that order).
*/

class Trio implements MenuItem{
  private $sandwich;
  private $salad;
  private $drink;

  public function __construct($s,$sl, $d){
    $this->sandwich = $s;
    $this->salad = $sl;
    $this->drink = $d;
  }
  public function getName(){
      return $this->sandwich->getName() . "/" . $this->salad->getName() . "/" . $this->drink->getName() . " Trio";

    }

  public function getPrice(){
        $sanTemp = $this->sandwich->getPrice();
        $sTemp = $this->salad->getPrice();
        $dTemp = $this->drink->getPrice();
        $arr = array($sanTemp, $sTemp, $dTemp);
        rsort($arr);
        $ret = $arr[0]+ $arr[1];
        return $ret;
      }
}

$test = new Trio(new Sandwich("Rueben", 2.75),new Salad("Fresh", 1.25), new Drink("Soda", 3.5));
echo $test->getName();
echo $test->getPrice();



//Write code to test your Trio class below







 ?>
