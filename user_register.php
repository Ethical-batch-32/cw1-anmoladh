<?php
	include "db.php";
	if (isset($_POST["save"])) {
        // image file directory
        $target = "C:/xampp/htdocs/Tour_&_travel_management_system/images/".basename($_FILES['Image']['name']);

        //connect to the database
        $con = mysqli_connect("localhost","root","","ttms");
  	    $image = $_FILES['Image']['name'];
		$f_name = $_POST["fname"];
		$l_name = $_POST["lname"];
		$u_name = $_POST["uname"];
		$email = $_POST["mail"];
		$password = $_POST["pass"];
		$repassword = $_POST["cpass"];
		$mobile = $_POST["contact"];
		$address = $_POST["addr"];
		$city = $_POST["city"];
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

			$sql = "INSERT INTO `user_details`(`username`, `c_email`, `pswd`, `c_address`, `c_mobile`, `c_photo`, `fname`, `lname`, `city`, `c_pswd`) 
                    VALUES ('$u_name','$email','$password','$address','$mobile','$image','$f_name','$l_name','$city','$repassword')";

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