<?php
/**
 * User: Nicholas Rodofile
 */
include_once "Input.php";
include_once "Note.php";
include_once "Vulnerability.php";

class Software{
    private $idSoftware;
    private $name;
    private $version;
    private $location;
	private $notes;
	private $vulnerability;

	function __construct($idSoftware, $location, $name, $notes, $version, $vulnerability) {
		$this->idSoftware = Hidden($id = "idSoftware_id", $placeholder = "Software ID", $value =$idSoftware);
		$this->location = Text($id = "location_id", $placeholder = "Location", $value =$location);
		$this->name = Text($id = "name_id", $placeholder = "Network ID", $value = $name);
		$this->version = Text($id = "version_id", $placeholder = "Version", $value = $version);
		$this->vulnerability = Vulnerability::software($idSoftware);
		$this->notes = Note::software($idSoftware);
	}

	function by_id($idSoftware){
		echo $idSoftware;
		return null;
	}

	function fix($idFix){
		echo $idFix;
		return null;
	}
}

class OperatingSystem extends Software{
	private $software;
    private $idOperatingSystem;

	function __construct($idOperatingSystem) {
		$this->idOperatingSystem = Hidden($id = "idOperatingSystem_id", $placeholder = "Operating System",
			$value = $idOperatingSystem);
		$this->software = Software::by_id($idOperatingSystem);
	}

	function select(){
		print "Select";
	}

	function select_multi(){
		print "Select";
	}
}

class Application extends Software{
	private $software;
	private $idOperatingSystem;
	private $idSoftware;

	function __construct($idOperatingSystem, $idSoftware) {
		$this->idSoftware = Hidden($id = "idSoftware_id", $placeholder = "Software ID", $value =$idSoftware);
		$this->software = Software::by_id($idSoftware);
		$this->idOperatingSystem = OperatingSystem::by_id($idOperatingSystem);
	}

	function hardware($idHardware){
		echo $idHardware;
		return null;
	}
}
