<!DOCTYPE html>
<html>

<head>

	<title>CampusSaathi : Admin</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">


</head>

<body>

	
	
  	<div class="container">

    	<nav class="navbar navbar-default navbar-fixed-top">
	      <div class="container">

	        <div class="navbar-header">
	          <a class="navbar-brand" href="index.php">CampusSathi.com</a>
	        </div>

	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav">
	            <li class="active"><a href="index.php">Dash Bord</a></li>
			 			<li class="dropdown">
				        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Add categories<span class="caret"></span></a>
					        <ul class="dropdown-menu">
				            <li><a href="add-college-type.php">Add College Type</a></li>
				            <li><a href="add-company-type.php">Add Company Type</a></li>
				            <li><a href="add-location.php">Add New Location</a></li>
				            <li><a href="add-duration.php">Add New Duration</a></li>
					        </ul>
				      	</li>
			 			<li class="dropdown">
				        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Delete categories<span class="caret"></span></a>
					        <ul class="dropdown-menu">
				            <li><a href="index.php?#college">Delete College Type</a></li>
				            <li><a href="index.php#company">Delete Company Type</a></li>
				            <li><a href="index.php#location">Delete a Location</a></li>
				            <li><a href="index.php#duration">Delete a Duration</a></li>
					        </ul>
				      	</li>
			 			<li class="dropdown">
				        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Modules<span class="caret"></span></a>
					        <ul class="dropdown-menu">
				            <li><a href="manage-student.php?">Manage Students</a></li>
				            <li><a href="manage-company.php">Manage Companies</a></li>
				            <li><a href="manage-college.php">Manage Colleges</a></li>
					        </ul>
				      	</li>
	            <li><a href="http://localhost:8181/hrsolutions/" target="_blank">Visit Website</a></li>
	          </ul>


	         <!--  <ul class="nav navbar-nav navbar-right">
	            <li><a href="logout.php"><span class="glyphicon glyphicon-user"> Logout</span></a></li>
	          </ul> -->
	          
	        </div>
	      </div>
    	</nav>
  	</div>

  	<div class="container">
  		<div class="blog-header">
        	<h2 class="blog-title">CampusSathi : Admin Area</h2>
      </div>

      <br><br>
      <div class="row">
  			<div class="col-xs-12 blog-main">

  			<?php if(isset($_GET["msg"])) : ?>
  				
  				<div class="alert alert-success"><?php  echo htmlentities($_GET["msg"]); ?></div>

  			<?php endif; ?>