<?php

include('db.php');

#LISTA CATEGORIAS
$categories = "SELECT * FROM categorias";
$catquery = mysqli_query($database, $categories);

?>

<!DOCTYPE html>

<html lang="en">

<html>
<head>

<link rel="stylesheet" href="main.css">

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<title>Homepage</title>

</head>
<body>

<!-- NAV BAR -->
<nav class="navbar navbar-dark bg-dark fixed-top">
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
<script type="text/javascript" src="banner.js"></script>
<div class="container-fluid mb-2">
	<div class="row">
		<div class="col-md-12">
			<center><img id="BannerIMG" name="MoveBanner" class="border" width="70%" height="50%"/></center>
		</div>
	</div>
</div>
<!-- FIM -> BANNER -->



<div class="container rounded-lg mb-5">
<!-- REDIRECIONA PARA CRIAÇÃO DE CONTA -->
<?php 

if (empty($_SESSION['email'])){ ?>
	
<div class="container bg-dark text-center border mb-2" style="opacity: 98%;	border-radius: 25px;"><h6>Para aceder aos nossos serviços, terá de fazer log in primeiro. Caso ainda não possua uma conta, clique <a href="register.php" style="">AQUI</a> para se registar/fazer login.</h6></div>

<!-- FIM -> REDIRECIONA PARA CRIAÇÃO DE CONTA -->
<?php }


	#SEARCH BAR
if (!empty($_GET['booksearch'])){
	if(mysqli_num_rows($searchresults) > 0){ ?>
		<div class="container bg-dark border mb-2" style="opacity: 95%;	border-radius: 25px;">
		<h6><center>Encontramos <?=(mysqli_num_rows($searchresults))?> resultado(s)</center></h6>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped border">
					<tr>
						<th></th>
						<th>Título</th>
						<th>Autor</th>
						<th>Preço</th>
					</tr> <?php
			
		while ($booksearch = mysqli_fetch_array($searchresults)){ ?>
					<tr>
						<td><img src="<?=$booksearch['cover']?>" width="130px%" height="200px"></td>
						<td><?=$booksearch['name']?></td>
						<td><?=$booksearch['author']?></td>
						<td><?=$booksearch['price']?>€</td>
					</tr> <?php
		} ?>
					</table>
				</div>
			</div>
		</div> <?php
	}else{ ?>
		<div class="container bg-light border" style="opacity: 98%;	border-radius: 25px;">
			<h6><center>Não encontramos nenhum resultado para a sua pesquisa</center></h6>
		</div><?php
	}
}
	#FIM -> SEARCH BAR
	


#Resultados por página
$resultspage = 5;

#Numero de livros na db
$bookquery = 'SELECT * FROM livros';
$bookresult = mysqli_query($database,$bookquery);
$numberofbooks = mysqli_num_rows($bookresult);

#Determina numero de páginas
$pagenumber = ceil($numberofbooks/$resultspage);

#Determina em que página o utilizador está
if(!isset($_GET['page'])){
	$page = 1;
}else{
	$page = $_GET['page'];
}

#Determina numero de paginas
$firstresult = ($page-1)*$resultspage;


$bookquery = 'SELECT * FROM livros LIMIT '.$firstresult.', '.$resultspage;
$bookresult = mysqli_query($database,$bookquery); ?>



<?php
#FILTROS
if (!empty($_GET['filter'])){
	$filterbycat = $_GET['filter'];
	$filteredbooks = mysqli_query($database, "SELECT * FROM livros WHERE categoryid = '$filterbycat'");
	if(mysqli_num_rows($filteredbooks) > 0){ ?>
		<div class="container bg-dark border mb-2" style="opacity: 98%;	border-radius: 25px;">
		<h6><center>Encontramos <?=(mysqli_num_rows($filteredbooks))?> resultado(s)</center></h6>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped border">
						<tr>
							<th></th><th>Título</th><th>Autor</th><th>Preço</th>
						</tr> <?php
		while ($categorysearch = mysqli_fetch_array($filteredbooks)){ ?>
						<tr>
							<td><img src="<?=$categorysearch['cover']?>" width="130px%" height="200px"></td>
							<td><?=$categorysearch['name']?></td>
							<td><?=$categorysearch['author']?></td>
							<td><?=$categorysearch['price']?>€</td>
						</tr><?php
		} ?>
					</table>
				</div>
			</div>
		</div>
		<br /> <?php
	}else{ ?>
		<div class="container bg-dark border" style="opacity: 98%;	border-radius: 25px;"><h6><center>Não encontramos nenhum resultado para a sua pesquisa</center></h6></div> <?php
	}
} ?>



<div class="container bg-dark border">


<!-- FILTROS --><?php
if(!empty($_SESSION['email'])){ ?>
<form action="" method="get">
	<ul class="nav d-flex justify-content-center">
		<li class="nav-item dropdown"> <?php
			while($catlist = mysqli_fetch_assoc($catquery)){ 
		
				#LISTA SUB-CATEGORIAS
				$subcategories = "SELECT * FROM sub_categorias";
				$subcatquery = mysqli_query($database, $subcategories);
				$subcatlist = mysqli_fetch_all($subcatquery, MYSQLI_ASSOC);?>
			
				<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="" role="button" aria-expanded="false"><?= $catlist['category_name'] ?></a> 
					<ul class="dropdown-menu bg-dark" style="border-color:white"> <?php
						foreach($subcatlist as $sublist){ 
							if($sublist['parentid'] === $catlist['id']){ ?>
						<li><a class="dropdown-item" href="index.php?filter=<?= $sublist['id'] ?>" name="bookcat"><?= $sublist['category_name'] ?></a></li> <?php
							} 
						} ?>
					</ul>
		</li> <?php
			} ?>	
	</ul>
</form> <?php
}else{ ?>
	<br /> <?php
} ?>
<!-- FIM -> FILTROS -->


<!-- PRODUCTS -->
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped border">
				<tr> <?php 
				if(empty($_SESSION['email'])){ ?>
					<th></th><th>Título</th><th>Autor</th><th>Categoria</th>
				</tr> <?php
				}else{ ?>
					<th></th><th>Título</th><th>Autor</th><th>Categoria</th><th>Preço</th><th></th>
				</tr> <?php
				} ?>
	
				
									
				<?php
	
				while($book = mysqli_fetch_assoc($bookresult)){	
			
					$subcategoryid = "SELECT * FROM sub_categorias";
					$subcatid = mysqli_query($database, $subcategoryid);
					
					$categoryid = 'SELECT * FROM categorias';
					$catid = mysqli_query($database, $categoryid);
					$catname = mysqli_fetch_all($catid, MYSQLI_ASSOC); ?>
			
					<tr><td><img src="<?=$book['cover']?>" width="130px" height="200px"></td><td><?=$book['name']?></td><td><?=$book['author']?></td> <?php
								
					while($subcatname = mysqli_fetch_assoc($subcatid)){
					
						while($book['categoryid'] === $subcatname['id']){
													
							$book['categoryid'] = $subcatname['category_name'];
								
							foreach($catname as $key){
								if($key['id'] === $subcatname['parentid']){ ?>
												
									<td><?=$key['category_name']?> - <?=$book['categoryid']?></td> <?php
									
									if(empty($_SESSION['email'])){ ?>
										
										</tr> <?php
										
									}else{ ?>
										<form method="post" action="">
											<td><?=$book['price']?></td>
											<td><input type="hidden" name="name" value="<?= $book['name'] ?>" />
											<input type="hidden" name="bookid" value="<?= $book['id'] ?>" />
											<input type="hidden" name="price" value="<?= number_format($book['price'],2) ?>" />
											<input type="number" class="form-control" id="Qtd" name="quantity" value="1" min="1" />
											<input type="submit" class="btn btn-outline-warning" name="add" value="+" /></td>
											</tr>
										</form><?php
									}
								} 
							}
						}
					}
				}?>
			
			
			</table>
		
		</div>
	</div>
<!-- FIM -> PRODUCTS -->

<!-- Links para as páginas -->
<div class="d-flex justify-content-center"><?php
for($page=1;$page<=$pagenumber;$page++){
	echo '<a href="index.php?page=' .$page.'">'.$page.' </a> ';
}
if(empty($_SESSION['email'])){
?>
<script type="text/javascript">
   alert('Hi, to try check this website from an admin or customer perspective, use the following to login:\nUser - Pass\nadmin@admin.pt - 123\nguest@guest.pt - 123');
</script><?php
} ?>

</div>
</div></div>
</body>
</html>
