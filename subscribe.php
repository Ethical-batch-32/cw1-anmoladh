<?php
include "db.php";
// if user click subscribe button
if(isset($_POST['subscribe'])){
    $semail = $_POST['semail'];
    $ssql = "INSERT INTO `subscribers` (`email`) VALUES ('$semail')";
    $srun = mysqli_query($con,$ssql);
    if($srun){
        echo "<script>alert('you have subscribed successfully...')</script>";
        echo "<script> location.href='index.php'; </script>";			
    }
    else{
        echo "<script>alert('subscribe is not done!')</script>";
        echo "<script> location.href='index.php'; </script>";			

    }
}
?>