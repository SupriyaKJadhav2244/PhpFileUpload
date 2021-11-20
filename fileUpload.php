<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>
<body>
	<form action="fileUpload.php" method="post" enctype="multipart/form-data">  
    Select File:  
	    <input type="file" name="fileToUpload"/><br><br>  
	    <input type="submit" value="Upload File" name="Upload"/>    
</form>  
</body>
</html>

<?php
	if (isset($_POST['Upload'])) {

		$target_path = "C:/xampp/htdocs/PHP/UploadedFiles/";              //Set Target Path Of File

		if ($_FILES['fileToUpload']['size'] < 250880) {                   //Check File Size 

			$filetype = $_FILES["fileToUpload"]["type"];                  //Check File Type
			   $fileextensions = ["pdf"];
				$arr = explode(".",$_FILES['fileToUpload']['name']);
			   $ext = strtolower(end($arr)); 
			   $uploadpath = $target_path.basename($_FILES['fileToUpload']['name']);

			if (in_array($ext,$fileextensions)) {                          //Check File Type is PDF Or Not

				
				$target_path = $target_path.basename($_FILES['fileToUpload']['name']);
				// echo $target_path;
				$temp_name = $_FILES["fileToUpload"]["tmp_name"];
				// echo $temp_name;

				if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {    //Move Uploaded File to specific Path
			    	echo "File uploaded successfully!";  
				} else{  
			    	echo "Sorry, file not uploaded, please try again!";  
				} 
			} else{  
		    	echo "You file extension must be .pdf";	
		      }
	    } else{  
		    	echo "Sorry, file not uploaded, please upload 20KB data!"; 	
		      }	

	}
?>
