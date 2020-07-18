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
		<title>About This site</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/style.css">
		<link rel="stylesheet" type="text/css" href="stylesheet/about.css">
		<link rel="icon" href="images/fevicon.png" type="image/gif" sizes="16x16">
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
					<li><a id="active"  href="about.php">About</a></li>
					<li><a href="admin/login.php">Admin login</a></li>
				<ul>
			</div>
			
		</div>
		<div class="contentsection template clear">
			<div class="aboutmaincontent clear">
				<div class="develop clear">
					<h2>Developed by</h2>
					
				</div>
			
				<div class="alimun common clear">
					<h2>Md. Alimun Biswas</h2>
					<img src="images/alimun.jpg" alt="image of Md. Alimun Biswas">
					<table>
						<tr>
							<td><p><strong>Name:</strong></p></td>
							<td><p>Md. Alimun Biswas</p></td>
						</tr>
						<tr>
							<td></td>
							<td><p>Student of Computer Science and Engineering.<br>Dhaka University of Engineering & Technology, Gazipur.</p></td>
						</tr>
						<tr>
							<td><p><strong>Phone No:</strong></p></td>
							<td><p>+8801960-052341</p></td>
						</tr>
						<tr>
							<td><p><strong>Email:</strong></p></td>
							<td><p>alimunduet@gmail.com</p></td>
						</tr>
						<tr>
							<td><p><strong>we are on:</strong></p></td>
							<td>
								<a href="#"><img style = "height: 30px; width: 30px ;border: 0px dotted green; margin: 10px;"
								src="images/fb.png"></a>
								<a href="#"><img style = "height: 30px; width: 30px ;border: 0px dotted green; margin: 10px;"
								src="images/gp.png"></a>
								<a href="#"><img style = "height: 30px; width: 30px ;border: 0px dotted green; margin: 10px;"
								src="images/in.png"></a>
							</td>
						</tr>
						
					</table>

				</div>
				<div class="ruhul common clear">
					<h2>Md. Ruhul Amin</h2>
					<img src="images/ruhul.jpg" alt="image of Md. Ruhul Amin">
					<table>
						<tr>
							<td><p><strong>Name:</strong></p></td>
							<td><p>Md. Ruhul Amin</p></td>
						</tr>
						<tr>
							<td></td>
							<td><p>Student of Computer Science and Engineering.<br>Dhaka University of Engineering & Technology, Gazipur.</p></td>
						</tr>
						<tr>
							<td><p><strong>Phone No:</strong></p></td>
							<td><p>+8801733-723971</p></td>
						</tr>
						<tr>
							<td><p><strong>Email:</strong></p></td>
							<td><p>ruhul.computer12@gmail.com</p></td>
						</tr>
						<tr>
							<td><p><strong>We are in:</strong></p></td>
							<td>
								<a href="#"><img style = "height: 30px; width: 30px ;border: 0px dotted green; margin: 10px;"
								src="images/fb.png"></a>
								<a href="#"><img style = "height: 30px; width: 30px ;border: 0px dotted green; margin: 10px;"
								src="images/gp.png"></a>
								<a href="#"><img style = "height: 30px; width: 30px ;border: 0px dotted green; margin: 10px;"
								src="images/in.png"></a>
							</td>
						</tr>
						
					</table>
					
				</div>
				<div class="shohan common clear">
					<h2>Md. Shohanur Rahaman</h2>
					<img src="images/shohan.jpg" alt="image of Md. Ruhul Amin">
					<table>
						<tr>
							<td><p><strong>Name:</strong></p></td>
							<td><p>Md. Shohanur Rahaman</p></td>
						</tr>
						<tr>
							<td></td>
							<td><p>Student of Computer Science and Engineering.<br>Dhaka University of Engineering & Technology, Gazipur.</p></td>
						</tr>
						<tr>
							<td><p><strong>Phone No:</strong></p></td>
							<td><p>+8801765 676589</p></td>
						</tr>
						<tr>
							<td><p><strong>Email:</strong></p></td>
							<td><p>shohanduet@gmail.com</p></td>
						</tr>
						<tr>
							<td><p><strong>We are in:</strong></p></td>
							<td>
								<a href="#"><img style = "height: 30px; width: 30px ;border: 0px dotted green; margin: 10px;"
								src="images/fb.png"></a>
								<a href="#"><img style = "height: 30px; width: 30px ;border: 0px dotted green; margin: 10px;"
								src="images/gp.png"></a>
								<a href="#"><img style = "height: 30px; width: 30px ;border: 0px dotted green; margin: 10px;"
								src="images/in.png"></a>
							</td>
						</tr>
						
					</table>
					
				</div>


			</div>
			<!-- <div class="sidebar clear">
			
				<div class = "samesidebar clear">
					<div class="img_h2 clear">
						<img src="images/bd.png">
						<h2>Govt. Jobs</h2>
					</div>
					
					<div class="govtjobs clear">
						<ul>
							<li><a class="width" href="#">Govt. job 1</a></li>
							<li><a class="width" href="#">Govt. job 2</a></li>
							<li><a class="width" href="#">Govt. job 3</a></li>
							<li><a class="width" href="#">Govt. job 4</a></li>
							<li><a class="width" href="#">Govt. job 5</a></li>
							<li><a class="width" href="#">Govt. job 6</a></li>
						<ul>
					</div>
				</div>
				
				<div class = "samesidebar clear">
					<h2>Catagorize</h2>
					
					<div class="govtjobs clear">
						<ul>
							<li><a class="width" href="#">Programmer</a></li>
							<li><a class="width" href="#">Web Designer</a></li>
							<li><a class="width" href="#">Web Developer</a></li>
							<li><a class="width" href="#">Graphic Designer</a></li>
							<li><a class="width" href="#">Animation</a></li>
							<li><a class="width" href="#">Content Writer</a></li>
							<li><a class="width" href="#">Blogger</a></li>
						<ul>
					</div>
				</div> -->
				
			</div>
		</div>
		
		<?php include 'inc/footer_copyright.php'; ?>
	</body>
</html>