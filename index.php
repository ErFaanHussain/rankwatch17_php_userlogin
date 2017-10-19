<?php
  include('includes/core.inc.php');
  if(loggedIn()){
    header('Location:info.php');
  }?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>User Login/SignUp</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/45a04a773b.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/validator/dist/jquery.validate.js"></script>
	<script src="js/validator/dist/additional-methods.js"></script>
	<script src="js/customJS.js"></script>
<body>
	<div class="container-fluid px-0">
	  <nav class="navbar navbar-inverse bg-primary">
	    <div class="navbar-brand mx-auto">User Login/SignUp</div>
	  </nav>
	</div>
	<div class="container pb-2">
		<div class="col-sm-6 mx-auto mt-3" >
			<!-- TAB style Login/SignUp -->
			<ul id="login-signup" class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" href="#login" id="login-tab" role="tab" data-toggle="tab"><h6><i class="fa fa-sign-in" aria-hidden="true"></i> Login</h6></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#signup" role="tab" id="signup-tab" data-toggle="tab"><h6><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</h6></a>
				</li>
			</ul>
				<!-- Login Tab Panel END -->
				<div id="login-signup-content" class="tab-content">
					<div role="tabpanel" class="tab-pane fade show active" id="login">
						<form id="loginForm" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
							<div class="form-group">
								<label class="col-form-label" for="username">Enter Username</label>
								<input type="email" class="form-control" id="uid" name="username" value="" placeholder="Username">
							</div>
							<div class="form-group">
								<label class="col-form-label" for="pwd">Enter Password</label>
								<input type="password" class="form-control" id="pwd" name="password" value="" placeholder="Password">
							</div>
							<div id="loginAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
								<button type="button" class="close" data-dismiss="alert">
	  						 	 <span>&times;</span>
	  						 	 </button>
	 							 Please Login First
							</div>
							<div class="form-group">
							<div class="text-center">
								<button type="submit" class="btn btn-primary" name="loginSubmit"><i class="fa fa-sign-in" aria-hidden="true"></i>  Login</button>
								<button type="reset" class="btn btn-danger ml-md-5" id="resetFormLogin"><i class="fa fa-remove" aria-hidden="true"></i> Cancel</button>
							</div>
							</div>
						</form>
					</div>
					<!-- Login Tab Panel END -->
					<!-- SignUp Tab Panel START -->
					<div role="tabpanel" class="tab-pane fade" id="signup">
						<form id="signUpForm" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
							<div class="form-group">
								<label class="col-form-label" for="name">Enter Your Name</label>
								<input type="text" class="form-control" id="name" name="name" value="" placeholder="Name">
							</div>
							<div class="form-group">
								<label class="col-form-label" for="regNumber">Enter your Email</label>
								<input type="email" class="form-control" id="email" name="email" value="" placeholder="you@example.com">
							</div>
							<div class="form-group">
								<label class="col-form-label" for="pwd">Enter Password</label>
								<input type="password" class="form-control" id="pwd1" name="password" value="" placeholder="Create Password">
								<small id="nameHelp" class="form-text text-muted">Password should be alphanumeric</small>
							</div>
							<div class="form-group">
								<label class="col-form-label" for="mobile">Enter Your Mobile Number</label>
								<input type="text" class="form-control" id="mobile" name="mobile" value="" maxlength="10">
							</div>
							<div class="form-group">
								<label class="col-form-label" for="age">Enter your Age</label>
								<input type="text" class="form-control" id="age" name="age" value="">
							</div>
							<div class="form-group">
	    					<label for="depttSelect">Gender</label>
	    					<select class="form-control" id="gender" name="gender">
	    						<option selected value="">--Select your Gender--</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
							</div>
							<div class="form-group">
								<label class="col-form-label" for="address">Address</label>
								<textarea class="form-control" id="address" name="address" rows="3" value=""></textarea>
								<small id="addressHelp" class="form-text text-muted">Your full Address, not more than 150 characters</small>
							</div>
							<div class="form-group">
	    						<label for="country">Country</label>
	    						<select class="form-control" id="countrySelect" name="country" onchange="fillState();">
	    						<option selected value="">--Select your Country--</option>
							<?php
								include("includes/DBConnection.inc.php");
								$fetch_query="SELECT `id`,`name` FROM `tbl_countries`";
								$query_result=$con->query($fetch_query);
								$cnt = $query_result->num_rows;
								if($cnt){
										while($returned=$query_result->fetch_assoc()){
											echo '<option value="' . $returned["id"] . '">' . $returned["name"] . '</option>';
											}
									}
							?>
								</select>
	  						</div>
	  						<div class="form-group">
	    						<label for="courseSelect">Select Your State</label>
	    						<select class="form-control" id="stateSelect" name="state">
	    						</select>
	    						<small id="stateStatus"></small>
	  						</div>
							<div class="form-group">
							<div class="text-center">
								<button type="submit" class="btn btn-primary" name="signUpSubmit"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</button>
								<button type="reset" class="btn btn-danger ml-md-5" id="resetFormSignUp"><i class="fa fa-remove" aria-hidden="true"></i> Cancel</button>
							</div>
							</div>
						</form>
						<div id="signUpAlert" class="alert alert-danger alert-dismissible fade" role="alert"></div>
					</div>
				</div>
		</div>
	</div>
	<footer class="container-fluid py-2" style="background-color: #dadada;">
		 <div class="text-center">
			<div class="my-0"><i class="fa fa-code" aria-hidden="true"></i> with <i class="fa fa-heart" aria-hidden="true"></i> by
			<a style="text-decoration: none;" href="https://facebook.com/erfaanhussain6"><strong style="color:#292b2c;">ErFaan</strong></a>
			</div>
			<small class="my-0">Copyright &copy; Irfan Hussain 2017 </small>
		</div>
	</footer>
</body>
</html>
<?php
if(isset($_POST["loginSubmit"])){
		if(isset($_POST["username"]) && isset($_POST["password"])){
			$uname = $_POST["username"];
			$pass = $_POST["password"];
			if (empty($uname) || empty($pass)){ ?>
						<script>
		          jQuery("#loginAlert").html('<button type="button" class="close" data-dismiss="alert"><span> &times; </span> </button><strong>Error!</strong> Please Enter Username and Password');
		        </script>
			<?php }
			else{
				$login_query="SELECT `user_id`,`full_name`,`password` FROM `tbl_users` WHERE `email`='$uname'";
				$query_result=$con->query($login_query);
				$cnt = $query_result->num_rows;
				$returned=$query_result->fetch_assoc();
				if(!$cnt){ ?>
					<script>
						jQuery("#loginAlert").html('<button type="button" class="close" data-dismiss="alert"><span> &times; </span> </button><strong>Error!</strong> Username doesn\'t exist, <strong> Please retry</strong>');
					</script>
				<?php }
				elseif(password_verify($pass, $returned["password"])){
          $_SESSION["name"]=$returned["full_name"];
          $_SESSION["user_id"]=$returned["user_id"];
          echo '<script type="text/javascript">window.location.replace("info.php");</script>';
				}
				else{ ?>
					<script>
						jQuery("#loginAlert").html('<button type="button" class="close" data-dismiss="alert"><span> &times; </span> </button><strong>Error!</strong> Password Incorrect, <strong> Please retry</strong>');
					</script>
				<?php
				}
			}
		}
		$con->close();
	}
if(isset($_POST["signUpSubmit"])){
	if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["mobile"])&& isset($_POST["age"]) && isset($_POST["gender"])
	 && isset($_POST["address"]) && isset($_POST["country"]) && isset($_POST["state"])){
		if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["mobile"]) || empty($_POST["age"]) || empty($_POST["gender"])
		 || empty($_POST["address"]) || empty($_POST["country"]) || empty($_POST["state"])){ ?>
				<script>
					jQuery("#signUpAlert").removeClass('alert-success').addClass('alert-danger show').html('<button type="button" class="close" data-dismiss="alert"><span> &times; </span> </button><strong>Error!</strong> Please Enter all the details');
				</script>
		<?php }
		else{
			$name=$_POST["name"];
			$email=$_POST["email"];
			$password=password_hash($_POST["password"], PASSWORD_DEFAULT);
			$mobile=$_POST["mobile"];
			$age=$_POST["age"];
			$gender=$_POST["gender"];
			$address=$_POST["address"];
			$country=$_POST["country"];
			$state=$_POST["state"];
			$search_query="SELECT `full_name` FROM `tbl_users` WHERE `email`='$email'";
			$search_result=$con->query($search_query);
			if($search_result->num_rows){ ?>
				<script>
					jQuery("#signUpAlert").removeClass('alert-success').addClass('alert-danger show').html('<button type="button" class="close" data-dismiss="alert"><span> &times; </span> </button><strong>Error!</strong> Email already registered, use another');
				</script>
			<?php }
			else{
			$insert_query = "INSERT INTO `tbl_users`(`full_name`,`email`,`password`,`mobile`,`age`,`gender`,`address`,`country`,`state`)
				VALUES('$name','$email','$password',$mobile,$age,'$gender','$address','$country','$state')";
			$query_result = $con->query($insert_query);
			if($con->affected_rows){ ?>
					<script>
						jQuery("#signUpAlert").removeClass('alert-danger').addClass('alert-success show').html('<button type="button" class="close" data-dismiss="alert"><span> &times; </span> </button><strong>Success!</strong> You Successfully Signed Up, Please Login!');
					</script>
			<?php }
			else{ ?>
					<script>
						jQuery("#signUpAlert").removeClass('alert-success').addClass('alert-danger show').html('<button type="button" class="close" data-dismiss="alert"><span> &times; </span> </button><strong>Error!</strong> Something went wrong, Please Contact Administrator');
					</script>
				<?php }
			}
		}
	}
	$con->close();
}
