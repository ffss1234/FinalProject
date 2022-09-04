<?php

session_start();

$username = "";
$email = "";

$errors = array();
							#IP         #USER #PASS #DB
$database = mysqli_connect('localhost', 'root', '', 'databasefinal') or die("Erro a conectar à base de dados");



#ATRIBUI VALORES À BASE DE DADOS
if(isset($_POST['reg_user'])){
$username = mysqli_real_escape_string($database, $_POST['username']);
$email = mysqli_real_escape_string($database, $_POST['email']);
$pass1 = mysqli_real_escape_string($database, $_POST['password1']);
$pass2 = mysqli_real_escape_string($database, $_POST['password2']);
$pass3 = MD5($pass1);


#MENSAGENS DE ERRO
if(empty($username)) {array_push($errors, "Introduza o seu nome de utilizador");}
if(empty($email)) {array_push($errors, "Introduza o seu email");}
if(empty($pass1)) {array_push($errors, "Crie uma password");}
if($pass1 != $pass2) {array_push($errors, "As passwords introduzidas não são iguais");}


#PROCURA UTILIZADORES EXISTENTES COM O MESMO NOME
							#DB			
$usercheck = "SELECT * FROM user WHERE email = '$email' LIMIT 1";

$results = mysqli_query($database, $usercheck);
$user = mysqli_fetch_assoc($results);

if($user) {
	if($user['email'] === $email){array_push($errors, "Já existe uma conta registada nesse email");}
}


#REGISTA O UTILIZADOR
if(count($errors) == 0 ){
	
	$regaccount = "INSERT INTO user (username, email, userpass) VALUES ('$username', '$email', '$pass3')";
		
	mysqli_query($database, $regaccount);
	$_SESSION['email'] = $email;
	echo "<center><h4>Conta criada com sucesso. Irá ser redirecionado para a página principal</h4></center>";
	header('refresh:3; url=index.php');
}
}

#LOGIN
if(isset($_POST['log_in'])){
	
	$email = mysqli_real_escape_string($database, $_POST['email2']);
	$password = mysqli_real_escape_string($database, $_POST['pass2']);
	$passlogin = MD5($password);
	
	if(empty($email)){
		
		array_push($errors, "Introduza o seu email");
		
	}
	if(empty($password)){
		
		array_push($errors, "Introduza a password");
		
	}
	
	if(count($errors) == 0 ){
	
	
	$logacc = "SELECT * FROM user WHERE email='$email' AND userpass='$passlogin'";
	$results = mysqli_query($database, $logacc);
	$admincheck = mysqli_fetch_assoc($results);
			
	if(mysqli_num_rows($results)){
		$_SESSION['admin'] = $admincheck['admin'];
		$_SESSION['email'] = $email;
			
		echo "<center><h4>Log in efectuado com sucesso. Irá ser redirecionado para a página principal</h4></center>";
		header('refresh:3; url=index.php');
		
		
	}else{
		
		array_push($errors, "<center><h6>Utilizador ou password errado(s)</h6></center>");
		}
	}
}

#SEARCH BAR
if(isset($_GET['search'])) {
	$searchtext = $_GET['booksearch'];
	$searchsql = "SELECT * FROM livros WHERE author LIKE '%$searchtext%' OR name LIKE '%$searchtext%'";
	$searchresults = mysqli_query($database, $searchsql);
}

#INICIA sessao do carro
if(isset($_POST['add'])){
	
	if(isset($_SESSION['cart'])){
		
		$item_array_id = array_column($_SESSION['cart'], 'id');
		
		if(!in_array($_POST['bookid'], $item_array_id)){
			
			$count = count($_SESSION['cart']);
			$item_array = array(
				'id' => $_POST['bookid'],
				'name' => $_POST['name'],
				'price' => $_POST['price'],
				'quantity' => $_POST['quantity'],
			);
			$_SESSION['cart'][$count] = $item_array;
			header('location: index.php');
			
		}else{
			#ACTUALIZA as quantidades
			foreach($_SESSION['cart'] as &$update['cart']){
				
				if($update['cart']['id'] === $_POST['bookid']){
					$update['cart']['quantity'] = $update['cart']['quantity'] + $_POST['quantity'];
					header('location: index.php');
				}
			}
		}
	
	}else{
		
		$item_array = array(
			'id' => $_POST['bookid'],
			'name' => $_POST['name'],
			'price' => $_POST['price'],
			'quantity' => $_POST['quantity'],
		);
		$_SESSION['cart'][0] = $item_array;
		header('location: index.php');
		
	}
}

#REMOVER items do cart
if(isset($_GET['action'])){
		
	if($_GET['action'] == "remove"){
			
		foreach($_SESSION['cart'] as $cartkey => $bookvalue){
				
			if($bookvalue['id'] == $_GET['id']){
				unset($_SESSION['cart'][$cartkey]);
			}
		}
	}
}


#Cria uma nova categoria
if(isset($_POST['category_submit'])){
	$name=$_POST['name'];
	$query = "INSERT INTO categorias (category_name) VALUES ('$name')";
	$result = mysqli_query($database, $query);
		
	if($result){;
		echo '<script type="text/javascript">;
			 alert("Categoria criada");
		     window.location.href="adminpanel.php";
		     </script>';
	}
}
	
#Apaga uma categoria
if(isset($_POST['removecat'])){
	if($_POST['deletecat'] === 'Selecionar categoria'){
		
		echo '<script type="text/javascript">;
			alert("Tem de selecionar uma categoria primeiro");
			window.location.href="adminpanel.php";
			</script>';	
	}else{
	
		$deletecat = $_POST['deletecat'];
		$deleteentry = "DELETE FROM categorias WHERE id = '$deletecat'";
		$result = mysqli_query($database, $deleteentry);
		
		if($result){
			echo '<script type="text/javascript">;
				alert("Categoria eliminada");
				window.location.href="adminpanel.php";
				</script>';
		}
	}
}

#Muda o nome de uma categoria
if(isset($_POST['renamecat'])){
	if(($_POST['deletecat'] === 'Selecionar categoria') or (empty($_POST['newcatname']))){
		echo '<script type="text/javascript">;
			alert("Tem de selecionar uma categoria primeiro e/ou escrever o novo nome da categoria");
			window.location.href="adminpanel.php";
			</script>';
	}else{
		$newnamecategory = $_POST['newcatname'];
		$deletecat = $_POST['deletecat'];
		$renamecat = "UPDATE categorias SET category_name = '$newnamecategory' WHERE id = '$deletecat'";
		$result = mysqli_query($database, $renamecat);
		if($result){;
			echo '<script type="text/javascript">;
				alert("Nome da categoria alterado");
				window.location.href="adminpanel.php";
				</script>';
		}
	}
}
	
#Apaga uma sub-categoria
if(isset($_POST['removesub'])){
	if($_POST['deletesub'] === 'Selecionar Sub-categoria'){
		echo '<script type="text/javascript">;
			alert("Tem de selecionar uma sub-categoria primeiro");
			window.location.href="adminpanel.php";
			</script>';
	}else{
		$deleteid = $_POST['deletesub'];
		$deleterow = "DELETE FROM sub_categorias WHERE id = '$deleteid'";
		$result = mysqli_query($database, $deleterow);
		if($result){;
			echo '<script type="text/javascript">;
				alert("Sub-categoria eliminada");
				window.location.href="adminpanel.php";
				</script>';
		}
	}
}

#Muda o nome de uma sub-categoria
if(isset($_POST['renamesub'])){
	if(($_POST['deletesub'] === 'Selectionar Sub-categoria') or (empty($_POST['newname']))){
		echo '<script type="text/javascript">;
			alert("Tem de selecionar uma sub-categoria primeiro e/ou escrever o novo nome da sub-categoria");
			window.location.href="adminpanel.php";
			</script>';
	}else{
		$renamesub = $_POST['newname'];
		$deleteid = $_POST['deletesub'];
		$renameentry = "UPDATE sub_categorias SET category_name = '$renamesub' WHERE id = '$deleteid'";
		$result = mysqli_query($database, $renameentry);
		if($result){;
			echo '<script type="text/javascript">;
				alert("Nome da sub-categoria alterado");
				window.location.href="adminpanel.php";
				</script>';
		}
	}
}

#Cria uma nova sub-categoria
if(isset($_POST['sub_category_save'])){
	$name = $_POST['name'];
	$category_id = $_POST['categoryid'];
	
	$query = "INSERT INTO sub_categorias (category_name, parentid) VALUES ('$name', '$category_id')";
	$result = mysqli_query($database, $query);
		
	if($result){;
		echo '<script type="text/javascript">;
			 alert("Sub-categoria criada");
		     window.location.href="adminpanel.php";
		     </script>';
	}
}
	
	
#ADICIONAR NOVOS LIVROS
if(isset($_POST['addbook'])){
	$bookname = $_POST['bookname'];
	$authorname = $_POST['authorname'];
	$bookprice = $_POST['bookprice'];
	$definecat = $_POST['selcategory'];
		
	$upload = rand(1000, 10000).$_FILES['imgfile']['name'];
	$upload1 = 'img/'.$upload;
	$tempname = $_FILES['imgfile']['tmp_name'];
	
	$upload_dir = 'img/';
		
	move_uploaded_file($tempname, $upload_dir.'/'.$upload);
		
	$insertbook = "INSERT INTO livros (name, categoryid, author, price, cover) VALUES ('$bookname', '$definecat', '$authorname', '$bookprice', '$upload1')";
		
		if(mysqli_query($database, $insertbook)){
			echo '<script type="text/javascript">;
				 alert("Livro adicionado");
			     window.location.href="adminpanel.php";
			     </script>';
		}
}
	
#REMOVE utilizador
if(isset($_POST['deluser'])){
	$userid = $_POST['deluser'];
	$delsearch = "DELETE FROM user WHERE id = '$userid'";

	if(mysqli_query($database, $delsearch)){
		echo '<script type="text/javascript">;
			alert("Utilizador removido");
			window.location.href="adminpanel.php";
			</script>';
	}
}
	
#LISTA DE COMPRAS
$getorder = "SELECT * FROM orders";
$orderquery = mysqli_query($database, $getorder);
$order = mysqli_fetch_all($orderquery, MYSQLI_ASSOC);

$getorderinfo = "SELECT * FROM orderfinal";
$orderinfoquery = mysqli_query($database, $getorderinfo);
$orderinfo = mysqli_fetch_all($orderinfoquery, MYSQLI_ASSOC);


#APAGA COMPRA
if(isset($_POST['delorder'])){
	$findorder = $_POST['delorder'];
	$deleteorder = mysqli_query($database, "DELETE FROM orderfinal WHERE orderid = '$findorder'");
	$deleteorder1 = mysqli_query($database, "DELETE FROM orders WHERE orderid = '$findorder'");
	echo '<script type="text/javascript">;
			alert("Pedido removido");
			window.location.href="adminpanel.php";
			</script>';
}	

#CONTACTOS DOS UTILIZADORES
$contactmsg = mysqli_query($database, "SELECT * FROM contactos");

if(isset($_POST['delmsg'])){
	$msgid = $_POST['delmsg'];
	$delmsg = mysqli_query($database, "DELETE FROM contactos WHERE id = '$msgid'"); ?>
	<script type="text/javascript">;
			 alert("Categoria criada");
		     window.location.href="adminpanel.php";
	</script> <?php
}
?>