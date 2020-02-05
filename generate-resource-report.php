<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	require_once('dbconfig.php');
	session_start();
	if (!isset($_SESSION['user'])){
		header("Location: index.php");
	}
	?>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CERT Incident Management Tool</title>
  <link rel="icon" href="css/first-aid.png">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
	<link href="css/scrolling-nav.css" rel="stylesheet">
	<link rel="stylesheet" href="css/search.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body id="page-top">
  <!-- Dummy Navbar to create space between the navbar and the body -->
  <nav class="navbar navbar-expand-lg"></nav> 
  <nav class="navbar navbar-expand-lg"></nav> 
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">CIMT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
			<li class="nav-item">
			<a class="nav-link js-scroll-trigger" href="main.php" method="GET">Main Menu</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Resources</a>
			<div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" href="add-available-resource.php" method="GET">Add Available Resource</a>
			<a class="dropdown-item" href="add-emergency-incident.php" method="GET">Add Emergency Incident</a>
			<a class="dropdown-item" href="search-resources.php" method="GET">Search Resources</a>
			<a class="dropdown-item" href="generate-resource-report.php" method="GET">Generate Resource Report</a>
			</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				User: <?php $result = mysqli_query($con,"SELECT * FROM user WHERE username='".$_SESSION['user']."' ");
							$row = mysqli_fetch_array($result);
							$displayname = $row["displayname"];
							echo $displayname;?></a>
				<div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
				<?php include('user-info.php');?>
				</div>
			</li>
			<li class="nav-item">
			<a class="nav-link js-scroll-trigger" href="logout.php" method="GET">Logout</a>
			</li>
        </ul>
      </div>
    </div>
  </nav>

 <form id="resultsForm">
		<h1 id="searchTitle">Resource Report <span id="clear" style="float: right" class="glyphicon glyphicon-info-sign"></span></h1>
		<table id="resultsTable" class="table">
			<thead class="thead-dark">
				<tr>
					<th>
						Primary Function #
					</th>
					<th>
						Primary Function
					</th>
					<th>
						Total Resources
					</th>					
				</tr>
			</thead>
				<?php include('report.php'); ?>

			
			
			
			
		</table>
	</form>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; CIS 197 Team 2</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>

</html>
