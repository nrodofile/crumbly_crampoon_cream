<?php
include_once 'classes/includes.php';
include_once 'views/includes.php';
include_once 'components/includes.php';

$model = new Note();
$view = new NoteView($model);
$nav = new NavbarView();
//$view->input_form();
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
$title = 'Note';

echo $nav->show($title);
echo $container->db_message($title);
echo $container->display($title, $output);
echo $container->display('Notes', $view->list_all());

?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
