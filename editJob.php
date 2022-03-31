
<?php 
include("includes/config.php");
session_start();


$currentID = $_SESSION['editableJobId'];
$currentPosition = $_SESSION['editableJobPosition'];
$currentCompany = $_SESSION['editableJobCompany'];
$currentExpertise = $_SESSION['editableJobExpertise'];
$currentExperience = $_SESSION['editableJobExperience'];
$currentType = $_SESSION['editableJobType'];
$currentSalary = $_SESSION['editableJobSalary'];
$currentResponsibility = $_SESSION['editableJobResponsibility'];
$currentRequirements = $_SESSION['editableJobRequirements'];
$currentLocation = $_SESSION['editableJobLocation'];
$currentCategory = $_SESSION['editableJobCategory'];



if(!isset($_SESSION['email']) or $_SESSION['role'] != 'employer'){
	die('<script>alert("You are not allowed here ! Only employers are expected!");
			location.replace("index.php");
	</script>');
	// echo '<script>alert("Please Log In First");</script>';
	// header("location:index.php");
}
if(isset($_SESSION['email']) and $_SESSION['role'] == 'employer'){
	

	if (isset($_POST['save'])) {

		$position = $_POST['position'];
		$company = $_POST['company'];
		$expertise = $_POST['expertise'];
		$experience = $_POST['experience'];
		$type = $_POST['type'];
		$salary = $_POST['salary'];
		$responsibility = $_POST['responsibility'];
		$requirements = $_POST['requirements'];
		$location = $_POST['loc'];
		$category = $_POST['category'];
		$employer_id = $_SESSION['id'];
	
		$sql = "UPDATE jobs
			 SET position = '$position', company = '$company', expertise = '$expertise', experience = '$experience', type='$type', salary = '$salary', responsibility = '$responsibility', requirements = '$requirements', location = '$location', category = '$category' WHERE id = $currentID";
		// die($sql);
		$result=$conn->query($sql);
	
		if ($result) {
			// header('Location: postedJob.php');
			die("<script>alert('Job Updated Successfully');
			location.replace('postedJob.php');
			</script>");
		}else{
			echo 'Job Update Failed :(';
		}
	}
	// else{
	// 	// echo "Fill all the field";
	// }


// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php include("includes/docHeaderInfo.php")?>;

	<title>Posted Jobs</title>
</head>
<body>
<?php include("includes/navbar.php")?>;
		
<!-- <div class="modal fade" id="editJobModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">VIEW/EDIT JOB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> -->
			
			<div class="container py-5">
				<h2 class="mt-5 mb-4">SELECTED JOB DETAILS</h2>
				<div class="row">
					<div class="col-md-12">
						<form action="" method="post">	
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Position<span class="text-danger">*</span> :</label> 
										<input required class="form-control" type="text" name="position" value="<?php echo $currentPosition; ?>">
									</div>
									<div class="form-group">
										<label for="">Company Name<span class="text-danger">*</span> :</label> 
										<input required class="form-control" type="text" name="company" value="<?php echo $currentCompany; ?>">
									</div>
									<div class="form-group">
										<label for="">Expertise Level<span class="text-danger">*</span> :</label> 
										<input required class="form-control" type="text" name="expertise" value="<?php echo $currentExpertise; ?>">
									</div>
									<div class="form-group">
										<label for="">Experience<span class="text-danger">*</span> :</label> 
										<input required class="form-control" type="text" name="experience" value="<?php echo $currentExperience; ?>">
									</div>
									<div class="form-group">
										<label for="">Type<span class="text-danger">*</span> :</label> 
										<input required class="form-control" type="text" name="type" value="<?php echo $currentType; ?>">
									</div>
									<div class="form-group">
										<label for="">Salary<span class="text-danger">*</span> :</label> 
										<input required class="form-control" type="text" name="salary" value="<?php echo $currentSalary; ?>">
									</div>
									<div class="form-group">
										<label for="">Location<span class="text-danger">*</span> :</label> 
										<select required name="loc" class="form-control">
										<option value='Manila City'>Manila City</option>
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
									<div class="form-group">
										<label for="">Category<span class="text-danger">*</span> :</label> 
										<select required name="category"  class="form-control">
											<option value="<?php echo $currentCategory; ?>" selected ><?php echo $currentCategory; ?></option>
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
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Responsibilities<span class="text-danger">*</span> :</label> 
										<textarea id="responsibility" class="form-control" rows="15" name="responsibility"><?php echo $currentResponsibility; ?></textarea>
									</div>
									<div class="form-group">
										<label for="">Requirements<span class="text-danger">*</span> :</label> 
										<textarea id="requirements" class="form-control" rows="16" name="requirements"><?php echo $currentRequirements; ?></textarea>
									</div>								
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" name="save" style="width: 180px;" class="btn green-light customBtn">SAVE EDIT</button>
									<button onclick="(function(){
										location.replace('postedJob.php');
										return false;
									})();return false" style="width: 180px;" class="btn green-light customBtn">CANCEL EDIT</button>
								</div>
							</div>
						</form>
					</div>								
				</div>			
			</div>										

      <!-- </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> 
      </div>
    </div>
  </div>
</div> -->



<?php 
		include("includes/footer.php");
		// include("editJob.php");
	?>
	

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script>
	document.getElementById('responsibility').innerHTML = <?php $currentResponsibility ?>;
	document.getElementById('requirements').innerHTML = <?php $currentRequirements ?>;

</script>

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
				//  navbar.classList.toggle("bg-primary");
			} 
			else {
				navbar.classList.add("bg-transparent");
				navbar.classList.remove("bg-light");
			}

		}

	}
</script>


<?php } ?>
</body>
