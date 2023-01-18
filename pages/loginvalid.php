<?php 
	include "db.php";
	session_start();

	#Login script is begin here
	#If user given credential matches successfully with the data available in database then we will echo string login_success
	#login_success string will go back to called Anonymous funtion $("#login").click() 

	if(isset($_POST["email"]) && isset($_POST["password"])){
		$email = mysqli_real_escape_string($con,$_POST["email"]);
		$pass =	$_POST["password"];
		$sql = "SELECT * FROM user_details WHERE c_email = '$email' AND pswd = '$pass'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		//we have created a cookie in login_form.php page so if that cookie is available means user is not login
        
	  	//if user record is available in database then $count will be equal to 1
		if($count == 1){
			while($row = mysqli_fetch_assoc($run_query)){
				if(password_verify($pass, $row['pswd'])){
					$_SESSION["id"] = $row["c_id"];
					$_SESSION["name"] = $row["username"];
					$_SESSION["email"] = $row["c_email"];
					$ip_add = getenv("REMOTE_ADDR");
						
					echo "<script> location.href='index.php'; </script>";
					exit();
				}
			}
		}
		else{
            $email = mysqli_real_escape_string($con,$_POST["email"]);
			$pass =	$_POST["password"];
			$sql = "SELECT * FROM admin_details WHERE `email` = '$email' AND `password` = '$pass'";
            $run_query = mysqli_query($con,$sql);
            $count = mysqli_num_rows($run_query);

            //if user record is available in database then $count will be equal to 1
            if($count == 1){
				while($row = mysqli_fetch_assoc($run_query)){
					if(password_verify($pass, $row['password'])){
						$_SESSION["id"] = $row["id"];
						$_SESSION["name"] = $row["name"];
						$_SESSION["email"] = $row["email"];
						$ip_add = getenv("REMOTE_ADDR");
							
						echo "<script> location.href='admin/index.php'; </script>";
						exit();
					}
				}
			}
			else{
                echo "<script>alert('PLease register before login..!')</script>";
				echo "<script> location.href='index.php'; </script>";
                exit();
            }
		}
	}
?>
