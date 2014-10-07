<?php
	include_once "classes/User.php";
	include_once "classes/Hardware.php";
	include_once "access/UserController.php";
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

//$user = new User(null, "Nic2", "nick", "123", "Nick");
$user = new User("2", "Nic2", "nick", "123777", "password");
$conn_user = new UserController();

//$user = new User("2");
$hw = new Hardware("1", "Mac", "192.168.1.1", "FF:FF:FF:FF:FF:FF");
$nw = new Network("2", "192.168.1.0", "Test Network");
$note = new Note("3", "test Note", "This IS working !");
$sw = new Software("4", "Software", "1.2", "www.qww.tex.com");
$os = new OperatingSystem("5", "Operating Sys", "1.2", "www.os.tex.com");
$app = new Application("6", "Application", "1.3", "www.app.tex.com");
$vul = new Vulnerability("7", "ShellShock", "Access Remotely via Bash");
$fix = new Fix("8", "Update with Software Patch");
echo "<h1> Hello ".$user->name()."</h1>";
echo $user;
echo "<h1>Hardware</h1>";
echo $hw;
echo "<h1>Network</h1>";
echo $nw;
echo "<h1>Note</h1>";
echo $note;
echo "<h1>Software</h1>";
echo $sw;
echo "<h1>Operating System</h1>";
echo $os;
echo "<h1>Application</h1>";
echo $app;
echo "<h1>Vulnerability</h1>";
echo $vul;
echo "<h1>Fix</h1>";
echo $fix;
//$conn_user = new UserController();
//print_r($conn_user->read($user));
//$conn_user->delete($user);
//$conn_user->create($user);
$conn_user->update($user);

?>


</body>
</html>