<?php
/**
 * Super dumb session based cart that you would
 * obviously never ever use but is good enough for
 * the purpses of this demo
 * 
 */
session_start();

function getCart() {
	return (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) ? $_SESSION['cart'] : array();
}

function saveCart($cart) {
	$_SESSION['cart'] = $cart;
}

function addToCart($itemCode, $itemPrice, &$cart) {
	$cart[] = array('code' => $itemCode, 'price' => $itemPrice);
	saveCart($cart);
}


$cart = getCart();

if (null != ($postData = $_POST)) {

	if (array_key_exists('item_code', $postData) && array_key_exists('item_price', $postData)  ) {
		addToCart($postData['item_code'], $postData['item_price'], $cart);
		saveCart($cart);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ascii Art Marketplace</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="/">Home</a></li>
          <li><a href="/shop.html">Shop</a></li>
          <li class="active"><a href="/basket.php">Basket</a></li>
          <li><a href="/signup.php">Sign Up</a></li>
        </ul>
        <h3 class="text-muted">Ascii Art Marketplace</h3>
      </div>

      <h4> Items in your basket (<?php echo count($cart) ?>)</h4>
      <?php foreach ($cart as $item): ?>

      	<div class="row marketing">
	        <div class="col-lg-6">
	          <?php echo $item['code'] ?>  <?php echo '$' . $item['price']; ?>
	        </div>
    	</div>

      <?php endforeach ?>
      


      <div class="footer">
        <p>&copy; Company 2013</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>


