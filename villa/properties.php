<?php
// if(isset($_SESSION['uid']))
// {
// }
// else
// {
// 		echo "<script>
// 		window.location='home'
// 		</script>";
// }	

include_once('navbar.php');

?>
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="breadcrumb"><a href="#">Home</a> / Properties</span>
                <h3>Properties</h3>
            </div>
        </div>
    </div>
</div>

<div class="section properties">
    <div class="container">
        <ul class="properties-filter">
            <li>
                <a class="is_active" href="#!" data-filter="*">Show All</a>
            </li>
            <li>
                <a href="#!" data-filter=".adv">Apartment</a>
            </li>
            <li>
                <a href="#!" data-filter=".str">Villa House</a>
            </li>
            <li>
                <a href="#!" data-filter=".rac">Penthouse</a>
            </li>
        </ul>
        <div class="row properties-box shadow-lg">
            <?php
									
											foreach($properties as $w)
											{
											?>
            <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 adv ">
                <div class="item">
                    <a href="single_property"><img src="../Admin/upload/property/<?php echo $w->img;?>"  width="100%" height="250px" /></a>
                    <span class="category"><?php echo $w->cat_name;?></span>
                    <h6>₹<?php echo $w->price;?></h6>
                    <h4><a href="property-details.php"><?php echo $w->name;?></a></h4>             
                                                   <hr></hr>
                                                   <p><b><?php echo $w->title;?></b></p>
                                                   <p><h4 style='color:#f35525'>About :</h4><?php echo $w->description;?></p>
                  
                    <div class="main-button">
                        <a href="property-details.php">Schedule a visit</a>
                    </div>
                </div>
            </div>
            <?php
											}
                      ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li><a href="#">1</a></li>
                    <li><a class="is_active" href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">>></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php

include_once('footer.php');

?>