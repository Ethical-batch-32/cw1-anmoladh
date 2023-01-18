<?php 
    require_once "controluserdata.php"; 
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
<?php
    include "navbar.php";
?>
<!-- header section starts -->
<header id="home">
	<main>
        <section>
		    <h1><i class="fas fa-praying-hands" style="color: #1d4052;"></i> Welcome to Nepal <i class="fas fa-praying-hands" style="color: #1d4052;"></i></h1>
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
<section class="package" id="">
    <h1 class="heading">Tour and Travel Package lists</h1>
    <div class="package-container">
        <!-- Individual package starts -->
        <?php
            include "db.php";
                $pid = $_GET['p'];
                $package = "SELECT * FROM place_details, packages WHERE p_id=$pid AND pid=1";
                $query = mysqli_query($con,$package);
                $row = mysqli_fetch_array($query); ?>

        <div class="box">
            <div class="image">
                <?php echo "<img src='images/".$row['pimages']."'>";?>
            </div>
            <div class="content">
                <h3>Package location: <?php echo $row['pname']; ?> </h3>
                <h4>Package Type: <?php echo $row['ptype']; ?></h4>
                <span><i class="fas fa-quote-left"></i>  
                    Nepal is the most beautiful country that has many scenic landscapes with copiousness of both natural and cultural heritage. 
                    There are a lot of beautiful places to visit in Nepal. 
                    Nepal, the official name of the Federal Democratic Republic of Nepal, is a landlocked country in South Asia.
                    <i class="fas fa-quote-right"></i>
                </span>
            </div>
            <div class="details">
                <h4><?php echo $row['pcost']; ?></h4>
                <a class="modal-ind">Book</a>
            </div>
        </div>
        <div class="modal-bg">
            <div class="modal">
                <span class="modal-close"><i class="far fa-window-close"></i></span>
                <h2>FIll up the form for booking</h2>
                <form action="" method="post">
                <input type="hidden" name="type" value="<?php echo $row['ptype']; ?>"/>
                <label for="">Location</label>
                <input type="text" name="location" id="" value="<?php echo $row['pname']; ?>">
                <label for="">Number of member</label>
                <input type="text" name="member" id="" value="1">
                <label for="">Arrival</label>
                <input type="date" name="arrival" id="" required>
                <label for="">Leaving</label>
                <input type="date" name="leaving" id="" required>
                <label for="">Amount</label>
                <input type="number" name="price" id="" value="<?php echo $row['pcost']; ?>">
                <input type="submit" value="Submit" name="book">
                </form>
            </div>
        </div>
        <!-- Individual package ends -->
        <!-- Group package starts -->
        <?php mysqli_close($con); ?>
        <?php
            include "db.php";
                $pid = $_GET['p'];
                $package = "SELECT * FROM place_details, packages WHERE p_id=$pid AND pid=2";
                $query = mysqli_query($con,$package);
                $row = mysqli_fetch_array($query); ?>
        <div class="box">
            <div class="image">
                <?php echo "<img src='images/".$row['pimages']."'>";?>
            </div>
            <div class="content">
                <h3>Package location: <?php echo $row['pname']; ?> </h3>
                <h4>Package Type: <?php echo $row['ptype']; ?></h4>
                <span><i class="fas fa-quote-left"></i>  
                    Nepal is the most beautiful country that has many scenic landscapes with copiousness of both natural and cultural heritage. 
                    There are a lot of beautiful places to visit in Nepal. 
                    Nepal, the official name of the Federal Democratic Republic of Nepal, is a landlocked country in South Asia.
                    <i class="fas fa-quote-right"></i>
                </span>
            </div>
            <div class="details">
                <h4><?php echo $row['pcost']; ?></h4>
                <a class="modal-group">Book</a>
            </div>
        </div>
        <div class="modal-gp">
            <div class="modal">
                <span class="modal-closee"><i class="far fa-window-close"></i></span>
                <h2>FIll up the form for booking</h2>
                <form action="" method="post">
                <input type="hidden" name="type" value="<?php echo $row['ptype']; ?>"/>
                <label for="">Location</label>
                <input type="text" name="location" id=""  value="<?php echo $row['pname']; ?>">
                <label for="">Number of member</label>
                <input type="text" name="member" id="" placeholder="No of member" required>
                <label for="">Arrival</label>
                <input type="date" name="arrival" id="" required>
                <label for="">Leaving</label>
                <input type="date" name="leaving" id="" required>
                <label for="">Amount</label>
                <input type="number" name="price" id="" value="<?php echo $row['pcost']; ?>">
                <input type="submit" value="Submit" name="book">
                </form>
            </div>
        </div>
        <!-- Group package ends -->
        <!-- Family package starts -->
        <?php mysqli_close($con); ?>
        <?php
            include "db.php";
                $pid = $_GET['p'];
                $package = "SELECT * FROM place_details, packages WHERE p_id=$pid AND pid=3";
                $query = mysqli_query($con,$package);
                $row = mysqli_fetch_array($query); ?>
        <div class="box">
            <div class="image">
                <?php echo "<img src='images/".$row['pimages']."'>";?>
            </div>
            <div class="content">
                <h3>Package location: <?php echo $row['pname']; ?> </h3>
                <h4>Package Type: <?php echo $row['ptype']; ?></h4>
                <span><i class="fas fa-quote-left"></i>  
                    Nepal is the most beautiful country that has many scenic landscapes with copiousness of both natural and cultural heritage. 
                    There are a lot of beautiful places to visit in Nepal. 
                    Nepal, the official name of the Federal Democratic Republic of Nepal, is a landlocked country in South Asia.
                    <i class="fas fa-quote-right"></i>
                </span>
            </div>
            <div class="details">
                <h4><?php echo $row['pcost']; ?></h4>
                <a class="modal-family">Book</a>
            </div>
        </div>
        <div class="modal-fam">
            <div class="modal">
                <span class="modal-closeee"><i class="far fa-window-close"></i></span>
                <h2>FIll up the form for booking</h2>
                <form action="" method="post">
                <input type="hidden" name="type" value="<?php echo $row['ptype']; ?>"/>
                <label for="">Location</label>
                <input type="text" name="location" id=""  value="<?php echo $row['pname']; ?>">
                <label for="">Number of member</label>
                <input type="text" name="member" id="" placeholder="No of member" required>
                <label for="">Arrival</label>
                <input type="date" name="arrival" id="" required>
                <label for="">Leaving</label>
                <input type="date" name="leaving" id="" required>
                <label for="">Amount</label>
                <input type="number" name="price" id="" value="<?php echo $row['pcost']; ?>">
                <input type="submit" value="Submit" name="book">
                </form>
            </div>
        </div>
        <!-- Family package ends -->
        <!-- Couple package starts -->
        <?php mysqli_close($con); ?>
        <?php
            include "db.php";
                $pid = $_GET['p'];
                $package = "SELECT * FROM place_details, packages WHERE p_id=$pid AND pid=4";
                $query = mysqli_query($con,$package);
                $row = mysqli_fetch_array($query); ?>
        <div class="box">
            <div class="image">
                <?php echo "<img src='images/".$row['pimages']."'>";?>
            </div>
            <div class="content">
                <h3>Package location: <?php echo $row['pname']; ?> </h3>
                <h4>Package Type: <?php echo $row['ptype']; ?></h4>
                <span><i class="fas fa-quote-left"></i>  
                    Nepal is the most beautiful country that has many scenic landscapes with copiousness of both natural and cultural heritage. 
                    There are a lot of beautiful places to visit in Nepal. 
                    Nepal, the official name of the Federal Democratic Republic of Nepal, is a landlocked country in South Asia.
                    <i class="fas fa-quote-right"></i>
                </span>
            </div>
            <div class="details">
                <h4><?php echo $row['pcost']; ?></h4>
                <a class="modal-couple">Book</a>
            </div>
        </div>
        <div class="modal-cou">
            <div class="modal">
                <span class="modal-closeeee"><i class="far fa-window-close"></i></span>
                <h2>FIll up the form for booking</h2>
                <form action="" method="post">
                <input type="hidden" name="type" value="<?php echo $row['ptype']; ?>"/>
                <label for="">Location</label>
                <input type="text" name="location" id=""  value="<?php echo $row['pname']; ?>">
                <label for="">Number of member</label>
                <input type="text" name="member" id="" value="2">
                <label for="">Arrival</label>
                <input type="date" name="arrival" id="" required>
                <label for="">Leaving</label>
                <input type="date" name="leaving" id="" required>
                <label for="">Amount</label>
                <input type="number" name="price" id="" value="<?php echo $row['pcost']; ?>">
                <input type="submit" value="Submit" name="book">
                </form>
            </div>
        </div>
        <!-- Couple package ends -->
        <?php mysqli_close($con); ?>
    </div>
</section>
<!-- Package section ends -->
<?php
    include "footer.php";
?>
<!-- <script>
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

</script>    -->
</body>
</html>
