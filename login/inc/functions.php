<?php 
	include_once('connection.php');
	databaseConnection();
	include_once('./index.php');	
	function insertData(){
		global $conn;
		global $msg;
		if(isset($_POST['submit'])){
			$fname =  $_POST['fname'];
			$lname =  $_POST['lname'];
			$email = $_POST['email'];
			$pass =  $_POST['pass'];
			$conpass =  $_POST['conpass'];
			$gender = $_POST['gender'];
			$img_name= $_FILES['image']['name'];
			$img_name_array = explode('.',$img_name);
			$ext = end(	$img_name_array);
			$img_final_name = time().md5($img_name).".".$ext;
			$img_temp_name = $_FILES['image']['tmp_name'];
			move_uploaded_file($img_temp_name, 'images/'.$img_final_name);
			if(empty($fname)|| empty($lname) || empty($email) || empty($pass) || empty($conpass)|| empty($gender)){
				echo "All fields must be required";
			}
			elseif ($pass != $conpass) {
				echo "please confirm password";
			}
			elseif(in_array($ext, ['jpg','png','jpeg','gif'])==false){
				echo "image is invalid";
			}
			else{
				$conn->query("insert into reg_info(fname,lname,email,pass,gender,image)values('$fname','$lname','$email','$pass','$gender','$img_final_name')");
				$msg = "Data is inserted successfully";
			}
		}
	}
	



?>