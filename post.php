<?php include  'config/config.php'?>
<?php include  'lib/database.php'?>
<?php include  'helpers/Format.php'?>


<?php 
	$db = new database();
	$fm = new Format();
?>


<?php 
	if (!isset($_GET['id']) || isset($_GET['id']) == NULL) {
		header("LOCATION: 404.php");

	}else
	{
		$id = $_GET['id'];

	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Post</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/post.css">
		<link rel="stylesheet" type="text/css" href="stylesheet/style.css">
		<link rel="icon" href="images/fevicon.png" type="image/gif" sizes="16x16">

		<style>
			.center {
				display: block;
				margin-left: auto;
				margin-right: auto;
				width: 200px;
				height: 200px;
				border: 2px solid green;
				padding: 5px;
				border-radius: 30px;
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
					<!-- <li><a href="admin/login.php">log in</a></li> -->
					<li><a href="Request for circular.php">Request for circular</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="admin/login.php">Admin login</a></li>
				<ul>
			</div>
			
		</div>
		<div class="contentsection template clear">
			<div class="maincontent clear">
				<div class="postcontent clear">
					<div class="contentheading">

						<?php 
							$query = "SELECT * FROM tbl_post WHERE id = $id";
							$post 	= $db->select($query);

							if ($post) {
								while ($result = $post->fetch_assoc()) {
						?>

						<img src="admin/<?php echo $result['image']; ?>" class = "center">
						
						<h2><?php echo $result['title']; ?></h2>

					</div>

					<p><strong>Published On:</strong> <?php echo $fm->formatDate($result['published_date']); ?></p>

					<p><strong>Company Name:</strong> <?php echo $result['company_name']; ?></p>
					<p><strong>Vacancy:</strong> <?php echo $result['vacancy']; ?></p>
					<p><strong>Employment Status: </strong> <?php echo $result['employment_status']; ?></p>
					<p><strong>Educational Requirements: </strong> <?php echo $result['educational_requirements']; ?></p>
					<p><strong>Experience Requirements: </strong> <?php echo $fm->formatDate($result['experience_requirements']); ?></p>
					<p><strong>Job Location: </strong> <?php echo $result['job_location']; ?></p>
					<p><strong>Salary: </strong> <?php echo $result['slary']; ?></p>
					<p><strong>Body:</strong> <?php echo $result['body']; ?></p>
					
					<?php echo  $result['body']; ?>




				<!-- <p><strong>SK Associates:</strong></p>

				<p></p> -->
				<!-- <p>1</p>

				<p><strong>Job context:</strong> As a front end developer, you must be a UI/UX expert with latest technology knowledge and experience. You must be able to write clean codes.</p>

				<p><strong>Job Responsibilities:</strong></p>
				<p>	1. You must be a quick thinker and able to visualise a client's need.</br>
					2. Draw up UI and UX strategies based on our target goals.<br>
					3. Create and maintain digital assets, such as interface design files, wireframes, and interactive 	  mockups using InVision/Zapline/Figma etc.<br>
					4. Design, build, and maintain highly reusable JavaScript, HTML and CSS code.<br>
					5. Highly skilled in PSD to HTML and need to work with development team to process HTML/CSS based 	 on the software requirements.<br>
					6. Communicates with the client and project teams & explains progress on the development effort.<br>
					7. Need to have knowledge to prepare theme for WordPress and other CMS e.g. Magneto, Joomla,     	Drupal etc.You will be required to work under pressure and work to deliver.</p> -->

				<!-- <p><strong>Employment Status:</strong></p>
				<p>Full-Time</p>
				
				<p><strong>Educational Requirements:</strong></p>
				<p>Bachelor of Computer Application (BCA)</p>

				<p><strong>Experience Requirements:</strong></p>
				<p>At least 3 year(s)</p>

				<p><strong>Additional Requirements:</strong></p>
				<p>
					1. Age at least 25 years<br>
					2. Both males and females are allowed to apply<br>
					3. The applicants should have experience in the following area(s):<br>
					4. Content Developer, Graphic Designer, HTML & CSS, Project designing, Quality Assurance/ Quality  Control, UI design, UX Designer, Web Developer/ Web Designer<br>
					5. The applicants should have experience in the following business area(s):<br>
					6. E-commerce, IT Enabled Service, Software Company, Web Media/Blog<br>
				</p>

				<p><strong>Job Location:</strong></p>
				<p>Sylhet, Sylhet (Sylhet Sadar)</p>

				<p><strong>Salary:</strong></p>
				<p>Negotiable</p>

				<p><strong>Compensation & Other Benefits:</strong></p>
				<p>
					1. Salary Review: Yearly<br>
					2. Festival Bonus: 2<br>
					3. 26 days holidays which includes casual and Government holiday periods.<br>
				</p> -->
				</div>
			</div>
			<div class="sidebar clear">

			
				<div class = "samesidebar clear">
					
					<div class="govtjobs clear">
						<h2>Job summary</h2>
						<p><strong>Published:</strong><?php echo $fm->formatDate($result['published_date']); ?></p>
						<p><strong>Vacancy:</strong> <?php echo $result['vacancy']; ?></p>
						<p><strong>Employment status:</strong> <?php echo $result['employment_status']; ?></p>
						<p><strong>Gender:</strong> <?php
							
							if ($result['gender'] == '1') {
								echo "Male"; 
							}elseif ($result['gender'] == '2') {
								echo "Female";
							}elseif ($result['gender'] == '3') {
								echo "Both Male and Female";
							}

						?></p>
						<p><strong>Age:</strong> <?php echo $result['age']; ?></p>
						<p><strong>Job Location:</strong> <?php echo $result['job_location']; ?></p>
						<p><strong>Salary:</strong> <?php echo $result['slary']; ?></p>
						<p><strong>Application Deadline:</strong> <?php echo $result['application_deadline']; ?></p>
					</div>
				</div>
		
		<?php } ?> 
				<!--End of while loop-->

				<?php }else{
					header("LOCATION: 404.php");
				} ?>

				<!-- <div class = "samesidebar clear">
					
					<div class="govtjobs clear">
						<h2>Read before apply</h2>
						<a href="#">Apply</a>
						<p>Not registered yet?</p>
						<div class="reg clear">
							
							<a href="registration.php">Register</a>
						</div>
					</div>
				</div> -->
								
			</div>

		</div>
		
		<?php include 'inc/footer_copyright.php'; ?>
	</body>
</html>