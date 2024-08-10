
<?php
if(isset($_SESSION['uid']))
{
}
else
{
		echo "<script>
		window.location='home'
		</script>";
}	

include_once('navbar.php')
?>

<body>
  <div class="tm-page-wrap mx-auto">
  

    <!-- Page content -->
    <main>
      <div class="container-fluid px-0">
        <div class="mx-auto tm-content-container">
        <div class="mx-auto tm-content-container mt-4 px-3 mb-3">
          <div class="row">
            <div class="col-12">
              <h2 class="tm-page-title mb-5 tm-text-primary text-center">My Profile</h2>
            </div>
          </div>
          <div class="row">
            <div class="offset-lg-3 col-lg-6 mb-5 pt-3">
				<div class="row">
					<div class="col-lg-6">
						<img class="mr-4 " height="350px" width="100%" src="../admin/upload/user/<?php echo $fetch->img;?>" >
					</div>
					<div class="col-lg-6">
            <h6><p>Name : <?php echo $fetch->name; ?></p></h6>
						<h6><p>Email : <?php echo $fetch->email; ?></p></h6>
            <h6><p>Mobile : <?php echo $fetch->mobile; ?></p></h6>
            <h6><p>Gender : <?php echo $fetch->gender; ?></p></h6>
            <h6><p>Launguges : <?php echo $fetch->lag; ?></p></h6>
            <h6><p>state : <?php echo $fetch->s_id; ?></p></h6>
						<a href="edit_signup?editsignup=<?php echo $fetch->id; ?>"  class="btn btn-lg btn-success ">Edit</a>
					</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <?php

include_once('footer.php');

?>
