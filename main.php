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
  <link href="css/mainpage.css" rel="stylesheet">

</head>

<body id="page-top">

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

  <header class="bg-primary text-white" id="header">
    <div class="container text-center">
      <h1>Welcome to the CERT Incident Management Tool (CIMT)</h1>
      <p class="lead">The CIMT is an online web application that manages available resources and their assignments to various emergency incidents that may have already occurred,
are happening or may happen in the future in and around the Pasadena City College campus. Emergency incidents may include, but not limited to,
hazardous waste spills, acts of terrorism, nuclear incident, campus shooting, car crashes with fatalities, flooding, fire, etc.</p>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>About CERT</h2>
          <p class="lead">Campus Emergency Response Team (CERT) is a nation-wide program developed in 1985 by the Los Angeles City Fire Department. The CERT Program educates people about disaster preparedness and trains them in basic disaster response skills.</p>
          <p class="lead">Pasadena City College currently has CERT volunteers who are trained in basic first aid, CPR, and search and rescue. PCC CERT members assist others within the campus following an event such as earthquakes when professional responders are not immediately available to help during:</p>
		  <ul class="lead">
            <li>Emergency preparedness</li>
            <li>Fire safety</li>
            <li>Disaster medical operations</li>
            <li>Light search & rescue</li>
			<li>Incident Command System</li>
			<li>Disaster psychology terrorism</li>
			<li>Disaster simulation</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Services we offer</h2>
		  <ul class="lead">
            <li>Transportation</li>
            <li>Communications</li>
            <li>Engineering</li>
            <li>Search and Rescue</li>
			<li>Education</li>
			<li>Energy</li>
			<li>Firefighting</li>
			<li>Human Services</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Contact us</h2>
          <p class="lead">
				Police & College Safety<br>
				B-210<br>
				1570 E. Colorado Blvd.
				Pasadena, CA 91106<br>
				(626) 585-7484</p>
        </div>
      </div>
    </div>
  </section>

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
