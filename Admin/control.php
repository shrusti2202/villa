<?php

 include_once('model.php'); // 1 step : load model in control


 class control extends model    // 2 step extends(inherit) model class
 {
	// auto call magic function  only make clsss object 
	function __construct()
	{
		session_start();
		model::__construct(); // 3 step call model __construct for database connectivity 
		
		$url=$_SERVER['PATH_INFO']; // PATH urldecode
		
		switch($url)
	    {
		     case '/admin':
		     	if (isset($_REQUEST['submit'])) {
     
		     		$email = $_REQUEST['email'];
		     		$password = md5($_REQUEST['password']); // pass encripted 
     
		     		$where = array("email" => $email, "password" => $password);
		     		$res=$this->select_where('user',$where);
		     		$chk=$res->num_rows; // 0 means false & 1 means true  check row wise condition
     
		     		if($chk==1)
		     			{
		     				$data=$res->fetch_object(); // single data fetch 
		     				$_SESSION['aname']=$data->name;
		     				$_SESSION['aid']=$data->id;
		     				echo "<script>
		     					alert('Login Success !');
		     					window.location='dashboard';
		     				</script>";
		     			}
		     			else
		     			{
		     				echo "<script>
		     					alert('Login Failed !');
		     				</script>";
		     			}
		     	}
		     include_once('index.php');
		     break;
		     	
		     case '/admin_logout':
		     	unset($_SESSION['aid']);
		     	unset($_SESSION['aname']);
		     	echo "<script>
		     			alert('Logout Success !');
		     			window.location='admin'
		     		  </script>";
		     break;
     
		     case '/dashboard':
		     include_once('dashboard.php');
		     break;
		     	
		     case '/add_categories':
		     		if (isset($_REQUEST['submit']))
					 {
		     			$name = $_REQUEST['name'];
		     			
     
		     			$data = array("name" => $name);
     
		     			$res=$this->insert('categories',$data);
		     			if($res)
		     			{
		     				echo "<script>
		     					alert('Categories Success !');
		     				</script>";
		     			}
		     			else{
		     				echo "<script>
		     						alert('Categories noooo !');
		     					</script>";
		     			}	
		     		}
		     include_once('add_categories.php');
		     break;
		     	
		     case '/manage_categories':
		           $categories=$this->select('categories');
		     include_once('manage_categories.php');
		     break;
		     	
		     case '/add_properties':
		     	  $categories = $this->select('categories');
		     		if (isset($_REQUEST['submit']))
					 {
		     			$name = $_REQUEST['name'];
		     			$cat_id = $_REQUEST['cat_id'];
		     			$img = $_FILES['img']['name'];
		     			// image upload in project folder
		     			$path = '../Admin/upload/property/'.$img;
		     			$tmp_file = $_FILES['img']['tmp_name'];
		     			move_uploaded_file($tmp_file, $path);
		     			$price = $_REQUEST['price'];
		     			$title = $_REQUEST['title'];
		     			$description = $_REQUEST['description'];
     
		     			
		     			$data = array(
		     				"name" => $name, "cat_id" => $cat_id, "img" => $img, "price"=>$price, "title" => $title,
		     				"description" => $description
		     			);
     
		     			$res=$this->insert('properties',$data);
		     			if($res)
		     			{
		     				echo "<script>
		     					alert('Properties Success !');
		     				</script>";
		     			}
		     			else
		     			{
		     				echo "<script>
		     					alert('Properties nooo Success !');
		     				</script>";
		     			}
     
		     		 }	
		     include_once('add_properties.php');
		     break;
		     	
		     case '/manage_properties':
		           $properties=$this->select('properties');
		     include_once('manage_properties.php');
		     break;
		     	
		     case '/add_single_property':
		     		$categories = $this->select('categories');
		     		$properties = $this->select('properties');
		     		if (isset($_REQUEST['submit']))
					 {
		     			$cat_id = $_REQUEST['cat_id'];
		     			$pro_id = $_REQUEST['pro_id'];
		     			$price = $_REQUEST['price'];
		     			$location = $_REQUEST['location'];
		     			$bedroom = $_REQUEST['bedroom'];
		     			$bathroom	 = $_REQUEST['bathroom'];
		     			$kitchen = $_REQUEST['kitchen'];
		     			$floor = $_REQUEST['floor'];
		     			$parking = $_REQUEST['parking'];
		     			$title = $_REQUEST['title'];
		     			$long_desc = $_REQUEST['long_desc'];

		     			$img = $_FILES['img']['name'];
		     			// image upload in project folder
		     			$path = '../Admin/upload/property/' . $img;
		     			$tmp_file = $_FILES['img']['tmp_name'];
		     			move_uploaded_file($tmp_file, $path);
		     			$title = $_REQUEST['title'];
		     			$long_desc = $_REQUEST['long_desc'];
     
		     			$data = array("cat_id" => $cat_id,"pro_id" => $pro_id,"price" => $price, "location" => $location,"bedroom" => $bedroom,"bathroom" => $bathroom,"kitchen" => $kitchen,"floor" => $floor, "parking" => $parking, "title" => $title, "long_desc" => $long_desc, "img" => $img);
     
		     			$res=$this->insert('single_pro',$data);
		     			if($res)
		     			{
		     				echo "<script>
		     					alert('Properties Success !');
		     				</script>";
		     			}
		     			else
						{
		     				echo "<script>
		     						alert('Properties noooo !');
		     					</script>";
		     			}	
		     		 }
		     include_once('add_single_property.php');
		     break;
		     	
		     case '/manage_single_property':
		       $single_pro=$this->select('single_pro');
		     include_once('manage_single_property.php');
		     break;
     
		     case '/add_blog':
		     		if (isset($_REQUEST['submit'])) 
					{
		     			$name = $_REQUEST['name'];
		     			$place = $_REQUEST['place'];
		     			$img = $_FILES['img']['name'];
		     			// image upload in project folder
		     			$path = '../Admin/upload/blog/' . $img;
		     			$tmp_file = $_FILES['img']['tmp_name'];
		     			move_uploaded_file($tmp_file, $path);
     
		     			$description = $_REQUEST['description'];
     
		     			$data = array("name" => $name, "place" => $place, "img" => $img, "description" => $description);
     
		     			$res=$this->insert('blog',$data);
		     			if($res)
		     			{
		     				echo "<script>
		     					alert('Blog Success !');
		     				</script>";
		     			}
		     			else
						{
		     				echo "<script>
		     						alert('Blog noooo !');
		     					</script>";
		     		    }	
		     		}
		     include_once('add_blog.php');
		     break;
		     	
		     case '/manage_blog':
		     $blog=$this->select('blog');
		     include_once('manage_blog.php');
		     break;
     
		     case '/manage_user':
		     $user=$this->select('user');
		     include_once('manage_user.php');
		     break;
     
		     case '/manage_contact':
		     $contact=$this->select('contact');
		     include_once('manage_contact.php');
		     break;
	     
     
     
		     // ================================DELETE=================================
     
		     case '/delete':
		     	
		         	if(isset($_REQUEST['dblog'])) 
		         	{
		         		$id=$_REQUEST['dblog'];
		         		
		         		$where=array("id"=>$id);
		         		$res=$this->delete_where('blog',$where);
		         		if($res)
		         		{
		         		  echo "<script>
		         				alert('Blog Delete Success !');
		         				window.location='manage_blog'
		         			    </script>";
		         		}
		         	}
		         	
		         	if(isset($_REQUEST['dcate'])) 
		         	{
		         		$id=$_REQUEST['dcate'];
		         		
		         		$where=array("id"=>$id);
		         		$res=$this->delete_where('categories',$where);
		         		if($res)
		         		{
		         		  echo "<script>
		         				alert('Categories Delete Success !');
		         				window.location='manage_categories'
		         			    </script>";
		         		}
		         	}
		         	
		         	if(isset($_REQUEST['dcontact'])) 
		         	{
		         		$id=$_REQUEST['dcontact'];
		         		
		         		$where=array("id"=>$id);
		         		$res=$this->delete_where('contact',$where);
		         		if($res)
		         		{
		         		  echo "<script>
		         				alert('Contact Delete Success !');
		         				window.location='manage_contact'
		         			    </script>";
		         		}
		         	}
		         	
		         	if(isset($_REQUEST['dproperties'])) 
		         	{
		         		$id=$_REQUEST['dproperties'];
		         		
		         		$where=array("id"=>$id);
		         		$res=$this->delete_where('properties',$where);
		         		if($res)
		         		{
		         		  echo "<script>
		         				alert('Properties Delete Success !');
		         				window.location='manage_properties'
		         			    </script>";
		         		}
		         	}
		         	
		         	if(isset($_REQUEST['dsingle_pro'])) 
		         	{
		         		$id=$_REQUEST['dsingle_pro'];
		         		
		         		$where=array("id"=>$id);
		         		$res=$this->delete_where('single_pro',$where);
		         		if($res)
		         		{
		         		  echo "<script>
		         				alert('Single Properties Delete Success !');
		         				window.location='manage_single_property'
		         			    </script>";
		         		}
		         	}
		         	
		         	if(isset($_REQUEST['duser'])) 
		         	{
		         		$id=$_REQUEST['duser'];
		         		
		         		$where=array("id"=>$id);
		         		$res=$this->delete_where('user',$where);
		         		if($res)
		         		{
		         		  echo "<script>
		         				alert('User Delete Success !');
		         				window.location='manage_user'
		         			    </script>";
		         		}
		         	}
		     			
		     break;
     
     
		     // ===================================EDIT BLOG===========================
     
		     case '/edit_blog':
		     	if(isset($_REQUEST['eblog'])) 
		     	{
		     		$id=$_REQUEST['eblog'];
		     		
		     		$where=array("id"=>$id);
		     		$res=$this->select_where('blog',$where);
		     		$fetch=$res->fetch_object();
		     		
		     		if(isset($_REQUEST['save']))
		     		{
		     			$name = $_REQUEST['name'];
		     			$place = $_REQUEST['place'];
		     			$description = $_REQUEST['description'];
		     			if($_FILES['img']['size']>0)
		     			{
		     				// get old_img name
		     				$old_img=$fetch->img;
		     				$img=$_FILES['img']['name'];	
		     				$path = 'upload/blog/' . $img;
		     				$tmp_file = $_FILES['img']['tmp_name'];
		     				move_uploaded_file($tmp_file, $path);
		
		     				$data = array("name" => $name , "place" => $place ,"description" => $description ,"img" => $img );
		
		     				$res=$this->update_where('blog',$data,$where);
		     				if($res)
		     				{
		     					unlink('upload/blog/'.$old_img);
		     					echo "<script>
		     						alert('Blog Update Success !');
		     						window.location='manage_blog';
		     					</script>";
		     				}
		     				
		     			}
		     			else
		     			{
		     				$data = array("name" => $name,"place" => $place ,"description" => $description);
		     				$res=$this->update_where('blog',$data,$where);
		     				if($res)
		     				{
		     					echo "<script>
		     						alert('Blog Update Success !');
		     						window.location='manage_blog';
		     					</script>";
		     				}
		     			}	     				
		     		}		
		     	}
		     include_once('edit_blog.php');
		     break;
     
     
		     // ======================================EDIT CATEGORIES=======================
     
		     case '/edit_categories':
		     	if(isset($_REQUEST['ecate'])) 
		     	{
		     		$id=$_REQUEST['ecate'];
		     		
		     		$where=array("id"=>$id);
		     		$res=$this->select_where('categories',$where);
		     		$fetch=$res->fetch_object();
		     		
		     		if(isset($_REQUEST['save']))
		     		{
		     			$name = $_REQUEST['name'];
		     			{
		     				// get old_img name
		     				
     
		     				$data = array("name" => $name);
     
		     				$res=$this->update_where('categories',$data,$where);
		     				if($res)
		     				{
		     					echo "<script>
		     						alert('Categories Update Success !');
		     						window.location='manage_categories';
		     					</script>";
		     				}
		     			}		     			
		     		}	
		     	}
		     include_once('edit_categories.php');
		     break;
     
		     // ========================================EDIT PROPERTIES========================
		     		
		     case '/edit_properties':
		     	$categories = $this->select('categories');
		     	if(isset($_REQUEST['epro'])) 
		     	{
		     			$id=$_REQUEST['epro'];
		     			
		     			$where=array("id"=>$id);
		     			$res=$this->select_where('properties',$where);
		     			$fetch=$res->fetch_object();
		     			
		     			if(isset($_REQUEST['save']))
		     			{
		     				$name = $_REQUEST['name'];
		     				$price = $_REQUEST['price'];
		     		    	$title = $_REQUEST['title'];
		     		    	$description = $_REQUEST['description'];
		     				$cat_id = $_REQUEST['cat_id'];
		     				if($_FILES['img']['size']>0)
		     				{
		     					// get old_img name
		     					$old_img=$fetch->img;
		     					
		     					$img=$_FILES['img']['name'];	
		     					$path = 'upload/property/' . $img;
		     					$tmp_file = $_FILES['img']['tmp_name'];
		     					move_uploaded_file($tmp_file, $path);
		     							     	               
		     				 $data = array("name" => $name,"cat_id" => $cat_id,"price" => $price,"title" => $title,"description" => $description ,"img" => $img);
	        
	        					$res=$this->update_where('properties',$data,$where);
	        					if($res)
		    					{
		    						unlink('upload/property/'.$old_img);
		    						echo "<script>
		    							alert('Properties Update Success !');
		    							window.location='manage_properties';
		    						</script>";
		    					}
		    				}
		    				else
		    				{
		    					$data = array("name" => $name,"cat_id" => $cat_id,"price" => $price,"title" => $title,"description" => $description );
		     					$res=$this->update_where('properties',$data,$where);
		     					if($res)
		     					{
		     						echo "<script>
		     							alert('Properties Update Success !');
		     							window.location='manage_properties';
		     						</script>";
		     					}
		     				}
		     			}
		     	}
		     include_once('edit_properties.php');
		     break;
       
		     // ==========================================EDIT SINGLE PROPERTIESE================
     
		     case '/edit_single_property':
		     		$categories = $this->select('categories');
		     		$properties = $this->select('properties');
		     		if(isset($_REQUEST['esingle_pro'])) 
		     		{
		     			$id=$_REQUEST['esingle_pro'];
		     			
		     			$where=array("id"=>$id);
		     			$res=$this->select_where('single_pro',$where);
		     			$fetch=$res->fetch_object();
		     			
		     			if(isset($_REQUEST['save']))
		     			{
		     				$cat_id = $_REQUEST['cat_id'];
		     				$pro_id = $_REQUEST['pro_id'];	
		     				$price = $_REQUEST['price'];
		     				$location = $_REQUEST['location'];
		     				$bedroom = $_REQUEST['bedroom'];
		     				$bathroom	 = $_REQUEST['bathroom'];
		     				$kitchen = $_REQUEST['kitchen'];
		     				$floor = $_REQUEST['floor'];
		     				$parking = $_REQUEST['parking'];
		     				$title = $_REQUEST['title'];
		     				$long_desc = $_REQUEST['long_desc'];
		     				if($_FILES['img']['size']>0)
		     				{
		     					// get old_img name
		     					$old_img=$fetch->img;
		     					
		     					$img=$_FILES['img']['name'];	
		     					$path = 'upload/property/' . $img;
		     					$tmp_file = $_FILES['img']['tmp_name'];
		     					move_uploaded_file($tmp_file, $path);
		     	                
		     					$data = array("cat_id" => $cat_id,"pro_id" => $pro_id,"price" => $price, "location" => $location,"bedroom" => $bedroom,"bathroom" => $bathroom,"kitchen" => $kitchen,"floor" => $floor, "parking" => $parking, "title" => $title, "long_desc" => $long_desc, "img" => $img);
	     
		     					$res=$this->update_where('single_pro',$data,$where);
		     					if($res)
		     					{
		     						unlink('upload/property/'.$old_img);
		     						echo "<script>
		     							alert('Single property Update Success !');
		     							window.location='manage_single_property';
		     						</script>";
		     					}
		     				}
		     				else
		     				{
		     					$data = array("cat_id" => $cat_id,"pro_id" => $pro_id,"price" => $price, "location" => $location,"bedroom" => $bedroom,"bathroom" => $bathroom,"kitchen" => $kitchen,"floor" => $floor, "parking" => $parking, "title" => $title, "long_desc" => $long_desc);
		     					$res=$this->update_where('single_pro',$data,$where);
		     					if($res)
		     					{
		     						echo "<script>
		     							alert('Single property Update Success !');
		     							window.location='manage_single_property';
		     						</script>";
		     					}
		     				}
		     			}
		     		}
		     include_once('edit_single_property.php');
		     break;
     
		     // ============================================EDIT USER===============================
     
		     case '/edit_user':
		     	$state = $this->select('state');
		     						
		     	if(isset($_REQUEST['euser'])) 
		     	{
		     		$id=$_REQUEST['euser'];
		     		
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
		     			if($_FILES['img']['size']>0)
		     			{
		     				// get old_img name
		     				$old_img=$fetch->img;
		     				
		     				$img=$_FILES['img']['name'];	
		     				$path = 'upload/property/' . $img;
		     				$tmp_file = $_FILES['img']['tmp_name'];
		     				move_uploaded_file($tmp_file, $path);
		     				
		     				$data = array("name" => $name,"email" => $email,"mobile" => $mobile, "gender" => $gender, "lag" => $lag, "s_id" => $s_id, "img" => $img);
	    
		    				$res=$this->update_where('user',$data,$where);
		    				if($res)
		    				{
		    					unlink('upload/user/'.$old_img);
		    					echo "<script>
		    						alert('User Update Success !');
		     						window.location='manage_user';
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
		     						window.location='manage_user';
		     					</script>";
		     				}
		     			}
		     		}
		     	}
		     include_once('edit_user.php');
		     break;
     
		     // ============================================EDIT CONTACT===============================
     
		     case '/edit_contact':
		     	if(isset($_REQUEST['econtact'])) 
		     	{
		     		$id=$_REQUEST['econtact'];
		     		
		     		$where=array("id"=>$id);
		     		$res=$this->select_where('contact',$where);
		     		$fetch=$res->fetch_object();
		     		
		     		if(isset($_REQUEST['save']))
		     		{
		     			$name = $_REQUEST['name'];
		     			$email = $_REQUEST['email'];
		     			$comment = $_REQUEST['comment'];
		     			{
		     				// get old_img name
		     				$data = array("name" => $name,"email" => $email,"comment" => $comment);
     
		     				$res=$this->update_where('contact',$data,$where);
		     				if($res)
		     				{
		     					echo "<script>
		     						alert('Contact Update Success !');
		     						window.location='manage_contact';
		     					</script>";
		     				}
		     			}
		     		}
		     	}
		     include_once('edit_contact.php');
		     break;
     
		     // ============================================STATUS========================================
		     		
		     case '/status':
		     	if(isset($_REQUEST['status_user'])) 
		     	{
		     		$id=$_REQUEST['status_user'];
     
		     		$where=array("id"=>$id);
     
		     		// get data 
		     		$resdata=$this->select_where('user',$where);
		     		$fetch=$resdata->fetch_object();
		     		$status=$fetch->status;
		     		if($status=="Block")
		     		{
		     			$data = array("status" => "Unblock");
     
		     			$res=$this->update_where('user',$data,$where);
		     			if($res)
		     			{
		     				echo "<script>
		     					alert('User Unblock Success!');
		     					window.location='manage_user';
		     				</script>";
		     			}
		     		}
		     		else
		     		{
		     			$data = array("status" => "Block");
     
		     			$res=$this->update_where('user',$data,$where);
		     			if($res)
		     			{
		     				unset($_SESSION['uid']);
		     				unset($_SESSION['uname']);
		     				echo "<script>
		     					alert('User Block Success!');
		     					window.location='manage_user';
		     				</script>";
		     			}
		     		}
		     	}

				 if(isset($_REQUEST['status_contact'])) 
		     	{
		     		$id=$_REQUEST['status_contact'];
     
		     		$where=array("id"=>$id);
     
		     		// get data 
		     		$resdata=$this->select_where('contact',$where);
		     		$fetch=$resdata->fetch_object();
		     		$status=$fetch->status;
		     		if($status=="Block")
		     		{
		     			$data = array("status" => "Unblock");
     
		     			$res=$this->update_where('contact',$data,$where);
		     			if($res)
		     			{
		     				echo "<script>
		     					alert('contact Unblock Success!');
		     					window.location='manage_contact';
		     				</script>";
		     			}
		     		}
		     		else
		     		{
		     			$data = array("status" => "Block");
     
		     			$res=$this->update_where('contact',$data,$where);
		     			if($res)
		     			{
		     				
		     				echo "<script>
		     					alert('contact Block Success!');
		     					window.location='manage_contact';
		     				</script>";
		     			}
		     		}
		     	}
		     break;
			 
		     							
		     							
		     // ========================================API==============================
     
		     					
		     // =================GET BLOG===================
		     case '/blog_get':	
		     	 $res=$this->select('blog');
		     	 $count=count($res); // data count
		     	 if($count > 0)
		     	 {	
		     	 	echo json_encode($res);
		     	 }
		     	 else
		     	 {	
		     	 	echo json_encode(array("message" => "No Blog Found.", "status" => false));
		     	 }
		     break;
		     					
		     // ==================POST BLOG=============
		     case '/blog_post':	
		     										
		     	$data_arr = json_decode(file_get_contents("php://input"), true);
		     	$name = $data_arr["name"]; 
		     	$img = $data_arr["img"];
		     	$place = $data_arr["place"];
		     	$description = $data_arr["description"];
		     	
		     	$arr=array("name"=>$name,"img"=>$img,"description"=>$description, "place"=>$place);
		     	
		     	$res=$this->insert('blog',$arr);
		     	if($res or die("Insert Query Failed"))
		     	{
		     		echo json_encode(array("message" => "Blog Inserted Successfully", "status" => true));	
		     	}
		     	else
		     	{
		     		echo json_encode(array("message" => "Failed Blog Not Inserted ", "status" => false));	
		     	}
		     break;
		                  
		     // ====================PATCH BLOG==============
		     case '/blog_patch':	
		     	$data = json_decode(file_get_contents("php://input"), true);
		     
		     	$id = $data["id"];
		     	$name = $data["name"]; 
		     	$img = $data["img"];
		     	$description = $data["description"];
		     	
		     	$arr=array("name"=>$name,"img"=>$img,"description"=>$description);
		     	$where=array("id"=>$id);
		     	
		     	$res=$this->update_where('blog',$arr,$where);
		     	
		     	if($res or die("Update Query Failed"))
		     	{	
		     		echo json_encode(array("message" => "blog Update Successfully", "status" => true));	
		     	}
		     	else
		     	{	
		     		echo json_encode(array("message" => "Failed blog Not Update", "status" => false));	
		     	}
		     break;	
		     
		     // ======================DELETE BLOG===========												
		     case '/blog_delete':	
		     	$data = json_decode(file_get_contents("php://input"), true);
		     	$id = $data["id"];													
				$where=array("id"=>$id);
		     	$res=$this->delete_where('blog',$where);
		     	if($res or die("Delete Query Failed"))
		     	{	
		     		echo json_encode(array("message" => "Blog Delete Successfully", "status" => true));	
		     	}
		     	else
		     	{	
		     		echo json_encode(array("message" => "Failed Blog Not Deleted", "status" => false));	
		     	}
		     break;
	     
		     // ================ GET CONTACT================
		     case '/contact_get':	
		     	$res=$this->select('contact');
		     	$count=count($res); // data count
		     	if($count > 0)
		     	{	
		     		echo json_encode($res);
		     	}
		     	else
		     	{	
		     		echo json_encode(array("message" => "No Contact Found.", "status" => false));
		     	}
		     break;
     
		     // =====================POST CONTACT===============									
		     case '/contact_post':	
		     	$data_arr = json_decode(file_get_contents("php://input"), true);
		     	$name = $data_arr["name"]; 
		     	$email = $data_arr["email"];
		     	$comment = $data_arr["comment"];
		     	$status = $data_arr["status"];
		     	
		     	$arr=array("name"=>$name,"email"=>$email,"comment"=>$comment , "status"=>$status);
		     	
		     	$res=$this->insert('contact',$arr);
		     	if($res or die("Insert Query Failed"))
		     	{
		     		echo json_encode(array("message" => "Contacts Inserted Successfully", "status" => true));	
		     	}
		     	else
		     	{
		     		echo json_encode(array("message" => "Failed Contacts Not Inserted ", "status" => false));	
		     	}
		     break;
     
		     // =====================DELETE CONATACT==============
		     case '/contact_delete':	
		     	$data = json_decode(file_get_contents("php://input"), true);
		     	$id = $data["id"];
		     	$where=array("id"=>$id);
		     	$res=$this->delete_where('contact',$where);
		     	if($res or die("Delete Query Failed"))
		     	{	
		     		echo json_encode(array("message" => "Contacts Delete Successfully", "status" => true));	
		     	}
		     	else
		     	{	
		     		echo json_encode(array("message" => "Failed Contacts Not Deleted", "status" => false));	
		     	}
		     break;
     
		     // ======================PATCH CONTACT===================
		     case '/contact_patch':	
		     	$data = json_decode(file_get_contents("php://input"), true);
		     
		     	$id = $data["id"];
		     	$name = $data["name"]; 
		     	$email = $data["email"];
		     	$comment = $data["comment"];
		     	$status = $data["status"];
		     	
		     	$arr=array("name"=>$name,"email"=>$email,"comment"=>$comment,"status"=>$status);
		     	$where=array("id"=>$id);
		     	
		     	$res=$this->update_where('contact',$arr,$where);
		     	
		     	if($res or die("Update Query Failed"))
		     	{	
		     		echo json_encode(array("message" => "Contacts Update Successfully", "status" => true));	
		     	}
		     	else
		     	{	
		     		echo json_encode(array("message" => "Failed Contacts Not Update", "status" => false));	
		     	}
		     break;			
		     	
		     // =====================GET PROIPERTIES==========================
     
		     case '/properties_get':	
		     	$res=$this->select('properties');
		     	$count=count($res); // data count
		     	if($count > 0)
		     	{	
		     		echo json_encode($res);
		     	}
		     	else
		     	{	
		     		echo json_encode(array("message" => "No properties Found.", "status" => false));
		     	}
		     break;
     
		     // =======================POST PROPERTIES======================		
		     case '/properties_post':			
		     	$data_arr = json_decode(file_get_contents("php://input"), true);
		     	$name = $data_arr["name"]; 
		     	$cat_id = $data_arr["cat_id"]; 
		     	$img = $data_arr["img"];
		     	$price = $data_arr["price"];
		     	$title = $data_arr["title"];
		     	$description = $data_arr["description"];
		     	
		     	$arr=array("name"=>$name,"cat_id"=>$cat_id,"img"=>$img ,"price"=>$price , "title"=>$title ,
				"description"=>$description);
		     	
		     	$res=$this->insert('properties',$arr);
		     	if($res or die("Insert Query Failed"))
		     	{
		     		echo json_encode(array("message" => "properties Inserted Successfully", "status" => true));	
		     	}
		     	else
		     	{
		     		echo json_encode(array("message" => "Failed properties Not Inserted ", "status" => false));	
		     	}
		     break;
     
		     // =======================PATCH PROPERTIES======================
    	     case '/properties_patch':	
		     	$data = json_decode(file_get_contents("php://input"), true);
		     
		     	$id = $data["id"];
		     	$name = $data["name"]; 
		     	$cat_id = $data["cat_id"]; 
		     	$img = $data["img"];
		     	$price = $data["price"];
		     	$title = $data["title"];
		     	$description = $data["description"];
		     	
		     	
		     	$arr=array("name"=>$name,"cat_id"=>$cat_id,"img"=>$img ,"price"=>$price , "title"=>$title ,
				"description"=>$description);
		     	$where=array("id"=>$id);
		     	
		     	$res=$this->update_where('properties',$arr,$where);
		     	
		     	if($res or die("Update Query Failed"))
		     	{	
		     		echo json_encode(array("message" => "properties Update Successfully", "status" => true));	
		     	}
		     	else
		     	{	
		     		echo json_encode(array("message" => "Failed properties Not Update", "status" => false));	
		     	}
		     break;	
     
		     // =======================DELETE  PROPERTIES================
		     case '/properties_delete':	
		     	$data = json_decode(file_get_contents("php://input"), true);
		     	$id = $data["id"];
				
		     	// $id = $_GET['id'];
		     	$where=array("id"=>$id);
		     	$res=$this->delete_where('properties',$where);
		     	if($res or die("Delete Query Failed"))
		     	{	
		     		echo json_encode(array("message" => "properties Delete Successfully", "status" => true));	
		     	}
		     	else
		     	{	
		     		echo json_encode(array("message" => "Failed properties Not Deleted", "status" => false));	
		     	}
		     break;

			  // =====================GET USER==========================
			 case '/user_get':	
				$res=$this->select('user');
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No user Found.", "status" => false));
				}
			 break;
	
			  // =======================POST USER======================		
			 case '/user_post':			
				$data_arr = json_decode(file_get_contents("php://input"), true);
				$name = $data_arr["name"]; 
				$email = $data_arr["email"]; 
				$password = $data_arr["password"];
				$mobile = $data_arr["mobile"];
				$gender = $data_arr["gender"];
				$lag = $data_arr["lag"];
				$s_id = $data_arr["s_id"];
				$img = $data_arr["img"];
				$status = $data_arr["status"];
				
				$arr=array("name"=>$name,"email"=>$email,"password"=>$password ,"mobile"=>$mobile , "gender"=>$gender
				 ,"lag"=>$lag,"s_id"=>$s_id,"img"=>$img,"status"=>$status);
				
				$res=$this->insert('user',$arr);
				if($res or die("Insert Query Failed"))
				{
					echo json_encode(array("message" => "user Inserted Successfully", "status" => true));	
				}
				else
				{
					echo json_encode(array("message" => "Failed user Not Inserted ", "status" => false));	
				}
			 break;
	
			  // =======================PATCH USER======================
			 case '/user_patch':	
				$data = json_decode(file_get_contents("php://input"), true);
		
				$id = $data["id"];
				$name = $data["name"]; 
				$email = $data["email"]; 
				$password =md5($data["password"]);
				$mobile = $data["mobile"];
				$gender = $data["gender"];
				$lag = $data["lag"];
				$s_id = $data["s_id"];
				$img = $data["img"];
				$status = $data["status"];
				
				$arr=array("name"=>$name,"email"=>$email,"password"=>$password ,"mobile"=>$mobile , "gender"=>$gender
				 ,"lag"=>$lag,"s_id"=>$s_id,"img"=>$img,"status"=>$status);
				$where=array("id"=>$id);
				
				$res=$this->update_where('user',$arr,$where);
				
				if($res or die("Update Query Failed"))
				{	
					echo json_encode(array("message" => "user Update Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed user Not Update", "status" => false));	
				}
			 break;	
	
			  // =======================DELETE  USER================
		     case '/user_delete':	
				$data = json_decode(file_get_contents("php://input"), true);
				$id = $data["id"];
				// $id = $_GET['id'];
				$where=array("id"=>$id);
				$res=$this->delete_where('user',$where);
				if($res or die("Delete Query Failed"))
				{	
					echo json_encode(array("message" => "properties Delete Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed properties Not Deleted", "status" => false));	
				}
			 break;

			  // =====================GET SINGLE PROPERTIES==========================
			 case '/single_properties_get':	
				$res=$this->select('single_pro');
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No single properties Found.", "status" => false));
				}
			 break;	
			 
			  // =======================POST SINGLE PROPERTIES======================		
			 case '/single_properties_post':			
				$data_arr = json_decode(file_get_contents("php://input"), true);

				$cat_id = $data_arr["cat_id"]; 
				$pro_id = $data_arr["pro_id"]; 
				$img = $data_arr["img"];
				$price = $data_arr["price"];
				$title = $data_arr["title"];
				$long_desc = $data_arr["long_desc"];
				$location = $data_arr["location"];
				$bedroom = $data_arr["bedroom"];
				$bathroom = $data_arr["bathroom"];
				$kitchen = $data_arr["kitchen"];
				$floor = $data_arr["floor"];
				$parking = $data_arr["parking"];
				
				$arr=array("cat_id"=>$cat_id,"pro_id"=>$pro_id,"img"=>$img ,"price"=>$price , "title"=>$title ,
				"long_desc"=>$long_desc,"location"=>$location,"bedroom"=>$bedroom,"bathroom"=>$bathroom,"kitchen"=>$kitchen,
				"floor"=>$floor,"parking"=>$parking);
				
				$res=$this->insert('single_pro',$arr);
				if($res or die("Insert Query Failed"))
				{
					echo json_encode(array("message" => "single properties Inserted Successfully", "status" => true));	
				}
				else
				{
					echo json_encode(array("message" => "Failed single properties Not Inserted ", "status" => false));	
				}
			 break;
			 
			  // =======================DELETE  SINGLE PRPERTIES================
			  case '/single_properties_delete':	
				$data = json_decode(file_get_contents("php://input"), true);
				$id = $data["id"];
				// $id = $_GET['id'];
				$where=array("id"=>$id);
				$res=$this->delete_where('single_pro',$where);
				if($res or die("Delete Query Failed"))
				{	
					echo json_encode(array("message" => "single properties Delete Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed single properties Not Deleted", "status" => false));	
				}
			 break;

			  // =======================PATCH SINGLE PROPERTIES======================
			 case '/single_properties_patch':	
				$data = json_decode(file_get_contents("php://input"), true);
		
				$id = $data["id"]; 
				$cat_id = $data["cat_id"]; 
				$pro_id = $data["pro_id"]; 
				$img = $data["img"];
				$price = $data["price"];
				$title = $data["title"];
				$long_desc = $data["long_desc"];
				$location = $data["location"];
				$bedroom = $data["bedroom"];
				$bathroom = $data["bathroom"];
				$kitchen = $data["kitchen"];
				$floor = $data["floor"];
				$parking = $data["parking"];
				
				$arr=array("cat_id"=>$cat_id,"pro_id"=>$pro_id,"img"=>$img ,"price"=>$price , "title"=>$title ,
				"long_desc"=>$long_desc,"location"=>$location,"bedroom"=>$bedroom,"bathroom"=>$bathroom,"kitchen"=>$kitchen,
				"floor"=>$floor,"parking"=>$parking);
				$where=array("id"=>$id);
				
				$res=$this->update_where('single_pro',$arr,$where);
				
				if($res or die("Update Query Failed"))
				{	
					echo json_encode(array("message" => "single properties Update Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed single properties Not Update", "status" => false));	
				}
			 break;	

		     // =====================GET PROIPERTIES==========================
     
		     case '/categories_get':	
				$res=$this->select('categories');
				$count=count($res); // data count
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No properties Found.", "status" => false));
				}
		     break;
	
			// =======================POST PROPERTIES======================		
			 case '/categories_post':			
				$data_arr = json_decode(file_get_contents("php://input"), true);

				$name = $data_arr["name"];
				
				$arr=array("name"=>$name);
				
				$res=$this->insert('categories',$arr);
				if($res or die("Insert Query Failed"))
				{
					echo json_encode(array("message" => " categories Inserted Successfully", "status" => true));	
				}
				else
				{
					echo json_encode(array("message" => "Failed  categories Not Inserted ", "status" => false));	
				}
		 	 break;
	
			// =======================PATCH PROPERTIES======================
			 case '/categories_patch':	
				$data = json_decode(file_get_contents("php://input"), true);
			
				$id = $data["id"];
				$name = $data["name"]; 				
				
				$arr=array("name"=>$name);
				$where=array("id"=>$id);
				
				$res=$this->update_where('categories',$arr,$where);
				
				if($res or die("Update Query Failed"))
				{	
					echo json_encode(array("message" => "categories Update Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed categories Not Update", "status" => false));	
				}
		     break;	
	
			// =======================DELETE  PROPERTIES================
			 case '/categories_delete':	
				$data = json_decode(file_get_contents("php://input"), true);
				$id = $data["id"];
				// $id = $_GET['id'];
				$where=array("id"=>$id);
				$res=$this->delete_where('categories',$where);
				if($res or die("Delete Query Failed"))
				{	
					echo json_encode(array("message" => "categories Delete Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed properties Not Deleted", "status" => false));	
				}
			 break;
			
	    	default:
	    	echo "<h1 style='color:red;text-align:center'> Page Not Found </h1>";
	    	break;
			
		}
		
	}
 }
 $obj=new control;

?>