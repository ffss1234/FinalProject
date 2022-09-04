<?php

include('db.php');

?>

<!DOCTYPE html>

<html lang="en">

<html>
<head>

<link rel="stylesheet" href="main.css">

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<title>About Us</title>

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


<!-- BANNER -->
<script type="text/javascript" src="Banner.js"></script>
<div class="container-fluid mb-2">
	<div class="row">
		<div class="col-md-12">
			<center><img id="BannerIMG" name="MoveBanner" class="border" width="70%" height="50%"/></center>
		</div>
	</div>
</div>
<!-- FIM -> BANNER -->

<div class="container rounded-lg mb-5">
	<div class="container bg-dark border p-5">
		<div class="row d-flex justify-content-center">
			<div class="col-md-6">
				<center><h4>Sobre Nós</h4>
				<p>Passa o tempo, mudam-se as gerências, mas ficam os livros. Há mais de dois séculos. 
					É verdade, são já quase trezentos anos de uma História que se confunde com a de Lisboa. Bertrand é hoje o nome da mais antiga e maior rede de livrarias em Portugal, com mais de 50 livrarias em todo o país e uma livraria online. 
					A nossa História ensinou-nos a cumplicidade com o leitor, a lealdade. Fazemos questão de lhe oferecer as mais atuais obras do mercado, os bestsellers do momento, mas também de ter em estante, ao seu dispor, os títulos de referência e uma variedade editorial que desafia leitores de diferentes gostos e idades. 
					Fazemos História, estando no presente. Atuais, atentos, ainda apaixonados pelo LIVRO.</p></center>
					<br />
			</div>
		</div>
<center><iframe width="560" height="315" src="https://www.youtube.com/embed/r-bI1eP3hrQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>

	<hr>
		
	<div class="row d-flex justify-content-center">
		<div class="col-md-6">
			<center><h4>Onde Estamos</h4>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12188.253353838709!2d-8.429633!3d40.207654!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6cca0b88ba5c19f0!2zNDDCsDEyJzI3LjYiTiA4wrAyNSc0Ni43Ilc!5e0!3m2!1spt-PT!2sus!4v1659393609680!5m2!1spt-PT!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></center>
			<br />
		</div>
	</div>
	
	<hr>
	
	<?php
	
		if(!empty($_SESSION['email'])){ ?>
	
	<div class="row d-flex justify-content-center">
		<div class="col-md-6">
			<center><h4>Dê-nos a sua opinião</h4>
			<form action="" method="post">
				<textarea rows="10" class="form-control" placeholder="Contacte o Administrador" name="adminmsg"></textarea>		
				<button class="btn btn-outline-warning mt-2" name="send">Enviar</button>
			</form>
			</center><br />
		</div>
	</div> <?php
		}else{ ?>
	<div class="row d-flex justify-content-center">
		<div class="col-md-6">
			<center><h4>Dê-nos a sua opinião</h4>
			<form action="" method="post">
				<textarea rows="10" class="form-control" placeholder="Faça Login para contactar o administrador" name="adminmsg" disabled="disabled"></textarea>		
				<button class="btn btn-outline-warning mt-2" name="send" disabled="disabled">Enviar</button>
			</form>
			</center><br />
		</div>
	</div> <?php
		} ?>
	
	</div>
</div>

<?php

	if(isset($_POST['send'])){

		$msgadmin = mysqli_real_escape_string($database, $_POST['adminmsg']);
		$who = $_SESSION['email'];
		
		$sendmsg = mysqli_query($database, "INSERT INTO contactos (nome, msg) VALUES ('$who', '$msgadmin')"); ?>
		
		<script type="text/javascript">
			alert("Mensagem enviada");
		</script><?php
	}
?>
</body>
</html>