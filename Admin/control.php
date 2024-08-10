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
				if (isset($_REQUEST['submit'])) {
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
				if (isset($_REQUEST['submit'])) {
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
				if (isset($_REQUEST['submit'])) {
					$cat_id = $_REQUEST['cat_id'];
					$pro_id = $_REQUEST['pro_id'];
					$img = $_FILES['img']['name'];
					// image upload in project folder
					$path = '../Admin/upload/property/' . $img;
					$tmp_file = $_FILES['img']['tmp_name'];
					move_uploaded_file($tmp_file, $path);

					$title = $_REQUEST['title'];
					$long_desc = $_REQUEST['long_desc'];

					$data = array("cat_id" => $cat_id, "img" => $img, "pro_id" => $pro_id, "title" => $title, "long_desc" => $long_desc);

					$res=$this->insert('single_pro',$data);
					if($res)
					{
						echo "<script>
							alert('Properties Success !');
						</script>";
					}
					else{
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
				if (isset($_REQUEST['submit'])) {
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
					else{
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
												break;
									

			default:
			echo "<h1 style='color:red;text-align:center'> Page Not Found </h1>";
			break;
			
		}
		
	}
}
$obj=new control;

?>