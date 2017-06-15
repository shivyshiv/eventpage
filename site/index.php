<!DOCTYPE html>
<html lang="en">
	<head>
	
		<title>Home</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/countdown.css">
		<link rel="stylesheet" href="css/style_common.css" />
		<link rel="stylesheet" href="css/style4.css" />
		<link rel="stylesheet" href="css/camera.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/camera.js"></script>
		<!--[if (gt IE 9)|!(IE)]><!-->
		<script src="js/jquery.mobile.customized.min.js"></script>
		<!--<![endif]-->
		<script>
			$(document).ready(function(){
				jQuery('#camera_wrap').camera({
					loader: false,
					pagination: false ,
					minHeight: '444',
					thumbnails: false,
					height: '27.86458333333333%',
					caption: true,
					navigation: true,
					fx: 'simpleFade'
				});
				$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		
	</head>
	<body class="page1" id="top">
		<div class="main">
<!--==============================header=================================-->
			<header>
				<div class="container_12" style="align-top:80px">
					<div class="grid_12">
						
						<?php include "dbconnect.php"; ?>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shiv";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM mon_event_detail where EVENT_ID=1";
$result = mysqli_query($conn, $sql);

$sql1 = "SELECT EVENT_URL FROM mon_event_data where EVENT_ID=3";
$result1 = mysqli_query($conn, $sql1);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
         $event_name=$row["EVENT_NAME"];
         $event_description=$row["EVENT_DESCRIPTION"];
          $event_id=$row["EVENT_ID"];
         $event_rules=$row["EVENT_RULES"];
         $event_venue=$row["EVENT_VENUE"];
         $event_open=$row["REG_OPEN"];
         $event_close1=$row["REG_CLOSE"];
         $event_close=$row["CLOSE_TIME"];
         $event_result=$row["RESULT"];
         $event_price=$row["PRICE_ALLOTED"];
         $event_tags=$row["TAGS"];
         
    }
} else {
    echo "0 results";
}
$i=0;//iterator for event pics
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
         $event_pic[$i++]=$row["EVENT_URL"];

   
    }

   



} else {
    echo "0 results";
}



mysqli_close($conn);
?>
                               <div class="socials"> 
                                <h2 class="center"><?= $event_name ?></h2>
						</div>

						
                           							
						
					</div>
					<div class="clear"></div>
				</div>
			</header>
			<div class="slider_wrapper">
				<div id="camera_wrap" class="">
					<div data-src="images/slide.jpg">
						<div class="caption fadeIn">
							Run for Your Health
						</div>
					</div>
					<div data-src="images/slide1.jpg">
						<div class="caption fadeIn">
							Fast as Wind
						</div>
					</div>
					<div data-src="images/slide2.jpg">
						<div class="caption fadeIn">
							Never Stop
						</div>
					</div>
				</div>
			</div>
<!--==============================Content=================================-->
			<div class="content"><div class="ic"></div>
				<div class="container_12">
					<div class="grid_12">
								<h2 class="center">Event Registration Open date</h2>
							<br>
							<h2 class="center"><?= $event_open ?></h2>
							
							<h2 class="center">Event Registration Close date</h2>
							<br>
							<h2 class="center"><?= $event_close1 ?></h2> 
						      &nbsp; &nbsp; &nbsp;


							 <h2 class="center"><?= $event_close ?></h2>
													<div class="count_wrap">
							<div id="counter"></div>
							<div class="clear"></div>
							<a href="multiupload.php">Join Us</a>
						</div>
					</div>
					<div class="clear"></div>
					<div class="grid_4">
						<div class="box">
							<div class="box_title">Description</div>
							<div class="box_bot">
								<div class="maxheight">
									<?php echo $event_description ?><a href="#">More</a>
								</div>
							</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="box">
							<div class="box_title">Rules</div>
							<div class="box_bot">
								<div class="maxheight">
									<?php echo $event_rules ?><a href="#">More</a>
								</div>
							</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="box">
							<div class="box_title">Other Details</div>
							<div class="box_bot">
								<div class="maxheight">
									<?php echo $event_price ?><br><?php echo $event_result ?><br><?php echo $event_tags ?><a href="#">More</a>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="clear"></div>
					<div class="grid_12">
						<div class="hor_separator"></div>
						<h3 class="head1 center">Event Photos</h3>
					</div>
					<div class="clear"></div>
					<div class="grid_12">
						<div id="grid" class="main">
							
						<?php for ($k=0;$k<$i;$k++){ ?>
    	                
    	                <div class="view">
								<div class="view-back">
									<span data-icon="" class="fa fa-eye"><span>110</span></span>
									<span data-icon="" class="fa fa-heart-o"><span>60</span></span>
									<a href="#">&rarr;</a>
								</div>
								<img src="<?= $event_pic[$k] ?>" />
							</div>
							
                            <?php } ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="f_logo">
						<a href="index.html">Marathon</a>
					</div>
					<div class="f_contacts">
						<a href="#" class="mail_link"><span class="fa fa-envelope"></span> MAIL@DEMOLINK.ORG</a>
						<div class="f_phone"><span class="fa fa-phone"></span>+1 800 559 6580</div>
					</div>
					<div class="copy">
						<span>Marathon &copy; 2014 | <a href="#">Privacy Policy</a></span>
						Website designed by <a href="http://www.templatemonster.com/" rel="nofollow">TemplateMonster.com</a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</footer>

	</body>
</html>