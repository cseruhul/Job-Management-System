<?php include  'config/config.php'?>
<?php include  'lib/database.php'?>
<?php include  'helpers/Format.php'?>


<?php 
	$db = new database();
	$fm = new Format();
?>

<!--Pagination-->
<?php 
	$per_page = 3;
	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	} else
	{
		$page = 1;
	}
	$start_from = ($page - 1) * $per_page;
?>
<!--Pagination-->

<!DOCTYPE html>
<html>
	<head>
		<title>Find Your Job Here</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/style.css">
		<link rel="stylesheet" type="text/css" href="stylesheet/index.css">

		<link rel="icon" href="images/fevicon.png" type="image/gif" sizes="16x16">

		<style>	
			<?php include  'inc/indexInnerStyle.php'?>
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
					<li><a id="active" href="index.php">Home</a></li>
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
				<!--(Code for Query to load from database)-->
				<?php 
					$query 	= "SELECT * FROM tbl_post WHERE status='1' order by id desc limit $start_from, $per_page";
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
				<p><strong>Published On:</strong> <?php echo $fm->formatDate($result['published_date']); ?></p>
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

				<!--Pagination-->
				<?php 
					$query 			= "SELECT * FROM tbl_post";
					$result 		= $db->select($query);
					$total_rows 	= mysqli_num_rows($result);
					$total_pages	= ceil($total_rows / $per_page);

					echo "<span class = 'pagination'> <a href = 'index.php?page=1'>".'First Page'."</a>";
					
					for ($i=1; $i <= $total_pages; $i++) { 
						echo "<a href = 'index.php?page=$i'>"." ".$i." "."</a>";
					}

					echo "<a href = 'index.php?page=$total_pages'>".'Last Page'."</a></span>"
				?>

				<!--Pagination-->


				<?php }else{
					header("LOCATION: index.php");
				} ?>
				

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
		</div>
		<?php include 'inc/footer_copyright.php'; ?>
	</body>
</html>