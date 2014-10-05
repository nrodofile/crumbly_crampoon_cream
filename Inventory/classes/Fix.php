<?php
/**
 * User: Nicholas Rodofile
 */
include_once "Input.php";
include_once "Software.php";
include_once "Note.php";

class Fix{
    private $idFix;
    private $description;
	private $software;
	private $notes;

	function __construct($idFix = null, $description = null) {
		$this->idFix = Hidden($id = "idFix_id", $placeholder = "Fix ID", $value = $idFix);
		$this->description = TextArea($id = "description_id", $placeholder = "Description", $value = $description);
		$this->notes = Note::fix($idFix);
		$this->software = Software::fix($idFix);
	}

	function vulnerability($idVulnerability){
		echo $idVulnerability;
		return null;
	}
}
