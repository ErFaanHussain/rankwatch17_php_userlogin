<?php
  include('includes/core.inc.php');
  if(!loggedIn()){
    header('Location:index.php');
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
  <body>
    <div class="container-fluid px-0">
      <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#nav-content">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-brand">User Details</div>
      <div class="collapse navbar-collapse" id="nav-content">
        <ul class="navbar-nav ml-auto">
          <span class="text-white my-2 mr-2"><i>Welcome</i>
            <?php echo $_SESSION["name"]; ?></span>
          <li class="nav-item" style="border-left:1px solid #ddd;">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
      </nav>
    </div>
    <?php
     include("includes/DBConnection.inc.php");
     $fetch_query = "SELECT `tbl_users`.`full_name`,`tbl_users`.`email`,`tbl_users`.`mobile`,`tbl_users`.`age`,`tbl_users`.`gender`,
     `tbl_users`.`address`,`tbl_states`.`name` as stateName,`tbl_countries`.`name` as countryName
     FROM `tbl_users`,`tbl_states`,`tbl_countries` WHERE `tbl_users`.`user_id`=" . $_SESSION["user_id"] . " AND `tbl_states`.`id`=`tbl_users`.`state`
     AND `tbl_countries`.`id`=`tbl_users`.`country`";
     $result = $con->query($fetch_query);
     $count = $result->num_rows;
     if($count){
       $details = $result->fetch_assoc();
     }else{
       echo "Something went wrong";
     }
    ?>
    <div class="row container mt-5 mx-auto">
      <div class="col-sm-6">
          <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" value="<?php echo $details['full_name'];?>" readonly>
              </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="email" value="<?php echo $details['email'];?>" readonly>
              </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Mobile</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="mobile" value="<?php echo $details['mobile'];?>" readonly>
              </div>
          </div>
          <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="gender" value="<?php echo $details['gender'];?>" readonly>
              </div>
          </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group row">
          <label for="age" class="col-sm-3 col-form-label">Age</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="age" value="<?php echo $details['age'];?>" readonly>
            </div>
        </div>
        <div class="form-group row">
          <label for="address" class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="address" rows="1" readonly><?php echo $details['address'];?></textarea>
            </div>
        </div>
        <div class="form-group row">
          <label for="state" class="col-sm-3 col-form-label">State</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="state" value="<?php echo $details['stateName'];?>" readonly>
            </div>
        </div>
        <div class="form-group row">
          <label for="country" class="col-sm-3 col-form-label">Country</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="country" value="<?php echo $details['countryName'];?>" readonly>
            </div>
        </div>

      </div>
    </div>
  </body>
</html>
