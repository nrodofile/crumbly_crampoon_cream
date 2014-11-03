<?php
/**
 * User: Nicholas Rodofile
 */

include_once "includes.php";


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

class NetworkHardware extends Model{
	private $idNetwork;
	private $idHardware;
	private $ip_address;
	private $mac_address;

	function __construct($idNetwork = null, $idHardware = null, $ip_address = null , $mac_address = null) {
		$this->idNetwork = $idNetwork;
		$this->idHardware = $idHardware;
		$this->ip_address = $ip_address;
		$this->mac_address = $mac_address;
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
	 * @return Hidden
	 */
	public function idHardware($value=Null) {
		if (empty($value)) {
			return $this->idHardware;
		} else {
			$this->idHardware = $value;
		}
	}

	/**
	 * @return Hidden
	 */
	public function ip_address($value=Null) {
		if (empty($value)) {
			return $this->ip_address;
		} else {
			$this->ip_address = $value;
		}
	}

	/**
	 * @return Hidden
	 */
	public function mac_address($value=Null) {
		if (empty($value)) {
			return $this->mac_address;
		} else {
			$this->mac_address = $value;
		}
	}

	function __toString() {
		return
			"idNetwork: ".$this->idNetwork."<br/>".
			"idHardware: ".$this->idHardware."<br/>".
			"ip_address: ".$this->ip_address."<br/>".
			"mac_address: ".$this->mac_address."<br/>";
	}


}
