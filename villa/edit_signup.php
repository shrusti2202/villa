<?php
include_once('navbar.php');
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
        <hr />
        <div class="col-12">
              <h2 class="tm-page-title mb-4 tm-text-primary text-center">Edit My Profile</h2>
            </div>   
       <hr />

        </div>
        <!-- /. ROW  -->
        <div class="row offset-lg-3" >
        <div class="row">
					<div class="col-lg-4 mt-5">
                   <img height="350px"   src="../admin/upload/user/<?php echo $fetch->img;?>" >			
                		</div>
            <div class="col-md-6 ">
                <!-- Form Elements -->
                <div class="panel panel-default">

                    <div class="panel-body ">
                        <div class="row">
                            <div class="col-md-12 ">

                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group mt-3">
                                        <label><b>Name :</b></label>
                                        <input type="text" class="form-control" placeholder="Enter name"
                                            value="<?php echo $fetch->name;?>" name="name" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="email"><b>Email :</b></label>
                                        <input type="text" class="form-control" placeholder="Enter Email"
                                            value="<?php echo $fetch->email;?>" name="email" required>

                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="number"><b>Number</b></label>
                                        <input type="text" class="form-control" placeholder="Enter number"
                                            value="<?php echo $fetch->mobile;?>" name="mobile" required>
                                    </div>

                                    <div class="form-group mt-3">
                                       <b> Gender :</b>
                                        Male :<input type="radio" name="gender" value="Male"
                                            <?php if($fetch->gender=="Male"){ echo "checked"; }?> />
                                        Female :<input type="radio" name="gender" value="Female"
                                            <?php if($fetch->gender=="Female"){ echo "checked"; }?> />
                                    </div>

                                    <div class="form-group mt-3">
                                      <b>  Laungages :</b>
                                        Hindi :<input type="checkbox" name="lag[]" value="Hindi" <?php
					$lag=$fetch->lag;
					$lag_arr=explode(",",$lag);
					if(in_array("Hindi",$lag_arr)) { echo "Checked"; }
					?> />
                                        Gujrati :<input type="checkbox" name="lag[]" value="Gujrati" <?php
					$lag=$fetch->lag;
					$lag_arr=explode(",",$lag);
					if(in_array("Gujrati",$lag_arr)) { echo "Checked"; }
					?> />
                                        English :<input type="checkbox" name="lag[]" value="English" <?php
					$lag=$fetch->lag;
					$lag_arr=explode(",",$lag);
					if(in_array("English",$lag_arr)) { echo "Checked"; }
					?> /> </div>

<div class="form-group mt-3">
<select class="form-control" id="contact-select" name="s_id">
                                            <option value="-">Select Country</option>
                                            <?php
                      foreach($state as $w)
                      {
						  if($fetch->id=$w->id)
						  {
                      ?>
                                            <option value="<?php echo $w->id?>" selected>
                                                <?php echo $w->name?>
                                            </option>
                                            <?php
						  }
                      }
                      ?>
                                        </select>

                                         </div>

                                         <div class="form-group mt-3">
                                         <input type="file" name="img" value="<?php echo $fetch->img;?>"
                                         class="form-control" />
                                    </div>
                                    <button type="submit" class="btn btn-success mt-3 " name="save">Save </button>
                                    <a href="profile" class="btn btn-warning mt-3 " >back </a>

                                </form>


                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>

</html>