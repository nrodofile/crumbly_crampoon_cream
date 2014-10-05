<?php
/**
 * User: Nicholas Rodofile
 */
include_once "Input.php";
include_once "Software.php";
include_once "Network.php";
include_once "Note.php";
include_once "Vulnerability.php";

class Connection{
	private $idHardware;
	private $Connections;

	function __construct($Connections=null, $idHardware=null) {
		$this->Connections = $Connections;
		$this->idHardware = $idHardware;
	}

	function connected($idHardware){
		return null;
	}
}

class Hardware{
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
		$this->idHardware = new Hidden($id = "idHardware_id", $placeholder = "Hardware_ID", $value = $idHardware);
		$this->hostname = new Text($id = "hostname_id", $placeholder = "Hostname", $value = $hostname);
		$this->ip_address = new Text($id = "ip_address_id", $placeholder = "IP Address", $value = $ip_address);
		$this->mac_address = new Text($id = "mac_address_id", $placeholder = "MAC Address", $value = $mac_address);
		$this->OperatingSystem = new Text($id = "OperatingSystem_id", $placeholder = "Operating System", $value = $OperatingSystem);
		$this->network = Network::hardware($idHardware);
		$this->applications = Application::hardware($idHardware);
		$this->connections = Connection::connected($idHardware);
		$this->notes = Note::hardware($idHardware);
		$this->vulnerability = Vulnerability::hardware($idHardware);
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
}
