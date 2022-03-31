<?php
include("includes/config.php");
session_start();


if(!isset($_SESSION['email']) or $_SESSION['role'] != 'user'){
	die('<script>alert("You are not allowed here ! Only employees are expected!");
			location.replace("index.php");
	</script>');
}

$allJobs;
if(isset($_SESSION['email']) and $_SESSION['role'] == 'user'){

	
	function fetchJobList(){
		global $allJobs;
		global $conn;
		$email =$_SESSION["email"];
		$employer_id = $_SESSION["id"];
		$roletype = $_SESSION["role"];
		$sqlSelect = "SELECT DISTINCT application.job_id,application.user_id, jobs.position, jobs.company, jobs.expertise, jobs.experience, jobs.type, jobs.salary 
		FROM ((application 
			INNER JOIN user ON application.user_id = $employer_id)
				 INNER JOIN jobs ON application.job_id=jobs.id)"; 
				

		$allJobs=$conn->query($sqlSelect) or die('<script>alert("Log In Failed");</script>');
		// echo ($result);
		

			if (!empty($allJobs)){
				// echo ('("All job fetched")');
			
				
			}else{
				echo '("Job Fetch Failed")';
			}
			
	}
	fetchJobList();
	// foreach($allJobs as $row){
	// 	echo($row['job_id']);
	// 	echo($row['company']);
	// 	echo($row['position']);
	// 	echo($row['expertise']);
	// 	echo($row['experience']);
	// 	echo($row['type']);
	// 	echo($row['salary']);
	// 	// echo($row['position']);
	// }

	
}
if(isset($_POST['view'])){
	$_SESSION['jobID'] = $_POST['hiddenJobId'];
	header("location: viewJob.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php include("includes/docHeaderInfo.php")?>

	<title>Applied Jobs</title>
</head>
<body>

<?php include("includes/navbar.php")?>

<div class="container-fluid">
		<div class="table-responsive-lg">
			<h2 class="mt-5 mb-4 pt-5">ALL APPLIED JOBS</h2>
			<table class="table">
				<!-- <caption>List of users</caption> -->
				<thead>
					<tr class="rowDivider">
						<th scope="col">ID</th>
						<th scope="col">Position</th>
						<th scope="col">Company</th>
						<th scope="col">Expertise</th>
						<th scope="col">Experience</th>
						<th scope="col">Type</th>
						<th scope="col">Salary</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					foreach ($allJobs as $row) { 
    				// printf("%s (%s)\n", $row["id"], $row["position"]); ?>	
					<tr class=" rowDivider">
						<th scope="row"><?php echo ($row['job_id']); ?></th>
						<td><?php echo ($row['position']); ?></td>
						<td><?php echo ($row['company']); ?></td>
						<td><?php echo ($row['expertise']); ?></td>
						<td><?php echo ($row['experience']); ?></td>
						<td><?php echo ($row['type']); ?></td>
						<td><?php echo ($row['salary']); ?></td>
						<td>
							<form method="POST">
								<button type="submit" name="view" class="btn customBtn green-light">VIEW JOB</button>
								<input type="hidden" name="hiddenJobId" value="<?php echo ($row['job_id']); ?>">
							</form>
						</td>
					</tr>
					<?php } ?>	
				</tbody>
			</table>
		</div>
	</div>

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