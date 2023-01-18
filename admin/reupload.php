<?php 
if (isset($_POST['submit']) && isset($_FILES['my_video'])) {
	include "../db.php";
    $id = $_POST['place_id'];
    $vname = $_POST['vname'];
    $code = $_POST['pcode'];
    $video_name = $_FILES['my_video']['name'];
    $tmp_name = $_FILES['my_video']['tmp_name'];
    $error = $_FILES['my_video']['error'];

    if ($error === 0) {
    	$video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

    	$video_ex_lc = strtolower($video_ex);

    	$allowed_exs = array("mp4", 'webm', 'avi', 'flv');

    	if (in_array($video_ex_lc, $allowed_exs)) {
    		
    		$new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
    		$video_upload_path = '../videos/'.$new_video_name;
    		move_uploaded_file($tmp_name, $video_upload_path);

    		// Now let's Insert the video path into database
            $sql = "UPDATE `videos` SET `vname`='$vname',`video`='$new_video_name',`pcode`='$code' WHERE vid='$id'";
            mysqli_query($con, $sql);
            header("Location: manage_videos.php");
    	}else {
			echo "<script>alert('video is not uploaded successfully..!'); window.location='index.php'</script>";
    	}
    }
}
else{
	header("Location: index.php");
}
?>