<?php
/**
 * Created by PhpStorm.
 * User: Nicholas Rodofile
 */
include_once 'classes/includes.php';
include_once 'access/includes.php';
include_once 'components/includes.php';

$host  = $_SERVER['HTTP_HOST'];

if(isset($_POST['form'])){
	if($_POST['form'] == 'insert_network'){
		$result = insert_network();
		header("Location: index_network.php?r=".sql_result($result));
	} elseif($_POST['form'] == 'insert_operatingSystem'){
		$result = insert_operatingSystem();
		header("Location: index_operating_system.php?r=".sql_result($result));
	} elseif($_POST['form'] == 'insert_software'){
		$result = insert_software();
		header("Location: index_software.php?r=".sql_result($result));
	} elseif($_POST['form'] == 'insert_application'){
		$result = insert_application();
		header("Location: index_application.php?r=".sql_result($result));
	} elseif($_POST['form'] == 'insert_hardware'){
		$result = insert_hardware();
		header("Location: index_hardware.php?r=".sql_result($result));
	} elseif($_POST['form'] == 'insert_fix'){
		$result = insert_fix();
		header("Location: index_fix.php?r=".sql_result($result));
	} elseif($_POST['form'] == 'insert_vulnerability'){
		$result = insert_vulnerability();
		header("Location: index_vulnerability.php?r=".sql_result($result));
	} elseif($_POST['form'] == 'insert_note'){
		$result = insert_note();
		header("Location: index_note.php?r=".sql_result($result));
	} elseif($_POST['form'] == 'insert_networkHardware'){
		$result = insert_networkHardware();
		header("Location: index_hardware.php?r=".sql_result($result).'&id='.$_POST['idHardware']);
	} elseif($_POST['form'] == 'insert_hardwareApplication'){
		$result = insert_hardwareApplication();
		header("Location: index_hardware.php?r=".sql_result($result).'&id='.$_POST['model_id']);
	} else {
		header("Location:index.php");
	}
} else {
	header("Location:index.php");
}

function insert_network(){
	$address = filter($_POST['address']);
	$name = filter($_POST['name']);

	$network = new Network(null, $address, $name);
	$controller = new NetworkController();
	return $controller->create($network);
}

function insert_operatingSystem(){
	$name = filter($_POST['name']);
	$version = filter($_POST['version']);
	$location = filter($_POST['location']);

	$operatingSystem = new OperatingSystem(null, $name, $version, $location);
	$controller = new OperatingSystemController();
	return $controller->create($operatingSystem);
}

function insert_software(){
	$name = filter($_POST['name']);
	$version = filter($_POST['version']);
	$location = filter($_POST['location']);

	$software = new Software(null, $name, $version, $location);
	$controller = new SoftwareController();
	return $controller->create($software);
}

function insert_application(){
	$name = filter($_POST['name']);
	$version = filter($_POST['version']);
	$location = filter($_POST['location']);
	$idOperatingSystem= filter($_POST['idOperatingSystem']);

	$software = new Application(null, $name, $version, $location, $idOperatingSystem);
	$controller = new ApplicationController();
	return $controller->create($software);
}

function insert_hardware(){
	$hostname = filter($_POST['hostname']);
	$idOperatingSystem= filter($_POST['idOperatingSystem']);

	$hardware = new Hardware(null, $hostname, $idOperatingSystem);
	$controller = new HardwareController();
	return $controller->create($hardware);
}

function insert_fix(){
	$description = filter($_POST['description']);

	$fix = new Fix(null, $description);
	$controller = new FixController();
	return $controller->create($fix);
}

function insert_vulnerability(){
	$description = filter($_POST['description']);
	$name = filter($_POST['name']);

	$vulnerability = new Vulnerability(null, $name, $description);
	$controller = new VulnerabilityController();
	return $controller->create($vulnerability);
}

function insert_note(){
	$subject = filter($_POST['subject']);
	$note = filter($_POST['note']);
	$user = filter($_POST['user']);

	$note = new Note(null, $note, $subject, $user);
	$controller = new NoteController();
	return $controller->create($note);
}

function insert_networkHardware(){
	$idNetwork = filter($_POST['network']);
	$idHardware = filter($_POST['idHardware']);
	$ip_address = filter($_POST['ip_address']);
	$mac_address = filter($_POST['mac_address']);

	$connection = new NetworkHardware($idNetwork, $idHardware, $ip_address, $mac_address);
	$controller = new NetworkHardwareController();
	return $controller->create($connection);
}

function insert_hardwareApplication(){
	$idHardware = filter($_POST['model_id']);
	$controller = new HardwareController();
	$result = true;
	foreach ($_POST['options'] as $Application){
		if (!$controller->addApplication($idHardware, $Application)){
			$result = false;
		}
	}
	return $result;
}