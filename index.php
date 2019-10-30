<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/index.css">
	
    <title>CERT Incident Management Tool</title>
    <link rel="icon" href="css/first-aid.png">	
	<?php
		session_start();
	?>
  </head>
  <body>
		<div class="container-fluid">
		  <div class="row no-gutter">
			<div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
			<div class="col-md-8 col-lg-6">
			  <div class="login d-flex align-items-center py-5">
				<div class="container">
				  <div class="row">
					<div class="col-md-9 col-lg-8 mx-auto">
					  <h3 class="login-heading mb-4">Welcome!</h3>
					  <form action="validation.php" method="POST">
						<div class="alert alert-danger alert-dismissible" style="display: none;" id="alertDiv">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Invalid!</strong> Username or Password.
						</div>
						<div class="form-label-group">
						  <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
						  <label for="username">Username</label>
						</div>

						<div class="form-label-group">
						  <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
						  <label for="password">Password</label>
						</div>

						
						<button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
						
						<?php 
							if (isset($_GET['login']) && $_GET['login'] === 'false') {
								echo '<script type="text/javascript">';
								echo 'document.getElementById("alertDiv").style.display = "block"';
								echo '</script>';
							}		
						?>
						
					  </form>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>