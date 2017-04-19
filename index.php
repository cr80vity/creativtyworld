<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="") {
    $login->redirect('welcome.php');
}

if(isset($_POST['btn-login'])) {
    $username = strip_tags($_POST['username']); // works for both username and email
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    if($login->doLogin($username, $email, $password)){
        $login->redirect('welcome.php');
    } else {
        $error = '<p style="color: #FFF">Wrong Details!</p>';
    }
}


?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<head>
<title>Free Racing Website Template | Contact :: w3layouts</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="header">	
  <div class="wrap"> 
	<div class="header-top">
		 <div class="logo">
			 <a href="welcome.php"><img src="images/logo.png" alt=""></a>
		 </div>
		 <div class="menu">
			<div id="cssmenu">
				<ul>
				   <!--<li><a href="about.php"><span>About</span></a></li>
				   <li><a href="gallery.php"><span>Gallery</span></a></li>-->
<!--				   <li class="active"><a href="contact.php"><span>Contact</span></a></li>-->
				</ul>
            </div>
		  </div>	
		  <div class="clear"></div> 
	   </div>
   </div>	
</div>
     <div class="main">
		<div class="content-top">
			<div class="wrap">
				<div class="about">
					<!--<div class="map">
					   	<iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
					</div>	-->
				<div class="section group">	
					<div class="col1 span_1_of_contact">
						<div class="company_address">
		      				<div class="contact-left">
								<h3>About Road Saftey</h3>
								<p>Lorem  ipsum  dolor sit  amet, consectetur  adipiscing elit.  Nulla est purus,  ultrices  in  porttitor 
									in, accumsan non  quam.  Nam  consectetur  porttitor rhoncus.  Curabitur  eu est et  leo  feugiat  
									auctor  vel quis  lorem.  Ut  et  ligula dolor, sit  amet consequat lorem.  Aliquam porta eros  sed  
									velit  imperdiet  egestas.</p>
							</div>
						    <div class="contact-left1">
								<h3>Address</h3>
								<p>Telephone:1-22-5555</p>
								<p>Fax:1-22-5555</p>
								<a href="#"><p>Email:racing(at)mail.com</p></a>
						    </div>
							<div class="clear"></div> 	
						</div>
					</div>				
					<div class="col1 span_2_of_contact">
					  <div class="contact-form">
					  	<h3>Login</h3>
						    <form method="post" action="">
								<div id="error">
									<?php
										if(isset($error)) {

									?>
									<div>
										<?php echo $error; ?>

									</div>
										<?php
										}
										?>

						    	<div>
							    	<span><label>Username or Email</label></span>
							    	<span><input name="username" type="text" class="textbox" placeholder="Username" required></span>
							    </div>
							    <div>
							    	<span><label>Password</label></span>
							    	<span><input name="password" type="password" class="textbox" required></span>
							    </div>

							   <div>
<!--                                   <input type="submit" name="btn-login" class="btn" value="Submit" />-->
							   		<button name="btn-login" class="btn">Submit</button>
								   <h3>To Register your vehicle</h3><a href="register.php" class="btn">Register</a>


							  </div>

								</form>
									</div>
								</div>

						    </form>
						</div>
	  				</div>
  				<div class="clear"></div>
				</div>
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

    	
    	
            