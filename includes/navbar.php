<?php

  $isLoggedIn = false;
  if(isset($_SESSION['id']) && isset($_SESSION['role'])){
    $isLoggedIn = true;
  }

?>


<nav class="navbar fixed-top navbar-expand-md navbar-light">
  <a class="navbar-brand p-2 ml-md-4" href="index.php">Hire Hub PH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-md-4">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./documentation.txt">DOCUMENTATION <span class="sr-only">(current)</span></a>
      </li>
      <?php 
        if(!$isLoggedIn){  ?>

          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#loginModal" href="">LOGIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#registerModal" href="">SIGNUP</a>
          </li>
      <?php } ?>
      
      <?php 
        if(isset($_SESSION['id'])){
          
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="material-icons">person</span> 
              <span class="nav-link p-0"><script> document.write("<?php echo ($_SESSION['name']);?>");</script></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      
            <?php 
              if($_SESSION['role'] == 'employer'){
            ?>
              <a class="dropdown-item nav-link" href="postedJob.php">POSTED JOB</a>
            <?php    
              }
              elseif($_SESSION['role'] == 'user'){ 
            ?>
              <a class="dropdown-item nav-link" href="appliedJob.php">APPLIED JOBS</a>
            <?php    
              }
            ?>
          
          
            <!-- <a class="dropdown-item" href="#">List</a> -->
            <div class="dropdown-divider"></div>
            <!-- <a class="dropdown-item nav-link" href="#">LOG OUT</a> -->
            <a class="dropdown-item nav-link"  href="logout.php">LOG OUT</a>
            </div>
          </li>
      <?php     
        }
      
      ?>
      <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="modal"  href=""></a>
      </li> -->
      <script>
        // $('#loginModal').modal('toggle');
        // $('#registerModal').modal('toggle');

      </script>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>