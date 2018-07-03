<html>
<body>
<form action="addusers.php" method="post">
<input type=hidden name=target value=<?php echo $_REQUEST['target']; ?> />
<input type=hidden name=action value=<?php echo $_REQUEST['action']; ?> />
<?php
	$i=0;
        foreach(glob('usr/*') as $file) {
		$user = explode('/', $file)[1];
                echo "<input type=checkbox name=userlink".$i." value='".$user."'> ".$user."<br />";
		$i++;
        }
?>
<input type="submit" /><input type=reset />
</form>
