<?php
$case = $_REQUEST['case'];
$defect = $_REQUEST['defect'];
$defectstate = $_REQUEST['defectstate'];
$defectfile = 'upload/'.$case.'/defects/'.$defect.'/defectstate.txt';
unlink($defectfile);
$defectcontent = file_get_contents("admin/defectstates/".$defectstate.".txt");
file_put_contents($defectfile, $defectcontent);
header("Location:view.php?id=".$case);
?>

