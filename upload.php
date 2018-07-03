<?php
	require_once('session_mgmt.php');
	$original_image = $_FILES['filepath']['tmp_name'];
	$key = uniqid(rand());
	mkdir('./upload/'.$key);
	mkdir('./upload/'.$key.'/comments/');
	mkdir('./upload/'.$key.'/defects/');
	mkdir('./upload/'.$key.'/reviewers/');
	mkdir('./upload/'.$key.'/state/');
	mkdir('./upload/'.$key.'/observers/');
	copy($original_image, './upload/'.$key.'/'.$key.'.obj');
        header("Location:list.php");
?>
