<?php
	include "../db.php";
	if (isset($_POST["save"])) {
        // image file directory
        $target = "C:/xampp/htdocs/tms/admin/img/".basename($_FILES['Image']['name']);

        //connect to the database
        $con = mysqli_connect("localhost","root","","ttms");
  	    $image = $_FILES['Image']['name'];
		$name = $_POST["name"];
		$email = $_POST["mail"];
		$password = md5($_POST["pass"]);
		$mobile = $_POST["contact"];
		$address = $_POST["address"];
		$nam = "/^[a-zA-Z ]+$/";
		$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
		$number = "/^[0-9]+$/";
        move_uploaded_file($_FILES['Image']['tmp_name'], $target);

		if(empty($name) || empty($email) || empty($password) || empty($mobile) || empty($address) ){
				echo "<script>alert('PLease Fill all fields..!')</script>";
				echo "<script> location.href='index.php'; </script>";
				exit();
		} 
		else {
			if(!preg_match($nam,$name)){
			echo "<script>alert('this $f_name is not valid..!')</script>";
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
			
			$sql = "UPDATE `admin_details` SET `name`='$name',`email`='$email',`password`='$password', `a_photo`='$image', `address`='$address',`contact`='$mobile' WHERE id=1";

			$run_query = mysqli_query($con,$sql);
			if($run_query){
				echo "<script>alert('Your profile is successfully updated...!')</script>";
				echo "<script> location.href='index.php'; </script>";
		        exit;
			}
		}
        echo "<script>alert('Your profile is failed to update...!')</script>";
        echo "<script> location.href='index.php'; </script>";
	}
?>