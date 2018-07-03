<?php
$username = $_REQUEST['userlink'];
$tvsTarget = $_REQUEST['target'];
$tvsAction = $_REQUEST['action'];
$tvsFilePath = "upload/".$tvsTarget."/".$tvsAction."/".$username;
unlink($tvsFilePath);
header("Location:view.php?id=".$tvsTarget);
?>

