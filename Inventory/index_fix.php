<?php
include_once 'classes/includes.php';
include_once 'views/includes.php';
include_once 'components/includes.php';

$model = new Fix();
$view = new FixView($model);
$nav = new NavbarView();
$output = $view->input_form();
$container = new PanelContainerView();
$modal = new ModalView();
$note = new Note();
$note_view = new NoteView($note);



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
$title = 'Fix';

echo $nav->show($title);
echo $container->db_message($title);
echo $container->display($title, $output);
echo $container->display('Fixes', $view->list_all());
echo $modal->note_model($note_view->input_form());

?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
