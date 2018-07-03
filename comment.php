<?php
        $id = $_REQUEST['postid'];
	$comment = $_REQUEST['comment'];
	$commentmatrix = $_REQUEST['commentmatrix'];
	$key = uniqid(rand());
	$tvsFile = "./upload/".$id."/comments/".$key;
	mkdir($tvsFile);
	file_put_contents($tvsFile."/comment.txt", $comment);
	file_put_contents($tvsFile."/commentmatrix.txt", $commentmatrix);
	header("Location:view.php?id=".$id);
?>
