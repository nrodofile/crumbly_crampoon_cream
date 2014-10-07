<?php
/**
 * User: Nicholas Rodofile
 */
include_once "Input.php";
include_once "Software.php";
include_once "Network.php";
include_once "Note.php";
include_once "Vulnerability.php";
include_once "Model.php";

class Hardware extends Model{
    private $idHardware;
    private $hostname;
    private $ip_address;
    private $mac_address;
	private $network;
    private $OperatingSystem;
	private $connections;
	private $applications;
	private $notes;
	private $vulnerability;


	function __construct($idHardware, $hostname=null, $ip_address=null, $mac_address=null, $OperatingSystem=null,
						 $applications=null, $notes=null, $vulnerability=null) {
		$this->idHardware = new Hidden("idHardware_id", "Hardware_ID", $idHardware);
		$this->hostname = new Text("hostname_id", "Hostname", $value = $hostname);
		$this->ip_address = new Text("ip_address_id", "IP Address", $ip_address);
		$this->mac_address = new Text("mac_address_id", "MAC Address", $mac_address);
		$this->OperatingSystem = new OperatingSystem($OperatingSystem);
		$this->network = Network::hardware($idHardware);
		$this->applications = Application::hardware($idHardware);
		$this->connections = Connection::connected($idHardware);
		$this->notes = Note::hardware($idHardware);
		$this->vulnerability = Vulnerability::hardware($idHardware);
	}

	/**
	 * @return Hidden value
	 */
	public function idHardware($value=Null) {
		if (empty($value)) {
			return $this->idHardware;
		} else {
			$this->idHardware->value = $value;
		}
	}

	/**
	 * @return Text value
	 */
	public function hostname($value=Null) {
		if (empty($value)) {
			return $this->hostname->value;
		} else {
			$this->hostname->value = $value;
		}
	}

	/**
	 * @return Text value
	 */
	public function ipAddress($value=Null) {
		if (empty($value)) {
			return $this->ip_address->value;
		} else {
			$this->ip_address->value = $value;
		}
	}

	/**
	 * @return Text value
	 */
	public function macAddress($value=Null) {
		if (empty($value)) {
			return $this->mac_address->value;
		} else {
			$this->mac_address->value = $value;
		}
	}

	/**
	 * @return OperatingSystem
	 */
	public function OperatingSystem() {
		return $this->OperatingSystem;
	}



	function network($idNetwork){
		echo $idNetwork;
		return null;
	}

	/**
	 * @returns array of Hardware
	 */
	public function getConnections() {
		if ($this->connections == null){
			return null;
		} else {
			return $this->connections;
		}
	}

	function __toString() {
		return
			"Hardware_id: ".$this->idHardware->value."<br/>".
			"Hostname: ".$this->hostname->value."<br/>".
			"IP_Address: ".$this->ip_address->value."<br/>".
			"Mac_Address: ".$this->mac_address->value."<br/>".
			"Network_Address: ".$this->network->address()."<br/>".
			"Operating_System: ".$this->OperatingSystem->idSoftware()."<br/>".
			"Connected: ".count($this->connections)."<br/>".
			"Applications: ".count($this->applications)."<br/>".
			"Notes: ".count($this->notes)."<br/>".
			"Vulnerabilites: ".count($this->vulnerability)."<br/>";
	}
}

class Connection extends Hardware{
	private $idHardware;
	private $Connections;

	function __construct($Connections=null, $idHardware=null) {
		$this->Connections = $Connections;
		$this->idHardware = $idHardware;
	}

	/**
	 * @return null
	 */
	public function connections() {
		return $this->Connections;
	}

	/**
	 * @return null
	 */
	public function idHardware() {
		return $this->idHardware;
	}

	public function count() {
		return "100";
	}



	function connected($idHardware){
		return null;
	}
}
