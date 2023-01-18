<?php
	session_start();
	include "db.php";
	if (isset($_POST['register'])) {
        // image file directory
        $target = "C:/xampp/htdocs/tms/images/".basename($_FILES['Image']['name']);

        //connect to the database
        $con = mysqli_connect("localhost","root","","ttms");
  	    $image = $_FILES['Image']['name'];
		$f_name = $_POST["fname"];
		$l_name = $_POST["lname"];
		$u_name = $_POST["uname"];
		$email = $_POST["mail"];
		$pass = md5($_POST["pass"]);
		$repass = md5($_POST["cpass"]);
		$mobile = $_POST["contact"];
		$address = $_POST["addr"];
		$city = $_POST["city"];
		$name = "/^[a-zA-Z ]+$/";
		$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
		$number = "/^[0-9]+$/";
        move_uploaded_file($_FILES['Image']['tmp_name'], $target);

	if(empty($f_name) || empty($l_name) || empty($email) || empty($pass) || empty($repass) ||
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
		// if(strlen($password) < 8 ){
		// 	echo "<script>alert('Password is weak')</script>";
		// 	echo "<script> location.href='index.php'; </script>";
		// 	exit();
		// }
		// if(strlen($repassword) < 8 ){
		// 	echo "<script>alert('Password is weak')</script>";
		// 	echo "<script> location.href='index.php'; </script>";
		// 	exit();
		// }
		// if($pass != $repass){
		// 	echo "<script>alert('password is not same')</script>";
		// 	echo "<script> location.href='index.php'; </script>";
		// 	exit();
		// }
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

			$sql = "INSERT INTO `user_details`(`username`, `c_email`, `pswd`, `c_address`, `c_mobile`, `c_photo`, `fname`, `lname`, `city`, `c_pswd`) 
                    VALUES ('$u_name','$email','$pass','$address','$mobile','$image','$f_name','$l_name','$city','$repass')";

			$run_query = mysqli_query($con,$sql);
			if($run_query){
				echo "<script>alert('Register success...!')</script>";
				echo "<script> location.href='index.php'; </script>";
	            exit;
			}
		}
	}
	}
?>
<div class="reg_container">
    <div class="close">
        <span class="close-modal" ><i class="far fa-window-close"></i></span>
    </div>
	<div class="reg_center">
	    <h1>Register here</h1>
	    <form name="form" method="post" action="register.php" enctype="multipart/form-data" id="uploadForm">
			<div class="pro-image">
				<img src="images/img.jpg" alt="" onclick="triggerClick()" id="imagedisplay">
				<input type="file" name="Image" id="file" onchange="filePreview(this)" style="display: none;" required>
			</div>
			<div class="user_details">
				<div class="txt_field">
	    			<input type="text" name="fname">
	    			<span></span>
	    			<label>First Name</label>
				</div>
				<div class="txt_field">
					<input type="text" name="lname">
	    			<span></span>
	    			<label>Last Name</label>
				</div>
				<div class="txt_field">
	    			<input type="text" name="uname">
	    			<span></span>
	    			<label>Username</label>
				</div>
				<div class="txt_field">
	    			<input type="email" name="mail">
	    			<span></span>
	    			<label>Email</label>
				</div>
				<div class="txt_field">
	    			<input type="password" name="pass">
	    			<span></span>
	    			<label>Password</label>
				</div>
				<div class="txt_field">
					<input type="password" name="cpass">
	    			<span></span>
	    			<label>Confirm Password</label>
				</div>
				<div class="txt_field">
	    			<input type="text" name="addr">
	    			<span></span>
	    			<label>Address</label>
				</div>
				<div class="txt_field">
	    			<input type="text" name="city">
	    			<span></span>
	    			<label>City</label>
				</div>
				<div class="txt_field">
					<input type="text" name="contact">
	    			<span></span>
	    			<label>Contact No.</label>
				</div>
			</div>
	    	<input type="submit" value="register" name="register" style="margin-top: 15px;">
	    	<div class="signup_link">
	    		Already have an account? <a class="modal-openn" data-modal="login" id="signup" style="color: #30637c;">Sign in</a>
	    	</div>
	    </form>
	</div>
</div>