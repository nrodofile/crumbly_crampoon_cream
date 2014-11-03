<?php
include_once 'classes/includes.php';
include_once 'views/includes.php';
include_once 'components/includes.php';

$id = filter($_GET['id']);
$model = null;
if(isset($id)){
	$model = Hardware::getByID($id);
} else {
	$model = new Hardware();
}

$nav = new NavbarView();
$container = new PanelContainerView();
$view = new HardwareView($model);


$modal = new ModalView();
$note = new Note();
$networkConnection = new NetworkHardware();
$application = new Application();
$fix = new Fix();
$vulnerability = new Vulnerability();


$application_view = new ApplicationView($application);
$note_view = new NoteView($note);
$connection_view = new NetworkHardwareView($networkConnection);
$fix_view = new FixView($fix);
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

$title = 'Hardware';
echo $nav->show($title);
echo $container->db_message($title);

if(isset($id)){
	$output = $view->output_form();
	echo $container->display($title, $output);
	echo $container->display('Network', $connection_view->hardwareNetwork($model));
	echo $container->display('Notes', $note_view->hardware($model));
	echo $container->display('Applications', $application_view->select_Hardware_has_Application($id));
	echo $container->display('Vulnerabilities', $vulnerability_view->list_all());


	echo $modal->networkHardware_model($connection_view->input_form("insert.php", "insert_networkHardware","Add Network Connection", $id));
	echo $modal->application_model($application_view->select_by_operatingSystem($model->OperatingSystem(), $id));
	echo $modal->vulnerability_model($vulnerability_view->input_form("insert.php", "insert_hardwareVulnerability","Add Vulnerability", $id));
	echo $modal->note_model($note_view->input_form("insert_note.php", "note_hardware", "Add Note", $id));

} else {
	$output = $view->input_form();
	echo $container->display($title, $output);
	echo $container->display('All Hardware', $view->list_all());
}



?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>