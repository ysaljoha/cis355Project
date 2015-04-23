<!-- Header file for client -->

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>Shopping Cart</title>

        <link type="text/css" href="css/menu.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
    
    <div id="wrapper">
        <div id="header">
            <div id="logo">
					<span>Shopping Cart</span>
            </div>

            <div id="menu">
                <ul class="menu">
                    <li><a href="index.php"><span>Home</span></a></li>       
                    
                    <?php 
                    	session_start();		//start session
                    	if(!isset($_SESSION["username"])){
                    	?>
                    		<!-- If session is not active  -->
                    		<li><a href="login.php"><span>Log In</span></a></li>
                    	<?php 
                    	}
                    	else{
                    ?>
                    	<!-- Session is active  -->
                   	 	<li><a href="view_cart.php"><span>My Cart</span></a></li>
                   	 	<li><a href="index.php?logout=yes"><span>Log Out</span></a></li>
                    <?php 
                    	}
                    ?>
                </ul>
            </div>     
        </div>
