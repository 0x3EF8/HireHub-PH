<?php 
	session_start();
	include("includes/config.php");

	$allJobs;
	
	// function fetchJobList(){
	// 	global $allJobs;
		global $conn;
		// $email =$_SESSION["email"];
		// $employer_id = $_SESSION["id"];
		// $roletype = $_SESSION["role"];
		$sqlSelect = "SELECT * FROM jobs";
	
		$allJobs=$conn->query($sqlSelect) or die('<script>alert("Log In Failed");</script>');
		// echo ($result);
		
	
				if (!empty($allJobs)){
					// echo ('("All job fetched")');
				
				}else{
					echo '("Job Fetch Failed")';
				}
			
	// }
	// fetchJobList();
	// $submitted;
	$shouldFilterJob = false;
	$category;
	$location;
	if(isset($_POST['view'])){
		$_SESSION['jobID'] = $_POST['jobID'];
		header("location: viewJob.php");
	}
	
	
	if (isset($_POST['search'])) {
		echo("<script>Entered</script>");
		if(!isset($_POST['category'])){
			$category = null;
			}
		else{
			global $category;
			$category = $_POST['category'];
			$location = $_POST['location'];
		}
		

		$shouldFilterJob = true;
		echo("<script>window.location.hash = 'jobListSection';</script>");
		// foreach($allJobs as $row){
		// 	if($category == $row['category'] && $location == $row['location']){
		// 		echo("Working -> ");
		// 		echo($row['position']);
		// 	}
		// }
	}
	




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php include("includes/docHeaderInfo.php")?>
	
	<title>Hire Hub PH</title>
</head>

<body>

<?php 
	include("includes/navbar.php");
	// echo ($allJobs);	
?>

<?php //foreach ($allJobs as $row) { 
    				// printf("%s (%s)\n", $row["id"], $row["position"]); 
					// echo $row['id'];}?>

<!--******************** 

***  Hero Image Section

***********************-->

<div class="hero-container position-relative">
  <div class="hero-text mr-5 position-absolute">
    <h1 style="font-weight:800">FIND OR SELL SKILLS THAT YOU DESIRE</h1>
    <p>Search Your Skills</p>
    <!-- <button>Hire me</button> -->
	    <form action="" method="POST">
			<div class="form-row">
				<div class="form-group col-md-5 p-0 m-0">
					<!-- <label for="inputEmail4">Email</label> -->
					<!-- <input type="text" class="form-control" placeholder="programming, Finance etc..." id="inputEmail4"> -->
					<select name="category" id="inputState" class="form-control">
						<option value="" disabled selected hidden>Select Job Title</option>
						<optgroup label="Administration, business and management">
<option value='Administrative assistant'>Administrative assistant</option>
<option value='Business analyst'>Business analyst</option>
<option value='Business continuity specialist'>Business continuity specialist</option>
<option value='Business development manager'>Business development manager</option>
<option value='Civil service executive officer'>Civil service executive officer</option>
<option value='Company secretary'>Company secretary</option>
<option value='Compliance officer'>Compliance officer</option>
<option value='Legal secretary'>Legal secretary</option>
<option value='Local government officer'>Local government officer</option>
</optgroup>
<optgroup label="Management consultant">
<option value='Medical secretary'>Medical secretary</option>
</optgroup>

<optgroup label="Computing and ICT">
<option value='App developer'>App developer</option>
<option value='AR/VR programmer'>AR/VR programmer</option>
<option value='Ethical hacker'>Ethical hacker</option>
<option value='Forensic computer analyst'>Forensic computer analyst</option>
<option value='Game designer'>Game designer</option>
<option value='Games developer'>Games developer</option>
<option value='Games tester'>Games tester</option>
<option value='Helpdesk professional'>Helpdesk professional</option>
<option value='Infrastructure engineer'>Infrastructure engineer</option>
<option value='IT project analyst'>IT project analyst</option>
<option value='IT support technician'>IT support technician</option>
<option value='IT trainer'>IT trainer</option>
<option value='Machine learning engineer'>Machine learning engineer</option>
<option value='Network manager'>Network manager</option>
<option value='Office equipment service technician'>Office equipment service technician</option>
<option value='Robotics engineer'>Robotics engineer</option>
<option value='Software developer'>Software developer</option>
<option value='Software engineer'>Software engineer</option>
<option value='Solution architect'>Solution architect</option>
<option value='Systems analyst'>Systems analyst</option>
<option value='Virtual reality designer'>Virtual reality designer</option>
<option value='Web developer'>Web developer</option>
<option value='Web editor'>Web editor</option>
</optgroup>


<optgroup label="Construction and building">
<option value='Architect'>Architect</option>
<option value='Architectural technician'>Architectural technician</option>
<option value='Architectural technologist'>Architectural technologist</option>
<option value='Bricklayer'>Bricklayer</option>
<option value='Builders merchant'>Builders merchant</option>
<option value='Civil engineer'>Civil engineer</option>
<option value='Civil engineering technician'>Civil engineering technician</option>
<option value='Clerk of works'>Clerk of works</option>
<option value='Commercial energy assessor'>Commercial energy assessor</option>
<option value='Construction manager'>Construction manager</option>
<option value='Construction operative'>Construction operative</option>
<option value='Construction plant mechanic'>Construction plant mechanic</option>
<option value='Construction plant operator'>Construction plant operator</option>
</optgroup>


<optgroup label="Design, arts and crafts">
<option value='Animator'>Animator</option>
<option value='Art gallery curator'>Art gallery curator</option>
</optgroup>

<optgroup label="Dressmaker">
<option value='Exhibition designer'>Exhibition designer</option>
<option value='Fashion designer'>Fashion designer</option>
<option value='Fine artist'>Fine artist</option>
</optgroup>

<optgroup label="Education and training">
<option value='Careers adviser'>Careers adviser</option>
<option value='Classroom assistant'>Classroom assistant</option>
<option value='Community education coordinator'>Community education coordinator</option>
<option value='Early years teacher'>Early years teacher</option>
<option value='EFL teacher'>EFL teacher</option>
<option value='Further education lecturer'>Further education lecturer</option>
<option value='Higher education lecturer'>Higher education lecturer</option>
<option value='Learning support assistant'>Learning support assistant</option>
<option value='Learning technologist'>Learning technologist</option>
</optgroup>

<optgroup label="Financial services">
<option value='Accountant- Management'>Accountant- Management</option>
<option value='Accounting technician'>Accounting technician</option>
<option value='Accounts assistant'>Accounts assistant</option>
<option value='Actuary'>Actuary</option>
<option value='Bank manager'>Bank manager</option>
<option value='Banking customer service adviser'>Banking customer service adviser</option>
<option value='Bookkeeper'>Bookkeeper</option>
<option value='Credit manager'>Credit manager</option>
<option value='Economist'>Economist</option>
<option value='Finance analyst'>Finance analyst</option>
<option value='Financial adviser'>Financial adviser</option>
<option value='Insurance account manager'>Insurance account manager</option>
<option value='Insurance broker'>Insurance broker</option>
</optgroup>

<optgroup label="Healthcare">
<option value='Health visitor'>Health visitor</option>
<option value='Healthcare assistant'>Healthcare assistant</option>
<option value='Hospital doctor'>Hospital doctor</option>
<option value='Hospital porter'>Hospital porter</option>
<option value='Medical physicist'>Medical physicist</option>
<option value='Midwife'>Midwife</option>
<option value='Music therapist'>Music therapist</option>
<option value='Nurse'>Nurse</option>
<option value='Optometrist'>Optometrist</option>
<option value='Orthoptist'>Orthoptist</option>
<option value='Pathologist'>Pathologist</option>
<option value='Pharmacist'>Pharmacist</option>
<option value='Pharmacy technician'>Pharmacy technician</option>
</optgroup>
					</select>
				</div>
				<div class="form-group col-md-4 p-0 m-0">
				<!-- <label for="inputState">State</label> -->
					<select name="location" id="inputState" class="form-control">
					<option selected value='Manila City'>Manila City</option>
					<option value='Iloilo City'>Iloilo City</option>
<option value='Metro Cebu'>Metro Cebu</option>
<option value='Davao City'>Davao City</option>
<option value='Batangas City'>Batangas City</option>
<option value='Roxas City'>Roxas City</option>
<option value='Digos City'>Digos City</option>
<option value='Bacolod City'>Bacolod City</option>
<option value='Paranaque City'>Paranaque City</option>
<option value='Camalig City'>Camalig City</option>
<option value='Tacloban City'>Tacloban City</option>
<option value='Taguig City'>Taguig City</option>
<option value='Makati City'>Makati City</option>
<option value='New Washington Aklan'>New Washington Aklan</option>
<option value='Cagayan de Oro City'>Cagayan de Oro City</option>
<option value='Puerto Princesa City'>Puerto Princesa City</option>
<option value='Legazpi City'>Legazpi City</option>
<option value='Baguio City'>Baguio City</option>
<option value='Tabaco City'>Tabaco City</option>
<option value='Vigan City'>Vigan City</option>
<option value='Angeles City'>Angeles City</option>
<option value='General Santos City'>General Santos City</option>
<option value='Dumaguete City'>Dumaguete City</option>
<option value='Marikina City'>Marikina City</option>
<option value='Zamboanga City'>Zamboanga City</option>

					</select>
				</div>
				<button type="submit" name="search" class="btn customBtn green">SEARCH</button>
			</div>
		</form>
  </div>
</div>


<!-- **********************************

 ******** Job Listing Container

*********************************** -->


<div id="jobListSection" class="jobListContainer my-5 mx-4 pt-5">
	<h3 class="font-weight-bold text-center">EXPLORE ALL THE VACANCIES</h3>
	<p class="text-center explore position-relative"><span class="material-icons">work_outline</span></p>

	<div class="card-group pb-5 ">
		
		<?php 
		$jobCount = 0;
		foreach ($allJobs as $row) { 
			if($shouldFilterJob){
				if($category == $row['category'] && $location == $row['location']){ 
					$jobCount+=1;
					?>
					
					<div class="card">
						<!-- <img src="..." class="card-img-top" alt="..."> -->
						<div class="card-body">
						
							<p class="card-text mb-0"><small class="text-muted"><?php echo ($row['company']); ?></small></p>
							<p class="card-text"><small class="text-muted"><?php echo (strtoupper($row['location'])); ?><span class="material-icons">location_on</span></small></p>
							<h5 class="card-title font-weight-bold"><?php echo ($row['position']); ?></h5>
							<p class="card-text mb-0"><span style="font-weight: 500">Experience :</span> <?php echo ($row['experience']); ?></p>
							<p class="card-text mb-0"><span style="font-weight: 500">Expertise Level :</span> <?php echo ($row['expertise']); ?></p>
							<p class="card-text mb-2"><span style="font-weight: 500">Type :</span> <?php echo ($row['type']); ?></p>
							<p class="card-text mb-2"><span style="font-weight: 500">Salary :</span> <?php echo ($row['salary']); ?></p>
							<p class="card-text mb-5"><span style="font-weight: 500">Requirements : </span><?php echo ($row['requirements']); ?></p>
							<form action="" method="post" class="py-3">
									
								<input type="hidden" name="jobID" value="<?php echo($row['id']);?>">
								<button type="submit" name="view" class="btn card-btn green position-absolute form-control">SEE MORE</button>
								<!-- <label for="file" class="btn card-btn btn-apply green py-3 mb-0">UPLOAD CV</label> -->
								<!-- <input id="file" type="file" name="file" /> -->
								<!-- <button type="submit" name="apply" 
								
								<?php 
									// if(isset($_SESSION['disableBtnId'])){
									// 	if($row['id'] == $_SESSION['disableBtnId']){
									// 		echo('disabled');
									// 	}
									// }
								?> id="applyBtn" class="btn card-btn btn-apply green position-absolute form-control">APPLY</button> -->
							</form>
								
							<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
							
						</div>
					</div>

				<?php } 
					
    		} 
			else{ 
				$jobCount+=1;
				?>

				<div class="card">
					<!-- <img src="..." class="card-img-top" alt="..."> -->
					<div class="card-body">
							
						<p class="card-text mb-0"><small class="text-muted"><?php echo ($row['company']); ?></small></p>
						<p class="card-text"><small class="text-muted"><?php echo (strtoupper($row['location'])); ?><span class="material-icons location-icon">location_on</span></small></p>
						<h5 class="card-title font-weight-bold"><?php echo ($row['position']); ?></h5>
						<p class="card-text mb-0"><span style="font-weight: 500">Experience :</span> <?php echo ($row['experience']); ?></p>
						<p class="card-text mb-0"><span style="font-weight: 500">Expertise Level :</span> <?php echo ($row['expertise']); ?></p>
						<p class="card-text mb-2"><span style="font-weight: 500">Type :</span> <?php echo ($row['type']); ?></p>
						<p class="card-text mb-2"><span style="font-weight: 500">Salary :</span> <?php echo ($row['salary']); ?></p>
						<p class="card-text mb-5"><span style="font-weight: 500">Requirements : </span><?php echo ($row['requirements']); ?></p>
						<form action="" method="post" class="py-3">
									
							<input type="hidden" name="jobID" value="<?php echo($row['id']);?>">
							<button type="submit" name="view" class="btn card-btn green position-absolute form-control">SEE MORE</button>
							<!-- <label for="file" class="btn card-btn btn-apply green py-3 mb-0">UPLOAD CV</label> -->
							<!-- <input id="file" type="file" name="file" /> -->
							<!-- <button type="submit" name="apply" 
							
							<?php 
								// if(isset($_SESSION['disableBtnId'])){
								// 	if($row['id'] == $_SESSION['disableBtnId']){
								// 		echo('disabled');
								// 	}
								// }
							?> id="applyBtn" class="btn card-btn btn-apply green position-absolute form-control">APPLY</button> -->
						</form>
								
						<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
							
					</div>
				</div>

			<?php }		 	
		
		} 
		if($jobCount == 0){
			echo("<h5 class='noJobMsg text-center my-5'><p>No job found!</p></h5>");
		}
		?>
		
	</div>
</div>



<?php include("login.php");
		include("register.php");
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


<script>
	// this part is copied to other pages. FUture Work : make a js file and code all common js there and import where needed
	const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)
	console.log(vw > 768);
	if(vw > 768){
		window.onscroll = function() {enableNavBg()};

		function enableNavBg() {
			let navbar = document.querySelector(".navbar");
			if (document.body.scrollTop > 5 || document.documentElement.scrollTop > 5) {
			
				console.log(navbar)
				navbar.classList.add("bg-light");
				navbar.classList.remove("bg-transparent");
				navbar.style.boxShadow = "0px 0px 10px 5px rgba(0, 0, 0, 0.125)";
				//  navbar.classList.toggle("bg-primary");
			} 
			else {
				navbar.classList.add("bg-transparent");
				navbar.classList.remove("bg-light");
			}
		}
	}
</script>
</body>
<?php include("includes/footer.php")?>
</html>
<?php
// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
?>