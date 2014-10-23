<?php
/**
 * User: Nicholas Rodofile
 */
include_once "Input.php";
include_once "Note.php";
include_once "Vulnerability.php";
include_once "~/../access/SoftwareController.php";

class Software extends Model{
    protected $idSoftware;
	protected $name;
	protected $version;
	protected $location;
	protected $notes;
	protected $vulnerability;

	function __construct($idSoftware = null, $name = null, $version = null, $location = null) {
		$this->idSoftware = $idSoftware;
		$this->location = $location;
		$this->name = $name;
		$this->version = $version;
		$this->vulnerability = null;
		$this->notes = null;
	}

	/**
	 * @return mixed
	 */
	public function idSoftware($value=null) {
		if (empty($value)) {
			return $this->idSoftware;
		} else {
			$this->idSoftware = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function location($value=null) {
		if (empty($value)) {
			return $this->location;
		} else {
			$this->location = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function name($value=null) {
		if (empty($value)) {
			return $this->name;
		} else {
			$this->name = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function version($value=null) {
		if (empty($value)) {
			return $this->version;
		} else {
			$this->version = $value;
		}
	}


	public function by_id($idSoftware){
		echo $idSoftware;
		return null;
	}

	protected function init_by_id($idSoftware){
		$sw = $this;
		$controller = new SoftwareController();
		$software = $controller->read($sw);
		if (!empty($software)){
			$this->idSoftware = $software["idSoftware"];
			$this->location = $software["Location"];
			$this->name = $software["name"];
			$this->version = $software["version"];
			$this->vulnerability = null;
			$this->notes = null;
		}
	}

	public function fix($idFix){
		echo $idFix;
		return null;
	}

	function __toString() {
		return
			"idSoftware: ".$this->idSoftware."<br/>".
			"name: ".$this->name."<br/>".
			"version: ".$this->version."<br/>".
			"location: ".$this->location."<br/>".
			"vulnerability: ".count($this->vulnerability)."<br/>".
			"notes: ".count($this->notes)."<br/>";
	}


}

class OperatingSystem extends Software{

	function __construct($idOperatingSystem) {
		$this->idSoftware = $idOperatingSystem;
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
			"idSoftware: " . $this->idSoftware . "<br/>" .
			"location: " . $this->location . "<br/>" .
			"name: " . $this->name . "<br/>" .
			"version: " . $this->version . "<br/>" .
			"vulnerability: " . count($this->vulnerability) . "<br/>" .
			"notes: " . count($this->notes) . "<br/>";
	}
}

class Application extends Software{
	private $idOperatingSystem;

	function __construct($idOperatingSystem, $idSoftware) {
		$this->idOperatingSystem = $idOperatingSystem;
		$this->init_by_id($idSoftware);
	}

	function hardware($idHardware){
		echo $idHardware."Hardware_Application";
		return null;
	}

	function __toString() {
		return
			"idSoftware: " . $this->idSoftware . "<br/>" .
			"name: " . $this->name . "<br/>" .
			"version: " . $this->version . "<br/>" .
			"idOperatingSystem: " . count($this->idOperatingSystem). "<br/>" .
			"location: " . $this->location . "<br/>" .
			"vulnerability: " . count($this->vulnerability) . "<br/>" .
			"notes: " . count($this->notes) . "<br/>";
	}
}
