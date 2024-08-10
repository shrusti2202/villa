<?php
if(isset($_SESSION['aid']))
{
}
else
{
		echo "<script>
		window.location='admin'
		</script>";
}	

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Villa Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin"> Villa admin</a>
            </div>
            <div class="navbar-right  navbar-brand">
                <a href="admin_logout" class="btn btn-danger" title="Logout">Logout</a>
            </div>
        </nav>

        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                        <div class="inner-text text-danger">
                            <h3>
                                <?php echo $_SESSION['aname']?>
                                <br />
                                <small>Last Login : Just Now</small>
                            </h3>
                        </div>
                    </li>


                    <li>
                        <a class="active-menu" href="dashboard"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Categories<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_categories">Add</a>
                            </li>
                            <li>
                                <a href="manage_categories">Manage</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Properties<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_properties">Add</a>
                            </li>
                            <li>
                                <a href="manage_properties">Manage</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Property Details
                            <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_single_property">Add</a>
                            </li>
                            <li>
                                <a href="manage_single_property">Manage</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Blog
                            <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_blog">Add</a>
                            </li>
                            <li>
                                <a href="manage_blog">Manage</a>
                            </li>

                        </ul>
                    </li>


                    <li>
                        <a href="manage_user"><i class="fa fa-table fa-3x"></i>User</a>
                    </li>
                    <li>
                        <a href="manage_contact"><i class="fa fa-table fa-3x"></i>Contact</a>
                    </li>




                    <li>
                        <a href="blank"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->