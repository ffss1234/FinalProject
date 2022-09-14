<?php
ob_start();
include('db.php');

if(empty($_SESSION['email'])){
	header('location: register.php');
}	

$mail_associated = $_SESSION['email'];

#SHIPPING INFO ASSOCIATED	
$savedinfo = mysqli_query($database, "SELECT * FROM shipping WHERE mail_associated LIKE '%$mail_associated%'");
$info = mysqli_fetch_assoc($savedinfo);

#APAGA INFORMAÇÃO GUARDADA
if(isset($_POST['deletebtn'])){
	$findinfo = "DELETE FROM shipping WHERE mail_associated = '$mail_associated'";
	$deleteinfo = mysqli_query($database, $findinfo);
	header('location: cart.php');
}

#GUARDA informação
if (isset($_POST['save'])){
	$order_name = $_POST['name'];
	$order_contact = $_POST['contact'];
	$order_email = $_POST['email'];
	$order_address = $_POST['address'];
	$order_country = $_POST['country'];
					
	$savedetails = mysqli_query($database, "INSERT INTO shipping (name, contact, email, address, country, mail_associated)
		VALUES('$order_name', '$order_contact', '$order_email', '$order_address', '$order_country', '$mail_associated')");
	header('location: cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- CSS -->
<link rel="stylesheet" href="main.css">

<title>Cart</title>

</head>
<body>

<!-- NAV BAR -->
<nav class="navbar navbar-dark bg-dark">
	<div class="container-fluid">
		<form class="d-flex" style="width:26%">
			<a href="index.php" class="btn btn-outline-warning me-2"><i class="bi bi-house-door"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
				<path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
				</svg></i></a>
				<?php if(!empty($_SESSION['email'])){ ?>
			<input class="form-control" type="search" placeholder="Introduza o título do livro ou nome do autor" aria-label="Search" name="booksearch">
			<button class="btn btn-outline-warning ms-2" type="submit" name="search"><i class="bi bi-search"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
				<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
				</svg></i></button>
				<?php } ?>
		</form>	
		<div class="d-flex">
			<ul class="list-inline my-auto">
				<li class="list-inline-item"><a href="aboutus.php" class="btn btn-outline-warning"><i class="bi bi-question-octagon"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-question-octagon" viewBox="0 0 16 16">
					<path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
					<path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
					</svg></i></a></li>
			<?php if(!empty($_SESSION['email'])){ ?>
				<li class="list-inline-item"><a href="cart.php" class="btn btn-outline-warning"><i class="bi bi-cart"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
					<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
					</svg></i></a></li>
			<?php if(!empty($_SESSION['admin'])){ ?>
			
							<li class="list-inline-item"><a href="adminpanel.php" class="btn btn-outline-warning"><i class="bi bi-person"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
							<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
							</svg></i></a></li>
							
					<?php } ?>
		
			<li class="list-inline-item"><a href="logout.php" class="btn btn-outline-warning"><i class="bi bi-box-arrow-right"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
			<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
			</svg></i></a></li>
			<?php }	?>
			</ul>
		</div>	
	</div>	
</nav>
<!-- FIM -> NAV BAR -->


<!-- SHIPPING INFO -->	
<div class="container border my-5 py-5 bg-dark">
	<div class="container-fluid pt-5">
		<div class="row d-flex justify-content-center">
			<div class="col-md-3 px-5 border-end" align="right">
			<form action="" method="post">	
				<span><h6>NOME:</h6></span>
						<p><input type="text" class="form-control" placeholder="Ex: Manuel Horácio" name="name" required></p>
						<span><h6>TELEFONE:</h6></span>
						<p><input type="number" class="form-control" placeholder="Ex: 912345678" name="contact" required></p>
						<span><h6>EMAIL:</h6></span>
						<p><input type="text" class="form-control" placeholder="Ex: Endereço@gmail.com" name="email" required></p>
						<span><h6>ENDEREÇO:</h6></span>
						<p><input type="text" class="form-control" placeholder="Ex: Rua da Saudade Nº35" name="address" required></p>
						<span><h6>PAÍS:</h6></span>
						<p><input type="text" class="form-control" placeholder="Ex: Zimbabwe" name="country" required></p> <?php
						
						if(empty($info)){ ?>
						
						<button type="submit" value="Guardar" name="save" class="btn btn-outline-warning btn-sm"><i class="bi bi-save"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
  <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
</svg></i></button> <?php
						
						}else{ ?>

						<button type="submit" class="btn btn-outline-warning btn-sm" disabled><i class="bi bi-save"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
  <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
</svg></i></button> <?php
						
						} ?>
	
			</form>
			</div>
			<div class="col-md-3 px-5">	
			<form action="" method="post"> <?php
				if(!empty($info)){
					echo "
						<span><h6>NOME: </h6></span>
						<p>".$info['name']."<br /></p>
						<span><h6>TELEFONE: </h6></span>
						<p>".$info['contact']."<br /></p>
						<span><h6>EMAIL: </h6></span>
						<p>".$info['email']."<br /></p>
						<span><h6>ENDEREÇO: </h6></span>
						<p>".$info['address']."<br /></p>
						<span><h6>PAÍS: </h6></span>
						<p>".$info['country']."<br /></p>" ?>
			
						<br /><br /><br />
						<button type="submit" value="Eliminar" name="deletebtn" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
							<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
							</svg></i></button> <?php
				
				}else{ 
				
					echo "
						<span><h6>NOME: </h6></span>
						<p> <br /></p>
						<span><h6>TELEFONE: </h6></span>
						<p> <br /></p>
						<span><h6>EMAIL: </h6></span>
						<p> <br /></p>
						<span><h6>ENDEREÇO: </h6></span>
						<p> <br /></p>
						<span><h6>PAÍS: </h6></span>
						<p> <br /></p>" ?>
			
						<br /><br /><br />
						<button type="submit" class="btn btn-outline-danger btn-sm" disabled><i class="bi bi-trash3"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
							<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
							</svg></i></button> <?php
				} ?>
					
			</div>
		</div>
	</form>	
	</div>

<!-- FIM -> SHIPPING INFO -->	

<br />

<center><a href="index.php" class="btn btn btn-outline-warning btn-sm">Continuar a comprar</a></center>

<!-- COMPRAS -->
	
	<?php
					
	if(!empty($_SESSION['cart'])){
		
		$cartproducts = $_SESSION['cart'];	?>	
		
		<div class="container-fluid pt-5">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6">
				<form action="" method="post" id="ordersent">
					<table class="table border">
						<tr>
							<th>Título</th>
							<th>Qtd</th>
							<th>Preço</th>	
							<th>Total</th>
							<th></th>
						</tr>
							
							<?php
						
						$carttotal = 0;
											
							foreach ($_SESSION['cart'] as $cartkey => $bookvalue) { ?>
							
								<tr>
									<td><?php echo $bookvalue['name']; ?></td>
									<td><?php echo $bookvalue['quantity']; ?></td>
									<td><?php echo $bookvalue['price']; ?>€</td>
									<td><?php echo number_format($bookvalue['price'], 2) * number_format($bookvalue['quantity'], 2); ?>€</td>
									<td class="text-center"><a href="cart.php?action=remove&id=<?php echo $bookvalue['id'] ?>" class="btn btn-outline-danger"><i class="bi bi-x-octagon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">
  <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg></i></a></td>
								</tr> <?php
							
							$carttotal = $carttotal + ($bookvalue['quantity'] * $bookvalue['price']);
						
							}
						
						
						
						?>
						
						<tr>
							<td colspan='2'></td>
							<th>Total</th>
							<td><?php echo number_format($carttotal, 2) ?>€</td>
							
							<?php
							if(!empty($info)){ ?>
							<td class="text-center"><button type="submit" class="btn btn-outline-warning" name="checkout"><i class="bi bi-cart-check"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
								<path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
								<path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
								</svg></i></button></td> <?php
								
							}else{ ?>
							<td class="text-center"><button type="submit" class="btn btn-outline-warning" name="checkout" disabled><i class="bi bi-cart-check"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
								<path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
								<path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
								</svg></i></button></td> <?php
							} ?>
						</tr>
							
					</table>	
				</form>
				</div>
			</div>
			
		</div> <?php 
	} ?>		
<!-- FIM -> COMPRAS -->	

<!-- RESUMO COMPRA -->	
<?php
if(isset($_POST['checkout'])){ ?>

	<?php
		$orderinfo = array(
		'name' => $info['name'],
		'contact' => $info['contact'],
		'email' => $info['email'],
		'address' => $info['address'],
		'country' => $info['country'],
	);
	
	$mailassociated = $_SESSION['email'];
	$bookvariety = count($_SESSION['cart']); #utilizado em adminpanel.php
	$neworder = "INSERT INTO orders (total_final, variety, account) VALUES ('$carttotal', '$bookvariety', '$mailassociated')";
	$orderquery = mysqli_query($database, $neworder);
						
	$getid = "SELECT orderid FROM orders WHERE total_final = '$carttotal' AND account = '$mailassociated'";
	$idquery = mysqli_query($database, $getid);
					
	$orderdetails = mysqli_fetch_assoc($idquery);
	$orderid = $orderdetails['orderid']; ?>
							
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-3 border-bottom">
				<h5>Obrigado, o seu pedido vai ser enviado brevemente!</h5>
				<ul> <?php
				
					foreach ($_SESSION['cart'] as $cartkey => $bookvalue){
									
						$booknames = $bookvalue['name'];
						$bookquantity = $bookvalue['quantity'];
						$booktotal = $bookvalue['price'] * $bookvalue['quantity'];
								
						$insertorder = "INSERT INTO orderfinal (orderid, item, quantity, total) VALUES ('$orderid', '$booknames', '$bookquantity', '$booktotal')";
						$insertquery = mysqli_query($database, $insertorder);
						
						echo "<li><span>".$bookvalue['name']." x ".$bookvalue['quantity']."</span></li><br />";			
									
					} ?>
								
					<b>Total: </b><?=$carttotal?>€</span>
				</ul>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<div class="col-md-3">
				<p><b>Nome Completo:</b> <?= $orderinfo['name'] ?></p>
				<p><b>Contacto:</b> <?= $orderinfo['contact'] ?></p>
				<p><b>Email:</b> <?= $orderinfo['email'] ?></p>
				<p><b>Endereço:</b> <?= $orderinfo['address'].", ".$orderinfo['country'] ?></p>
				<p><b><center>(* Entrega à cobrança *)</center></b></p>
			</div>
		</div>
	</div> <?php  
unset($_SESSION['cart']);
} 
ob_end_flush() ?>
<!-- FIM -> RESUMO COMPRA -->		
	
</div>


</body>
</html>
