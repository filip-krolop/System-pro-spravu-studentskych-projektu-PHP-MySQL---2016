<?php
if(!$_SESSION['prihlasen']){ echo "<script>window.location='index.php?page=login&invalid=1'</script>"; }
	session_start();
	session_unset();
	session_destroy();
	echo "<script>window.location='index.php?page=login&odhlaseno=1'</script>";
	
?>