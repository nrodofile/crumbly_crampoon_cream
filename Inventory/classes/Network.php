<?php
/**
 * User: Nicholas Rodofile
 */
include_once "Input.php";
include_once "Hardware.php";
include_once "Note.php";
include_once "Vulnerability.php";

class Network extends Model{
    private $idNetwork;
    private $address;
    private $name;
	private $hardware;
	private $notes;
	private $vulnerability;

	function __construct( $idNetwork = null, $address = null, $name = null) {
		$this->idNetwork = new Hidden("idNetwork_id", "Network ID", $idNetwork);
		$this->address = new Text("address_id", "Address", $address);
		$this->name = new Text("name_id", "Name", $name);
		$this->hardware = Hardware::network($idNetwork);
		$this->notes = Note::network($idNetwork);
		$this->vulnerability = Vulnerability::network($idNetwork);
	}

	/**
	 * @return Text value
	 */
	public function address($value=Null){
		if (empty($value)){
			return $this->address->value;
		} else {
			$this->address->value = $value;
		}
	}

	/**
	 * @return Hidden
	 */
	public function idNetwork($value=Null) {
		if (empty($value)) {
			return $this->idNetwork->value;
		} else {
			$this->idNetwork->value = $value;
		}
	}

	/**
	 * @return Text
	 */
	public function name($value=Null) {
		if (empty($value)) {
			return $this->name->value;
		} else {
			$this->name->value = $value;
		}
	}

	function hardware($idHardware){
		echo $idHardware."Network_Hardware\n";
		return new self();
	}

	function select(){
		return "select";
	}

	function __toString() {
		return
			"idNetwork: ".$this->idNetwork->value."<br/>".
			"address: ".$this->address->value."<br/>".
			"name: ".$this->name->value."<br/>".
			"hardware: ".count($this->hardware)."<br/>".
			"notes: ".count($this->notes)."<br/>".
			"vulnerability: ".count($this->vulnerability)."<br/>";
	}


}
