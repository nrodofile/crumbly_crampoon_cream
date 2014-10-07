<?php
/**
 * User: Nicholas Rodofile
 */

include_once "Input.php";
include_once "User.php";


class Note  extends Model{
    private $idNote;
    private $subject;
    private $note;
    private $added;
    private $modified;
    private $user;

	function __construct($idNote = null, $note = null,
						 $subject = null, $added = null, $modified = null) {
		$this->added = new Text("added_id", "Added", $added);
		$this->idNote = new Hidden("idNote_id", "Note ID", $idNote);
		$this->modified = new Text("modified_id", "Modified", $modified);
		$this->note = new TextArea("note_id", "Note", $note);
		$this->subject = new Text("subject_id", "Subject", $subject);
		$this->user = User::by_id($user);
	}

	/**
	 * @return mixed
	 */
	public function added($value=Null) {
		if (empty($value)) {
			return $this->added->value;
		} else {
			$this->added->value = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function idNote($value=Null) {
		if (empty($value)) {
			return $this->idNote->value;
		} else {
			$this->idNote->value = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function modified($value=Null) {
		if (empty($value)) {
			return $this->modified->value;
		} else {
			$this->modified->value = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function note($value=Null) {
		if (empty($value)) {
			return $this->note->value;
		} else{
			$this->note->value = $value;
		}
	}

	/**
	 * @return User
	 */
	public function user() {
		return $this->user;
	}


	/**
	 * @return mixed
	 */
	public function subject($value=Null) {
		if (empty($value)) {
			return $this->subject->value;
		} else{
			$this->subject->value = $value;
		}
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

	function __toString() {
		return
			"idNote: ".$this->idNote->value."<br/>".
			"subject: ".$this->subject->value."<br/>".
			"note: ".$this->note->value."<br/>".
			"added: ".$this->added->value."<br/>".
			"modified: ".$this->modified->value."<br/>".
			"user: ".count($this->user)."<br/>";
	}


} 