
function reg_form(str)
{
	//required
	if(str.name.value=="")
	{
	document.getElementById("msg1").innerHTML="! Please enter Some Value in User Name";
	str.name.focus();
	return false;
	}
			
	// alpha		
	if(!str.name.value.match(/^[a-zA-Z]{1,}$/))
	{
	document.getElementById("msg1").innerHTML="! Please enter Only Character Value";
	str.name.focus();
	return false;
	}
	
	
	if(str.place.value=="")
	{
	document.getElementById("msg1").innerHTML="! Please enter Some Value in Password";
	str.place.focus();
	return false;
	}
	
	
	if(str.place.value.length<8)
	{
	document.getElementById("msg1").innerHTML="! Please enter minimum 8 digit length";
	str.place.focus();
	return false;
	}
	

	
	if(str.description.value=="")
	{
	document.getElementById("msg1").innerHTML="! Please Enter Some Value in Address";
	str.description.focus();
	return false;
	}
	
	
	if(str.img.value=="")
	{
	document.getElementById("msg1").innerHTML="! Please Upload Photo";
	str.img.focus();
	return false;
	}
	
	var image = document.getElementById("img");
    var img_size_mb = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2); 
     if(img_size_mb > 2) 
	 {
		 document.getElementById("msg1").innerHTML="! Please select image size less than 2 MB ";
		 str.img.focus();
		 return false;
     }
	
	
	
	
	
	
}
	
	
	
	
	
	
	
	
	//below function is for image validation
	function check(file)
	{
	
	var filename=file.value;
	var ext=filename.substring(filename.lastIndexOf('.')+1);
		if(ext=="jpg" || ext=="png" || ext=="jpeg" || ext=="gif" || ext=="JPG" || 
		ext=="PNG" || ext=="JPEG" || ext=="GIF")
		{
		document.getElementById("msg1").innerHTML="";
		document.getElementById("submit").disabled=false;
		}
		else
		{
		document.getElementById("msg1").innerHTML="! Please upload only JPG , GIF , JPEG File";
		document.getElementById("submit").disabled=true;
		}
	} 
	
	
	
	function check1(file)
	{
	
	var filename=file.value;
	var ext=filename.substring(filename.lastIndexOf('.')+1);
		if(ext=="pdf" || ext=="PDF")
		{
		document.getElementById("msg1").innerHTML="";
		document.getElementById("submit").disabled=false;
		}
		else
		{
		document.getElementById("msg1").innerHTML="! Please upload only PDF File";
		document.getElementById("submit").disabled=true;
		}
	} 