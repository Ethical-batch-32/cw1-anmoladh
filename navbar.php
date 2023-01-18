<!-- nav-bar starts -->
<div class="togglearea">
    <label for="toggle">
        <span></span>
        <span></span>
        <span></span>
    </label>
</div>
<input type="checkbox" name="" id="toggle">
<div class="nav-bar">
    <img src="images/logo.jpg" alt="">
    <a href="#home"><i class="fas fa-home"></i> Home</a>
    <a href="#place"><i class="fas fa-map-marker-alt"></i> Places</a>
    <a href="#aboutus"><i class="fas fa-address-card"></i> About us</a>
    <a href="#gallery"><i class="fas fa-images"></i> Gallery</a>
    <a href="#review"><i class="fas fa-comments"></i> Reviews</a>
    <a href="#contact"><i class="far fa-envelope"></i> Contact</a>
    <ul class="header-links pull-right">
		<li><?php include "db.php";
            if(isset($_SESSION["id"])){
                $sql = "SELECT c_photo FROM user_details WHERE c_id='$_SESSION[id]'";
                $query = mysqli_query($con,$sql);
                $row=mysqli_fetch_array($query); ?>
            
            <div class="dropdownn">
                <a href="#" class="dropdownn"><i class="fa fa-user-o"></i><?php echo "<img src='images/".$row['c_photo']."'>";?></a>
                <div class="dropdownn-contentt">
                    <button class="modal-open" data-modal="userprofile"><i class="fa fa-user-circle"></i>My Profile</button>
			        <button class="modal-open" data-modal="edit"><i class="fas fa-user-edit"></i>Edit Profile</button>
			        <button class="modal-open" data-modal="booking"><i class="fas fa-key"></i>Change Password</button>
			        <button class="modal-open" data-modal="booking"><i class="fas fa-book-reader"></i>My Bookings</button>
                    <button onclick="logout()"><i class="fas fa-sign-out-alt"></i>Log out</button>
                </div>
            </div>
            <div class="modal-container" id="userprofile">
                <?php include "userprofile.php"?>
            </div>
            <div class="modal-container" id="edit">
                <?php include "editprofile.php"?>
            </div>
			<?php }else{ ?>
            <div class="dropdownn">
                <a href="#" class="dropdownn"><i class="far fa-user-circle"></i> My Account</a>
                <div class="dropdownn-content">
                    <button class="modal-open" data-modal="login"><i class="fas fa-sign-in-alt"></i> Login</button>
                    <button class="modal-open" data-modal="register"><i class="fas fa-user-plus"></i> Register</button>
                </div>
            </div>
            <div class="modal-container" id="login">
                <?php include "login.php"?>
            </div>
            <div class="modal-container" id="register">
                <?php include "register.php"?>
            </div>
            <?php } ?>
        </li>				
	</ul>
</div>
<!-- nav-bar ends -->