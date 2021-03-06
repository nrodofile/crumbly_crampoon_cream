<?php
include_once 'classes/includes.php';
include_once 'views/includes.php';
include_once 'components/includes.php';

$id = filter($_GET['id']);
$model = null;
if(isset($id)){
	$application = Application::getByID($id);
	$app = $application->idSoftware();
	if (isset($app)){
		header("Location: index_application.php?r=".$_GET['r']."&id=".$id);
	}
} else {
	$model = new Application();
}

$model = new Software();
$view = new SoftwareView($model);
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
$title = 'Software';
echo $nav->show($title);
echo $container->db_message($title);
echo $container->display($title, $output);
echo $container->display('All Software', $view->all());



?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>