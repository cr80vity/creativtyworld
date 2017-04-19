<?php
require_once("session.php");

require_once("class.user.php");
$auth_user = new USER();

$id = $_SESSION['user_session'];

$stmt = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
$stmt->execute(array(":id"=>$id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Free Racing Website Template | Home :: w3layouts</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--slider-->
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>
<body>
<div class="header">	
  <div class="wrap"> 
	<div class="header-top">
		 <div class="logo">
			 <a href="welcome.php"><img src="images/logo.png" alt=""></a>
             <h3>Welcome: <?php print($userRow['username']); ?></h3>
		 </div>
		 <div class="menu">
			<div id="cssmenu">
				<ul>
<!--				<li><a href="index.php"><span></span></a></li>-->
				   <li class="active"><a href="welcome.php"><span>Home</span></a></li>
				   <li class="has-sub"><a href="about.php"><span>About</span></a></li>
				   <li><a href="gallery.php"><span>Gallery</span></a></li>
				   <li class="last"><a href="contact.php"><span>Contact</span></a></li>
				</ul>
            </div>
		  </div>	
		  <div class="clear"></div> 
	   </div>
   </div>	
</div>
      <!------ Slider ------------>
		  <div class="slider">
	      	<div class="slider-wrapper theme-default">
	            <div id="slider" class="nivoSlider">
	                <img src="images/banner2.jpg" alt="" />
	                <img src="images/banner1.jpg" alt="" />
	                <img src="images/banner3.jpg" alt="" />
	                <img src="images/banner4.jpg" alt="" />
	                <img src="images/banner5.jpg" alt="" />
	            </div>
	        </div>
   		</div>
		<!------End Slider ------------>
	<div class="main">
		<div class="content-top">
			<div class="wrap">
				<div class="section group">
				<div class="col_1_of_3 span_1_of_3">
					<div class="thumb-pad2">
	                    <div class="thumbnail">
	                        <h4>our club</h4>
	                        <figure><img src="images/pic.jpg" alt=""><em class="sp1"></em></figure>
	                        <div class="caption">
	                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud</p>
	                            <a href="#" class="btn-default btn1">more</a>
	                        </div>
	                    </div>
                	</div>
				</div>
				<div class="col_1_of_3 span_1_of_3">
					<div class="thumb-pad2">
	                    <div class="thumbnail">
	                        <h4>our club</h4>
	                        <figure><img src="images/pic1.jpg" alt=""><em class="sp1"></em></figure>
	                        <div class="caption">
	                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud</p>
	                            <a href="#" class="btn-default btn1">more</a>
	                        </div>
	                    </div>
	                </div>
				</div>
				<div class="col_1_of_3 span_1_of_3">
					<div class="thumb-pad2">
	                    <div class="thumbnail">
	                        <h4>our club</h4>
	                        <figure><img src="images/pic2.jpg" alt=""><em class="sp1"></em></figure>
	                        <div class="caption">
	                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud</p>
	                            <a href="#" class="btn-default btn1">more</a>
	                        </div>
	                    </div>
                    </div>
				</div>
				<div class="clear"></div> 
			</div>
			</div>
		</div>
		<div class="content-middle">
			<div class="wrap">
				<div class="section group example">
					<div class="col_1_of_2 span_1_of_2">
						<div class="thumb-pad3">
	                   		<figure><img src="images/pic3.jpg" alt=""><em class="sp1"></em></figure>
	                    </div>
					 </div>
					<div class="col_1_of_2 span_1_of_2">
						<p class="title1">Racing</p>
					    <p class="title2">Cars sport news</p>
					 	<a href="#" class="btn">join us</a>
					</div>
					<div class="clear"></div> 
			    </div>
		    </div>
		</div>
		<div class="content-bottom">
			<div class="wrap">
				<p class="title3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
				<div class="section group">
				<div class="lsidebar span_1_of_bottom">
					<div class="thumb-pad4">
	                    <div class="thumbnail">
	                     	<figure><img src="images/bolt.png" alt=""/><em class="sp1"></em></figure>
	                    </div>
                    </div>
				</div>
				<div class="cont span_2_of_bottom">
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				      <a href="#" class="btn2">more</a>				    
				</div>	
				<div class="clear"></div> 			
		       </div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="wrap">
		<div class="footer-top">
				<div class="col_1_of_4 span_1_of_4">
					<h3>INFORMATION</h3>
					<ul class="first">
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms and conditions</a></li>
						<li><a href="#">Legal Notice</a></li>
					</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>CATEGORIES</h3>
					<ul class="first">
						<li><a href="#">New products</a></li>
						<li><a href="#">top sellers</a></li>
						<li><a href="#">Specials</a></li>
					</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>My ACCOUNT</h3>
					<ul class="first">
						<li><a href="#">Your Account</a></li>
						<li><a href="#">Personal info</a></li>
						<li><a href="#">Prices</a></li>
				    </ul>
				</div>
				<div class="col_1_of_4 span_1_of_4 footer-lastgrid">
					<h3>CONTACT US</h3>
					<ul class="last">
							<li><span>+91-123-456789</span></li>
							<li><span>+00-123-000000</span></li>
						</ul>
			    </div>
				<div class="clear"></div> 
		</div>
		<div class="copy">
			<p>Design by <a href="#">W3layouts</a></p>
		</div>
	</div>
</div>
</body>
</html>

    	
    	
            