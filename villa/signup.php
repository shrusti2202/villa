<?php
if(isset($_SESSION['uid']))
{
	echo "<script>
		window.location='home'
		</script>";
}
include_once('navbar.php')
?>


<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
/* * {box-sizing: border-box} */

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

<form method='post' enctype='multipart/form-data' >
  <div class="container">
    
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="number"><b>Number</b></label>
    <input type="text" placeholder="Enter number" name="mobile" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <div class="form-group pb-3">
									Gender : 
                                    Male :<input type="radio" name="gender" value="Male" />
									Female :<input type="radio" name="gender" value="Female" />
                                  </div>
    
    <div class="form-group pb-3">
      <h6>
									Laungages : 
                  Hindi :<input type="checkbox" name="lag[]" value="Hindi" />
									Gujrati :<input type="checkbox" name="lag[]" value="Gujrati" />
									English :<input type="checkbox" name="lag[]" value="English" />
                  </h6>
                                  </div>
                                  <div class="form-group pb-3">
                                    <select class="form-control" id="contact-select" name="s_id">
                                      <option value="-">Select State</option>
                                      <?php
                      foreach($state as $w)
                      {
                      ?>
                      <option value="<?php echo $w->id?>"><?php echo $w->name?></option>
                      <?php
                      }
                      ?> 
                                    </select>
                                  </div>
								  <div class="form-group">
                                    <input type="file" name="img" class="form-control" required="" />
                                  </div>
                                  <div class="form-group mb-0 d-flex gap-2">
                                  <button type="submit" class="btn btn-success rounded-0 d-block ml-auto mr-0 tm-btn-animate tm-btn-cancel tm-icon-cancel"><span>cancel</span></button>
                                  <button type="submit" name="submit" class="btn btn-primary rounded-0 d-block ml-auto mr-0 tm-btn-animate tm-btn-submit tm-icon-submit"><span>Signup</span></button>
                                  </div>
                                  <a href="#" style="color:dodgerblue">Terms & Privacy</a>
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    <p>if you have already Register  <a href="login" style="color:dodgerblue">login here</a></p>

    <!-- <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div> -->
  </div>
</form>

</body>
</html>
