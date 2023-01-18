<?php
    include "controluserdata.php";
    include "db.php";
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
    <a href="#home"><i class="fas fa-home"></i> Home</a>
    <a href="#packages"><i class="fas fa-map-marker-alt"></i> Packages</a>
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
<!-- header section starts -->
<header id="home">
	<main>
        <section>
		    <h1><i class="fas fa-praying-hands" style="color: #30637c;"></i> Welcome to Nepal <i class="fas fa-praying-hands" style="color: #30637c;"></i></h1>
		    <h1>come to visit  <span class="change_content"></span></h1>
        </section>
        <div class="slogan">
            <i class="fas fa-quote-left"></i>
            dicover new places with us, adventure awaits.
            Find yourself and explore more.  <i class="fas fa-quote-right"></i>
        </div>
        <div class="icons">
            <a href="#" id="facebook" class="fab fa-facebook-f"></a>
            <a href="#" id="twitter" class="fab fa-twitter"></a>
            <a href="#" id="instagram" class="fab fa-instagram"></a>
            <a href="#" id="linkedin" class="fab fa-linkedin"></a>
        </div>
    </main>
</header>
<!-- Package section Ends -->
<section class="package" id="packages">
    <h1 class="heading">Tour and Travel Package lists</h1>
    <div class="package-container">
        <!-- Individual package starts -->
        <?php
                $pid = $_GET['q'];
                $package = "SELECT place_details.pimages as images, place_details.pname as place, packages.ptype as typ, packages.pcost as cost, packages.pdesc as descr FROM place_details, packages WHERE place_details.p_id=$pid AND packages.pid=1";
                $query = mysqli_query($con,$package);
                $row = mysqli_fetch_array($query); ?>

        <div class="box">
            <div class="image">
                <?php echo "<img src='images/".$row['images']."'>";?>
            </div>
            <div class="content">
                <h3>Package location: <?php echo $row['place']; ?> </h3>
                <h4>Package Type: <?php echo $row['typ']; ?></h4>
                <span><i class="fas fa-quote-left"></i>  
                    <?php echo $row['descr']; ?>
                    <i class="fas fa-quote-right"></i>
                </span>
            </div>
            <div class="details">
                <h4><i class="fas fa-dollar-sign"></i><?php echo $row['cost']; ?></h4>
                <a class="modal-ind">Book</a>
            </div>
        </div>
        <div class="modal-bg">
            <div class="modal">
                <span class="modal-close"><i class="far fa-window-close"></i></span>
                <h2>FIll up the form for booking</h2>
                <form action="" method="post">
                <input type="hidden" name="type" value="<?php echo $row['typ']; ?>"/>
                <input type="hidden" name="qty" id="cost0" onBlur()="iTotal()" value="<?php echo $row['cost']; ?>"/>
                <label for="">Location</label>
                <input type="text" name="location" value="<?php echo $row['place']; ?>" readonly="readonly">
                <label for="">Number of member</label>
                <input type="text" class="numberr" onBlur="iTotal()" name="num" id="num0" placeholder="No of member" value="1">
                <!-- <input type="text" name="num" value="1" readonly="readonly"> -->
                <label for="">Arrival</label>
                <input type="date" name="arrival" id="date" required>
                <label for="">Leaving</label>
                <input type="date" name="leaving" id="dat" required>
                <label for="">Total Amount</label>
                <input type="text" name="total" id="itotal" readonly="readonly">
                <input type="submit" onclick="iTotal()" value="Ready to checkout" name="book">
                <!-- <input type="text" name="total" value="<!?php echo $row['cost']; ?>" readonly="readonly">
                <input type="submit" value="Ready to checkout" name="book"> -->
                </form>
            </div>
        </div>
        <!-- Individual package ends -->
        <!-- Group package starts -->
        <?php
                $pid = $_GET['q'];
                $package = "SELECT place_details.pimages as images, place_details.pname as place, packages.ptype as typ, packages.pcost as cost, packages.pdesc as descr FROM place_details, packages WHERE place_details.p_id=$pid AND packages.pid=2";
                $query = mysqli_query($con,$package);
                $row = mysqli_fetch_array($query); ?>
        <div class="box">
            <div class="image">
                <?php echo "<img src='images/".$row['images']."'>";?>
            </div>
            <div class="content">
                <h3>Package location: <?php echo $row['place']; ?> </h3>
                <h4>Package Type: <?php echo $row['typ']; ?></h4>
                <span><i class="fas fa-quote-left"></i>  
                <?php echo $row['descr']; ?>
                    <i class="fas fa-quote-right"></i>
                </span>
            </div>
            <div class="details">
                <h4><i class="fas fa-dollar-sign"></i><?php echo $row['cost']; ?></h4>
                <a class="modal-group">Book</a>
            </div>
        </div>
        <div class="modal-gp">
            <div class="modal">
                <span class="modal-closee"><i class="far fa-window-close"></i></span>
                <h2>FIll up the form for booking</h2>
                <form action="" method="post">
                <input type="hidden" name="type" value="<?php echo $row['typ']; ?>"/>
                <input type="hidden" name="qty" id="cost1" onBlur()="findTotal()" value="<?php echo $row['cost']; ?>"/>
                <label for="">Location</label>
                <input type="text" name="location" id=""  value="<?php echo $row['place']; ?>" readonly="readonly">
                <label for="">Number of member</label>
                <input type="text" class="numberr" onBlur="findTotal()" name="num" id="num1" placeholder="No of member" value="0">
                <label for="">Arrival</label>
                <input type="date" name="arrival" id="datee" required>
                <label for="">Leaving</label>
                <input type="date" name="leaving" id="datt" required>
                <label for="">Total Amount</label>
                <input type="text" name="total" id="total" readonly="readonly">
                <input type="submit" onclick="findTotal()" value="Ready to checkout" name="book">
                </form>
            </div>
        </div>
        <!-- Group package ends -->
        <!-- Family package starts -->
        <?php
                $pid = $_GET['q'];
                $package = "SELECT place_details.pimages as images, place_details.pname as place, packages.ptype as typ, packages.pcost as cost, packages.pdesc as descr FROM place_details, packages WHERE place_details.p_id=$pid AND packages.pid=3";
                $query = mysqli_query($con,$package);
                $row = mysqli_fetch_array($query); ?>
        <div class="box">
            <div class="image">
                <?php echo "<img src='images/".$row['images']."'>";?>
            </div>
            <div class="content">
                <h3>Package location: <?php echo $row['place']; ?> </h3>
                <h4>Package Type: <?php echo $row['typ']; ?></h4>
                <span><i class="fas fa-quote-left"></i>  
                <?php echo $row['descr']; ?>
                    <i class="fas fa-quote-right"></i>
                </span>
            </div>
            <div class="details">
                <h4><i class="fas fa-dollar-sign"></i><?php echo $row['cost']; ?></h4>
                <a class="modal-family">Book</a>
            </div>
        </div>
        <div class="modal-fam">
            <div class="modal">
                <span class="modal-closeee"><i class="far fa-window-close"></i></span>
                <h2>FIll up the form for booking</h2>
                <form action="" method="post">
                <input type="hidden" name="type" value="<?php echo $row['typ']; ?>"/>
                <input type="hidden" name="qty" id="cost2" onBlur()="Total()" value="<?php echo $row['cost']; ?>"/>
                <label for="">Location</label>
                <input type="text" name="location" value="<?php echo $row['place']; ?>" readonly="readonly">
                <label for="">Number of member</label>
                <input type="text" class="numberr" onBlur="Total()" name="num" id="num2" placeholder="No of member" value="0" required>
                <label for="">Arrival</label>
                <input type="date" name="arrival" id="dateee" required>
                <label for="">Leaving</label>
                <input type="date" name="leaving" id="dattt" required>
                <label for="">Total Amount</label>
                <input type="text" name="total" id="dollor" readonly="readonly">
                <input type="submit" onclick="Total()" value="Ready to checkout" name="book">
                </form>
            </div>
        </div>
        <!-- Family package ends -->
        <!-- Couple package starts -->
        <?php
                $pid = $_GET['q'];
                $package = "SELECT place_details.pimages as images, place_details.pname as place, packages.ptype as typ, packages.pcost as cost, packages.pdesc as descr FROM place_details, packages WHERE place_details.p_id=$pid AND packages.pid=4";
                $query = mysqli_query($con,$package);
                $row = mysqli_fetch_array($query); ?>
        <div class="box">
            <div class="image">
                <?php echo "<img src='images/".$row['images']."'>";?>
            </div>
            <div class="content">
                <h3>Package location: <?php echo $row['place']; ?> </h3>
                <h4>Package Type: <?php echo $row['typ']; ?></h4>
                <span><i class="fas fa-quote-left"></i>  
                <?php echo $row['descr']; ?>
                    <i class="fas fa-quote-right"></i>
                </span>
            </div>
            <div class="details">
                <h4><i class="fas fa-dollar-sign"></i><?php echo $row['cost']; ?></h4>
                <a class="modal-couple">Book</a>
            </div>
        </div>
        <div class="modal-cou">
            <div class="modal">
                <span class="modal-closeeee"><i class="far fa-window-close"></i></span>
                <h2>FIll up the form for booking</h2>
                <form action="" method="post">
                <input type="hidden" name="type" value="<?php echo $row['typ']; ?>"/>
                <input type="hidden" name="qty" id="cost4" onBlur()="cTotal()" value="<?php echo $row['cost']; ?>"/>
                <label for="">Location</label>
                <input type="text" name="location" value="<?php echo $row['place']; ?>" readonly="readonly">
                <label for="">Number of member</label>
                <input type="text" class="numberr" onBlur="cTotal()" name="num" id="num4" placeholder="No of member" value="2">
                <!-- <input type="text" name="num" value="2" readonly="readonly"> -->
                <label for="">Arrival</label>
                <input type="date" name="arrival" id="dateeee" required>
                <label for="">Leaving</label>
                <input type="date" name="leaving" id="datttt" required>
                <label for="">Total Amount</label>
                <input type="text" name="total" id="ctotal" readonly="readonly">
                <input type="submit" onclick="cTotal()" value="Ready to checkout" name="book">
                <!-- <input type="text" name="total" value="<!?php echo 2*$row['cost']; ?>" readonly="readonly">
                <input type="submit" value="Ready to checkout" name="book"> -->
                </form>
            </div>
        </div>
        <!-- Couple package ends -->
    </div>
</section>
<!-- Package section ends -->
<?php
    include "footer.php";
?>
<script>
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

    // booking form modal for individual
    var modalbtn = document.querySelector(".modal-ind");
    var modalbg = document.querySelector(".modal-bg");
    var modalclose = document.querySelector(".modal-close");

    modalbtn.addEventListener("click",function(){
        modalbg.classList.add("bg-active");
    });
    modalclose.addEventListener("click",function(){
        modalbg.classList.remove("bg-active");
    });

    // booking form modal for Group
    var modalbtnn = document.querySelector(".modal-group");
    var modalbgg = document.querySelector(".modal-gp");
    var modalclosee = document.querySelector(".modal-closee");

    modalbtnn.addEventListener("click",function(){
        modalbgg.classList.add("bg-active");
    });
    modalclosee.addEventListener("click",function(){
        modalbgg.classList.remove("bg-active");
    });

    // booking form modal for family
    var modalbtnnn = document.querySelector(".modal-family");
    var modalbggg = document.querySelector(".modal-fam");
    var modalcloseee = document.querySelector(".modal-closeee");

    modalbtnnn.addEventListener("click",function(){
        modalbggg.classList.add("bg-active");
    });
    modalcloseee.addEventListener("click",function(){
        modalbggg.classList.remove("bg-active");
    });

    // booking form modal for couple
    var modalbtnnnn = document.querySelector(".modal-couple");
    var modalbgggg = document.querySelector(".modal-cou");
    var modalcloseeee = document.querySelector(".modal-closeeee");

    modalbtnnnn.addEventListener("click",function(){
        modalbgggg.classList.add("bg-active");
    });
    modalcloseeee.addEventListener("click",function(){
        modalbgggg.classList.remove("bg-active");
    });

    // auto update the cost of individual package with respect to  number of days         
    function iTotal(){
        var amt0 = document.getElementById('cost0').value;
        var a = document.getElementById('date').value;
        var date0 = new Date(a);

        var b = document.getElementById('dat').value;
        var date00 = new Date(b);

        var di = date00.getTime() - date0.getTime();
        var msInDay0 = 1000 * 3600 * 24;
        var result0 = di/msInDay0;        
        var tot0 = amt0 * result0;
        document.getElementById('itotal').value = tot0;
    }
    // auto update the cost of group package with respect to  number of members and days        
    function findTotal(){
        var amt = document.getElementById('cost1').value;
        var scale = document.getElementById('num1').value;
        var x = document.getElementById('datee').value;
        var date1 = new Date(x);

        var y = document.getElementById('datt').value;
        var date2 = new Date(y);

        var dif = date2.getTime() - date1.getTime();
        var msInDay = 1000 * 3600 * 24;
        var result = dif/msInDay;        
        var tot = amt * scale * result;
        document.getElementById('total').value = tot;
    }

    // auto update the cost of family package with respect to  number of members and days
    function Total(){
        var amtt = document.getElementById('cost2').value;
        var scalee = document.getElementById('num2').value;
        var m = document.getElementById('dateee').value;
        var date3 = new Date(m);

        var n = document.getElementById('dattt').value;
        var date4 = new Date(n);

        var diff = date4.getTime() - date3.getTime();
        var msInDayy = 1000 * 3600 * 24;
        var resultt = diff/msInDayy;        

        var tott = scalee * amtt * resultt;
        document.getElementById('dollor').value = tott;
    }

    // auto update the cost of couple package with respect to  number of members and days        
    function cTotal(){
        var amt4 = document.getElementById('cost4').value;
        var scale4 = document.getElementById('num4').value;
        var p = document.getElementById('dateeee').value;
        var date5 = new Date(p);

        var q = document.getElementById('datttt').value;
        var date6 = new Date(q);

        var dif4 = date6.getTime() - date5.getTime();
        var msInDay4 = 1000 * 3600 * 24;
        var result4 = dif4/msInDay4;        
        var tot4 = amt4 * scale4 * result4;
        document.getElementById('ctotal').value = tot4;
    }

    // to avoid previous date selection
    var todayDate = new Date();
    var month = todayDate.getMonth() + 1; 
    var year = todayDate.getUTCFullYear(); 
    var tdate = todayDate.getDate(); 
    if(month < 10){
      month = "0" + month 
    }
    if(tdate < 10){
      tdate = "0" + tdate;
    }
    var minDate = year + "-" + month + "-" + tdate;
    document.getElementById("date").setAttribute("min", minDate);
    document.getElementById("datee").setAttribute("min", minDate);
    document.getElementById("dateee").setAttribute("min", minDate);
    document.getElementById("dateeee").setAttribute("min", minDate);
    document.getElementById("dat").setAttribute("min", minDate);
    document.getElementById("datt").setAttribute("min", minDate);
    document.getElementById("dattt").setAttribute("min", minDate);
    document.getElementById("datttt").setAttribute("min", minDate);
</script>   
</body>
</html>