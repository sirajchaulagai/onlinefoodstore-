<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "shop";
// $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
?>
<?php 
include_once("connect.php");
//Set variables for paypal form
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
//Test PayPal API URL
$paypal_email = 'sb-3qonb6626083@business.example.com';
?>
<title> Paypal Integration in PHP</title>
<div class="container">
	<div class="col-lg-12">
	<div class="row">
		<?php
		// $sql = "SELECT * FROM products";
		// $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
		// while( $row = mysqli_fetch_assoc($resultset) ) {
		?>
			
			<div class="col-sm-4 col-lg-4 col-md-4" style="width:300px;height:300px;border:2px solid red;float:left;margin-left:20px">
			<div class="thumbnail"> 
			<img src="../img/desk.jpg"/>
			<div class="caption">
			<h4 class="pull-right">&pound; : 10</h4>
			<h4>Name: Meat</h4>			
			</div>
			<form action="<?php echo $paypal_url; ?>" method="post">			
			<!-- Paypal business test account email id so that you can collect the payments. -->
			<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">			
			<!-- Buy Now button. -->
			<input type="hidden" name="cmd" value="_xclick">			
			<!-- Details about the item that buyers will purchase. -->
			<input type="hidden" name="item_name" value="Meat">
			<input type="hidden" name="item_number" value="101">
			<input type="hidden" name="amount" value="10">
				<input type="hidden" name="currency_code" value="GBP">			
			<!-- URLs -->
			<input type='hidden' name='cancel_return' value='http://localhost/assets2/assets/sandbox/cancel.php'>
			<input type='hidden' name='return' value='http://localhost/assets2/assets/sandbox/success.php'>						
			<!-- payment button. -->
			<input type="image" name="submit" border="0"
			src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
			<img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >    
			</form>
			</div>
			</div>				
		<?php //} ?>
		</div>		
	</div>	
		
</div>