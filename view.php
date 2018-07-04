<?php
require_once("session_mgmt.php");
$id = $_REQUEST['id'];
?>
<!DOCTYPE HTML>
<HTML>
 <HEAD>
  <TITLE> JSC3D - Bank House Demo </TITLE>
  <META NAME="Author" CONTENT="JSC3D">
 </HEAD>

 <BODY>
<a href="upload.html">New</a> | <a href="list.php">List</a> | <a href="#"><?php echo $_SESSION['username']; ?></a> | <a href="logout.php">Logout</a><br />
	<canvas id="cv" style="border: 1px solid;" width="490" height="368" ></canvas>
	<script type="text/javascript" src="js/jsc3d.js"></script>
	<script type="text/javascript" src="js/jsc3d.webgl.js"></script>
	<script type="text/javascript" src="js/jsc3d.touch.js"></script>
	<script type="text/javascript">
	var canvas = document.getElementById('cv');
	var viewer = new JSC3D.Viewer(canvas);
	viewer.setParameter('SceneUrl', 'upload/<?php echo $id; ?>/<?php echo $id; ?>.obj');
	viewer.setParameter('InitRotationX', 0);
	viewer.setParameter('InitRotationY', 0);
	viewer.setParameter('InitRotationZ', 0);
	viewer.setParameter('ModelColor', '#CAA618');
	viewer.setParameter('BackgroundColor1', '#ffffff');
	viewer.setParameter('BackgroundColor2', '#ffffff');
	viewer.setParameter('RenderMode', 'wireframe');
	viewer.setParameter('MipMapping', 'on');
	viewer.setParameter('Renderer', 'webgl');
	viewer.init();
	viewer.update();
	function submitmatrix(fvsElement) {
		var thehidden = document.getElementById(fvsElement);
		thehidden.value = JSON.stringify(viewer.rotMatrix);
	}
	function setRotation(obj) {
		var matrix = obj;
		var premat = viewer.rotMatrix;
		viewer.rotMatrix.identity();
		viewer.rotMatrix.multiply(matrix);
		var postmat = viewer.rotMatrix;
		viewer.update();
	}
  </script>
<hr />
Current State: 
<?php
        foreach(glob('upload/'.$id.'/state/*') as $file) {
                $tvsState = explode('.', array_reverse(explode('/', $file))[0])[0];
                echo "<strong>".$tvsState."</strong>";
		break;
        }
?>
<hr />
<form method="post" action="linkstatetocase.php">
<input type=hidden name="case" value="<?php echo $id; ?>" />
State: 
<select name="state">
<?php
        foreach(glob('admin/states/*') as $file) {
		$tvsState = explode('.', array_reverse(explode('/', $file))[0])[0];
                echo "<option value='".$tvsState."'>".$tvsState."</option>";
        }
?>
</select>
<input type="submit" />
</form>
<hr />

<table border="1">
<?php
        foreach(glob('upload/'.$id.'/comments/*') as $file) {
		$tvsComment = file_get_contents($file."/comment.txt");
		$tvsCommentMatrix = file_get_contents($file."/commentmatrix.txt");
                echo "<tr><td><a href='#' onclick='setRotation(".$tvsCommentMatrix.")'>".$tvsComment."</a></td></tr>";
        }
?>
</table>
<form method="post" action="comment.php" onsubmit="submitmatrix('commentmatrix')">
<input type=hidden name="postid" value="<?php echo $id; ?>" />
<input type=hidden name="commentmatrix" id="commentmatrix" value="" />
Comment: <input type="text" name="comment" /> <input type="submit" />
</form>
<hr />
<table border="1">
<?php
	foreach(glob('upload/'.$id.'/defects/*') as $file) {
		$tvsDefect = file_get_contents($file."/defect.txt");
		$tvsDefectMatrix = file_get_contents($file."/defectmatrix.txt");
		echo "<tr><td><a href='#' onclick='setRotation(".$tvsDefectMatrix.")'>".$tvsDefect."</a></td></tr>";
	}
?>
</table>
<form method="post" action="defect.php" onsubmit="submitmatrix('defectmatrix')">
<input type=hidden name="postid" value="<?php echo $id; ?>" />
<input type=hidden name="defectmatrix" id="defectmatrix" value="" />
Defect: <input type="text" name="defect" /> <input type="submit" />
</form>
<a href="listusers.php?target=<?php echo $id; ?>&action=reviewers">Add Reviewer</a>
<hr />
<table border="1">
<?php
	$tgt = 'upload/'.$id.'/reviewers/*';
        foreach(glob($tgt) as $file) {
		$fileparts = explode('/', $file);
		$username = array_reverse($fileparts)[0];
                echo "<tr><td>".$username."</td><td><a href=removeusers.php?target=".$id."&userlink=".$username."&action=reviewers>remove</a></td></tr>";
        }
?>
</table>
<hr />
<a href="listusers.php?target=<?php echo $id; ?>&action=observers">Add Observer</a>
<hr />
<table border="1">
<?php
        $tgt = 'upload/'.$id.'/observers/*';
        foreach(glob($tgt) as $file) {
                $fileparts = explode('/', $file);
                $username = array_reverse($fileparts)[0];
                echo "<tr><td>".$username."</td><td><a href=removeusers.php?target=".$id."&userlink=".$username."&action=observers>remove</a></td></tr>";
        }
?>
</table>
 </BODY>
</HTML>
