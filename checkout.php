<?php
require_once 'Cart.php';
include ("header.php");
require_once 'functions.php';
?>

<div id="content">

	<div id="center-content">
	
	<?php
	
	$cart = null;
	
	// get cart from the session
	if (isset ( $_SESSION ["cart"] )) {
		$cart = $_SESSION ["cart"];
	}
	
	$cartItems = $cart->getCartItems ();
	$username = $_SESSION["username"];
	
	$query = "insert into orders(customer_id) values('$username')";	
	$db  = getConnection();
	$res = executeQuery($db, $query);
	
	$query = "select * from orders order by order_date desc";
	$db  = getConnection();
	$result = executeQuery($db, $query);
	
	$order_id = "";
	
	if ( $row = $result->fetch_array ( MYSQLI_ASSOC ) ) {
		$order_id = $row["id"];
	}
		
	// add ordered products in db
	foreach ( $cartItems as $item ) {
		if($item != null){
			
			$productId = $item->getProductId();
			$quantity = $item->getQuantity();
			$price = $item->getCost();
			
			//add summary to database
			$query = "insert into summary(order_id, product_id, quantity, price) values($order_id, $productId, $quantity, $price)";
			$db  = getConnection();
			$res = executeQuery($db, $query);
			
			if(!$res){
				echo $db->error;
			}
		}
	}

	
	?>	
		<h3>
			Your order has been successfully placed!!
		</h3>
	</div>
</div>


