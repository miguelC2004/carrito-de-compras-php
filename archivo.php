<?php
session_start();

// Clase para el producto
class Product {
  public $name;
  public $price;

  public function __construct($name, $price) {
    $this->name = $name;
    $this->price = $price;
  }
}

// Clase para el carrito de compras
class ShoppingCart {
  public $products;

  public function __construct() {
    $this->products = array();
  }

  public function addProduct(Product $product) {
    array_push($this->products, $product);
  }

  public function getTotalPrice() {
    $total = 0;
    foreach ($this->products as $product) {
      $total += $product->price;
    }
    return $total;
  }
}

// Agregar productos al carrito
$cart = new ShoppingCart();
$cart->addProduct(new Product("Camisa", 25.99));
$cart->addProduct(new Product("Pantalón", 49.99));

// Mostrar el total del carrito
echo "Total: $" . $cart->getTotalPrice();

// Guardar el carrito en la sesión del usuario
$_SESSION['cart'] = $cart;
?>
