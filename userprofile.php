<?php 
    session_start();
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
    <div class="user_container">
        <div class="close">
            <span class="close-modal" ><a href="index.php"><i class="far fa-window-close"></i></a></span>
        </div>
        <div class="box-container">
            <div class="box">
            <?php
                include "db.php";
                $uid = $_SESSION['id'];
                $usql = "SELECT * FROM user_details WHERE c_id=$uid";
                $uquery = mysqli_query($con,$usql);
                $udata = mysqli_fetch_array($uquery); ?>
                <div class="image"  style="display: inline-block;">
                    <?php echo "<img src='images/".$udata['c_photo']."'>";?>
                </div>
                <div class="content">
                    <h3>My Details</h3>
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><?php echo $udata['fname'];?> <?php echo $udata['lname'];?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $udata['c_address'];?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><?php echo $udata['city'];?></td>
                        </tr>
                        <tr>
                            <td>Mobile NO</td>
                            <td><?php echo $udata['c_mobile'];?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $udata['c_email'];?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>