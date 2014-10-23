<?php
/**
 * User: Nicholas Rodofile
 */

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
		$this->idNetwork = $idNetwork;
		$this->address = $address;
		$this->name = $name;
		$this->hardware = null;
		$this->notes = null;
		$this->vulnerability = null;
	}

	/**
	 * @return Text value
	 */
	public function address($value=Null){
		if (empty($value)){
			return $this->address;
		} else {
			$this->address = $value;
		}
	}

	/**
	 * @return Hidden
	 */
	public function idNetwork($value=Null) {
		if (empty($value)) {
			return $this->idNetwork;
		} else {
			$this->idNetwork = $value;
		}
	}

	/**
	 * @return Text
	 */
	public function name($value=Null) {
		if (empty($value)) {
			return $this->name;
		} else {
			$this->name = $value;
		}
	}

	function notes(){
		return $this->notes;
	}

	function vulnerability(){
		return $this->vulnerability;
	}

	function hardware(){
		return $this->hardware;
	}

	function select(){
		return "select";
	}

	function __toString() {
		return
			"idNetwork: ".$this->idNetwork."<br/>".
			"address: ".$this->address."<br/>".
			"name: ".$this->name."<br/>".
			"hardware: ".count($this->hardware)."<br/>".
			"notes: ".count($this->notes)."<br/>".
			"vulnerability: ".count($this->vulnerability)."<br/>";
	}


}
