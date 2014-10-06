<?php
/**
 * User: Nicholas Rodofile
 */
include_once "Input.php";
include_once "Note.php";
include_once "Vulnerability.php";

class Software{
    protected  $idSoftware;
	protected $name;
	protected $version;
	protected $location;
	protected $notes;
	protected $vulnerability;

	function __construct($idSoftware = null, $name = null, $version = null, $location = null) {
		$this->idSoftware = new Hidden("idSoftware_id", "Software ID",$idSoftware);
		$this->location = new Text("location_id", "Location", $location);
		$this->name = new Text("name_id", "Network ID", $name);
		$this->version = new Text("version_id", "Version", $version);
		$this->vulnerability = Vulnerability::software($idSoftware);
		$this->notes = Note::software($idSoftware);
	}

	/**
	 * @return mixed
	 */
	public function idSoftware($value=null) {
		if (empty($value)) {
			return $this->idSoftware->value;
		} else {
			$this->idSoftware->value = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function location($value=null) {
		if (empty($value)) {
			return $this->location->value;
		} else {
			$this->location->value = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function name($value=null) {
		if (empty($value)) {
			return $this->name->value;
		} else {
			$this->name->value = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function version($value=null) {
		if (empty($value)) {
			return $this->version->value;
		} else {
			$this->version->value = $value;
		}
	}


	public function by_id($idSoftware){
		echo $idSoftware;
		return null;
	}

	protected function init_by_id($idSoftware){
		$this->idSoftware = new Hidden("idSoftware_id", "Software ID","idSoftware");
		$this->location = new Text("location_id", "Location", "location");
		$this->name = new Text("name_id", "Network ID", "name");
		$this->version = new Text("version_id", "Version", "version");
		$this->vulnerability = Vulnerability::software($idSoftware);
		$this->notes = Note::software($idSoftware);
	}

	public function fix($idFix){
		echo $idFix;
		return null;
	}

	function __toString() {
		return
			"idSoftware: ".$this->idSoftware->value."<br/>".
			"name: ".$this->name->value."<br/>".
			"version: ".$this->version->value."<br/>".
			"location: ".$this->location->value."<br/>".
			"vulnerability: ".count($this->vulnerability)."<br/>".
			"notes: ".count($this->notes)."<br/>";
	}


}

class OperatingSystem extends Software{
    private $idOperatingSystem;

	function __construct($idOperatingSystem) {
		$this->idOperatingSystem = new Hidden("idOperatingSystem_id", "Operating System", $idOperatingSystem);
		$this->init_by_id($idOperatingSystem);
	}

	function select(){
		print "Select";
	}

	function select_multi(){
		print "Select";
	}

	function __toString() {
		return
			"idSoftware: " . $this->idSoftware->value . "<br/>" .
			"location: " . $this->location->value . "<br/>" .
			"name: " . $this->name->value . "<br/>" .
			"version: " . $this->version->value . "<br/>" .
			"idOperatingSystem: " . $this->idOperatingSystem->value . "<br/>" .
			"vulnerability: " . count($this->vulnerability) . "<br/>" .
			"notes: " . count($this->notes) . "<br/>";
	}
}

class Application extends Software{
	private $idOperatingSystem;

	function __construct($idOperatingSystem, $idSoftware) {
		$this->idOperatingSystem = OperatingSystem::by_id($idOperatingSystem);
		$this->init_by_id($idSoftware);
	}

	function hardware($idHardware){
		echo $idHardware."Hardware_Application";
		return null;
	}

	function __toString() {
		return
			"idSoftware: " . $this->idSoftware->value . "<br/>" .
			"name: " . $this->name->value . "<br/>" .
			"version: " . $this->version->value . "<br/>" .
			"idOperatingSystem: " . count($this->idOperatingSystem). "<br/>" .
			"location: " . $this->location->value . "<br/>" .
			"vulnerability: " . count($this->vulnerability) . "<br/>" .
			"notes: " . count($this->notes) . "<br/>";
	}
}
