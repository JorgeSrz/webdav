<?php
	include 'php/connection.php';
	session_start();
	if(isset($_SESSION["User_id"])) {
		$userId = $_SESSION["User_id"];
	}
	$shopping_kart_icon = "
	<a href=\"cart.php\">
		<button class=\"round-btn\">
			<i class=\"fa-solid fa-cart-shopping\"></i>
		</button>
	</a>";
	$login_icon = "
	<a href=\"login.php\">
		<button class=\"round-btn\">
			<i class=\"fas fa-lock\" ></i>
		</button>
	</a>";
	$logout_icon = "
	<a href=\"php/logout.php\">
		<button class=\"round-btn\">
			<i class=\"fa-solid fa-right-from-bracket\" ></i>
		</button>
	</a>";
	if(isset($_SESSION['Admin_id'])) {
		$products_page = "<a href=\"admin.php\">Productos</a>";
	}
	else {
		$products_page = "<a href=\"products.php\">Productos</a>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="styles.css" rel="stylesheet">
	<link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<title>Cuidado con el Jorge</title>
</head>
<body>
	<div class="viewGrid">
		<div class="navBar">
			<a href="index.php">Inicio</a>
			<?php
			echo $products_page;
			?>
			<a href="location.php">Ubicación</a>
			<?php
			if(isset($_SESSION['User_id']) || isset($_SESSION['Admin_id'])) {
				echo $logout_icon;
				if(isset($_SESSION['User_id'])) {
					echo $shopping_kart_icon;
				}
			}
			else {
				echo $login_icon;
			}
			?>
		</div>
		<div class="mainView">
			<div class="productHolder">
				<h1>Compras</h1>
				<?php
                $carpeta = './';

				$archivos = scandir($carpeta);
				
				foreach ($archivos as $archivo) {
					if ($archivo != "." && $archivo != "..") {
						if (is_file($carpeta . '/' . $archivo)) {
							?>
							<div class="clientProductsTable">
								<div>
									<h2><?php echo $archivo;?></h2>
								</div>
								<div class="actions">
									<div>
										<a href="./<?php echo $archivo?>">Ver PDF</a>
									</div>
								</div>
							</div>
							<?php
						}
					}
				}
                ?>
			</div>
		</div>
	</div>
	<footer>
		<div class="footer-element">
			<h4>Contacto</h4>
			<div>
				<div class="inline-elements">
					<i class="fa-solid fa-envelope"></i>
					<h5>contacto@cuidadoconjorge.mx</h5>
				</div>
				<div class="inline-elements">
					<i class="fa-solid fa-phone"></i>
					<h5>+52 3338497656</h5>
				</div>
			</div>
		</div>
		<div class="footer-element">
			<h4>Redes sociales</h4>
			<div>
				<div class="inline-elements">
					<i class="fa-brands fa-facebook"></i>
					<h5>CuidadoConJorge</h5>
				</div>
				<div class="inline-elements">
					<i class="fa-brands fa-twitter"></i>
					<h5>CuidadoConJorge</h5>
				</div>
				<div class="inline-elements">
					<i class="fa-brands fa-instagram"></i>
					<h5>CuidadoConJorge</h5>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>