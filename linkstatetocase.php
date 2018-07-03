<?php
$case = $_REQUEST['case'];
$state = $_REQUEST['state'];
foreach(glob('upload/'.$case.'/state/*') as $file) {
	unlink($file);
}
copy("admin/states/".$state.".txt", "upload/".$case."/state/".$state.".txt");
header("Location:view.php?id=".$case);
?>

