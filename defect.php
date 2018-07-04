<?php
        $id = $_REQUEST['postid'];
	$defect = $_REQUEST['defect'];
	$defectmatrix = $_REQUEST['defectmatrix'];
	$key = uniqid(rand());
	$tvsFile = "./upload/".$id."/defects/".$key;
	mkdir($tvsFile);
	file_put_contents($tvsFile."/defect.txt", $defect);
	file_put_contents($tvsFile."/defectmatrix.txt", $defectmatrix);
	header("Location:view.php?id=".$id);
?>
