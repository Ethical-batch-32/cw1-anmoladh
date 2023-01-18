<?php 
	session_start();
    $id = $_SESSION["id"];
	include "db.php";
	if(isset($_POST['edit_password']))
		{
		 	$old_pass = md5($_POST['old_pass']);
			$new_pass = md5($_POST['new_pass']);
			$re_pass = md5($_POST['re_pass']);
			$chg_pwd = mysqli_query($con,"SELECT * FROM user_details WHERE c_id=$id");
			$chg_pwd1 = mysqli_fetch_array($chg_pwd);
			$data_pwd = $chg_pwd1['pswd'];
			if($data_pwd==$old_pass)
				{
					if($new_pass==$re_pass)
						{
							$update_pwd=mysqli_query($con,"UPDATE user_details set pswd='$new_pass' where c_id='$id'");
							echo "<script>alert('Password Update Sucessfully'); window.location='index.php'</script>";
						}
					else
						{
							echo "<script>alert('Your new and Retype Password is not match'); window.location='index.php'</script>";
						}
				}
			else
				{
					echo "<script>alert('Your old password is wrong'); window.location='index.php'</script>";
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
	<div class="modal-content">
	    <div class="close">
			<span class="close-modal" ><a href="index.php"><i class="far fa-window-close"></i></a></span>
	    </div>
	    <div class="center" style="margin-bottom: 30px;">
	        <h1>Change Password</h1>
	        <form action="" method="POST">
	            <div class="txt_field">
	                <input type="text" name="old_pass" id=""  required>
	                <span></span>
	                <label>Old Password</label>
	            </div>
	            <div class="txt_field">
	                <input type="password" name="new_pass" id="" required>
	                <span></span>
	                <label>New password</label>
	            </div>
	            <div class="txt_field">
	                <input type="password" name="re_pass" id="" required>
	                <span></span>
	                <label>confirm new password</label>
	            </div>
	            <input type="submit" name="edit_password" value="Update Password" style="margin-bottom: 30px;">
	        </form>
	    </div>
	</div>
</div>
</body>
</html>