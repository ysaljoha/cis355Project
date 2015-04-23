<?php
	include ("header.php");
	require_once 'functions.php';
?>

<div id="content">
		
	<div id="center-content">
	
	<?php
		$pid = $_REQUEST["pid"];		//get product id from request
		
		//select single product
		$query = "select id, name, picture, description, price "
				."from products where id=$pid";
		
		$db = getConnection();
		$result = executeQuery($db, $query);
		
		if($result){
			while ($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				?>
				
					<div class="product-details-area">
						<h2><?php $row["name"] ?></h2>
						<img class="product-details-img"
							src="images/<?php echo $row["picture"] ?>" />
					</div>
			
					<div class="product-details-area">
						
						<table>
							<tr>
								<td><b>Description: </b></td>
								<td><?php echo $row["description"] ?></td>	
							</tr>
							<tr>
								<td><b>Price</b></td>
								<td>$<?php echo $row["price"] ?></td>
							</tr>
			
						</table>
			
					</div>
			
					<div class="product-details-area add-to-cart-block">
			
					<?php 
						if(isLoggedIn()){
					?>
						<form action="index.php">
							<h3>Add Product to Cart</h3>
			
							Select Quantity: 
							<select name="quantity">
							
							<?php 
								//create drop down for remaining items quantity
								for($i = 1; $i <= 25; $i++ ){
									?>
										<option value="<?php echo $i ?>"><?php echo $i  ?></option>
									<?php
								}
							?>
							
						</select>
						
						<input type="hidden" name="add_to_cart" value="yes" />
						<input type="hidden" name="pid" value="<?php echo $row["id"] ?>" />
						<input type="hidden" name="name" value="<?php echo $row["name"] ?>" />
						<input type="hidden" name="picture" value="<?php echo $row["picture"] ?>" />
						<input type="hidden" name="price" value="<?php echo $row["price"] ?>" />
						<input type="hidden" name="query" value ="search" />
						<input type="submit" class="add-to-cart-btn" value="Add to Cart" />	
						</form>
					<?php
						}
						else {
							echo "Please <a href='login.php'>Login</a> to add this product to cart.";
						}
					?>
					</div>
				<?php 
			}
			$result->close();
		}
		else{
			echo $db->error;
		}
		
	?>
	</div>
</div>