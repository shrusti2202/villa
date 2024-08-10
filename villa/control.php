<?php

include_once('../Admin/model.php'); // 1 step : load model in control


class control extends model     // 2 step extends(inherit) model class
{
	// auto call magic function  only make clsss object 
	function __construct()
	{
		session_start();

		model::__construct(); // 3 step call model __construct for database connectivity 
	
		$url=$_SERVER['PATH_INFO']; // PATH urldecode
		
		switch($url)
		{
			case '/home':
				if (isset($_REQUEST['submit'])) {
					$name = $_REQUEST['name'];
					$email = $_REQUEST['email'];
					$comment = $_REQUEST['comment'];

					$data = array("name" => $name, "email" => $email, "comment" => $comment);

					$res=$this->insert('contact',$data);
					if($res)
					{
						echo "<script>
							alert('Contact Success !');
						</script>";
					}
				}
			include_once('index.php');
			break;
			
			case '/properties':
			$properties=$this->select_join('properties.*,categories.name as cat_name','properties','categories','properties.cat_id=categories.id');

			include_once('properties.php');
			break;
			
            case '/single_property':
			$single_pro=$this->select('single_pro');
            include_once('single_property.php');
            break;
              
			case '/blog':
			$blog=$this->select('blog');
			include_once('blog.php');
			break;
					
			case '/contact':
				if (isset($_REQUEST['submit'])) {
					$name = $_REQUEST['name'];
					$email = $_REQUEST['email'];
					$comment = $_REQUEST['comment'];

					$data = array("name" => $name, "email" => $email, "comment" => $comment);

					$res=$this->insert('contact',$data);
					if($res)
					{
						echo "<script>
							alert('Contact Success !');
						</script>";
					}
				}
			include_once('contact.php');
			break;
			
			case '/signup':
				$state = $this->select('state');
				if (isset($_REQUEST['submit'])) {
					$name = $_REQUEST['name'];
					$email = $_REQUEST['email'];
					$password = md5($_REQUEST['password']); // pass encripted 
					$mobile = $_REQUEST['mobile'];
					$gender = $_REQUEST['gender'];
					$lag_arr = $_REQUEST['lag']; // get data in arr form
					$lag = implode(',', $lag_arr); // convert arr to string
					$s_id = $_REQUEST['s_id'];

					$img = $_FILES['img']['name'];
					// image upload in project folder
					$path = '../Admin/upload/user/'.$img;
					$tmp_file = $_FILES['img']['tmp_name'];
					move_uploaded_file($tmp_file, $path);

					$data = array(
						"name" => $name, "email" => $email, "mobile"=>$mobile, "password" => $password, "gender" => $gender,
						"lag" => $lag, "s_id" => $s_id, "img" => $img
					);

					$res=$this->insert('user',$data);
					if($res)
					{
						echo "<script>
							window.location='home';
							alert('Registered Success !');
						</script>";
					}

				}			
				include_once('signup.php');
			break;
			
			case '/login':
				if (isset($_REQUEST['submit'])) {
					
					$email = $_REQUEST['email'];
					$password = md5($_REQUEST['password']); // pass encripted 
					
					$where = array("email" => $email, "password" => $password);
					$res=$this->select_where('user',$where);
					$chk=$res->num_rows; // 0 means false & 1 means true  check row wise condition
					
					if($chk==1)
					{
						
						$data=$res->fetch_object(); // single data fetch 
						if($data->status=="Unblock")
						{
							$_SESSION['uname']=$data->name;
							$_SESSION['uid']=$data->id;
							
							echo "<script>
								alert('Login Success !');
								window.location='home'
							</script>";
						}
						else
						{
							echo "<script>
								alert('Your Account Blocked so Contacts us !');
								window.location='home'
							</script>";
						}
					}
					else
					{
						echo "<script>
							alert('Login Failed due to wrong credential!');
						</script>";
					}
				}

				include_once('login.php');
				break;
			

			case '/profile':
				$where=array("id"=>$_SESSION['uid']);
				$res=$this->select_where('user',$where);
				$fetch=$res->fetch_object();
				
				include_once('profile.php');
				break;
				
				case '/user_logout':
					unset($_SESSION['uid']);
					unset($_SESSION['uname']);
					echo "<script>
							alert('Logout Success !');
							window.location='home'
						</script>";
				break;
				

			



					case '/edit_signup':
						$state = $this->select('state');
						 
							 if(isset($_REQUEST['editsignup'])) 
							 {
								 $id=$_REQUEST['editsignup'];
								 
								 $where=array("id"=>$id);
								 $res=$this->select_where('user',$where);
								 $fetch=$res->fetch_object();
								 
								 if(isset($_REQUEST['save']))
								 {
									 $name = $_REQUEST['name'];
									 $email = $_REQUEST['email'];	
									 $mobile = $_REQUEST['mobile'];
									 $gender = $_REQUEST['gender'];
									 $lag_arr = $_REQUEST['lag']; // get data in arr form
									 $lag = implode(',', $lag_arr);
									 $s_id = $_REQUEST['s_id'];
									 
									 $_SESSION['uname']=$name;


									 if($_FILES['img']['size']>0)
									 {
										 // get old_img name
										 $old_img=$fetch->img;
										 
										 $img=$_FILES['img']['name'];	
										 $path = '../admin/upload/user/' . $img;
										 $tmp_file = $_FILES['img']['tmp_name'];
										 move_uploaded_file($tmp_file, $path);
										 
										 $data = array("name" => $name,"email" => $email,"mobile" => $mobile, "gender" => $gender, "lag" => $lag, "s_id" => $s_id, "img" => $img);
				 
										 $res=$this->update_where('user',$data,$where);
										 if($res)
										 {
											 unlink('.../admin/upload/user/'.$old_img);
											 echo "<script>
												 alert('User Update Success !');
												 window.location='profile';
											 </script>";
										 }
										 
									 }
									 else
									 {
										 $data = array("name" => $name,"email" => $email,"mobile" => $mobile, "gender" => $gender, "lag" => $lag, "s_id" => $s_id);
										 $res=$this->update_where('user',$data,$where);
										 if($res)
										 {
											 echo "<script>
												 alert('User Update Success !');
												 window.location='profile';
											 </script>";
										 }
									 }
									 
								 }
								 
							 }
							 include_once('edit_signup.php');
							 break;
			default:
			echo "<h1 style='color:red;text-align:center'> Page Not Found </h1>";
			break;
			
		}
		
	}
}
$obj=new control;

?>