<?php
    session_start();
    include "db.php";
    if(isset($_GET['del'])){
        $id=$_GET['del'];
        mysqli_query($con,"DELETE FROM bookings WHERE boo_id = '$id'");

        echo "<script> location.href='index.php'; </script>";
        exit();
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
    <div class="book_container">
        <div class="close">
            <span class="close-modal"><a href="index.php"><i class="far fa-window-close"></i></a></span>
        </div>
        <div class="box-container">
            <div class="content-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Location</th>
                            <th>Member</th>
                            <th>Arrival</th>
                            <th>Leaving</th>
                            <th>price</th>
                            <th>Package type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                        include "db.php";
                        $id = $_SESSION['id'];
                        $bsql = "SELECT * FROM `bookings` WHERE cid=$id";
                        $bresult = mysqli_query($con,$bsql);
                        if(mysqli_num_rows($bresult) > 0){
                            while($bdata = mysqli_fetch_array($bresult)){?>                            
                    <tbody>
                        <tr>
                            <td><?php echo $bdata['boo_id']; ?></td>
                            <td><?php echo $bdata['blocation']; ?></td>
                            <td><?php echo $bdata['no_of_member']; ?></td>
                            <td><?php echo $bdata['arrival_date']; ?></td>
                            <td><?php echo $bdata['leaving_date']; ?></td>
                            <td><?php echo $bdata['b_cost']; ?></td>
                            <td><?php echo $bdata['b_type']; ?></td>
                            <td><a href="booking_details.php?del=<?php echo $bdata["boo_id"];?>" onclick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    </tbody>
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>