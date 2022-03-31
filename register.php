<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->

<?php 

include("includes/config.php");

if(isset($_POST['create'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$location = $_POST['location'];
	$roletype = $_POST['role'];
	// echo "<script>alert('$sql')</script>";

	function insertQuery($sqlQuery){
		global $conn;
		// global $roletype;
		$result=$conn->query($sqlQuery);
		if ($result) {
			echo '<script>alert("Registered Successfull")</script>';
			// echo '<script>location.replace("postedJob.php")</script>';
			// sleep(2);
			// header("location:appliedJob.php"); 
			// die('');
			exit();
		}else{
			echo 'signup failed :(';
		}
		
	}

	if($roletype == 'user'){
		$sql = "INSERT INTO `user`(`name`, `email`, `password`, `location`, `roletype`) VALUES ('$name','$email','$password','$location','$roletype')";
		insertQuery($sql);
	}
	else{
		$sql = "INSERT INTO `employers`(`name`, `email`, `password`, `location`, `roletype`) VALUES ('$name','$email','$password','$location','$roletype')";
		insertQuery($sql);
	}

	// echo "<script>alert('$sql')</script>";
	// $result=$conn->query($sql);
	// echo "<script>alert('$result')</script>";

	// if ($_POST[uname] == 'abul' and $_POST['passwd'] == 'p') {
	

	
	// echo "<script>alert('$email')</script>";
	// echo "<script>alert('$password')</script>";
	// echo "<script>alert('$location')</script>";
	// echo "<script>alert('$roletype')</script>";

		
}
// else{
// 	echo "Fill all the field";
// }

?>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">REGISTER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
			<form action="" method="post">
				<div class="form-group">
					<label for="exampleInputEmail1">Your Name<span class="text-danger">*</span></label>
					<input required type="text" name="name" class="form-control" id="" aria-describedby="nameHelp" placeholder="Enter Your Name">
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address<span class="text-danger">*</span></label>
					<input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password<span class="text-danger">*</span></label>
					<input required type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Location</label>
					<!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
					<select id="inputState" name="location" class="form-control">
					<option selected value='Manila City'>Manila City</option>
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
					<!-- <label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
					<label for="">I am an<span class="text-danger">*</span> :</label><br>
					<input required type="radio" id="user" name="role" value="user">
					<label for="user">Employee</label><br>
					<input required type="radio" id="employer" name="role" value="employer">
					<label for="employer">Employer</label><br>	
				</div>

				
				<!-- <div class="form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Check me out</label>
				</div> -->
				<button type="submit" name="create" class="btn card-btn green">CREATE</button>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
