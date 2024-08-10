<?php
include_once('navbar.php');
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Property Details
                </h2>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                                <form role="form" method="POST" enctype="multipart/form-data">
                                    <div class="form-group pb-3">
                                        <select class="form-control" id="contact-select" name="cat_id">
                                            <option value="-">Select categories</option>
                                            <?php
                      foreach($categories as $w)
                      {
                      ?>
                                            <option value="<?php echo $w->id?>"><?php echo $w->name?></option>
                                            <?php
                      }
                      ?>
                                        </select>
                                    </div>
                                    <div class="form-group pb-3">
                                        <select class="form-control" id="contact-select" name="pro_id">
                                            <option value="-">Select properties</option>
                                            <?php
                      foreach($properties as $w)
                      {
                      ?>
                                            <option value="<?php echo $w->id?>"><?php echo $w->name?></option>
                                            <?php
                      }
                      ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Properties Image</label>
                                        <input type="file" class="form-control" name="img" />
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type='number' class="form-control" placeholder="Please Enter price"
                                            name="price" />
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type='text' class="form-control" placeholder="Please Enter location"   
                                            name="location" />
                                    </div>
                                    <div class="form-group">
                                        <label>Bedrrom</label>
                                        <input type='number' class="form-control" placeholder="Please Enter Bedroom"   
                                            name="bedroom" />
                                    </div>
                                    <div class="form-group">
                                        <label>Bathroom</label>
                                        <input type='number' class="form-control" placeholder="Please Enter Bathroom"   
                                            name="bathroom" />
                                    </div>
                                    <div class="form-group">
                                        <label>Kitchen</label>
                                        <input type='number' class="form-control" placeholder="Please Enter kitchen"  
                                            name="kitchen" />
                                    </div>
                                    <div class="form-group">
                                        <label>	Floor</label>
                                        <input type='number' class="form-control" placeholder="Please Enter floor"   
                                            name="floor" />
                                    </div>
                                    <div class="form-group">
                                        <label>Parking</label>
                                        <input type='number' class="form-control" placeholder="Please Enter parking" 
                                            name="parking" />
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" placeholder="Please Enter title" name="title" />
                                    </div>
                                    <div class="form-group">
                                        <label>Long Description</label>
                                        <input class="form-control" placeholder="Please Enter Description"
                                            name="long_desc" />
                                    </div>





                                    <button name="submit" type="submit" class="btn btn-default">Submit Button</button>
                                    <button type="reset" class="btn btn-primary">Reset Button</button>

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