	<div id='menu' class='align-right'>
		<ul>
			<?php
				if ($uzivatel_prihlasen==""){
					Switch($_GET["page"]){
						case "";
							echo "
								<li><a href='?page=login'>LOGIN</a></li>
								<li class='active'><a href='?page=projekty'>Projekty</a></li>
								<li style='float: left;'><img src='https://webmail.spsbv.cz/skins/larry/images/roundcube_logo.png' height='40' alt='logo'></li>
								";
							break;
						case "projekty";
							echo "
								<li><a href='?page=login'>LOGIN</a></li>
								<li class='active'><a href='?page=projekty'>Projekty</a></li>
								<li style='float: left;'><img src='https://webmail.spsbv.cz/skins/larry/images/roundcube_logo.png' height='40' alt='logo'></li>
								";
							break;
						case "login";
							echo "
								<li class='active'><a href='?page=login'>LOGIN</a></li>
								<li><a href='?page=projekty'>Projekty</a></li>
								<li style='float: left;'><img src='https://webmail.spsbv.cz/skins/larry/images/roundcube_logo.png' height='40' alt='logo'></li>
								";
							break;
					}
				}
				else {
					if ($_SESSION["sesimap"]=="1"){
						$jeimap = "SPS\\";
					}
					else{
						$jeimap = "";
					}
					
					
					Switch($_SESSION["opravneni"]){
						case "0";
								Switch($_GET["page"]){
									case "";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li class='active'><a href='?page=projekty'>Seznam projektů</a></li>
											<li><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
									case "projekty";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li class='active'><a href='?page=projekty'>Seznam projektů</a></li>
											<li><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
									case "logout";
										echo "
											<li class='active'><a href='?page=logout'>LOGOUT</a></li>
											<li><a href='?page=projekty'>Seznam projektů</a></li>
											<li><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
									case "uzivatele";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li><a href='?page=projekty'>Seznam projektů</a></li>
											<li class='active'><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
								}
							break;
						case "1";
								Switch($_GET["page"]){
									case "";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li class='active'><a href='?page=projekty'>Seznam projektů</a></li>
											<li><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
									case "projekty";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li class='active'><a href='?page=projekty'>Seznam projektů</a></li>
											<li><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
									case "logout";
										echo "
											<li class='active'><a href='?page=logout'>LOGOUT</a></li>
											<li><a href='?page=projekty'>Seznam projektů</a></li>
											<li><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
									case "uzivatele";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li><a href='?page=projekty'>Seznam projektů</a></li>
											<li class='active'><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
									case "upravitprojekt";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li><a href='?page=projekty'>Seznam projektů</a></li>
											<li><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
								}
							break;
						case "2";
								Switch($_GET["page"]){
									case "";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li class='active'><a href='?page=projekty'>Seznam projektů</a></li>
											<li><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li><a href='?page=sprava'>Správa projektů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
									case "projekty";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li class='active'><a href='?page=projekty'>Seznam projektů</a></li>
											<li><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li><a href='?page=sprava'>Správa projektů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
									case "logout";
										echo "
											<li class='active'><a href='?page=logout'>LOGOUT</a></li>
											<li><a href='?page=projekty'>Seznam projektů</a></li>
											<li><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li><a href='?page=sprava'>Správa projektů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
									case "uzivatele";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li><a href='?page=projekty'>Seznam projektů</a></li>
											<li class='active'><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li><a href='?page=sprava'>Správa projektů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
									case "sprava";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li><a href='?page=projekty'>Seznam projektů</a></li>
											<li><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li class='active'><a href='?page=sprava'>Správa projektů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
									case "upravitprojekt";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li><a href='?page=projekty'>Seznam projektů</a></li>
											<li><a href='?page=uzivatele'>Seznam uživatelů</a></li>
											<li class='active'><a href='?page=sprava'>Správa projektů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											";
										break;
								}
							break;
						case "3";
								Switch($_GET["page"]){
									case "";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li class='active'><a href='?page=projekty'>Správa projektů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											<li style='float: left;'><img src='https://webmail.spsbv.cz/skins/larry/images/roundcube_logo.png' height='40' alt='logo'></li>
											";
										break;
									case "projekty";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li class='active'><a href='?page=projekty'>Správa projektů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											<li style='float: left;'><img src='https://webmail.spsbv.cz/skins/larry/images/roundcube_logo.png' height='40' alt='logo'></li>
											";
										break;
									case "upravitprojekt";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li class='active'><a href='?page=projekty'>Správa projektů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											<li style='float: left;'><img src='https://webmail.spsbv.cz/skins/larry/images/roundcube_logo.png' height='40' alt='logo'></li>
											";
										break;
									case "novyprojekt";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li class='active'><a href='?page=projekty'>Správa projektů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											<li style='float: left;'><img src='https://webmail.spsbv.cz/skins/larry/images/roundcube_logo.png' height='40' alt='logo'></li>
											";
										break;
									case "logout";
										echo "
											<li class='active'><a href='?page=logout'>LOGOUT</a></li>
											<li><a href='?page=projekty'>Správa projektů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											<li style='float: left;'><img src='https://webmail.spsbv.cz/skins/larry/images/roundcube_logo.png' height='40' alt='logo'></li>
											";
										break;
									case "uzivatele";
										echo "
											<li><a href='?page=logout'>LOGOUT</a></li>
											<li><a href='?page=projekty'>Správa projektů</a></li>
											<li style='float: left;'><a>Přihlášen: $jeimap$uzivatel_prihlasen</a></li>
											<li style='float: left;'><img src='https://webmail.spsbv.cz/skins/larry/images/roundcube_logo.png' height='40' alt='logo'></li>
											";
										break;
								}
							break;
					}
				}
			?>
		</ul>
	</div>