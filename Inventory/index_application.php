<?php
include_once 'classes/includes.php';
include_once 'views/includes.php';
include_once 'components/includes.php';

$model = null;

$id = filter($_GET['id']);
$model = null;
if(isset($id)){
	$model = Application::getByID($id);
} else {
	$model = new Application();
}

$view = new ApplicationView($model);
$nav = new NavbarView();
$container = new PanelContainerView();

$modal = new ModalView();
$note = new Note();
$note_view = new NoteView($note);
$vulnerability = new Vulnerability();
$vulnerability_view = new VulnerabilityView($vulnerability);



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
$title = 'Application';
echo $nav->show($title);
echo $container->db_message($title);

if(isset($id)){
	$output = $view->output_form();
	echo $container->display($title, $output);
	echo $container->display('Notes', $note_view->software($model));
	echo $container->display('Vulnerabilities', $vulnerability_view->list_all());

	echo $modal->vulnerability_model($vulnerability_view->input_form("insert.php", "insert_softwareVulnerability","Add Vulnerability", $id));
	echo $modal->note_model($note_view->input_form("insert_note.php", "note_software", "Add Note", $id));

} else {
	$output = $view->input_form();
	echo $container->display($title, $output);
	echo $container->display('Applications', $view->all());
}

?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>