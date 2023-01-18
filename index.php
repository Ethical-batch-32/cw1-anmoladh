<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour and travel management system</title>
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
    <a href="#place"><i class="fas fa-map-marker-alt"></i> Places</a>
    <a href="#aboutus"><i class="fas fa-address-card"></i> About us</a>
    <a href="#gallery"><i class="fas fa-images"></i> Gallery</a>
    <a href="#review"><i class="fas fa-comments"></i> Reviews</a>
    <a href="#contact"><i class="far fa-envelope"></i> Contact</a>
    <ul class="header-links pull-right">
		<li><?php include "db.php";
            if(isset($_SESSION["id"])){
                $id = $_SESSION["id"];
                $sql = "SELECT c_photo FROM user_details WHERE c_id='$id'";
                $query = mysqli_query($con,$sql);
                $row=mysqli_fetch_array($query); ?>
            
            <div class="dropdownn">
                <a class="dropdownn"><i class="fa fa-user-o"></i><?php echo "<img src='images/".$row['c_photo']."'>";?></a>
                <div class="dropdownn-contentt">
                    <a href="userprofile.php" class="modal-open"><i class="fa fa-user-circle"></i>My Profile</a>
			        <a href="editprofile.php" class="modal-open"><i class="fas fa-user-edit"></i>Edit Profile</a>
			        <a href="changepassword.php" class="modal-open"><i class="fas fa-key"></i>Change Password</a>
			        <a href="booking_details.php" class="modal-open"><i class="fas fa-book-reader"></i>My Bookings</a>
                    <a href="ulogout.php" class="modal-open"><i class="fas fa-sign-out-alt"></i>Log out</a>
                </div>
            </div>
			<?php }else{ ?>
            <div class="dropdownn">
                <a class="dropdownn"><i class="far fa-user-circle"></i> My Account</a>
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
<!-- header section ends -->
<!-- Place details section starts -->
<section class="place" id="place">
    <h1 class="heading">Popular places</h1>
    <!-- SEARCH BAR -->
	<div class="header-search">
		<form action="search.php" method="POST">
			<input class="input" name="search" type="text" placeholder="Search here">
			<button type="submit" name="search_btn" class="search-btn">Search</button>
		</form>
    </div>
    <div class="card-container">
        <?php 
            //pagination
            include "func.php";
            $page = (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
            $limit = 6; //if you want to dispaly 5 records per page then you have to change here
            $startpoint = ($page * $limit) - $limit;
            $statement = "place_details ORDER BY p_id asc"; //you have to pass your query over here
            $res = mysqli_query($con,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");

            while($row = mysqli_fetch_array($res)){ ?>
        <div class="pcontainer" data-target="">
            <div class="card">
                <?php echo "<img src='images/".$row['pimages']."'>";?>
            </div>
            <div class="info">
                <div class="span">
                    <div class="label"><?php echo $row['pname']; ?></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="btn">
                    <a href="place_details.php?p=<?php echo $row['pname']; ?>">View place</a>
                </div>
            </div>
        </div>
        <?php
                }
        ?>
    </div>
    <?php
        echo '<div id="pagingg">';
        echo pagination($statement,$limit,$page);
        echo '</div>';
    ?>
	<!-- /SEARCH BAR -->
</section>
<!-- Place detais section ends -->
<!-- About us section starts  -->
<section class="aboutus" id="aboutus">
    <h1 class="heading">About us</h1>
    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="images/logo.jpg">
            </div>
            <div class="content">
                <h3>Beauty of Nepal</h3>
                <span><i class="fas fa-hand-point-right"></i>&nbsp; Nepal is the most beautiful country that has many scenic landscapes with copiousness of both natural and cultural heritage. 
                    There are a lot of beautiful places to visit in Nepal. </span><br><br>
                <span><i class="fas fa-hand-point-right"></i>&nbsp; Nepal, the official name of the Federal Democratic Republic of Nepal, is a landlocked country in South Asia.
                    Nepal is right between two countries bordering China in the north and India in the west, east and south. </span><br><br>
                <span><i class="fas fa-hand-point-right"></i>&nbsp; Nepal is a piece of heaven on Earth.It is a small country and a home to many Himalayan ranges, 
                    various animals, and plants, rich, for the rivers and water which is divided into three regions; 
                    Terai region, Hill region, and the mountain region.Nepal is rich in biodiversity and unique in geography. </span><br><br>
                <span><i class="fas fa-hand-point-right"></i>&nbsp; The highest peak in the world, Mount Everest lies in Nepal. Nepal is one of the best tourism destinations for spending holidays.
                    The specialty of this country is its multi-ethnic, multi-language, multi-culture. 
                    There are many places in Nepal to visit that make your journey memorable and fun.</span><br><br>
            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="images/logo.jpg">
            </div>
            <div class="content">
                <h3>Our Services</h3>
                <label><i class="fas fa-hand-point-right"></i>&nbsp;Flight ticketing:</label><br>
                <span>
                    Flight ticketing is our a major service. 
                    We are sales agents for different airlines so we offer domestic and international flight and air ticketing. 
                    Amadeus, Galileo and Abacus are the main online booking booking system which we use for air ticketing.
                </span><br><br>  
                <label><i class="fas fa-hand-point-right"></i>&nbsp;Adventure and tour:</label><br>
                <span>We offer culture & nature tour, Jungle Safari tour package, Trekking & hiking more activities in Nepal, Bhutan and Tibet. We provide our service from your arrival in Kathmandu to until your departure from Nepal. (More..)</span><br><br>
                <label><i class="fas fa-hand-point-right"></i>&nbsp;Hotel reservation:</label><br>   
                <span>We book all types hotel, lodger & resort in all location & places in Nepal.</span><br><br> 
                <label><i class="fas fa-hand-point-right"></i>&nbsp;Mission:</label><br> 
                <span>Prompt service on competitive price.</span>
            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="images/logo.jpg">
            </div>
            <div class="content">
                <h3>Features of Tour and travel management system</h3>
                <label><i class="fas fa-hand-point-right"></i>&nbsp;Online Reservation System:</label><br>   
                <span>Amadeus, Abacus and Galileo are online systems that we use to book and confirm the tickets. Our customer team will be pleasure to help you with your flight inquiry.</span><br><br>
                
                <label><i class="fas fa-hand-point-right"></i>&nbsp;Experience staff:</label><br>
                <span>Our customer service staff team are trained, experienced and qualified. They always happy to answer any inquiry you have.</span><br><br>
                
                <label><i class="fas fa-hand-point-right"></i>&nbsp;Service:</label><br>
                <span>We belief in quality and prompt service so we always trying to provide international standard services to our customer.</span><br><br>
                
                <label><i class="fas fa-hand-point-right"></i>&nbsp;Price:</label><br>
                <span>Our price is very competitive and reasonable. We offer special discount on air / flight fare.</span><br><br>
                
                <label><i class="fas fa-hand-point-right"></i>&nbsp;Last minute booking:</label><br>
                <span>We also accept last minute booking.</span><br><br>
                
                <label><i class="fas fa-hand-point-right"></i>&nbsp;Social responsibility:</label><br>
                <span>We are associated with social welfare so, we are allocating certain amount as social welfare fund.</span>            
            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="images/logo.jpg">
            </div>
            <div class="content">
                <h3>Why choose us?</h3>
                <span>Many consumers might not realize what they are missing out on when they travel and don't use a travel agent. Here are just a few things that we can do for you.</span><br><br>
                
                <label><i class="fas fa-hand-point-right"></i>&nbsp;Experience</label><br>
                <span>Travel agents know the market and, if they listen to what you want, will be able to match you with a better product than you can find on the Internet.</span><br><br>
            
                <label><i class="fas fa-hand-point-right"></i>&nbsp;Advocate</label><br>
                <span>If something goes wrong on your trip, a good travel agent will go to bat for you -- no matter who is at fault -- and try to get your vacation back on track.</span><br><br>

                <label><i class="fas fa-hand-point-right"></i>&nbsp;Resources</label><br>
                <span>Travel agents have access to a variety of tools that the average consumer is not able to use or doesn't know about. They can sometimes get you a better seat on an airplane, added amenities at hotels, room upgrades, event tickets, and plan activities for you.</span><br><br>

                <label><i class="fas fa-hand-point-right"></i>&nbsp;Convinience</label><br>
                <span>Your time is valuable and you shouldn't have to spend it searching for the right vacation. A travel agent can do that for you. They can match you with the vacation that you actually want, not the one that you saw on television. There is a difference between travel inspiration and actual travel desires. Destinations may look good on TV but not actually be ideal for you personally. Travel agents can help you define what it is you want to get out of a vacation.</span><br><br>

                <label><i class="fas fa-hand-point-right"></i>&nbsp;Save money</label><br>
                <span>Often, travel agents can save you money based on their supplier relationships -- or at least match the price you find -- while saving you time and effort. There are also hidden savings built into trips. A travel agent will likely book transfers for you, included in the price. Sometimes a package that you book yourself won't include those, making the experience appear cheaper. </span><br><br>

                <label><i class="fas fa-hand-point-right"></i>&nbsp;Best destinations</label><br>
                <span>Travel agents have inside information on the best times to go to crowded destinations and they sometimes even know what the new "it" destinations are going to be before the masses. Want to get there first? Use a travel agent.</span><br><br>
            
                <span>[ Many more..... ]</span>
            </div>
        </div>
    </div>
</section>
<!-- About us section ends -->
<!-- gallery section starts  -->
<section id="gallery" class="gallerry">
	<h1 class="heading">Gallery</h1>
    <div class="wrapper">
        <!-- filter Items -->
        <nav>
            <div class="items">
                <span class="item active" data-name="all">All</span>
                <span class="item" data-name="Province-1">Province-1</span>
                <span class="item" data-name="Province-2">Province-2</span>
                <span class="item" data-name="Bagmati">Bagmati</span>
                <span class="item" data-name="Gandaki">Gandaki</span>
                <span class="item" data-name="Lumbini">Lumbini</span>
                <span class="item" data-name="Karnali">Karnali</span>
                <span class="item" data-name="Sudurpaschim">Sudurpaschim</span>
            </div>
        </nav>
        <!-- filter Images -->
        <div class="gallery">
            <?php
                $image = "SELECT * FROM place_details, province WHERE place_details.province_key=province.id";
                $query_run = mysqli_query($con,$image);
                if(mysqli_num_rows($query_run) > 0){
                    while($data = mysqli_fetch_assoc($query_run)){ ?>
                        <div class="image" data-name="<?php echo $data['pro_name'];?>">
                            <span>
                                <table>
                                    <tr>
                                        <th><?php echo "<img src='images/".$data['pimages']."'>";?></th>
                                    </tr>
                                    <tr>
                                        <td><div class="photo-title"><?php echo $data['pname']; ?></div></td>
                                    </tr>
                                </table>
                                
                                
                            </span>
                        </div>
                    <?php
                    }
                }
                ?>
        </div>
    </div>
    <!-- fullscreen img preview box -->
    <div class="preview-box">
        <div class="details">
            <span class="title"><p></p></span>
            <span class="icon fas fa-times"></span>
        </div>
        <div class="image-box"><img src="" alt=""></div>
    </div>
    <div class="shadow"></div>
</section>
<!-- gallery section ends --> 
<!-- Review section starts -->    
<section class="review" id="review">
	<h1 class="heading">Customer Reviews</h1>
	<div class="tab-content">
		<!-- tab1  -->
		<div id="tab3" class="tab-pane fade in">
			<div class="row">
				<!-- Rating -->
				<div class="ratingg">
					<div class="rating-avg">
						<span>4.5</span>
						<div class="rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
						</div>
					</div>
					<ul class="rating">
						<li>
							<div class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
							</div>
							<div class="rating-progress">
								<div style="width: 80%;"></div>
							</div>
							<span class="sum">3</span>
						</li>
						<li>
							<div class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        	</div>
							<div class="rating-progress">
								<div style="width: 60%;"></div>
							</div>
							<span class="sum">2</span>
						</li>
						<li>
							<div class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
							</div>
							<div class="rating-progress">
								<div></div>
							</div>
							<span class="sum">0</span>
						</li>
						<li>
							<div class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
							</div>
							<div class="rating-progress">
								<div></div>
							</div>
							<span class="sum">0</span>
						</li>
						<li>
							<div class="rating-stars">
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
							</div>
							<div class="rating-progress">
								<div></div>
							</div>
							<span class="sum">0</span>
						</li>
					</ul>
				</div>
				<div class="col-md-6">
					<div id="reviews">
						<ul class="reviews">
						<?php
            			//pagination
            			include "rpaging.php";
            			$page = (int) (!isset($_GET['p']) ? 1 : $_GET['p']);
            			$limit = 3; //if you want to dispaly 5 records per page then you have to change here
            			$startpoint = ($page * $limit) - $limit;
            			$statement = "reviews ORDER BY review_id asc"; //you have to pass your query over here
						$res = mysqli_query($con,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
						while($data=mysqli_fetch_array($res)){?>
							<li>
								<div class="review-heading">
									<h5 class="name" style="text-transform: uppercase;"><?php echo $data["name"];?></h5>
									<p class="date"><?php echo $data["rdate"];?></p>
									<div class="review-rating">
									<?php
										if($data["rating"]==5){
											echo '																		
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>';
										}
										else if($data["rating"]==4){
											echo '																		
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>';
										}
										else if($data["rating"]==3){
											echo '																		
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>';
										}
										else if($data["rating"]==2){
											echo '																		
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>';
										}
										else{
											echo '																		
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>';
										}
									?>
									</div>
								</div>
								<div class="review-body">
									<p><?php echo $data["review"];?></p>
								</div>
							</li>
							<?php } 
								echo '<div id="pagingg">';
								echo rpaging($statement,$limit,$page);
								echo '</div>';
							?>														
						</ul>
					</div>
				</div>
				<?php
				echo'
				<div class="mainn">
					<div id="review-form">
						<form class="review-form" action="review.php" method="POST">
							<input class="input" type="text" name="name" placeholder="Your Name" Required>
							<input class="input" type="email" name="mail" placeholder="Your Email" Required>
							<input class="input" type="datetime-local" name="revdate" Required>
							<textarea class="input" name="review" placeholder="Your Review" Required></textarea>
							<div class="input-rating">
								<span>Your Rating: </span>
								<div class="stars">
									<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
									<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
									<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
									<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
									<input id="star1" name="rating" value="1" type="radio" Required><label for="star1"></label>
								</div>
							</div>
							<input class="primary-btn" type="submit" value="Submit" name="submit" style="margin-top:0px;">
						</form>
					</div>
				</div>
			</div>';?>
		</div>
	</div>
</section>
<!-- Review section ends -->
<!-- Contact us section starts -->    
<section class="message" id="contact">
    <h1 class="heading">Contact us</h1>
    <div class="cont">
        <div class="map">
            <div class="map-b">
                <iframe src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d3532.360991583803!2d85.3299792!3d27.7061384!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x39eb190a74aa1f23%3A0x74ebef82ad0e5c15!2sSoftwarica%20College%20of%20IT%20%26%20E-Commerce%20Mahakavi%20Marg%20Kathmandu%2044600!3m2!1d27.7061384!2d85.3299792!5e0!3m2!1sen!2snp!4v1645673666148!5m2!1sen!2snp" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="form">
            <div class="f-border">
                <form action="customer_message.php" method="POST">
                    <input type="text" name="cname" id="" placeholder="Full name">
                    <input type="email" name="cemail" id="" placeholder="Your email"><br>
                    <textarea name="message" id="" placeholder="message"></textarea><br>
                    <input type="submit" value="send message" name="contact">
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact us section ends -->    
<!-- newsletter section starts -->    
<section class="newsletter">
    <h1>Subscribe to get notifications</h1>
    <form action="subscribe.php" method="POST">
        <input type="email" name="semail" placeholder="enter email"><br>
        <input type="submit" value="subscribe" name="subscribe" style="margin-top:0px;">
    </form>
</section>
<!-- newsletter section ends -->    
<!-- Footer section starts -->    
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>branch locations</h3>
            <a href="#">Kathmandu</a>
            <a href="#">Pokhara</a>
            <a href="#">Mustang</a>
            <a href="#">Lumbini</a>
        </div>
        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">places</a>
            <a href="#">about us</a>
            <a href="#">gallery</a>
            <a href="#">review</a>
            <a href="#">contact us</a>
        </div>
        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">twitter</a>
            <a href="#">linkedin</a>
        </div>
    </div>

    <h1 class="credit"> &copy; 2022 - <script>const d = new Date();document.write(d.getFullYear());</script> | Created by <span> Anmol Adhikari</span> | all rights reserved!</h1>
</section>
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

    // logging out
    function logout(){
        location.replace("ulogout.php")
    }

</script>
</body>
</html>