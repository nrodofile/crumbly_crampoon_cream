<?php
/**
 * User: Nicholas Rodofile
 */
include_once "Input.php";
include_once "Hardware.php";
include_once "Note.php";
include_once "Vulnerability.php";

class Network{
    private $idNetwork;
    private $address;
    private $name;
	private $hardware;
	private $notes;
	private $vulnerability;

	function __construct( $idNetwork = null, $address = null, $hardware = null, $name = null) {
		$this->idNetwork = new Hidden($id = "idNetwork_id", $placeholder = "Network ID", $value = $idNetwork);
		$this->address = new Text($id = "address_id", $placeholder = "Address", $value = $address);
		$this->name = new Text($id = "name_id", $placeholder = "Name", $value = $name);
		$this->hardware = Hardware::network($idNetwork);
		$this->notes = Note::network($idNetwork);
		$this->vulnerability = Vulnerability::network($idNetwork);
	}

	function hardware($idHardware){
		echo $idHardware;
		return new self();
	}

	function select(){
		return "select";
	}
}
