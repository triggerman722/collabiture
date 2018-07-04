<?php
require_once("session_mgmt.php");

foreach(glob('upload/'.$_REQUEST['id'].'/comments/*') as $file) {
	foreach(glob($file.'/*') as $commentfile) {
		unlink($commentfile);
	}
	rmdir($file);
}
rmdir('upload/'.$_REQUEST['id'].'/comments');

foreach(glob('upload/'.$_REQUEST['id'].'/defects/*') as $file) {
	foreach(glob($file.'/*') as $defectfile) {
                unlink($defectfile);
        }
        rmdir($file);
}
rmdir('upload/'.$_REQUEST['id'].'/defects');

foreach(glob('upload/'.$_REQUEST['id'].'/reviewers/*') as $file) {
        unlink($file);
}
rmdir('upload/'.$_REQUEST['id'].'/reviewers');

foreach(glob('upload/'.$_REQUEST['id'].'/observers/*') as $file) {
        unlink($file);
}
rmdir('upload/'.$_REQUEST['id'].'/observers');

foreach(glob('upload/'.$_REQUEST['id'].'/state/*') as $file) {
        unlink($file);
}
rmdir('upload/'.$_REQUEST['id'].'/state');

foreach(glob('upload/'.$_REQUEST['id'].'/*') as $file) {
        unlink($file);
}
rmdir('upload/'.$_REQUEST['id']);
header("Location:list.php");
?>
