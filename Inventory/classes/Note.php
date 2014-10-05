<?php
/**
 * User: Nicholas Rodofile
 */

include_once "Input.php";
include_once "User.php";


class Note {
    private $idNote;
    private $subject;
    private $note;
    private $added;
    private $modified;
    private $user;

	function __construct($added = null, $idNote = null, $modified = null, $note = null,
						 $subject = null, $user = null) {
		$this->added = Text($id = "added_id", $placeholder = "Added", $value = $added);
		$this->idNote = Hidden($id = "idNote_id", $placeholder = "Note ID", $value = $idNote);
		$this->modified = Text($id = "modified_id", $placeholder = "Modified", $value = $modified);
		$this->note = Text_Area($id = "note_id", $placeholder = "Note", $value = $note);
		$this->subject = Text($id = "subject_id", $placeholder = "Subject", $value = $subject);
		$this->user = User::by_id($user);
	}

	function hardware($idHardware){
		echo $idHardware;
		return new self();
	}

	function software($idSoftware){
		echo $idSoftware;
		return new self();
	}

	function vulnerability($idVulnerability){
		echo $idVulnerability;
		return new self();
	}

	function fix($idFix){
		echo $idFix;
		return new self();
	}

	function network($idNetwork){
		echo $idNetwork;
		return new self();
	}
} 