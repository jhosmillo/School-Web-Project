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
	<link rel="stylesheet" href="css/resource.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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
  
  <form id ="resourceForm" action="add-resource.php" method="POST">
		<div class="alert alert-danger alert-dismissible" style="display: none;" id="alertDiv">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Invalid!</strong> Please enter a number for cost.
		</div>
		<div class="alert alert-danger alert-dismissible" style="display: none;" id="alertDiv1">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Invalid!</strong> Please enter a number for distance.
		</div>
		<h1 id="resourceTitle">New Resource Information<a href="add-available-resource.php" style="float: right"><span id="clear" class="fa fa-plus"></span></a></h1>
		<table id="resourceTable">
			<tr>
				<td id="column1">
					<p id="textForm">Resource ID<br/> <span id="subtextForm">(assigned on save)</span></p>
				</td>
				<td id="column2">
				<label id="resourceInfo">
					<?php
						include('display-id.php');
					?>
				</label>
				</td>
			</tr>
			<tr>
				<td id="column1">
					<p id="textForm">Owner</p>
				</td>
				<td id="column2">
					<label id="resourceInfo">
						<?php
							$result = mysqli_query($con,"SELECT * FROM user WHERE username='".$_SESSION['user']."' ");
							$row = mysqli_fetch_array($result);
							$owner = $row["displayname"];
							echo $owner;
						?>
					</label>
				</td>
			</tr>
			<tr>
				<td id="column1">
					<p id="textForm">Resource Name<span style="color:red">*</span><br/> <span id="subtextForm">(required)</span></p>
				</td>
				<td id="column2">
					<div>
						<input type="text" id="resourceName" name="resourceName"class="form-control" autocomplete="off" required>
					</div>
				</td>
			</tr>
			<tr>
				<td id="column1">
					<p id="textForm">Primary Function<span style="color:red">*</span></p>
				</td>
				<td id="column2">
					<select id="primaryFunction" name="primaryFunction" class="form-control" required>
						<option></option>
						<?php
							include('select.php');
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td id="column1">
					<p id="textForm">Secondary Function<br/> <span id="subtextForm">(optional)</span></p>
				</td>
				<td id="column2">
					<select id="secondaryFunction" name="secondaryFunction" class="form-control">						
						<option></option>
						<script>
						if(document.getElementById("primaryFunction").value === ""){
							document.getElementById("secondaryFunction").disabled=true;
						}
						document.getElementById("primaryFunction").addEventListener('change', function () {
							if(document.getElementById("primaryFunction").value === ""){
								document.getElementById("secondaryFunction").disabled=true;
							}else{
								document.getElementById("secondaryFunction").disabled=false;
							}
						});
						</script>
						<?php
							include('select.php');
						?>
						<script src="js/select.js"></script>
					</select>
				</td>
			</tr>
			<tr>
				<td id="column1">
					<p id="textForm">Description<br/> <span id="subtextForm">(optional)</span></p>
				</td>
				<td id="column2">
					<div>
						<input type="text" id="description" name="description" class="form-control" autocomplete="off">
					</div>
				</td>
			</tr>
			<tr>
				<td id="column1">
					<p id="textForm">Capabilities<br/> <span id="subtextForm">(optional)</span></p>
				</td>
				<td id="capabilitiesRow">
					<table id="capTable">
						
					</table>
				</td>
			</tr>
			<tr>
				<td id="column1">
					
				</td>
				<td id="capabilitiesRow">
					<div>
						<input type="text" id="capabilities" class="form-control"  style = "display: inline-block;" autocomplete="off">
						<span>
							<button type="button" class="btn btn-primary" id="addBtn">Add
								<script src="js/add-capabilities.js"></script>
							</button>
						</span>
					</div>
				</td>
			</tr>
			<tr>
				<td id="column1">
					<p id="textForm">Distance from PCC<br/> <span id="subtextForm">(optional)</span></p>
				</td>
				<td id="column2">
					<div>
						<input type="text" id="distance" step="0.01" type="number" name="distance" class="form-control" style = "display: inline-block;" autocomplete="off">
						<span>
							<label id="miles">miles</label>
						</span>
					</div>
				</td>
			</tr>
			<tr>
				<td id="column1">
					<p id="textForm">Cost<br/> <span id="subtextForm">(USD)</span></p>
				</td>
				<td id="column2">
					<div class="d-inline">
						<div class="col-xs-2">
						<label id="costLabel">$<span style="color:red">*</span></label>
						<span>
							<input type="text" id="cost" name="cost" type="number" step="0.01" class="form-control" style = "display: inline-block;" autocomplete="off" required>
							<label id="perCost">Per<span style="color:red">*</span></label>
							<select id="selectCost" name= "selectCost" class="form-control" style = "display: inline-block;" required>
								<option></option>
								<?php
									include('unit.php');
								?>
							</select>
						</span>
						</div>
					</div>
				</td>
			</tr>
		</table>
		<div class="buttons">
			<button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
			<button type="button" class="btn btn-primary" id="cancelBtn" onClick="Javascript:window.location.href = 'main.php';">Cancel</button>
		</div>
	</form>
</body>

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
  <?php 
		if (isset($_GET['cost']) && $_GET['cost'] === 'false') {
			echo '<script type="text/javascript">';
			echo 'document.getElementById("alertDiv").style.display = "block"';
			echo '</script>';
		}
		if (isset($_GET['distance']) && $_GET['distance'] === 'false') {
			echo '<script type="text/javascript">';
			echo 'document.getElementById("alertDiv1").style.display = "block"';
			echo '</script>';
		}		
	?>
</html>
