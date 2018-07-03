<?php
$target = $_REQUEST['target'];
$action = $_REQUEST['action'];
for($i=0;$i<500;$i++) {
	$index = "userlink".$i;
	if (isset($_REQUEST[$index])) {
		$username = $_REQUEST[$index];
		$tvsFilePath = "upload/".$target."/".$action."/".$username;
		file_put_contents($tvsFilePath, $target);
	}
}
header("Location:view.php?id=".$target);
?>

