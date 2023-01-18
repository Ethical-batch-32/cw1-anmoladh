<?php
	include "db.php";
	if (isset($_POST["save"])) {
        // image file directory
        $target = "C:/xampp/htdocs/tms/images/".basename($_FILES['Image']['name']);

        //connect to the database
        $con = mysqli_connect("localhost","root","","ttms");
  	    $image = $_FILES['Image']['name'];
		$f_name = $_POST["fname"];
		$l_name = $_POST["lname"];
		$u_name = $_POST["uname"];
		$email = $_POST["mail"];
		$password = md5($_POST["pass"]);
		$repassword = md5($_POST["cpass"]);
		$mobile = $_POST["contact"];
		$address = $_POST["addr"];
		$city = $_POST["city"];
		$id = $_SESSION['id'];
		$name = "/^[a-zA-Z ]+$/";
		$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
		$number = "/^[0-9]+$/";
        move_uploaded_file($_FILES['Image']['tmp_name'], $target);

		if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
			empty($mobile) || empty($address) || empty($city)){
				echo "<script>alert('PLease Fill all fields..!')</script>";
				echo "<script> location.href='index.php'; </script>";
				exit();
		} 
		else {
			if(!preg_match($name,$f_name)){
			echo "<script>alert('this $f_name is not valid..!')</script>";
			echo "<script> location.href='index.php'; </script>";
			exit();
			}
			if(!preg_match($name,$l_name)){
				echo "<script>alert('this $l_name is not valid..!')</script>";
				echo "<script> location.href='index.php'; </script>";
				exit();
			}
			if(!preg_match($emailValidation,$email)){
				echo "<script>alert('this $email is not valid..!')</script>";
				echo "<script> location.href='index.php'; </script>";
				exit();
			}
			if(strlen($password) < 8 ){
				echo "<script>alert('Password is weak')</script>";
				echo "<script> location.href='index.php'; </script>";
				exit();
			}
			if(strlen($repassword) < 8 ){
				echo "<script>alert('Password is weak')</script>";
				echo "<script> location.href='index.php'; </script>";
				exit();
			}
			if($password != $repassword){
				echo "<script>alert('password is not same')</script>";
				echo "<script> location.href='index.php'; </script>";
				exit();
			}
			if(!preg_match($number,$mobile)){
				echo "<script>alert('Mobile number $mobile is not valid')</script>";
				echo "<script> location.href='index.php'; </script>";
				exit();
			}
			if(!(strlen($mobile) == 10)){
				echo "<script>alert('Mobile number must be 10 digit')</script>";
				echo "<script> location.href='index.php'; </script>";
				exit();
			}
			//existing email address in our database
			$sql = "SELECT c_id FROM user_details WHERE c_email = '$email' LIMIT 1" ;
			$check_query = mysqli_query($con,$sql);
			$count_email = mysqli_num_rows($check_query);
			if($count_email > 0){
				echo "<script>alert('Email Address is already available Try Another email address')</script>";
				echo "<script> location.href='index.php'; </script>";
				exit();
			} 
			else {
			
				$sql = "UPDATE `user_details` SET `username`='$u_name',`c_email`='$email',`pswd`='$password',`c_address`='$address',`c_mobile`='$mobile',`c_photo`='$image',`fname`='$f_name',`lname`='$l_name',`city`='$city',`c_pswd`='$repassword' WHERE c_id=$id";
	
				$run_query = mysqli_query($con,$sql);
				if($run_query){
					echo "<script>alert('Your profile is successfully updated...!')</script>";
					echo "<script> location.href='index.php'; </script>";
		            exit;
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- stylesheet link -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- font awesome cdn file link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<div class="body" style="width:100%;height:100vh;background-image:url('images/bgg.jpg');">
	<div class="reg_container">
	    <div class="close">
			<span class="close-modal" ><a href="index.php"><i class="far fa-window-close"></i></a></span>
	    </div>
		<div class="reg_center" style="margin-bottom:20px;">
		    <h1>Edit profile</h1>
		    <form name="form" method="post" action="" enctype="multipart/form-data" id="uploadForm">
				<div class="pro-image">
					<img src="images/img.jpg" alt="" onclick="triggerClick()" id="imagedisplay">
					<input type="file" name="Image" id="file" onchange="filePreview(this)" style="display: none;" required>
				</div>
				<div class="user_details">
					<div class="txt_field">
		    			<input type="text" name="fname" id="">
		    			<span></span>
		    			<label>First Name</label>
					</div>
					<div class="txt_field">
						<input type="text" name="lname" id="">
		    			<span></span>
		    			<label>Last Name</label>
					</div>
					<div class="txt_field">
		    			<input type="text" name="uname" id="">
		    			<span></span>
		    			<label>Username</label>
					</div>
					<div class="txt_field">
		    			<input type="email" name="mail" id="">
		    			<span></span>
		    			<label>Email</label>
					</div>
					<div class="txt_field">
		    			<input type="password" name="pass" id="">
		    			<span></span>
		    			<label>Password</label>
					</div>
					<div class="txt_field">
						<input type="password" name="cpass" id="">
		    			<span></span>
		    			<label>Confirm Password</label>
					</div>
					<div class="txt_field">
		    			<input type="text" name="addr" id="">
		    			<span></span>
		    			<label>Address</label>
					</div>
					<div class="txt_field">
		    			<input type="text" name="city" id="">
		    			<span></span>
		    			<label>City</label>
					</div>
					<div class="txt_field">
						<input type="text" name="contact" id="">
		    			<span></span>
		    			<label>Contact No.</label>
					</div>
				</div>
		    	<input type="submit" value="Save" name="save" style="margin-bottom:20px; margin-top:20px;">
		    </form>
		</div>
	</div>
</div>
<script src="js/scripts.js"></script>
</body>
</html>