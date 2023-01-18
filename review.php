<?php
    include "db.php";
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['mail'];
        $review = $_POST['review'];
        $rate = $_POST['rating'];
        $date = $_POST['revdate'];

        $sql = "INSERT INTO reviews (`review_id`, `name`, `email_id`, `review`, `rating`, `rdate`) VALUES (NULL, '$name', '$email' ,'$review', '$rate', '$date')";
        $query_run = mysqli_query($con,$sql);
        if ($query_run){
            echo '<script type="text/javascript">alert("Your review is uploaded successfully...")</script>';
            echo "<script>window.location.href='index.php'</script>";
            }
          else{
            die("failed to upload review ".mysqli_error($con));
            }
          }
?>