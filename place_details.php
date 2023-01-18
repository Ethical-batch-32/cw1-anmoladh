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
    <a href="#phistory"><i class="fas fa-map-marker-alt"></i> &nbsp;Place details</a>
    <ul class="header-links pull-right">
		<li><?php include "db.php";
            if(isset($_SESSION["id"])){
                $sql = "SELECT c_photo FROM user_details WHERE c_id='$_SESSION[id]'";
                $query = mysqli_query($con,$sql);
                $row=mysqli_fetch_array($query); ?>
            
            <div class="dropdownn">
                <a href="#" class="dropdownn"><i class="fa fa-user-o"></i><?php echo "<img src='images/".$row['c_photo']."'>";?></a>
                <div class="dropdownn-contentt">
                    <a href="userprofile.php" class="modal-open"><i class="fa fa-user-circle"></i>My Profile</a>
			              <a href="editprofile.php" class="modal-open"><i class="fas fa-user-edit"></i>Edit Profile</a>
			              <a href="changepassword.php" class="modal-open"><i class="fas fa-key"></i>Change Password</a>
			              <a href="booking_details.php" class="modal-open"><i class="fas fa-book-reader"></i>My Bookings</a>
                    <a href="ulogout.php" class="modal-open"><i class="fas fa-sign-out-alt"></i>Log out</a>
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
<!-- About us section starts  -->
<div class="slider">
  <?php
    include "db.php";
    $name = $_GET['p'];
    $slider = "SELECT * FROM gallery WHERE placename='$name'";
    $run = mysqli_query($con,$slider);
    if(mysqli_num_rows($run) > 0){
      while($fetch = mysqli_fetch_array($run)){?>
      <div class="myslider fade" style="display: block;">
          <div class="txt">
              <h1><?php echo $fetch['name']; ?></h1>
          </div>
          <?php echo '<img src="images/'.$fetch["images"].'" alt="">'; ?>
      </div>
</div>
      <a href="" class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a href="" class="next" onclick="plusSlides(1)">&#10095;</a>
  <?php
      }
    }
  ?>
<section class="placedetails" id="phistory">
    <h1 class="heading">Place details</h1>
    <div class="box-container">
        <div class="box">
            <div class="wrap">
                <!-- filter history -->
                <div class="History">
                    <div class="desc" data-name="history">
                    <span class="span">
                            <?php
                              include "db.php";
                              $name = $_GET['p'];
                              $sql = "SELECT * FROM videos WHERE vname='$name'";
                              $query = mysqli_query($con,$sql);
                              if(mysqli_num_rows($query) > 0){
                                while($data = mysqli_fetch_array($query)){
                                  echo '<video class="video" width="345" height="240" controls>
                                          <source src="videos/'.$data["video"].'" type="video/mp4">
                                        </video>';
                                }
                              }
                            ?>
                        </span>
                        <span class="span">
                          <?php
                            include "db.php";
                            $name = $_GET['p'];
                            $details = "SELECT * FROM place_details WHERE pname='$name'";
                            $query_run = mysqli_query($con,$details);
                            if(mysqli_num_rows($query_run) > 0){
                              while($row = mysqli_fetch_array($query_run)){?>
                                <p class="paragraph"><?php echo $row['pdesc']; ?></p>
                                <div class="booking">
                                  <a href="package_list.php?q=<?php echo $row['p_id']; ?>" id="button" class="modal-btn">Book the place</a>
                                </div>
                            <?php
                              }
                            }
                          ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>
<!-- About us section ends -->
<!-- Footer section starts -->    
<?php
    include "footer.php";
?>
<!-- footer section ends -->
<script src="js/scripts.js"></script>
<script>
  //getting modal opening button
  var modalBtns = document.querySelectorAll(".modal-open");

  modalBtns.forEach(function(btn){
    btn.onclick = function(){
      var modal = btn.getAttribute("data-modal")
    
      document.getElementById(modal).style.display = "block";
    };
  });
  
  //getting close modal
  var closeBtns = document.querySelectorAll(".close");
  
  closeBtns.forEach(function(btn){
    btn.onclick = function(){
      var modal = (btn.closest(".modal-container").style.display = "none");
    };
  });
  
  //login and register form link
  var closeBtns = document.querySelectorAll(".modal-openn");
  
  closeBtns.forEach(function(btn){
    btn.onclick = function(){
      var model = (btn.closest(".modal-container").style.display = "none");
      var modal = btn.getAttribute("data-modal")
    
      document.getElementById(modal).style.display = "block";
    
    };
  });
  
  // When the user clicks anywhere outside of the modal, close it
  var log = document.getElementById('login');
  window.onclick = function(event) {
    if (event.target == log) {
      log.style.display = "none";
    }
  }
  var reg = document.getElementById('register');
  window.onclick = function(event) {
    if (event.target == reg) {
      reg.style.display = "none";
    }
  }
  
  //place_details image slider
    const myslide = document.querySelectorAll('.myslider'),
      dot = document.querySelectorAll('.dot');

    let counter = 1;
    slidefun(counter);
                
    let timer = setInterval(autoslide,1000);
    function autoslide() {
      counter += 1;
      slidefun(counter);
    }
    function plusSlides(n) {
      counter += n;
      slidefun(counter);
      resetTimer();
    }
    function currentSlide(n) {
      counter = n;
      slidefun(counter);
      resetTimer();
    }
    function resetTimer() {
      clearInterval(timer);
      timer = setInterval(autoslide, 1000);
    }
    function slidefun(n) {
      let i;
      for(i = 0; i<myslide.length; i++){
        myslide[i].style.display = "none";
      }
      for(i = 0; i<dot.length;i++) {
        dot[i].classList.remove('active');
      }
      if(n > myslide.length){
        counter = 1;
      }
      if(n < 1){
        counter = myslide.length;
      }
      myslide[counter-1].style.display = "block";
      dot[counter-1].classList.add('active');
    }
</script>
</body>
</html>