<!DOCTYPE html> 
<html> 
	<head> 
	<title>New Year 2013</title> 
	<meta id="extViewportMeta" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />	

	<!-- Home screen icon  Mathias Bynens mathiasbynens.be/notes/touch-icons -->
	<!-- For iPhone 4 with high-resolution Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/icon.png">
	<!-- For first-generation iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/icon.png">
	<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
	<link rel="apple-touch-icon-precomposed" href="images/icon.png">
	<!-- For nokia devices: -->
	<link rel="shortcut icon" href="images/icon.png">


	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.24.custom.css" />
	<link rel="stylesheet" href="css/themes/default/RSVmain.min.css" />
	<link rel="stylesheet" href="css/themes/default/jquery.mobile.structure-1.1.1.min.css" />
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/add2home.css">
	
	
        <link rel="stylesheet/less" href="css/style.css">

	 <!-- fonts -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600' rel='stylesheet' type='text/css'>
	
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script src="js/jquery-ui-1.8.24.custom.min.js"></script>
	
	<script type="text/javascript" src="js/jquery.mobile-1.1.1.min.js"></script>
        <script type="text/javascript" src="js/less-1.3.0.min.js"></script>
        <!--<script type="text/javascript" src="js/jquery-ui-effects.js"></script>-->

	<script src="js/helper.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/iphone-style-checkboxes.js"></script>
	<script src="js/klass.min.js"></script>
	<script src="js/code.photoswipe.jquery-3.0.5.min.js"></script>
	<script src="js/add2home.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        
	<script type="text/javascript" src="js/app.js?v=30"></script>
</head> 

<body>
	<!-- Splash screen -->
  	 <div id="splash"> 
	   <img id="splash-bg" src="images/splash/splash-alternate.png" alt="splash image"/>
	   <img id="splash-title" src="images/splash/main.png" alt="splash title" />
	 </div> 
  <!-- end splash screen -->
	<div data-dom-cache="false" data-role="page" class="pages" id="home" data-theme="a">
	<div data-role="header" data-position="fixed">
        <div class="left">
            <a href="/" class="showMenu menu-button"><img src="images/menu-button.png" width="16" /></a>
        </div>
        <h1><p class="no-margin"><?php echo Config::get('site.name'); ?></p><p class="no-margin"><?php echo Config::get('site.slogan'); ?></p></h1>
	</div>
        
        <!-- /header -->
    
	<div data-role="content" data-theme="a" class="minus-shadow">
        <?php echo $content; ?>
	</div><!-- /content -->
        
        <div data-role="footer" data-position="fixed">
    <div class="footer-actions">
        <a href="tel://971568899009"><img src="images/icons/phone.png"></a>
        <a target="_blank" href="http://www.facebook.com/riten.vagadiya"><img src="images/icons/fb.png"></a>
        <a href="contact-us.html"><img src="images/icons/location.png"></a>
        <div class="clear"></div>
    </div>
    <p class="right">&copy; New Year 2013.</p>
    <div class="clear"></div>
</div></div><!-- /page -->
<script type="text/javascript">
</script>
</body>
</html>