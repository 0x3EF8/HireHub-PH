<?php
include("includes/config.php");
session_start();


// echo("test -> ".$_SESSION['jobID']);
// echo("test -> ".$_SESSION['email']);
$hideToUser = true;
if(!isset($_SESSION['role']) || $_SESSION['role']== 'user'){
	$hideToUser = false;
}
$sqlSelect = "SELECT * FROM jobs WHERE id = '".$_SESSION['jobID']."'";
	
$jobResult=$conn->query($sqlSelect) or die('<script>alert("SQL Query Failed");</script>');
		// echo ($result);
$row = $jobResult->fetch_assoc();
		// echo $row['option_value'];
	
if (!empty($row)){
	// echo ('("job fetched")');


}else{
	echo '("Job Fetch Failed")';
}

// if(isset($_POST['back'])){
// 	header("<script>location:javascript://history.go(-1)</script>");
// }

if(isset($_POST['apply'])){
	if(!empty($_SESSION['id']) && ($_SESSION['role'] == 'user')){
		// echo('<script>alert("Currently Logged IN");</script>');
		// $submitted = true;
			

			$name       = $_FILES['file']['name'];  
			$temp_name  = $_FILES['file']['tmp_name'];  
			if(isset($name) and !empty($name)){
				 $location = './uploads/';      
				 if(move_uploaded_file($temp_name, $location.$name)){
					  echo "File- '$name' uploaded successfully ";
				 }
			} else {
				//  echo '';
				 echo ('<script> alert("Please upload your CV before applying !!");
				const loc = window.location.href;
				</script>');
				die("<script>
					location.replace(loc);
				</script>");
			}
	  
		// $fileaType = $_FILES['file']['type'];
		// $fileSize = $_FILES['file']['size'];
		// $fileTempLoc = $_FILES['file']['temp_name'];
		// $fileFinalLoc = "includes/".$fileName;
		
		// move_uploaded_file($fileTempLoc,$fileFinalLoc);

		// $_SESSION['disableBtnId'] = $_POST['jobID'];

		$userID = $_SESSION['id'];
		$jobID = $_POST['jobID'];
		$employer_id = $_POST['employerID'];

		$insertQuery = "INSERT INTO `application`(`job_id`, `user_id`,`cv`,`employer_id`) VALUES ('$jobID','$userID','$name','$employer_id')";
	
		$insertResult=$conn->query($insertQuery);
		if ($insertResult) {
			// echo ('<script>
			// 			alert("Apply Successfull");
			// 		</script>');
			// echo '<script>location.replace("postedJob.php")</script>';
			// sleep(2);
			// header("location:index.php"); 
			die('<script>
			alert("Apply Successfull");
			location.replace("index.php");
		</script>');
			// exit();
		}else{
			echo 'Apply Failed !!! ';
		}

	}
	else{
			echo('<script>alert(" Please Log in as a User First");
			console.log("inside test 1");</script>');
	}
}
$allStatus;
$countApplication;
function showStatus(){

	global $countApplication;
	global $conn;
	global $allStatus;

	$selectQuery = "SELECT DISTINCT application.job_id, application.user_id, application.cv, application.employer_id, user.name 
	FROM ((application
		   INNER JOIN user ON application.user_id = user.id)
		   INNER JOIN jobs ON application.job_id = '".$_SESSION['jobID']."')";

			$allStatus=$conn->query($selectQuery);
			$countApplication=$allStatus->num_rows;
			// echo "$countApplication";
			if ($allStatus) {
				// echo ('<script>
				// 			alert("Status Successfull");
				// 		</script>');
				
				// header("location:index.php"); 
			// 	die('<script>
			// 	alert("Status Fetched Successfull");
			
			// </script>');
				// exit();
			}else{
				echo 'Status Failed !!! ';
			}

}
showStatus();
// print_r($allStatus);
// foreach($allStatus as $statusRow){
// 	// echo($allStatus[0]);
	
// 	// echo($statusRow['name']);
// 	// echo($statusRow['job_id']);
// }



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php include("includes/docHeaderInfo.php")?>

	<title>View Job</title>
</head>
<body>

<?php include("includes/navbar.php")?>

	<div class="container jobContainer pt-5 px-5">
		<h3 class="font-weight-bold my-3">JOB DETAILS</h3>
		<div class="pt-2 pb-5 pl-4">
			<p class="card-text"><small class="text-muted"><?php echo ($row['company']); ?></small></p>

			<h4 class="font-weight-bold mb-2"><?php echo($row['position']); ?></h4>

			<!-- <h5 class="card-title font-weight-bold"><?php echo ($row['position']); ?></h5> -->
			<p class="card-text mb-0"><span style="font-weight: 500">Experience :</span> <?php echo ($row['experience']); ?></p>
			<p class="card-text mb-0"><span style="font-weight: 500">Expertise Level :</span> <?php echo ($row['expertise']); ?></p>
			<p class="card-text mb-0"><span style="font-weight: 500">Type :</span> <?php echo ($row['type']); ?></p>
			<p class="card-text mb-2"><span style="font-weight: 500">Salary :</span> <?php echo ($row['salary']); ?></p>
			<p class="card-text mb-5"><span style="font-weight: 500">Responsibilities : </span><?php echo ($row['responsibility']); ?></p>
			<p class="card-text mb-5"><span style="font-weight: 500">Requirements : </span><?php echo ($row['requirements']); ?></p>
			<button  onclick="javascript:history.go(-1)" class="btn card-btn green py-3">BACK</button>
			<form action="" method="post" enctype="multipart/form-data" class="py-2 d-inline">
				
				<input type="hidden" name="jobID" value="<?php echo($row['id']);?>">
				<input type="hidden" name="employerID" value="<?php echo($row['employer_id']);?>">
				<?php if(!$hideToUser){ ?>

						<label for="file" class="btn card-btn btn-apply green py-3 mb-0">UPLOAD CV</label>
						<input id="file" type="file" name="file" />
						<!-- <input type="file" name="jobID" > -->
						
						<!-- <button type="file" name="cv" id="cvBtn" class="btn card-btn btn-apply green py-3">UPLOAD CV</button> -->
						<button type="submit" name="apply" id="applyBtn" class="btn card-btn btn-apply green py-3">APPLY</button>

				<?php	}	?>
				
			</form>

		</div>
	</div>


	<!--**************************** 
		*
		*
		*		Employer Check Status Section
		*
		*
	 *********************************-->
<?php if($hideToUser){ ?>
	<div class="container jobContainer pt-5 px-5">
		<h3 class="font-weight-bold my-3">JOB STATUS</h3>
		<div class="table-responsive-lg pt-2 pb-5 px-4">
			<h5 class="font-weight-bold mb-2">TOTAL APPLIED : <?php echo($countApplication); ?></h5>
			<h6 class="font-weight-bold mb-2">JOB ID : <?php echo($_SESSION['jobID']); ?></h6>
			<h6 class="font-weight-bold mb-2">POSTED BY EMPLOYER WITH ID : <?php echo($_SESSION['id']); ?></h6>
			<table class="table">
					<!-- <caption>List of users</caption> -->
				<thead>
					<tr class="rowDivider">
						<th scope="col">Job ID</th>
						<th scope="col">Applicant ID</th>
						<th scope="col">Applicant Name</th>
						<th scope="col">Employer ID</th>
						<th scope="col">CV</th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
						echo "<script>let statusMsgPrinted = false;</script>";
						foreach ($allStatus as $row) { 
						// printf("%s (%s)\n", $row["id"], $row["position"]); ?>	
						<tr class=" rowDivider">
							<?php if($row['employer_id'] == $_SESSION['id']){ ?> 
								<th scope="row"><?php echo ($row['job_id']); ?></th>
								<td><?php echo ($row['user_id']); ?></td>
								<td><?php echo ($row['name']); ?></td>
								<td><?php echo ($row['employer_id']);?></td>
								<td><a href="./uploads/<?php echo ($row['cv']); ?>"><?php echo ($row['cv']); ?></a></td>
								
							<?php }
								else{   
									echo("<script>
										console.log('entered into status');
										if(!statusMsgPrinted){
											statusMsgPrinted = true;
											document.querySelector('.table').innerHTML='<p style = color:#5867dd;font-weight:bold;>Only Employer who posted this job can view more info.</p>'
									 	}
									 	</script>");
									
								}
							?>	
						</tr>
					<?php } ?>	
				</tbody>
			</table>
		</div>	
	</div>		
<?php	}	?>



<?php include("includes/footer.php")?>

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
</html>

<?php
include("login.php");
include("register.php");
// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
?>