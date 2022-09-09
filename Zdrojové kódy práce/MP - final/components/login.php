<?php
if($_GET['invalid']==1) {
	echo '<div class="logmsg" style="background: red; width: 300px;">Neplatné přihlášení !</div>';
}
if($_GET['odhlaseno']==1) {
	echo '<div class="logmsg" style="background: #0C9DF3; width: 300px;">Odhlášení proběhlo úspěšně.</div>';
}

if($_POST['login']!="" && $_POST['heslo']!="") {
	$login = $_POST['login'];
	$heslo = $_POST['heslo'];

	$server = "{intra.spsbv.cz:143/notls}";
	@$mbox = imap_open($server, $_POST["login"], $_POST["heslo"]);
	
	if ($mbox) {
		include "login-imap.php";
	}
	
	else{*/
		include "login-mysql.php";
	}


	if($login == $login_def && $heslo == $heslo_def && !isset($uzivatelblokovan)){
		session_start();
		$_SESSION['prihlasen'] = $login;

		echo "<script>window.location='index.php?page=projekty'</script>";
	}
	
	else if(isset($uzivatelblokovan)){
		echo '
			<div class="logmsg" style="background: red; width: 300px;">
				Přihlášení se nezdařilo. <br />
				Uživatel blokován.
			</div>
		';
	}
	else {
		echo '
			<div class="logmsg" style="background: red; width: 300px;">
				Špatné jméno nebo heslo. <br />
				Přihlaste se prosím znovu.
			</div>
		';
	}
}
else {
	if($_POST) {
		echo '
			<div class="logmsg" style="background: red; width: 300px;">
				Chyba! <br />
				Uživatelské jméno a heslo nebylo vyplněno.
			</div>
		';
	}
}
?>

<div class="logmsg" style="background: #0C9DF3; width: 500px;">
	<span class="fa fa-info-circle" style="font-size:20px;"></span> Pro vstup do administrace se prosím přihlaste.
</div>

<form class="login" action="?page=login" method="POST" <?php if($_POST && (($login != $login_def || $heslo != $heslo_def) || isset($uzivatelblokovan))){echo 'style="margin: 45px auto 0 auto;"';}?>>
  
  <fieldset style="margin: 0;">
    
  	<legend class="legend">Přihlášení</legend>
    
    <div class="input">
    	<input type="text" placeholder="Login" name="login" required />
      <span><i class="fa fa-user"></i></span>
    </div>
    
    <div class="input">
    	<input type="password" placeholder="Heslo" name="heslo" required />
      <span><i class="fa fa-lock"></i></span>
    </div>
    
    <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>
    
  </fieldset>

	<div class="feedback">
		Probíhá ověřování... <br />
		Prosím čekejte
  </div>
  
</form>

<script src="js/login.js" type="text/javascript"></script>