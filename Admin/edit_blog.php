<?php
include_once('navbar.php');
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Blog</h2>

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
                                    <div class="form-group">
                                        <label>Blog Name</label>
                                        <input class="form-control" placeholder="Please Enter Service Name"
                                        value="<?php echo $fetch->name;?>" name="name" />
                                    </div>
                                    <div class="form-group">
                                        <label>Blog Location</label>
                                        <input class="form-control" placeholder="Please Enter plce"
                                        value="<?php echo $fetch->place;?>" name="place" />
                                    </div>
                                    <div class="form-group">
                                        <label>Blog Image</label>
                                        <input type="file" class="form-control"  value="<?php echo $fetch->img;?>"
                                            name="img" />
                                            <img src="upload/blog/<?php echo $fetch->img?>" width="50px">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input class="form-control" placeholder="Please Enter Description"
                                            value="<?php echo $fetch->description;?>" name="description" />
                                    </div>


                                    <button type="submit" class="btn btn-default" name="save">Save </button>

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