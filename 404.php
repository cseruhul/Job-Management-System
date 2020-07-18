
<?php include  'config/config.php'?>
<?php include  'lib/database.php'?>
<?php include  'helpers/Format.php'?>


<?php 
	$db = new database();
	$fm = new Format();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Find Your Job Here</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/style.css">
		<link rel="icon" href="images/fevicon.png" type="image/gif" sizes="16x16">


		<style>
			
			img{
				margin-left: 200px;
			}
			.page404{
				height: 300px;
				margin: 10px;
			}
			.page404 p{
				width: 960px;
				font-size: 20px;
				color: white;
				background: red;
				line-height: 50px;
				text-align: center;
			}
		</style>

	</head>
	<body>
		<div class="headersection templateheader clear">
			
			<div class="header template">

				<?php include 'inc/header_logo_slogan.php'; ?>
			</div>
		</div>
		<div class="navbar clear">
		
			<div class="template">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="contact.php">Contact us</a></li>
					<!-- <li><a href="profile.php">Profile</a></li> -->
					<li><a href="Request for circular.php">Request for circular</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="admin/login.php">Admin login</a></li>
				<ul>
			</div>
			
		</div>
		<div class="contentsection template clear">
			<div class="page404 clear">
				
				<img src = "images/404.jpg"/>

				<p>Please go back to home page.</p>
				
	
			</div>
	
		</div>
		<div class="footersection templateheader clear">
			<p>&copy 2020 All Right reserved</p>
		</div>
	</body>
</html>