<?php
    session_start();
    include "db.php";
    if(isset($_GET['update'])){
        $uid = $_GET['update'];
        $suc = 'completed';
        $ssql = "UPDATE `bookings` SET `payment-status`='$suc' WHERE cid='$uid'";
        $success = mysqli_query($con, $ssql);

        if ($success){
            echo "<script>window.location.href='index.php'</script>";
        }
        else{
            echo '<script type="text/javascript">alert("failed to update...")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>

    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<main id="cart-main">
    <div class="site-title text-center">
        <?php
        include "db.php";
        $id = $_SESSION['id'];
        $bsql = "SELECT * FROM `bookings` WHERE cid=$id";
        $bresult = mysqli_query($con,$bsql);
        $bdata = mysqli_fetch_array($bresult)?>                            
        <div><img src="assets/checked.png" alt="" style="width:250px; height:250px;"></div>
        <h1 class="font-title">Payment Done Successfully...!</h1>
        <a href="success.php?update=<?php echo $bdata["cid"];?>" class="btn-link" name="ok">Back to Home page</a>
    </div>
</main>
</body>
</html>