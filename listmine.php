<?php
require_once("session_mgmt.php");
?>
<html>
<body>
<a href="upload.html">New</a><br />
<table>

<?php
	$ismine = false;
	foreach(glob('upload/*') as $file) {
		foreach(glob($file.'/reviewers/*') as $filereviewers) {
			$fileparts = explode('/', $filereviewers);
               		$username = array_reverse($fileparts)[0];
 			if ($_SESSION['username'] == $username) {
					$ismine = true;
                                        break;
			}
		}
		if ($ismine) {
		$filefront = explode('/', $file)[1];
		$commentcount=0;
		$defectcount=0;
		$tvsState = "unknown";
		foreach(glob($file.'/comments/*') as $filecomments) {
			$commentcount++;
		}
		foreach(glob($file.'/defects/*') as $filedefects) {
			$defectcount++;
		}
       		foreach(glob($file.'/state/*') as $filestate) {
                	$tvsState = explode('.', array_reverse(explode('/', $filestate))[0])[0];
                	break;
        	}
		echo "<tr><td><a href='view.php?id=".$filefront."'>view</a></td><td><a href='delete.php?id=".$filefront."'>delete</a></td><td>Comments: ".$commentcount."</td><td>Defects: ".$defectcount."</td><td>State: ".$tvsState."</td></tr>";
	}
        }
?>
</table>
</body>
</html>
