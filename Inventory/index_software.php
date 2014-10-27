<?php
include_once 'classes/includes.php';
include_once 'views/includes.php';
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

$sw = new Software("1", "Microsoft Word", "3000", "www.google.com");
$sv = new SoftwareView($sw);
$sv->input_form();



?>
</body>
</html>