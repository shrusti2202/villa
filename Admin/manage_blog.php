<?php
include_once('navbar.php');
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Manage Blog</h2>
                <h5>Welcome Jhon Deo , Love to see you back. </h5>

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
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									if(!empty($blog))
										{
											foreach($blog as $w)
											{
											?>
                                    <tr>
                                        <td><?php echo $w->id;?></td>
                                        <td><?php echo $w->name;?></td>
                                        <td><?php echo $w->place;?></td>
                                        <td><img src="upload/blog/<?php echo $w->img;?>" width="50px" /></td>
                                        <td><?php echo $w->description;?></td>
                                        <td>
                                            <a href="edit_blog?eblog=<?php echo $w->id;?>" class="btn btn-primary">Edit</a>
                                            <a href="delete?dblog=<?php echo $w->id;?>"class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
											}
										}
										else
										{	
                                        ?>
                                    <tr>
                                        <td align="center" colspan="4"> Data Not Found </td>
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