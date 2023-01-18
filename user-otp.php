<?php 
    require_once "controluserdata.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* OTP stylesheet starts */
.ocontainer{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.ocontainer .text-center{
    text-align: center;
    color: #30637c;
}
.ocontainer .form{
    width: 400px;
    background: #fff;
    padding: 30px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.ocontainer .form form .form-group{
    padding: 15px;
}
.ocontainer .form form .form-control{
    height: 40px;
    width: 300px;
    font-size: 15px;
    color: #30637c;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}
.ocontainer .form form input[type="submit"]{
    color: #fff;
    padding: 0;
}
.ocontainer .row .alert{
    font-size: 14px;
}
/* OTP stylesheet ends */
    </style>
</head>
<body>
    <div class="ocontainer">
        <div class="row">
            <div class="form">
                <form action="user-otp.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter OTP code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="submit" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>