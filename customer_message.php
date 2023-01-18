<?php
include 'db.php';
    //if user click submit button
    if(isset($_POST['contact'])){
        $subject = mysqli_real_escape_string($con, $_POST['cname']);
        $email = mysqli_real_escape_string($con, $_POST['cemail']);
        $message = mysqli_real_escape_string($con, $_POST['message']);
     //   $sender = "From: aashishwosti1@gmail.com";
       // if(mail($email, $subject, $message, $sender)){
        $sql = "INSERT INTO contactus (name, email, message) 
        VALUES ('$subject','$email','$message')";

$run_query = mysqli_query($con,$sql);
           
            header("location: index.php");
            exit();
        }
        else{
            echo "Failed while sending message!";
        }
    
?>