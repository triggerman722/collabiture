<?php

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if (file_exists('./usr/'.$username)) {
	header('Location:join.html');
}

mkdir('./usr/'.$username);

$crypted = password_hash($password, PASSWORD_BCRYPT); 

file_put_contents('./usr/'.$username.'/password.txt', $crypted);

//copy('./templates', './usr/'.$username.'/templates');

header('Location:login.html');

?>
