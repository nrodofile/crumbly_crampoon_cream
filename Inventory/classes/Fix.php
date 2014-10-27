<?php
/**
 * User: Nicholas Rodofile
 */
include_once "includes.php";


class Fix extends Model{
    private $idFix;
    private $description;
	private $software;
	private $notes;

	function __construct($idFix = null, $description = null) {
		$this->idFix =$idFix;
		$this->description = $description;
		$this->software = null;
		$this->notes = null;
	}

	/**
	 * @return null
	 */
	public function notes() {
		return $this->notes;
	}

	/**
	 * @return null
	 */
	public function software() {
		return $this->software;
	}

	/**
	 * @return mixed
	 */
	public function description($value=Null) {
		if (empty($value)) {
			return $this->description;
		} else {
			$this->description = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function idFix($value=Null) {
		if (empty($value)) {
			return $this->idFix;
		}else {
			$this->idFix = $value;
		}
	}

	function vulnerability($idVulnerability){
		echo $idVulnerability;
		return null;
	}

	function __toString() {
		return
			"idFix: ".$this->idFix."<br/>".
			"description: ".$this->description."<br/>";
	}


}
