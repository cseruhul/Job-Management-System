<?php include  'config/config.php'?>
<?php include  'lib/database.php'?>
<?php include  'helpers/Format.php'?>


<?php 
	$db = new database();
	$fm = new Format();
?>

<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$fname = $fm->validation($_POST['firstname']);
		$lname = $fm->validation($_POST['lastname']);
		$email = $fm->validation($_POST['email']);
		$body = $fm->validation($_POST['body']);


		$fname = mysqli_real_escape_string($db->link, $fname);
		$lname = mysqli_real_escape_string($db->link, $lname);
		$email = mysqli_real_escape_string($db->link, $email);
		$body = mysqli_real_escape_string($db->link, $body);

		$error = "";
		if (empty($fname)) {
			$error = "First name must not be empty!"; 
		}elseif (empty($lname)) {
			$error = "Last name must not be empty!";
		}elseif (empty($email)) {
			$error = "Email must not be empty!";
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = "Invalid Email Address!";
		}elseif (empty($body)) {
			$error = "Message field must not be empty!";
		}else{
			$query = "INSERT INTO tbl_contact(firstname, lastname, email, body) VALUES('$fname', '$lname', '$email', '$body')";
			$inserted_rows = $db->insert($query);
			if($inserted_rows){
				$msg = "Message send Successfully!";
			}else{
				$msg = "Message not sent!";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Find Your Job Here</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/style.css">
		<link rel="icon" href="images/fevicon.png" type="image/gif" sizes="16x16">

		<style>
			.contactus{
				width: 660px;
				float: left;
				margin-top: 10px;
				font-size: 20px;
			}
			
			.contactus h2 {
				background: #8ec794 none repeat scroll 0 0;
				border-bottom: 2px solid #0d871a;
				color: red;
				margin-bottom: 10px;
				padding: 10px;
				font-size: 30px;
			}
			.contactus p {
				background: #ededed;
				margin:10px;
				padding: 10px;
				font-size: 30px;
			}

			input[type="text"], input[type="e-mail"]{
				border: 2px solid #0D8718;
				border-radius: 3px;
				margin-bottom: 5px;
				padding: 5px;
				width: 470px;
				font-size: 20px;
			}
			input[type="submit"] {
				background: #8ec794 none repeat scroll 0 0;
				border: 1px solid #0f871b;
				border-radius: 10px;
				color: red;
				cursor: pointer;
				font-size: 20px;
				font-weight: bold;
				padding: 5px 20px;
				font-size: 20px;
			}
			input[type="submit"]:hover {
				color: white;
				background: #0D8718 none repeat scroll 0 0;
				border: 2px solid #8EC794;
				font-size: 20px;
			}
			textarea {
				border: 2px solid #0D8718;
				border-radius: 3px;
				height: 110px;
				padding: 5px;
				width: 470px;
				height: 320px;
				margin-bottom: 10px;
				font-size: 20px;
			}
			.textalign{
				text-align: right;
				margin-right: 25px;
			}
			textarea {
   				resize: none;
			}


		</style>
	</head>
	<body>
		<div class="headersection templateheader clear">
			
			<div class="header template">
				
				<?php include 'inc/header_logo_slogan.php'; ?>
			</div></div>
		</div>
		<div class="navbar clear">
		
			<div class="template">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a id="active" href="contact.php">Contact us</a></li>
					<!-- <li><a href="profile.php">Profile</a></li> -->
					<!-- <li><a href="admin/login.php">log in</a></li> -->
					<li><a href="Request for circular.php">Request for circular</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="admin/login.php">Admin login</a></li>
				<ul>
			</div>
			
		</div>
		<div class="contentsection template clear">
			<div class="clear">
				<div class="contactus clear">
					<h2>Contact with us</h2>
					<p><?php 

						if (isset($error)) {
							echo "<span style = 'color: red;'>$error</span>";
						}
						if (isset($msg)) {
							echo "<span style = 'color: green;'>$msg</span>";
						}

					?></p>
					
		<form action="" method="post">
			<table>
				<tr>
					<td class="textalign">Your First Name:</td>
					<td>
						<input type = "text" name = "firstname" placeholder = "Enter first name here.">
					</td>
				</tr>
				
				<tr>
					<td class="textalign">Your Last Name:</td>
					<td>
						<input type = "text" name = "lastname" placeholder = "Enter last name here.">
					</td>
				</tr>
				
				<tr>
					<td class="textalign">Your e-mail address:</td>
					<td>
						<input type = "text" name = "email" placeholder = "Enter a valid e-mail here.">
					</td>
				</tr>
				<tr>
					<td class="textalign">Your Message:</td>
					<td>
						<textarea name="body"></textarea>
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td>
						<input type = "submit" value ="Send">
					</td>
				</tr>
			</table>
		</form>
				</div>

							<div class="sidebar clear">

				
				<div class = "samesidebar clear">
					<h2>Catagorize</h2>
					
					<div class="govtjobs clear">
						<ul>

						<?php 
							$query = "SELECT * FROM tbl_category";
							$category 	= $db->select($query);

							if ($category) {
								while ($result = $category->fetch_assoc()) {
								?>

							<li><a class="width" href="posts.php?category=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>
							
							<?php } } else {?>


							<li>No catagory created</li>

							<?php } ?>
						<ul>
					</div>
				</div>


				<div class = "samesidebar clear">
					<div class="img_h2 clear">
						<img src="images/bd.png">
						<h2>Govt. Jobs</h2>
					</div>
					
					<div class="govtjobs clear">
						<ul>
							<?php 
								$query = "SELECT * FROM tbl_govt";
								$category 	= $db->select($query);

								if ($category) {
									$result = $category->fetch_assoc()
									?>
								<li><a target="_blank" class="width" href="<?php echo $result['l_one'];?>"><?php echo $result['one'];?></a></li>
								<li><a target="_blank" class="width" href="<?php echo $result['l_two'];?>"><?php echo $result['two'];?></a></li>
								<li><a target="_blank" class="width" href="<?php echo $result['l_three'];?>"><?php echo $result['three'];?></a></li>
								<li><a target="_blank" class="width" href="<?php echo $result['l_four'];?>"><?php echo $result['four'];?></a></li>
								<li><a target="_blank" class="width" href="<?php echo $result['l_five'];?>"><?php echo $result['five'];?></a></li>
								
							<?php  } else {?>

								<li>No catagory created</li>

							<?php } ?>
							
						<ul>
					</div>
				</div>

				
			</div>


	<!-- 			<div class="content clear">
					<div class="contentheading">
						<h2><a href="post.html">UI/ UX Front End Developer</a></h2>
					</div>
						<p><strong>Company:</strong> SK Associates</p>
						<p><strong>location:</strong> Sylhet, Sylhet Sadar</p>
						<p><strong>Qualification:</strong> Bachelor of Science(BSC)</p>
						<p><strong>Experience:</strong> At least 3 year(s)</p>
					
				</div>
				<div class="content clear">
					<div class="contentheading">
						<h2><a href="post.html">UI/ UX Front End Developer</a></h2>
					</div>
						<p><strong>Company:</strong> SK Associates</p>
						<p><strong>location:</strong> Sylhet, Sylhet Sadar</p>
						<p><strong>Qualification:</strong> Bachelor of Science(BSC)</p>
						<p><strong>Experience:</strong> At least 3 year(s)</p>
					
				</div>
				<div class="content clear">
					<div class="contentheading">
						<h2><a href="post.html">UI/ UX Front End Developer</a></h2>
					</div>
						<p><strong>Company:</strong> SK Associates</p>
						<p><strong>location:</strong> Sylhet, Sylhet Sadar</p>
						<p><strong>Qualification:</strong> Bachelor of Science(BSC)</p>
						<p><strong>Experience:</strong> At least 3 year(s)</p>
					
				</div> -->
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
				</div>
				
			</div> -->
		</div>
		
		<?php include 'inc/footer_copyright.php'; ?>
	</body>
</html>