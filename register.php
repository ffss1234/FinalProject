<!DOCTYPE html>

<html lang="en">

<html>
<head>

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<link rel="stylesheet" href="main.css">

<title>Login/Registar</title>
</head>
<body>

<a href="index.php" id="homepage" class="btn btn-outline-warning bg-dark"><i class="bi bi-house-door"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
  <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
</svg></i></a>
	
<div class="container">
	<div class="row d-flex justify-content-center bg-dark border my-5 py-5">
		<!-- LOGIN FORM -->
		<div class="col-md-6 border-end" align="right">
			<form action="register.php" method="post">
				<p>Email: <br /><input class="form-control" id="login" placeholder="Johndoe@outlook.com" type="text" name="email2" maxlength="50" required /></p>
				<p>Password: <br /><input class="form-control" id="login" placeholder="• • • • • • •" type="password" name="pass2" maxlength="50" required /></p>
				<p><button type="submit" class="btn btn-outline-warning" name="log_in">Log In</button></p>
			</form>
		</div>
		
		<!-- REGISTRATION FORM -->
		<div class="col-md-6">
			<form action="register.php" method="post">
				<p>Nome: <br /><input type="text" id="login" placeholder="João Alberto" class="form-control" maxlength="50" name="username" required /></p>
				<p>Email: <br /><input type="text" id="login" placeholder="Johndoe@outlook.com" class="form-control"  name="email" maxlength="50" required /></p>
				<p>Password: <br /><input type="password" id="login" class="form-control" placeholder="• • • • • • •" name="password1" maxlength="50" required /></p>
				<p>Confirmar Password: <br /><input type="password" id="login" placeholder="• • • • • • •" class="form-control"  name="password2" maxlength="50" required /></p>
				<p><button type="submit" class="btn btn-outline-warning" name="reg_user">Registar</button></p>
			</form>
		</div>
		
	</div>
</div>

<?php

include('db.php');

if(count($errors) > 0 ){ ?>

	<div>
	
		<?php foreach($errors as $error) : ?>
		
			<p><?php echo $error ?></p>
			
		<?php endforeach ?>
			
	</div>
	
<?php } 

if (!empty($_SESSION['email'])){
	header('refresh:3; url=index.php');
}
?>
</body>
</html>