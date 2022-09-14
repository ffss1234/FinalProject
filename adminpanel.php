<?php
	
	include('db.php');
	#Se a conta nao for administrador, redireciona para conta de cliente
	if(empty($_SESSION['admin'])){
		header('location: index.php');
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

<title>Administração</title>

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

<div class="container bg-dark rounded-lg my-5 border">
<center><h1>Painel Administrativo</h1></center>

	<!-- CRIA CATEGORIAS -->
<div class="container my-5 py-5">
	<div class="row">
		<div class="col-md-6">
			<p><h3>Nova Categoria</h3></p>
			<form method="post" action="">
				<span class="input-group">
				<input type="text" name="name" class="form-control" id="admin" placeholder="Nome da categoria" required>
				<button type="submit" name="category_submit" class="btn btn-outline-warning btn-sm"><i class="bi bi-check-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
						<path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
						</svg></i></button>
				</span>
			</form>
		</div>
	
	<!-- FIM -> CRIA CATEGORIAS -->
	
	<br />
	
	<!-- CRIA SUB-CATEGORIAS -->
		
		<div class="col-md-6">
			<p><h3>Nova Sub-Categoria</h3></p>
			<form method="post" action="">
					<p><select name="categoryid" class="form-control">
						<option>Selecionar sub-categoria</option>
						<?php 
									$query = "SELECT id, category_name FROM categorias";
									$result = mysqli_query($database, $query);
									
									while($row = mysqli_fetch_assoc($result)){ ?>
									<option value="<?= $row['id'] ?>"><?= $row['category_name']?></option>
								<?php } ?>
					</select></p>
					<span class="input-group">
					<input type="text" id="admin" name="name" class="form-control" placeholder="Nome da sub-categoria" required>
								
				<div>
					<button type="submit" name="sub_category_save" class="btn btn-outline-warning btn-sm"><i class="bi bi-check-lg"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
						<path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
						</svg></i></button>
					</span>
				</div>
			</form>
		</div>
		
	</div>
	<!-- FIM -> CRIA SUB-CATEGORIAS -->
	
	<br />
	
	
	<div class="row g-3">
		
		<!-- EDITA CATEGORIAS -->
			<div class="col-md-6">
			<p><h3>Editar Categorias</h3></p>
			<form method="post" action="">
				<div class="form-group">
					<p><select name="deletecat" id="categoryid" class="form-control">
						<option>Selecionar categoria</option>
						<?php 
									$query = "SELECT id, category_name FROM categorias";
									$result = mysqli_query($database, $query);
									
									while($row = mysqli_fetch_assoc($result)){ ?>
									<option value="<?= $row['id'] ?>"><?= $row['category_name']?></option>
								<?php } ?>
						
					</select></p>
				<span class="input-group">
					<input type="text" id="admin" name="newcatname" placeholder="Nome da categoria" class="form-control">
					<button type="submit"  id="renamecat" name="renamecat" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg></i></button>
					<button type="submit" name="removecat" class="btn btn-outline-danger btn-sm" class="bi bi-trash3"><i class="bi bi-trash3"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></i></button>
				</span>
				</div>
			</form>
		</div>
		
		<!-- FIM -> EDITA CATEGORIAS -->
	
	<br />
	
	
	<!-- EDITA SUB-CATEGORIAS -->
		<div class="col-md-6">
			<p><h3>Editar Sub-Categorias</h3></p>
			<form method="post" action="">
				<div class="form-group">
					<p><select name="deletesub" id="subcategoryid" class="form-control">
						<option>Selecionar Sub-categoria</option>
						<?php
							$query1 = "SELECT id, category_name FROM categorias";
							$result1 = mysqli_query($database, $query1);	
							$catrows = mysqli_fetch_all($result1, MYSQLI_ASSOC);
							
								
							$subquery = "SELECT id, parentid, category_name FROM sub_categorias";
							$subresult = mysqli_query($database, $subquery);
							
							

							while($subrow = mysqli_fetch_assoc($subresult)){ 
								?>
						<option value="<?= $subrow['id'] ?>">
						<?php 
							foreach ($catrows as $catrows1){
								if($catrows1['id'] == $subrow['parentid']){
									echo $catrows1['category_name'].' - '.$subrow['category_name'] ?></option> 
							<?php } } } ?>
					</select></p>
					<span class="input-group">
					<input type="text" id="admin" name="newname" placeholder="Nome da sub-categoria" class="form-control">
					<button type="submit"  id="renamesub" name="renamesub" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg></i></button>
					<button type="submit" name="removesub" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></i></button>	
					</span>
				</div>
			</form>
		</div>
	</div>
</div>
	
	<!-- FIM -> EDITA SUB-CATEGORIAS -->


	<hr>
	
	
	<!-- ADICIONAR ITEMS -->

<div class="container py-5 my-5">
	<div class="row">
		<div class="col-md-6">
			<form method="post" action="" enctype="multipart/form-data">
				<h3>Adicionar Items:</h3>
				<p><input type="text" class="form-control" name="bookname" placeholder="Nome do livro" required></p>
				<p><input type="text" class="form-control" name="authorname" placeholder="Nome do autor" required></p>
				<p><select name="selcategory" class="form-control" required> 
						<option>Selecionar categoria</option><?php 
				
				$query2 = "SELECT id, category_name FROM categorias";
				$result2 = mysqli_query($database, $query2);	
				$catrows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
							
								
				$subquery1 = "SELECT id, parentid, category_name FROM sub_categorias";
				$subresult1 = mysqli_query($database, $subquery1);
					
				while($subrow1 = mysqli_fetch_assoc($subresult1)){ ?>
					<option value="<?= $subrow1['id'] ?>"> <?php
					foreach($catrows2 as $catrows3){
						if($catrows3['id'] === $subrow1['parentid']){
							echo $catrows3['category_name'].' - '.$subrow1['category_name']?></option><?php
						}
					}
				} ?>
				</select></p>
								
				<p><input type="number" class="form-control" name="bookprice" step="0.01" placeholder="Preço €" required></p>
				<span class="input-group">
				<input type="file" class="form-control" name="imgfile">
				<button type="submit" name="addbook" class="btn btn-outline-warning btn-sm"><i class="bi bi-check-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
						<path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
						</svg></i></button>
				</span>
			</form>
		</div>

	<!-- FIM -> ADICIONAR ITEMS -->


	<!-- EDITAR UTILIZADORES -->

		<div class="col-md-6 table-responsive">
		
			<form method="post" action="">
			<table class="table" style="text-align:center;">
				<tr>
					<th>#</th>
					<th>Admin</th>
					<th>Utilizador</th>
					<th>Email</th>
					<th>Ferramentas</th>
				</tr>
				
			<?php
			
			$usersearch = "SELECT id, username, email, admin FROM user";
			$userresult = mysqli_query($database, $usersearch);
			
			while($userdisplay = mysqli_fetch_assoc($userresult)){ ?>
			
			
				<tr>
					<td><?= $userdisplay['id'] ?></td>
					<td><?php if($userdisplay['admin'] == 1){ ?>
						Sim <?php
					}else{ ?>
						Não <?php 
					} ?></td>
					<td><?= $userdisplay['username'] ?></td>
					<td><?= $userdisplay['email'] ?></td>
					<td><?php if($userdisplay['admin'] == 0){ ?>
						<button type="submit" name="deluser" value='.$userdisplay['id'].' class="btn btn-outline-danger btn-sm"><i class="bi bi-x-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
							<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
							</svg></i></button></td> <?php
					} ?>
				
			<?php } ?>
			
				
			</table>	
			</form>
		</div>
	</div>
</div>
	<!-- FIM -> EDITAR UTILIZADORES -->
	
	
	<hr>
	
	
	<!-- CONSULTA DE COMPRAS -->
<div class="container-fluid my-5 py-5">
	<div class="row">
		<div class="col-md-12">
		<center><h3>Encomendas:</h3></center>
			<form action="" method="post">
			<table class="table table-bordered">
				<tr class="text-center">
					<th>ID</th>
					<th>EMAIL</th>
					<th>TOTAL</th>
					<th>REMOVER</th>
					<th>QTD</th>
					<th>PREÇO</th>
					<th>ITEM</th>
					
				</tr>
				<?php
				
				foreach($order as $orderdetails){ ?>
					
					<tr>
					
						<th rowspan="<?=$orderdetails['variety']?>" class="text-center"><?=$orderdetails['orderid']?></th>
						<td rowspan="<?=$orderdetails['variety']?>" class="text-center"><?=$orderdetails['account']?></td>
						<td rowspan="<?=$orderdetails['variety']?>" class="text-center"><?=$orderdetails['total_final']?>€</td>
						<td rowspan="<?=$orderdetails['variety']?>" class="text-center"><button type="submit" name="delorder" value="<?=$orderdetails['orderid']?>" class="btn btn-outline-danger btn-sm"><i class="bi bi-x-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
							<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
							</svg></i></button></td> <?php
					foreach($orderinfo as $detailedorder){
						if($orderdetails['orderid'] === $detailedorder['orderid']){ ?>
							<td><?=$detailedorder['item']?></td><td class="text-center"><?=$detailedorder['quantity']?></td>
							<td class="text-center"><?=$detailedorder['total']?>€</td>
						</tr> <?php
						}
					}		
					?> <br /> <?php
				}
				
				?>
				<tr>
				
				</tr>
			</table>
			</form>
		</div>
	</div>
</div>
<!-- FIM -> CONSULTA DE COMPRAS -->

<!-- CONSULTA DE MENSAGENS -->
<div class="container-fluid my-5 py-5">
	<div class="row">
		<div class="col-md-12">
		<center><h3>Contactos:</h3></center>
		<form action="" method="post">
		<table class="table table-bordered">
				<tr class="text-center">
					<th>ID</th>
					<th>UTILIZADOR</th>
					<th>MENSAGEM</th>
					<th></th>
				</tr>
				
				<?php
				
					foreach ($contactmsg as $msg){ ?>
						
						<tr class="text-center">
							<td><?= $msg['id'] ?></td>
							<td><?= $msg['nome'] ?></td>
							<td><?= $msg['msg'] ?></td>
							<td><button type="submit" name="delmsg" value="<?=$msg['id']?>" class="btn btn-outline-danger btn-sm"><i class="bi bi-x-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
							<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
							</svg></i></button></td>
						</tr> <?php
						
					}
				
				?>
			
		</table>
		</form>
		</div>
	</div>
</div>	
	<!-- FIM -> CONSULTA DE MENSAGENS -->
	
	
</div>
</body>
</html>
