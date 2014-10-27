<?php
/**
 * User: Nicholas Rodofile
 */
include_once "includes.php";


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
		$this->idHardware = $idHardware;
		$this->hostname = $hostname;
		$this->ip_address = $ip_address;
		$this->mac_address = $mac_address;
		$this->OperatingSystem = $OperatingSystem;
		$this->network = null;
		$this->applications = $applications;
		$this->connections = null;
		$this->notes = $notes;
		$this->vulnerability = $vulnerability;
	}

	/**
	 * @return Hidden value
	 */
	public function idHardware($value=Null) {
		if (empty($value)) {
			return $this->idHardware->value;
		} else {
			$this->idHardware->value = $value;
		}
	}

	/**
	 * @return Text value
	 */
	public function hostname($value=Null) {
		if (empty($value)) {
			return $this->hostname;
		} else {
			$this->hostname = $value;
		}
	}

	/**
	 * @return Text value
	 */
	public function ipAddress($value=Null) {
		if (empty($value)) {
			return $this->ip_address;
		} else {
			$this->ip_address = $value;
		}
	}

	/**
	 * @return Text value
	 */
	public function macAddress($value=Null) {
		if (empty($value)) {
			return $this->mac_address;
		} else {
			$this->mac_address = $value;
		}
	}

	/**
	 * @return OperatingSystem
	 */
	public function OperatingSystem() {
		return $this->OperatingSystem;
	}

	function network(){
		return $this->network;
	}

	function notes(){
		return $this->notes;
	}

	function vulnerability(){
		return $this->vulnerability;
	}

	function applications(){
		return $this->applications;
	}

	function connections(){
		return $this->connections;
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
			"Hardware_id: ".$this->idHardware."<br/>".
			"Hostname: ".$this->hostname."<br/>".
			"IP_Address: ".$this->ip_address."<br/>".
			"Mac_Address: ".$this->mac_address."<br/>".
			"Network_Address: ".$this->network."<br/>".
			"Operating_System: ".$this->OperatingSystem."<br/>".
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
