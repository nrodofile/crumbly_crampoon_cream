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
						 $subject = null, $added = null, $modified = null, $user = null) {
		$this->added = $added;
		$this->idNote = $idNote;
		$this->modified = $modified;
		$this->note = $note;
		$this->subject = $subject;
		$this->user = $user;
	}

	/**
	 * @return mixed
	 */
	public function added($value=Null) {
		if (empty($value)) {
			return $this->added;
		} else {
			$this->added= $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function idNote($value=Null) {
		if (empty($value)) {
			return $this->idNote;
		} else {
			$this->idNote = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function modified($value=Null) {
		if (empty($value)) {
			return $this->modified;
		} else {
			$this->modified = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function note($value=Null) {
		if (empty($value)) {
			return $this->note;
		} else{
			$this->note = $value;
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
			return $this->subject;
		} else{
			$this->subject = $value;
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
			"idNote: ".$this->idNote."<br/>".
			"subject: ".$this->subject."<br/>".
			"note: ".$this->note."<br/>".
			"added: ".$this->added."<br/>".
			"modified: ".$this->modified."<br/>".
			"user: ".count($this->user)."<br/>";
	}


} 