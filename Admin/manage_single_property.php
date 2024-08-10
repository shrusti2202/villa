﻿<?php
include_once('navbar.php');
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Manage Property Details
                </h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cate_ID</th>
                                        <th>Pro_ID</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>location</th>
                                        <th>bedroom</th>
                                        <th>bathroom</th>
                                        <th>kitchen</th>
                                        <th>floor</th>
                                        <th>parking</th>
                                        <th>Title</th>
                                        <th>Long Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
									if(!empty($single_pro))
										{
											foreach($single_pro as $w)
											{
											?>
                                    <tr>
                                        <td><?php echo $w->id;?></td>
                                        <td><?php echo $w->cat_id;?></td>
                                        <td><?php echo $w->pro_id;?></td>
                                        <td><img src="upload/property/<?php echo $w->img;?>" width="50px" /></td>
                                        <td><?php echo $w->price;?></td>
                                        <td><?php echo $w->location;?></td>
                                        <td><?php echo $w->bedroom;?></td>
                                        <td><?php echo $w->bathroom;?></td>
                                        <td><?php echo $w->kitchen;?></td>
                                        <td><?php echo $w->floor;?></td>
                                        <td><?php echo $w->parking;?></td>
                                        <td><?php echo $w->title;?></td>
                                        <td><?php echo $w->long_desc;?></td>
                                        <td>
                                            <a href="edit_single_property?esingle_pro=<?php echo $w->id;?>" class="btn btn-primary">Edit</a>
                                            <a href="delete?dsingle_pro=<?php echo $w->id;?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
											}
										}
										else
										{	
                                        ?>
                                    <tr>
                                        <td align="center" colspan="8"> Data Not Found </td>
                                    </tr>
                                    <?php
										}
										?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>

    </div>
</div>
<!-- /. ROW  -->
</div>

</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function() {
    $('#dataTables-example').dataTable();
});
</script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>

</html>