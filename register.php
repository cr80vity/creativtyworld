<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="") {
    $user->redirect('welcome.php');
}

if(isset($_POST['btn-login'])) {
    $username = strip_tags($_POST['username']); // works for both username and email
    $password = strip_tags($_POST['password']);
    $fname    = strip_tags($_POST['fname']);
    $lname    = strip_tags($_POST['lname']);
    $email    = strip_tags($_POST['email']);
    $vname    = strip_tags($_POST['vname']);
    $vtype    = strip_tags($_POST['vtype']);
    $color    = strip_tags($_POST['vcolor']);




    if ($username = "") {
        $error[] = "provide username !";
    } else if ($password == "") {
        $error[] = "provide password !";
    } else if (strlen($password) < 6) {
        $error[] = "Password must be at least 6 characters !";
    } else if ($fname == "") {
        $error[] = "provide your first name !";
    } else if ($lname == "") {
        $error[] = "provide your last name";
    } else if ($email == "") {
        $error[] = "provide email id !";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "please enter a valid email address !";
    } else if ($vname == "") {
        $error[] = "provide your vehicle name";
    } else if ($vtype == "") {
        $error[] = "provide your Vehicle type";
    } else if ($vcolor == "") {
        $error[] = "provide your vehicle color";
    }else {
        try {
            $stmt = $user->runQuery("SELECT username, password, fname, lname, email, vname, vtype, vcolor FROM users WHERE username=:username OR password=:password OR fname=:fname OR lname=:lname OR email=:email OR vname=:vname OR vtype=:vtype OR vcolor=:vcolor");
            $stmt->execute(array(':username' => $username, ':password' => $password, ':fname' => $fname, ':lname' => $lname, ':email' => $email, ':vname' => $vname, ':vtype' => $vtype, ':vcolor' => $vcolor));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['username'] == $username) {
                $error[] = "Sorry, username already taken!";
            } else if ($row['email'] == $email) {
                $error[] = "Sorry, email id already taken !";
            } else {
                if ($user->register($username, $password, $fname, $lname, $email, $vname, $vtype, $vcolor)) {
                    $user->redirect('welcome.php');
                }
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Vehicle Reg Portal</title>
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


				  <!-- <li><a href="about.php"><span>About</span></a></li>
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
								<h3>About Road Safety</h3>
								<p>Maecenas tempus eros  ut  diam ullamcorper  id  dictum  libero  
                                    tempor. Donec quis  augue  quis  magna condimentum  lobortis.  Quisque imperdiet  ipsum  vel 
                                    magna viverra  rutrum. Cras  viverra  molestie urna, vitae  vestibulum  turpis  varius id. 
                                    Vestibulum  mollis, arcu  iaculis  bibendum varius,  velit  sapien  blandit  metus, ac  posuere lorem  
                                    nulla  ac  dolor. Maecenas urna  elit,  tincidunt  in  dapibus nec,  vehicula eu dui.  Duis  lacinia  
                                    fringilla massa.</p>
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
					  	<h3>Register Your Vehicle</h3>
						    <form method="post" action="">
                                <?php
                                if(isset($error)) {
                                    foreach($error as $error) {

                                        ?>
                                        <div>
                                            <?php echo $error; ?>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    echo 'successful';
                                };

                                ?>
						    	<div>
							    	<span><label>Username</label></span>
							    	<span><input name="username" type="text" class="textbox"></span>
							    </div>
                                <div>
                                    <span><label>First Name</label></span>
                                    <span><input name="fname" type="text" class="textbox"></span>
                                </div>
                                <div>
                                    <span><label>Last Name</label></span>
                                    <span><input name="lname" type="text" class="textbox"></span>
                                </div>
							    <div>
							    	<span><label>Password</label></span>
							    	<span><input name="password" type="password" class="textbox"></span>
							    </div>
                                <div>
                                    <span><label>Retype Password</label></span>
                                    <span><input name="password_again" type="password" class="textbox"></span>
                                </div>
								<div>
									<span><label>Email</label></span>
									<span><input name="email" type="text" class="textbox"></span>
								</div>
								<div>
									<span><label>Vehicle Name and Model</label></span>
									<span><input name="vname" type="text" class="textbox"></span>
								</div>

								<!--<select name="vehicleType" id="vehicleType">
									<option value="car">car</option>
								</select>-->
                                <div>
                                    <span><label for="vehicleType">Vehicle Type</label></span>
                                    <select name="vtype" id="vtype">
									<option value="car">Car</option>
									<option value="Truck">Truck</option>
									<option value="MotorBike">Motor Bike</option>
									<option value="Jeep">Jeep</option>
										</select>
                                </div>
								<div>
									<span><label>Vehicle Color</label></span>
									<span><input name="vcolor" type="text" class="textbox"></span>
								</div>
								<span><label>Upload your Vehicle Image</label></span>
								<input name="carPic" type="file" size="2mb" />


								<div>
							   		<a href="" class="btn">Register</a>
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