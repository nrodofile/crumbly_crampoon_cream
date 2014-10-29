<?php
/**
 * Created by PhpStorm.
 * User: Nicholas Rodofile
 */
include_once 'classes/includes.php';
include_once 'access/includes.php';

foreach ($_POST as $key => $value) { $key = strip_tags($value); }

if(isset($_POST['form'])){
	if($_POST['form'] == 'insert_network'){
		insert_network();
	}
} else {
	echo "Broken";
}

function insert_network(){
	$address = strip_tags($_POST['address']);
	$name = strip_tags($_POST['name']);

	$network = new Network(null, $address, $name);
	$controller = new NetworkController();
	$controller->create($network);
	echo "Success";
}