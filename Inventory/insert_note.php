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
	if($_POST['form'] == 'note_hardware'){
		$result = insert_hardware();
		header("Location: index_hardware.php?id=".$_POST['model_id']."&r=".sql_result($result));

	} elseif($_POST['form'] == 'note_software'){
		$result = insert_software();
		header("Location: index_software.php?id=".$_POST['model_id']."&r=".sql_result($result));

	} else {
		header("Location:index.php");
	}
} else {
	header("Location:index.php");
}

function insert_hardware(){
	$id = filter($_POST['model_id']);
	$subject = filter($_POST['subject']);
	$note = filter($_POST['note']);
	$user = filter($_POST['user']);

	$note = new Note(null, $note, $subject, $user);
	$controller = new NoteController();
	return $controller->hardware($note, $id);
}

function insert_software(){
	$id = filter($_POST['model_id']);
	$subject = filter($_POST['subject']);
	$note = filter($_POST['note']);
	$user = filter($_POST['user']);
	$note = new Note(null, $note, $subject, $user);
	$controller = new NoteController();
	return $controller->software($note, $id);
}

function insert_note(){
	$subject = filter($_POST['subject']);
	$note = filter($_POST['note']);
	$user = filter($_POST['user']);

	$note = new Note(null, $note, $subject, $user);
	$controller = new NoteController();
	return $controller->create($note);
}