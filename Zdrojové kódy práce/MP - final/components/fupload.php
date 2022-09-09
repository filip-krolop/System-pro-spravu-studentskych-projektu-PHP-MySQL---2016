<?php
if($_FILES["fileToUpload"]["error"]==4 && $_FILES["fileToUpload"]["size"]==0) {
	$soubornevybran = 1;
}

if(!$soubornevybran) {
	include "./cfg/config.php";
	$target_ext = ".pdf";
	$target_file = $target_dir . $_POST['idproj'] . $target_ext;
	$uploadOk = 1;
	$checkFileExtension = pathinfo($target_dir.basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);

	// Check if file already exists
	if (file_exists($target_file)) {
		unlink($target_file);
	}
	// Allow certain file formats
	if($checkFileExtension != "pdf") {
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$uploadOk = 0;
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
	}
}
?>