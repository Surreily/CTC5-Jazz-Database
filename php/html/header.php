<html>
	<head>
		<title>Jazz Database</title>
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	</head>

	<body>
		<!-- Navbar -->
		<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			    	</button>
			    	<a class="navbar-brand" href="#">Jazz Database</a>
			    </div>
			    <div id="navbar" class="navbar-collapse collapse">
			    	<ul class="nav navbar-nav">
			    		<li class="active"><a href="#">Home</a></li>
			    		<li><a href="sign-in.php">Login</a></li>
			    		<li><a href="#">Search</a></li>
			    	</ul>
			    </div>
			</div>
		</nav>

		<!-- Main content -->
		<div class="container">

			<?php include 'database_open.php'; ?>