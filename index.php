<?php
require_once 'Cart.php';
include ("header.php");
require_once 'functions.php';

?>


<div id="content">
	
	<?php
		//if logout request has come, close session
		if(isset($_REQUEST["logout"]) && $_REQUEST["logout"] == "yes"){
			$_SESSION["username"] = null;
			session_destroy();
			header("Location: index.php");
		}
		
		//if add product to cart request has come, add product to cart
		if(isset($_REQUEST["add_to_cart"]) && $_REQUEST["add_to_cart"]=="yes") {
			$cart = $_SESSION["cart"];
			
			$item = new CartItem();
			$item->setProductId($_REQUEST["pid"]);
			$item->setQuantity($_REQUEST["quantity"]);
			$item->setName($_REQUEST["name"]);
			$item->setCost($_REQUEST["price"]);
			
			$cart->addItem($item);
		}
	?>
	
	<div id="center-content">
	
	<?php	
		//get products and display
		$query = "select id, name, picture, description, price "
				."from products order by name";
		
		$db = getConnection();
		$result = executeQuery($db, $query);
			
		if($result){
			
			while ($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				?>
				<div class="product">
					
					<?php
						$params = "pid=" . $row["id"];
					?>
								
					<a href="viewproduct.php?<?php echo $params ?>">
						<div class="product-image-area">
							<img src="images/<?php echo $row["picture"]  ?>" alt="product" />
						</div>
	
						<div class="product-info">
							<div class="product-title">
								<?php echo $row["name"] ?>
							</div>
							<div class="product-cost">
								Price: $<?php echo $row["price"] ?>
							</div>
							<div class="product-description">
								<?php echo $row["description"] ?>
							</div>
						</div>
					</a>
				</div>
			
			<?php 
			}
		}
		else{
			echo $db->error;
		}
	?>
	
	</div>

</div>




<?php include("footer.php")?>
		
       