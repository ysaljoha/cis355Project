<?php
	require_once 'Cart.php';
	include ("header.php");
	require_once 'functions.php';
?>

<?php 

$msg = "";

//if form is posted to this page
if($_SERVER["REQUEST_METHOD"] == "POST"){

	$username = $_POST["username"];
	$password = $_POST["password"];

	if(authenticateUser($username, $password)){
		
		$msg = "<span class='success_msg'>Login successfull..</span>";
		
		//activate session
		$_SESSION["username"] = $username;
		
		//create cart too
		$_SESSION["cart"] = new Cart();
		header("Location: index.php");
	}
	else {
		$msg = "<span class='error_msg'>Invalid username or password</span>";
	}
}

?>

<div id="content">
	<br/>
	<fieldset class="login-form">
	<legend>Log In</legend>
	<form method="POST" action="#">
		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td colspan="2">
					
					<?php  
						echo $msg;
					?>
					
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Log In" /></td>
			</tr>
			
		</table>
	</form>
	</fieldset>

</div>



<?php include("footer.php")?>
		
       