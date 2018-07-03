<?php
        $id = $_REQUEST['postid'];
	$defect = $_REQUEST['defect'];
	$key = uniqid(rand());
	$tvsFile = "./upload/".$id."/defects/".$key;
	file_put_contents($tvsFile, $defect);
	header("Location:view.php?id=".$id);
?>
