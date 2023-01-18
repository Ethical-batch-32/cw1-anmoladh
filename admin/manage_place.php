<?php
    include "../db.php";
    if(isset($_GET['del'])){
        $id=$_GET['del'];
        mysqli_query($con,"DELETE FROM place_details WHERE p_id = '$id'");
    }    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <title>Sidebar menu responsive</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header-toggle">
                <i class="fas fa-bars" id="header-toggle"></i>
            </div>
            <div class="action">
            <?php include "../db.php";
                    $sql = "SELECT a_photo FROM admin_details WHERE id=1";
                    $query = mysqli_query($con,$sql);
                    $row=mysqli_fetch_array($query); ?>
                <div class="profile"  onClick="menuToggle();">
                    <?php echo "<img src='img/".$row['a_photo']."'>";?>
                </div>
                <div class="menu">
                    <span>Admin</span>
                    <ul>
                        <li><a href="adminprofile.php"><i class="fas fa-id-card"></i> My profile</a></li>
                        <li><a href="pchange.php"><i class="fas fa-key"></i> Change password</a></li>
                        <li><a href="editp.php"><i class="fas fa-user-edit"></i> Edit profile</a></li>
                        <li><a href="logout.php"><i class="fas fa-sign-out-alt"> </i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a class="nav-logo">
                        <img src="../images/logo.jpg" alt="">
                        <span class="nav-logo-name">TTMS</span>
                    </a>
                    <div class="nav-list">
                        <a href="index.php" class="nav-link active">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="nav-name">Dashboard</span>
                        </a>

                        <a href="manage_customer.php" class="nav-link">
                            <i class="fas fa-users-cog"></i>
                            <span class="nav-name">Manage Customer</span>
                        </a>
                        <a href="manage_place.php" class="nav-link">
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="nav-name">Manage Place</span>
                        </a>
                        <a href="manage_gallery.php" class="nav-link">
                            <i class="far fa-image"></i>
                            <span class="nav-name">Manage Gallery</span>
                        </a>
                        <a href="manage_videos.php" class="nav-link">
                            <i class="fas fa-video"></i>
                            <span class="nav-name">Manage video</span>
                        </a>
                        
                        <a href="#" class="nav-link">
                            <i class="fas fa-bus"></i>
                            <span class="nav-name">Manage transport</span>
                        </a>

                        <a href="#" class="nav-link">
                            <i class="fas fa-h-square"></i>
                            <span class="nav-name">Manage hotel</span>
                        </a>

                        <a href="manage_booking.php" class="nav-link">
                            <i class="fas fa-book-reader"></i>
                            <span class="nav-name">Manage booking</span>
                        </a>

                        <a href="#" class="nav-link">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="nav-name">Manage billing</span>
                        </a>
                        <a href="feedback.php" class="nav-link">
                            <i class="far fa-comments"></i>
                            <span class="nav-name">Feedbacks</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="customer-list">
        <div class="list-header">
            <h3>Place Details <a href="add_place.php">Add Place</a></h3>
            
        </div>
        <table class="plist">
            <thead class="heading">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th style="width:600px; text-align:left;">Description</th>
                    <th>Images</th>
                    <th>Province</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="body">
            <?php
                //pagination
                include "../func.php";
                $page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
                $limit = 15; //if you want to dispaly 5 records per page then you have to change here
                $startpoint = ($page * $limit) - $limit;
                $statement = "place_details ORDER BY p_id asc"; //you have to pass your query over here
                $res = mysqli_query($con,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");

                while($data=mysqli_fetch_array($res))
                    {?>
                    <tr>
                        <td><?php echo $data['p_id'];?></td>
                        <td><?php echo $data['pname'];?></td>
                        <td><?php echo $data['pdesc'];?></td>
                        <td><?php echo "<img src='../images/".$data['pimages']."'>";?></td>
                        <td><?php echo $data['province_key'];?></td>
                        <td>
                            <a href="edit_place.php?p_id=<?php echo $data["p_id"];?>"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="manage_place.php?del=<?php echo $data["p_id"];?>" onclick="return confirm('Are you sure?');"><i class="fas fa-times-circle"></i></a>
                        </td>
                    </tr>
                <?php } ?>        
            </tbody>
        </table>
        <?php
        echo '<div id="pagingg">';
        echo pagination($statement,$limit,$page);
        echo '</div>';?>
        </div>
        <!-- Footer section starts --> 
        <div class="footer">
            <div class="foot">
                <div class="credit">&copy; 2021 - <script>const d = new Date();document.write(d.getFullYear());</script> | Created by Hari Bahadur Lama | all rights reserved!</div>
            </div>
        </div>
        <!-- footer section ends -->
        <!--===== MAIN JS =====-->
        <script src="js/main.js"></script>
    </body>
</html>