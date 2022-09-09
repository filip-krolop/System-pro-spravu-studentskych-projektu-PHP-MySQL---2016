<?php

if (!$_GET["page"]) {
	echo '<link rel="stylesheet" type="text/css" href="css/vypis.css">';
	echo '<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>';
	echo '<script type="text/javascript" src="js/vypis.js"></script>';
}

else{
	Switch($_GET["page"]){
		case "projekty";
				echo '<link rel="stylesheet" type="text/css" href="css/vypis.css">';
				echo '<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>';
				echo '<script type="text/javascript" src="js/vypis.js"></script>';
			break;
		case "login";
				echo '<link rel="stylesheet" type="text/css" href="css/login.css">';
				echo '<link rel="stylesheet prefetch" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
				echo '<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>';
			break;
		case "sprava";
				echo '<link rel="stylesheet" type="text/css" href="css/vypis.css">';
				echo '<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>';
				echo '<script type="text/javascript" src="js/vypis.js"></script>';
			break;
		case "uzivatele";
				echo '<link rel="stylesheet" type="text/css" href="css/vypis.css">';
				echo '<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>';
				echo '<script type="text/javascript" src="js/vypis.js"></script>';
			break;
		case "novyprojekt";
				echo '<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">';
				echo '<script src="http://code.jquery.com/jquery-1.10.2.js"></script>';
				//echo '<script type="text/javascript">var jQueryAutocomp = $.noConflict(true);</script>';
				echo '<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>';
				echo '<script type="text/javascript">var jQueryAutocomp = $.noConflict(true);</script>';
				echo '<script>jQueryAutocomp(function(){jQueryAutocomp("#idkat").autocomplete({source:"components/proj-naseptavac-kat.php"});});</script>';
				echo '<script>jQueryAutocomp(function(){jQueryAutocomp("#idtrida").autocomplete({source:"components/proj-naseptavac-trida.php"});});</script>';
				echo '<script>jQueryAutocomp(function(){jQueryAutocomp("#idved").autocomplete({source:"components/proj-naseptavac-ved.php"});});</script>';
				echo '<!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="js/selectivizr.js"></script><noscript></noscript><![endif]-->';
			break;
		case "upravitprojekt";
				echo '<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">';
				echo '<script src="http://code.jquery.com/jquery-1.10.2.js"></script>';
				//echo '<script type="text/javascript">var jQueryAutocomp = $.noConflict(true);</script>';
				echo '<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>';
				echo '<script type="text/javascript">var jQueryAutocomp = $.noConflict(true);</script>';
				echo '<script>jQueryAutocomp(function(){jQueryAutocomp("#idkat").autocomplete({source:"components/proj-naseptavac-kat.php"});});</script>';
				echo '<script>jQueryAutocomp(function(){jQueryAutocomp("#idtrida").autocomplete({source:"components/proj-naseptavac-trida.php"});});</script>';
				echo '<script>jQueryAutocomp(function(){jQueryAutocomp("#idved").autocomplete({source:"components/proj-naseptavac-ved.php"});});</script>';
				echo '<!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="js/selectivizr.js"></script><noscript></noscript><![endif]-->';
			break;
	}
}

if ($_GET["page"]!="novyprojekt" && $_GET["page"]!="upravitprojekt") {
	echo '<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>';
	echo '<!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="js/selectivizr.js"></script><noscript></noscript><![endif]-->';
}

?>