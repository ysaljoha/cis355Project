<?php
	require_once 'Cart.php';
	include ("header.php");
?>

<div id="content">
	
	<div id="center-content">
	
	<?php

	$cart = null;
	
	//get cart from the session
	if(isset($_SESSION ["cart"])){
		$cart = $_SESSION ["cart"];
	}
	
	if(isset($_REQUEST["command"])){
		$command = $_REQUEST["command"];
		
		if($command == "remove"){
			$pid = $_REQUEST["pid"];
			$cart->removeItem($pid);
		}
		else if($command == "update"){
			$pid = $_REQUEST["pid"];
			$quantity = $_REQUEST["quantity"];
			
			$cartItem = $cart->getCartItemById($pid);
			$cartItem->setQuantity($quantity);
		}
	}
	
	if($cart != null)
	{
	?>
	
	<div class="cart-items-list">
		<h3>Products in your cart</h3>
			<table class="cart-items-list-table">
				<tr>
					<th>Product</th>
					<th>Quantity</th>
					<th>Unit Price</th>
					<th>Update</th>
					<th>Remove</th>
				</tr>
	
		<?php
		//get cart items
		$items = $cart->getCartItems();
		
		$total = 0;
		
		//display items from the cart
		foreach ( $items as $cartItem ) {
			
			if($cartItem != null){
			
			$productId = $cartItem->getProductId ();
			$name = $cartItem->getName();
			$price = $cartItem->getCost();
			
			$quantity = $cartItem->getQuantity ();
			
			$total += $price * $quantity;
			
			?>
				<tr>
					<td align="left">
						<?php echo $name ?>
					</td>
					<td align="center">
						<?php echo $quantity?>
					</td>
					<td align="center">
						<?php echo $price?>
					</td>
					<td align="center">
						<a href="edit_cart.php?pid=<?php echo $productId ?>">Update</a>
					</td>
					<td align="center">
						<a href="view_cart.php?command=remove&pid=<?php echo $productId ?>">Remove</a>
					</td>
				</tr>
				
				
				<?php
			}
		}
		
		?>
		
		</table>
		
		<div class="total_price">
			Total Cost = $<?php echo $total ?>
		</div>
		
		</div>
<?php 
	}
	
	if($cart == null || count($items) == 0){
		echo "Your cart is empty.";
	}
	else{
		echo '<a class="checkout-btn" href="checkout.php">Proceed to Checkout</a>';
	}
?>

	</div>
</div>