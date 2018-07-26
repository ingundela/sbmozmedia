<?php
    $msg = "";
	use PHPMailer\PHPMailer\PHPMailer;
	include_once "PHPMailer/PHPMailer.php";
	include_once "PHPMailer/Exception.php";
	include_once "PHPMailer/SMTP.php";

	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$subject = $_POST['subject'];
		$email = $_POST['email'];
		$message = $_POST['message'];

		if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != "") {
			$file = "attachment/" . basename($_FILES['attachment']['name']);
			move_uploaded_file($_FILES['attachment']['tmp_name'], $file);
		} else
			$file = "";

		$mail = new PHPMailer();

		//if we want to send via SMTP
		$mail->Host = "smtp.gmail.com";
		//$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->Username = "senaidbacinovic@gmail.com";
		$mail->Password = "5C1bcnPkDI4Wd%#";
		$mail->SMTPSecure = "ssl"; //TLS
		$mail->Port = 465; //587

		$mail->addAddress('ivan.ngundela@ingundela.com');
		$mail->name = $name;
		$mail->setFrom($email, $name);
		$mail->Subject = $subject;
		$mail->isHTML(true);
		$mail->Body = $message;
		$mail->addAttachment($file);

		if ($mail->send())
		    $msg = "Your email has been sent, thank you!";
		else
		    $msg = "Please try again!";

		unlink($file);
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SBmozmedia Web Development Agency - Make It Digital</title>
    <link rel="shortcut icon" type="image/png" href="img/sbfavicon.png"></head>
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link href="css/fontawesome-all.min.css" rel="stylesheet"/>
    <link href="css/fa-light.min.css" rel="stylesheet"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
  </head>
  <body>
    <!--Navigation menu-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" id="navScrollspy">
          <div class="container">
            <a class="navbar-brand h1 mb-0" href="index.html"><span class="sb">SB</span>mozmedia</a>
            <button class="navbar-toggler compressed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background:none; border:none">
              <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="solutions.html">Solutions</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="portfolio.html">Portfólio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="blog.html">blog</a>
                </li> 
                <li class="nav-item active">
                  <a class="nav-link contactos" href="sendemail.php"><i class="fal fa-envelope"></i>Get in Touch</a>
                </li> 
              </ul>
            </div>
          </div>
      </nav>

       <!--header-->
      <section class="about header-banner">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="topOther text-center">
                <div>
                  <h1>Share your <span>Project idea</span> and <span>Let us Do</span> our Best to <span>Make it happen</span>!</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--contact form-->
      <section class="contactForm">
      	<div class="container titleTop">
    			<div class="row justify-content-center">
    				<div class="col-md-6 col-md-offset-3" align="center">
    					<h2>Let's work together!</h2>

    	                <?php if ($msg != "") echo "$msg<br><br>"; ?>

    					<form method="post" action="sendemail.php" enctype="multipart/form-data">
    						<input class="form-control" name="name" placeholder="Your Name..."><br>
    						<input class="form-control" name="subject" placeholder="Subject..."><br>
    						<input class="form-control" name="email" type="email" placeholder="Email..."><br>
    						<textarea placeholder="Message..." class="form-control" name="message"></textarea><br>
    						<input class="form-control" type="file" name="attachment"><br>
    						<input class="btn btn-primary" name="submit" type="submit" value="Send Email">
    					</form>
    				</div>
    			</div>
    		</div>
      </section>
	<!--footer-->
      <section class="footer text-center">
        <div class="container">
          <div class="row">
            <div class="col-12 titleTop">
              <h2>Let's work Together!</h2>
              <h3>We provide complete solutions to our clients everywhere in the world.</h3>
              <a href="sendemail.php" class="btn">Request a meeting</a>
            </div>
          </div>
        </div>
      </section>

      <!--footer last-->
      <section class="footerLast text-center">
        <div class="container">
          <div class="row">
            <div class="col-12 titleTop">
              <h2>We are Social</h2>
              <p>Be the first to know what happens at SBmozmedia. Follow us on social networks!</p>
              <ul class="list-unstyled social">
                <a href="#"><li><i class="fab fa-linkedin-in"></i></li></a>
                 <a href="#"><li><i class="fab fa-instagram"></i></li></a>
                 <a href="#"><li><i class="fab fa-facebook-f"></i></li></a>
                 <a href="#"><li><i class="fab fa-twitter"></i></li></a>
              </ul>
            </div>
          </div>
          <div class="row sbmozmedialast">
            <div class="col-md-6">
              <ul class="list-unstyled contactt">
                <li>&copy; sbmozmedia.com 2018 | Digital Agency</li>
               
              </ul>
             
            </div>
            <div class="col-md-6">
              <ul class="list-unstyled contactt">
                <li><i class="fal fa-envelope"></i> info@sbmozmedia.com</li>
                <li><i class="fal fa-phone"></i> +258 84321 2622</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

       <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/owl.carousel.min.js"></script> 
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script> 
</body>
</html>
