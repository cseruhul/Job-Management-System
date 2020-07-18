
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
		<title>Registration Form</title>


		<link rel="stylesheet" type="text/css" href="stylesheet/style.css">
		<link rel="stylesheet" type="text/css" href="stylesheet/registration.css">


		<link rel="icon" href="images/fevicon.png" type="image/gif" sizes="16x16">

		<style>
			<?php include  'inc/registration.php'?>
		</style>


	</head>
	<body>
		<div class="headersection templateheader clear">
			
			<div class="header template">
				
				<?php include 'inc/header_logo_slogan.php'; ?>
			</div></div>
		</div>
		<!-- <div class="headersection templateheader clear">
			<h2>Find your Desired job here</h2>
			<h4>Find your passion here. And make your life as your dream</h4>
		</div> -->

		<div class="navbar clear">
		
			<div class="template">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="contact.php">Contact us</a></li>
					<!-- <li><a href="profile.php">Profile</a></li> -->
					<!-- <li><a href="admin/login.php">log in</a></li> -->
					<li><a id="active" href="Request for circular.php">Request for circular</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="admin/login.php">Admin login</a></li>
				<ul>
			</div>
			
		</div>
			<div class="maincontentreg template clear">

<!--Copy from admin pannel-->
			<div class="grid_10">
		
            <div class="box round first grid">
                <h2>Create Your Job Circular</h2>

<!--(Inserting database start)-->

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $cat    = mysqli_real_escape_string($db->link, $_POST['cat']);
        $title  = mysqli_real_escape_string($db->link, $_POST['title']);
        $company_name   = mysqli_real_escape_string($db->link, $_POST['company_name']);
        $vacancy   = mysqli_real_escape_string($db->link, $_POST['vacancy']);
        $employment_status = mysqli_real_escape_string($db->link, $_POST['employment_status']);
        $educational_requirements  = mysqli_real_escape_string($db->link, $_POST['educational_requirements']);
        $experience_requirements    = mysqli_real_escape_string($db->link, $_POST['experience_requirements']);
        $job_location   = mysqli_real_escape_string($db->link, $_POST['job_location']);
        $slary   = mysqli_real_escape_string($db->link, $_POST['slary']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        $gender  = mysqli_real_escape_string($db->link, $_POST['gender']);
        $age    = mysqli_real_escape_string($db->link, $_POST['age']);
        $application_deadline   = mysqli_real_escape_string($db->link, $_POST['application_deadline']);
        $tags   = mysqli_real_escape_string($db->link, $_POST['tags']);



        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = $title.'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if ($cat    == "" || $title  == "" || $company_name   == "" || $vacancy   == "" || $employment_status == "" || $educational_requirements  == "" || $experience_requirements    == "" || $job_location   == "" || $slary   == "" || $body == "" || $gender  == "" || $age    == "" || $application_deadline   == "" || $tags   == "" || $file_name == "") {
                echo "<span class = 'error'>Field must not be empty!!</span>";

        }elseif ($file_size >1048567) {
            echo "<span class='error'>Image Size should be less then 1MB!</span>";

        } elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";

        } else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_post(cat, title , company_name, vacancy, employment_status, educational_requirements, experience_requirements, job_location, slary, body, gender, age, application_deadline , image, tags) VALUES('$cat', '$title' , '$company_name', '$vacancy', '$employment_status', '$educational_requirements', '$experience_requirements', '$job_location', '$slary', '$body', '$gender', '$age', '$application_deadline' , '$uploaded_image', '$tags')";
            $inserted_rows = $db->insert($query);
        
            if ($inserted_rows) {
                echo "<span class='success'>Please wait for approve your post by an admin.</span>";

            }else {
                echo "<span class='error'>Post Not Inserted !</span>";

            }
        }

    }

?>

<!--(Inserting database End)-->

                <div class="block">               
<form action="" method="post" enctype="multipart/form-data">
	<table class="form">
	   
	    <tr>
	        <td><label>Title</label></td>
	        <td><input type="text" name="title" placeholder="Enter Post Title..." class="medium" /></td>
	    </tr>
	 
	    <tr>
	        <td><label>Category:</label></td>
	        <td>
	            <select id="select" name="cat">	
	            	<option>Select Category</option>
                    <?php 
                        $query = "SELECT * FROM tbl_category";
                        $category = $db->select($query);
                        if ($category) {
                            while ($result = $category->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                    <?php } }?>
	            </select>
	        </td>
	    </tr>

	    <tr>
	        <td>
	            <label>Upload Image:</label>
	        </td>
	        <td><input type="file" name="image"/></td>
	    </tr>

	    <tr>
	        <td><label>Company Name:</label></td>
	        <td>
	            <input type="text" name="company_name" placeholder="Enter Company Name..."/>
	        </td>
	    </tr>

	    <tr>
	        <td><label>Vacancy:</label></td>
	        <td>
	        	<input type="text" name="vacancy" placeholder="Vacancy for this job..." class="medium" />
	        </td>
	    </tr>

	    <tr>
	        <td><label>Employment Status:</label></td>
	        <td>
	            <input type="text" name="employment_status" placeholder="Enter Employment Status..." class="medium" />
	        </td>
	    </tr>

	    <tr>
	        <td><label>Educational Requirements:</label></td>
	        <td>
	            <input type="text" name="educational_requirements" placeholder="Educational Requirements..." class="medium" />
	        </td>
	    </tr>

	    <tr>
	        <td><label>Experience Requirements:</label></td>
	        <td>
	            <input type="text" name="experience_requirements" placeholder="Enter Experience Requirements..." class="medium" />
	        </td>
	    </tr>

	    <tr>
	        <td><label>Job Location: </label></td>
	        <td>
	            <input type="text" name="job_location" placeholder="Enter Job Location..."/>
	        </td>
	    </tr>

	    <tr>
	        <td><label>Salary: </label></td>
	        <td>
	            <input type="text" name="slary" placeholder="Enter Salary..."/>
	        </td>
	    </tr>

	    <tr>
	        <td style="vertical-align: top; padding-top: 9px;"><label>Job Details: </label></td>
	        <td><textarea></textarea></td>
	    </tr>

	    <tr>
	        <td><label>Tag:</label></td>
	        <td><input type="text" name="tags" placeholder="Enter Tags..." class="medium" /></td>
	    </tr>
	    <tr>
	        <td><label>Gender:</label></td>
	        <td>
	            <select id="select" name="gender">
                    <option>Select Gender</option>

                        <?php 
                            $query = "SELECT * FROM tbl_gender";
                            $category = $db->select($query);
                            if ($category) {
                                while ($result = $category->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $result['id']; ?>"><?php echo $result['gender']; ?></option>

                        <?php } }?>
                </select>
	        </td>
	    </tr>
	    <tr>
	        <td><label>Age:</label></td>
	        <td><input type="text" name="age" placeholder="Enter Minimum age..." class="medium" /></td>
	    </tr>
	    <tr>
	        <td><label>Application Deadline:</label></td>
	        <td>
	            <input type="text" name="application_deadline" placeholder="Enter Application Deadline..." class="medium" />
	        </td>
	    </tr>

		<tr>
	        <td></td>
	        <td>
	            <input type="submit" name="submit" Value="Send" />
	        </td>
	    </tr>
	</table>
</form>
                </div>
            </div>
        </div>
	



<!--( End copying )-->


			</div>
		<div class="footersectionreg templateheaderreg clear">
			<p>&copy 2020 All Right reserved</p>
		</div>
	</body>
</html>
