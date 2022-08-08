<?php include_once 'layouts/navigation.php'; ?>

<?php
$id_produs = $_GET['id'];

$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "Assignment_Basic_PHP";

// // Create connection
$conn = new mysqli($server_name, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$conn_cod = new mysqli($server_name, $username, $password, $db_name);

$sql_select_produse = "SELECT * FROM produse WHERE id=$id_produs"; 
$result = $conn->query($sql_select_produse); // Here you should write raw SQL commands
$row_produs = mysqli_fetch_assoc($conn->query($sql_select_produse));

$pret_total_produs = $row_produs['pret_normal'] - $row_produs['pret_reducere'];

$pretul = 0;
 
if(isset($_POST['f_tara']) && isset($_POST['f_localitate'])) {

	$tara =  $_POST['f_tara'];
	$localitate = $_POST['f_localitate'];
	$cod_postal = $_POST['f_cod_postal'];

	if ($tara == 1) { $pretul=0; } 
	elseif ($tara !== 1) {$pretul=50; }

	$sql_cod = "SELECT * FROM coduri_postale WHERE nume = $cod_postal";
	
	if ($conn_cod->query($sql_cod)) { 
		$row_cod = mysqli_fetch_assoc($conn_cod->query($sql_cod));
		
		if (($localitate == $row_cod['id_localitate'])) { $pretul += 15;} 
		else { $pretul += 20; } 
	} 
	elseif (empty($cod_postal)) { $pretul += 20; }
	elseif (!empty($cod_postal) ) { echo "<h3 class='text-danger'>Codul postal nu este bun!</h3>"; }
}

?>
	<div class="row gutter-10 col-mb-80">

	<div class="row col-mb-30 pb-6">
		<div class="col-lg-6">
			<h4>Calculate Shipping</h4>
			<form class="row" method="POST" action="shipping.php?id=<?=$id_produs?>">
				<div class="col-12 form-group">
					<select class="sm-form-control" name="f_tara">
					<?php
						$sql = "SELECT * FROM tari";
						$result_tari = $conn->query($sql);
						
						if ($result_tari->num_rows > 0 && $row = $result_tari->fetch_assoc()) :
							foreach ($result_tari as $row) : 
								$id_tara = $row["id"];
								$nume = $row["nume"];
					?>
						<option value="<?=$id_tara;?>"><?=$nume;?></option>
					<?php 
							endforeach; 
						else : echo "No country in the database yet.";
						endif;
					?>
					</select>
				</div>
				<div class="col-6 form-group">
					<select class="sm-form-control" name="f_localitate">
					<?php
						$sql = "SELECT * FROM localitati";
						$result_localitati = $conn->query($sql);
						
						if ($result_localitati->num_rows > 0 && $row = $result_localitati->fetch_assoc()) :
							foreach ($result_localitati as $row) : 
								$id_loc = $row["id"];
								$nume = $row["nume"];
					?>
						<option value="<?=$id_loc;?>"><?=$nume;?></option>
					<?php 
							endforeach; 
						else : echo "No country in the database yet."; 
						endif;
					?>
					</select>
				</div>
				<div class="col-6 form-group">
					<input type="text" class="sm-form-control" placeholder="Cod Postal" name="f_cod_postal" />
				</div>
				<div class="col-12 form-group">
					<button class="button m-0 button-black">Check shipping price</button>
				</div>
			</form>
		</div>

		<div class="col-lg-6">
			<h4>Cart Totals</h4>
			<div class="table-responsive">
				<table class="table cart cart-totals mb-5">
					<tbody>
						<tr class="cart_item">
							<td class="cart-product-name">
								<strong>Cart Subtotal</strong>
							</td>

							<td class="cart-product-name">
								<span class="amount">$<?=$pret_total_produs?></span>
							</td>
						</tr>
						<tr class="cart_item">
							<td class="cart-product-name">
								<strong>Shipping</strong>
							</td>

							<td class="cart-product-name">
								<span class="amount">$<?=$pretul?> +</span>
							</td>
						</tr>
						<tr class="cart_item">
							<td class="cart-product-name">
								<strong>Total</strong>
							</td>

							<td class="cart-product-name">
								<span class="amount color lead"><strong>$<?=$pret_total_produs + $pretul?></strong></span>
							</td>
						</tr>
					</tbody>

				</table>
			</div>
		</div>
	</div>
<?php include_once 'layouts/footer.php' ?>
