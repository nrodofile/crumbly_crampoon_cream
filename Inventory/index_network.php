<?php
include_once 'classes/includes.php';
include_once 'views/includes.php';
include_once 'components/includes.php';

//$model = new Network(null, "10.0.1.0", "Red Network");
$model = new Network();

$view = new NetworkView($model);
$nav = new NavbarView();
$output = $view->input_form();

//$output = $view->output_form();
$container = new PanelContainerView();
//$sv->input_form();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Network inventory Home</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<?php
$title = 'Network';
echo $nav->show($title);
echo $container->display($title, $output);
echo $container->display('Networks', $view->list_all());

?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>