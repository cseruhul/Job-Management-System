<?php include  'config/config.php'?>
<?php include  'lib/database.php'?>
<?php include  'helpers/Format.php'?>


<?php 
	$db = new database();
	$fm = new Format();
?>


<?php 
	if (!isset($_GET['category']) || isset($_GET['category']) == NULL) {
		header("LOCATION: 404.php");

	}else
	{
		$id = $_GET['category'];

	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Find Your Job Here</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/style.css">
		<link rel="stylesheet" type="text/css" href="stylesheet/index.css">

		<link rel="icon" href="images/fevicon.png" type="image/gif" sizes="16x16">

		<style>	

			.featureimage{
				margin:5px;
				float: left;
			}
			.featureimage img{
				height: 80px;
				width: 80px;
				border: 2px solid green;
				padding: 5px;
				border-radius: 30px;
			}
			.texts{
				float: left;
				margin:5px;
			}
			.texts p{
				 font-size: 20px;
				 padding: 5px;

			}
			.details p{
				/*text-decoration: none;
				background: red;
				width: 60px;
				border: 2px solid green;
				padding: 5px;
				color: white;*/
			}


			.details a p{
				text-decoration: none;
				background: #343A40;
				width: 60px;
				border: 2px solid green;
				padding: 5px;
				color: white;
				font-weight: bold;
			}

			.details a p:hover, #active{
				background: #218838;
				color: white;
			}


		</style>

	</head>
	<body>
		<div class="headersection templateheader clear">
			
			<div class="header template">
				<img src="images/banner.png" alt="search image">
			
				<h2>Find your Desired job here</h2>
				<h4>Find your passion here. And make your life as your dream</h4>
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
				
				<?php 
					$query 	= "SELECT * FROM tbl_post where cat = $id";
					$post 	= $db->select($query);

					if ($post) {
						while ($result = $post->fetch_assoc()) {						
					
				?>


					<div class="content clear">
						<div class="contentheading clear">
							<h2><a href="post.php? id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
						</div>

						<div class="featureimage clear">
							<img src="admin/<?php echo $result['image']; ?>" alt = "<?php echo $result['image']; ?>">
							
						</div>
						
						<div class="texts clear">
							<p><strong>Publicashon date:</strong> <?php echo $fm->formatDate($result['published_date']); ?></p>
							<p><strong>Company Name:</strong> <?php echo $result['company_name']; ?></p>
							<p><strong>location:</strong> <?php echo $result['job_location']; ?></p>
							<p><strong>Qualification:</strong> <?php echo $result['educational_requirements']; ?></p>
							<p><strong>Job Deadline:</strong> <?php echo $fm->formatDate($result['application_deadline']); ?></p>
							<a><?php echo $fm->textshorten($result['body']); ?></a>
							<div  class="details">
								<a href="post.php? id=<?php echo $result['id']; ?>"><p>Details</p></a>
							</div>
							
						</div>
						
					</div>
				<?php } ?> 
				<!--End of while loop-->



				<?php }else{?>
					<h2>No posts available for this category.</h2>
				<?php  } ?>
				

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
							<li><a class="width" href="#">Govt. job 1</a></li>
							<li><a class="width" href="#">Govt. job 2</a></li>
							<li><a class="width" href="#">Govt. job 3</a></li>
							<li><a class="width" href="#">Govt. job 4</a></li>
							<li><a class="width" href="#">Govt. job 5</a></li>
							<li><a class="width" href="#">Govt. job 6</a></li>
						<ul>
					</div>
				</div>

				
			</div>
		</div>
		
		<?php include 'inc/footer_copyright.php'; ?>
	</body>
</html>