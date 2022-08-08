<?php include_once 'layouts/navigation.php'; ?>

<?php
	$id_produs = $_GET['id'];

	$server_name = "localhost";
	$username = "root";
	$password = "";
	$db_name = "Assignment_Basic_PHP";
	
	// Create connection
	$conn = new mysqli($server_name, $username, $password, $db_name);
	
	// Check connection
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	
	// Select data from the database
	$sql_select_produse = "SELECT * FROM produse WHERE id=$id_produs"; 
	$result = $conn->query($sql_select_produse); // Here you should write raw SQL commands
	
	if ($result->num_rows > 0 && $product_row = $result->fetch_assoc()) {
		foreach ($result as $product_row) {
		$id = $product_row["id"];
		$titlu = $product_row["titlu"];
		$link_imagine = $product_row["link_imagine"];
		$descriere = $product_row["descriere"];
		$valoare_rating = $product_row["valoare_rating"];
		$pret_normal = $product_row["pret_normal"];
		$pret_reducere = $product_row["pret_reducere"];

		$pret_total = ($product_row["pret_normal"] - $product_row["pret_reducere"]);
		} 
	} else { echo "No products in the database yet."; }
?>

	<div class="row gutter-10 col-mb-80 pb-6">
		<table class="table cart mb-5 mt-5">
		<thead>
			<tr>
				<th class="cart-product-remove">&nbsp;</th>
				<th class="cart-product-thumbnail">&nbsp;</th>
				<th class="cart-product-name">Product</th>
				<th class="cart-product-price">Unit Price</th>
				<th class="cart-product-quantity">Quantity</th>
				<th class="cart-product-subtotal">Total</th>
			</tr>
		</thead>
		<tbody>
			<tr class="cart_item">
				<td class="cart-product-remove">
					<a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
				</td>

				<td class="cart-product-thumbnail">
					<a href="#"><img width="64" height="64" src="<?= $link_imagine; ?>" alt="Pink Printed Dress"></a>
				</td>

				<td class="cart-product-name">
					<a href="#"><?= $titlu; ?></a>
				</td>

				<td class="cart-product-price">
					<span class="amount">$<?= $pret_total; ?></span>
				</td>

				<td class="cart-product-quantity">
					<div class="quantity">
						<input type="button" value="-" class="minus">
						<input type="text" name="quantity" value="1" class="qty" />
						<input type="button" value="+" class="plus">
					</div>
				</td>

				<td class="cart-product-subtotal">
					<span class="amount">$<?= $pret_total; ?></span>
				</td>
			</tr>
			<tr class="cart_item">
				<td colspan="6">
					<div class="row justify-content-between py-2 col-mb-30">
						<div class="col-lg-auto ps-lg-0">
							
						</div>
						<div class="col-lg-auto pe-lg-0">
							<a href="#" class="button m-0">Update Cart</a>
							<a href="shipping.php?id=<?=$id_produs?>" class="button mt-2 mt-sm-0 me-0">Proceed to Checkout</a>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
		</table>
	</div>

<?php include_once 'layouts/footer.php' ?>
