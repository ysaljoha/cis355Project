<?php
	require_once 'Cart.php';
	include ("header.php");
?>

<div id="content">
	
	<div id="center-content">
	
	<?php

	$cart = null;
	$pid = $_REQUEST["pid"];
	
	//get cart from the session
	if(isset($_SESSION ["cart"])){
		$cart = $_SESSION ["cart"];
	}
	
	if($cart != null)
	{
		$cartItem = $cart->getCartItemById($pid);
	}
	?>
	
	<form action="view_cart.php">
		<table>
			<tr>
				<td>Product Name:</td>
				<td><?php echo $cartItem->getName() ?></td>
			</tr>
			<tr>
				<td>Enter new Quantity:</td>
				<td><input name="quantity" type="number" value="<?php echo $cartItem->getQuantity() ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Save" /></td>
			</tr>
		</table>
		
		<input type="hidden" name="command" value="update" />
		<input type="hidden" name="pid" value="<?php echo $pid ?>" />
	</form>

	</div>
</div>