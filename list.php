<?php
require_once("session_mgmt.php");
?>
<html>
<body>
<a href="upload.html">New</a><br />
<table>

<?php
	foreach(glob('upload/*') as $file) {
		$filefront = explode('/', $file)[1];
		$commentcount=0;
		$defectcount=0;
		foreach(glob($file.'/comments/*') as $filecomments) {
			$commentcount++;
		}
		foreach(glob($file.'/defects/*') as $filedefects) {
			$defectcount++;
		}
		echo "<tr><td><a href='view.php?id=".$filefront."'>view</a></td><td><a href='delete.php?id=".$filefront."'>delete</a></td><td>Comments: ".$commentcount."</td><td>Defects: ".$defectcount."</td></tr>";
        }
?>
</table>
</body>
</html>
