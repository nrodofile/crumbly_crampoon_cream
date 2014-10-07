<?php
/**
 * User: Nicholas Rodofile
 */
include_once "Input.php";
include_once "Software.php";
include_once "Note.php";

class Fix extends Model{
    private $idFix;
    private $description;
	private $software;
	private $notes;

	function __construct($idFix = null, $description = null) {
		$this->idFix = new Hidden("idFix_id", "Fix ID", $idFix);
		$this->description = new TextArea("description_id", "Description", $description);
		$this->notes = Note::fix($idFix);
		$this->software = Software::fix($idFix);
	}

	/**
	 * @return mixed
	 */
	public function description($value=Null) {
		if (empty($value)) {
			return $this->description;
		} else {
			$this->description->value = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function idFix($value=Null) {
		if (empty($value)) {
			return $this->idFix;
		}else {
			$this->idFix->value = $value;
		}
	}

	function vulnerability($idVulnerability){
		echo $idVulnerability;
		return null;
	}

	function __toString() {
		return
			"idFix: ".$this->idFix->value."<br/>".
			"description: ".$this->description->value."<br/>".
			"notes: ".count($this->notes)."<br/>".
			"software: ".count($this->software)."<br/>";
	}


}
