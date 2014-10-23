<?php
/**
 * Created by PhpStorm.
 * User: Nicholas Rodofile
 */

include_once "Input.php";
include_once "classes/Network.php";
include_once "View.php";

class NetworkView extends View {
	private $network;
	private $idNetwork;
	private $address;
	private $name;
	private $hardware;
	private $notes;
	private $vulnerability;

	function __construct(Network $network) {
		$this->network = $network;
		$this->address = new Text("id_address", "Address", $network->address());
		$this->idNetwork = new Hidden("id_idNetwork", "ID Network",  $network->idNetwork());
		$this->name = new Text("id_name", "Name",  $network->name());
		$this->hardware = $network->hardware();
		$this->notes =  $network->notes();
		$this->vulnerability = $network->vulnerability();
	}

	public function input_form() {
		echo $this->name->input();
		echo $this->address->input();
		echo $this->idNetwork->input();
		echo $this->hardware;
		echo $this->notes;
		echo $this->vulnerability;
	}

	public function output_form() {
		// TODO: Implement output_form() method.
	}

	public function select() {
		// TODO: Implement select() method.
	}

	public function multi_select() {
		// TODO: Implement multi_select() method.
	}
}