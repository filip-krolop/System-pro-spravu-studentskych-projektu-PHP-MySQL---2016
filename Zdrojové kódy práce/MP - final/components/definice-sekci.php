	<div>
<?php
	if (!$_GET["page"]) {
      include "sekce/vypis-projektu.php";
	}else{
		Switch($_GET["page"]){
			case "login";
				include "components/login.php";
				break;
			case "projekty";
				include "sekce/vypis-projektu.php";
				break;
			case "logout";
				include "components/logout.php";
				break;
			case "uzivatele";
				include "sekce/uzivatele.php";
				break;
			case "nastaveni";
				include "sekce/nastaveni.php";
				break;
			case "profil";
				include "sekce/profil.php";
				break;
			case "mujprojekt";
				include "sekce/mujprojekt.php";
				break;
			case "sprava";
				include "sekce/sprava-projektu.php";
				break;
			case "upravitprojekt";
				include "components/upravit-projekt.php";
				break;
			case "novyprojekt";
				include "components/novy-projekt.php";
				break;
		}
	}
?>
	</div>