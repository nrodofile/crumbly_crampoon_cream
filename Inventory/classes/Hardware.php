<?php
/**
 * User: Nicholas Rodofile
 */
include_once "includes.php";


class Hardware extends Model{
    private $idHardware;
    private $hostname;
	private $network;
    private $OperatingSystem;
	private $connections;
	private $applications;
	private $notes;
	private $vulnerability;


	function __construct($idHardware=null, $hostname=null, $OperatingSystem=null) {
		$this->idHardware = $idHardware;
		$this->hostname = $hostname;
		$this->OperatingSystem = $OperatingSystem;
		$this->network = null;
		$this->applications = null;
		$this->connections = null;
		$this->notes = null;
		$this->vulnerability = null;
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
