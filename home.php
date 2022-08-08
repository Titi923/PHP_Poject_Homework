<!-- 
(Prima data, de data asta este cu baza de date)
1. Construiesti un array numit $produse cu 8 produse
fiecare produs sa aiba: id, titlu, link imagine, 
descriere de cel putin 500 caractere, 
rating (un numar real intre 1 si 5, ex: 2, 5, 3,74, etc), 
pret normal, pret reducere

Iterare cu un foreach pe $produse si afisat informatiile dinamic.

Afisarea stelelor de rating cu un for, 
sunt 3 iconite pe care poti sa le folosesti: stea goala, stea plina si stea pe jumate
Daca pretul de reducere nu este 0 sau null 
si e mai mic decat pretul normal, 
se va afisa un badge simplu de reducere.

= In final trebuie sa se vada pagina sidebar-categorie.php 
cu 2 randuri de produse care contin informatiile din array 
(descrierea scurta care apare in casuta de produs
sa fie de maxim 200 caractere chiar daca in array e mai mult)

2. Cand se da click pe adaugare in cos, utilizatorul este trimis pe pagina cos, iar id-ul produsului este transmis prin get.
In fisierul cos.php
Vei avea un array cu un produs (informatiile din array vor fi cele ce trebuie afisate in cos)
Daca se primeste un id de produs prin get, atunci adaugi acel id in array-ul de produse din cos, 
impreuna cu alte date setate manual de tine pentru acel produs.

3. Calculate shipping
Cand cineva completeaza acel formualar, este trimis prin post tot pe aceasta pagina.
Datele se verifica si daca ceva nu e bine, i se afiseaza eroare.
Calcularea pretului 
Un array cu campurile: tara, localitate, cod postal

Ai urmatoarele cazuri
- daca e in romania si localitatea + codul postal se afla in array, atunci pretul e de 15 lei
- daca e in romania si localitatea se afla in array, dar codul postal nu, i se afiseaza eroare ca nu e bun codul postal
- daca e in romania si localitatea nu e in array, pretul e de 20 lei
- daca nu e in romania, se comporta pe toate cazurile la fel ca mai sus, dar ca se mai adauga 50 lei
= Dupa trimiterea formularului i se va afisa pretul de shipping

Sa faci intr-un proiect separat, voi face un repo pe git.
-->

<?php include_once 'layouts/navigation.php' ?>

<?php 
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "Assignment_Basic_PHP";

// Create connection
$conn = new mysqli($server_name, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Select data from the database
$sql_select_produse = "SELECT * FROM produse"; 
$result = $conn->query($sql_select_produse); // Here you should write raw SQL commands
?>

<div class="row gutter-10 col-mb-80">
	<!-- Post Content
	============================================= -->
	<div class="postcontent col-lg-10 order-lg-last">
		<section id="content">
			<div class="content-wrap custom-content-wrap pb-1">
				<div class="container">
					<!-- Shop
					============================================= -->
					<div class="shop row gutter-10 col-mb-10 mt-3 pb-6">
						<?php 
							if ($result->num_rows > 0 && $product_row = $result->fetch_assoc()) :
								foreach ($result as $product_row) : 

								$id = $product_row["id"];
								$titlu = $product_row["titlu"];
								$link_imagine = $product_row["link_imagine"];
								$descriere = $product_row["descriere"];
								$valoare_rating = $product_row["valoare_rating"];
								$pret_normal = $product_row["pret_normal"];
								$pret_reducere = $product_row["pret_reducere"];

								$pret_total = ($product_row["pret_normal"] - $product_row["pret_reducere"]);
						?>
							<div class="custom-products-cards-padding col-xl-3 col-md-4 col-sm-6 col-12">
								<div class="grid-inner card-border h-100 d-flex flex-column">
									<div class="product-image img-area img-area-carti-principale m-0">
										<img class="p-2" src="<?= $link_imagine; ?>" alt="Distribuitor de apel">
										<?php if ($pret_reducere != 0 || $pret_reducere != null && $pret_reducere > $pret_normal) : ?>
											<div class="sale-flash badge bg-danger p-2">Reducere</div>
										<?php endif; ?>
									</div>
									<div class="product-desc text-center d-flex flex-column flex-grow-1 justify-content-between">
										<div class="product-title mb-0">
											<h4 class="mb-0 fs-5"><a class="fw-bold" title="" href="<?="cos.php?id=" . $id ?>"><?= $titlu ?></a></h4>
											<p class="fs-6 margin-low custom-main-product-description">
												<?= (strlen($descriere) > 200) ? substr($descriere, 0, 200) . '...' : $descriere; ?>
											</p>
										</div>
										<div>
										<div class="rating-container theme-krajee-svg rating-xs rating-animate rating-disabled">
											<div class="rating-stars custom-rating-stars-cursor-unset" tabindex="0">
												<span class="empty-stars">
													<span class="star custom-star" title="One Star">
														<span class="icon-star-empty"></span>
													</span>
													<span class="star custom-star" title="Two Stars">
														<span class="icon-star-empty"></span>
													</span>
													<span class="star custom-star" title="Three Stars">
														<span class="icon-star-empty"></span>
													</span>
													<span class="star custom-star" title="Four Stars">
														<span class="icon-star-empty"></span>
													</span>
													<span class="star custom-star" title="Five Stars">
														<span class="icon-star-empty"></span>
													</span>
												</span>
												<span class="filled-stars">
													<span class="star custom-star" title="">
														<?php for($i = 1; $i <= $valoare_rating; $i++) : ?>
															<span class="icon-star3"></span>
														<?php endfor; ?>
														<?php if(round($valoare_rating) > $valoare_rating) : ?>
															<span class="icon-star-half-full"></span>
														<?php endif; ?>
													</span>
												</span>
											</div>
										</div>
											<?php if ($pret_reducere == 0) : ?>
												<h5 class="product-price fw-semibold"> <?="<span>" . $pret_total . " Lei</span>" ?> </h5>
											<?php elseif($pret_reducere > 0 || $pret_reducere != null && $pret_reducere < $pret_normal) : ?>
												<h5 class="product-price fw-semibold"><del> <?= $pret_normal ?> Lei </del></h5>
												<h5 class="product-price fw-semibold"> <?= "<span>" . $pret_total . " Lei</span>" ?> </h5>
											<?php endif; ?>
											<a href="<?="cos.php?id=" . $id ?>" class="button custom-white-space-button button-color-default"><span><i class="icon-line-shopping-cart"></i>Adauga in cos</span></a>
										</div>
									</div>
								</div>
							</div>
						<?php 
								endforeach; 
							else : echo "No products in the database yet."; 
							endif;
						?>
					</div><!-- #shop end -->
				</div>		
			</div>
		</section>
	</div><!-- .postcontent end -->
	<!-- Sidebar
	============================================= -->
	<?php include_once 'layouts/sidebar.php' ?>
	<!-- .sidebar end -->
</div>
<?php include_once 'layouts/footer.php' ?>