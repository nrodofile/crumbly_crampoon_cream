<?php
/**
 * Created by PhpStorm.
 * User: Nicholas Rodofile
*/

include_once "Input.php";
include_once "classes/Hardware.php";
include_once "View.php";


class HardwareView extends View{
	private $hardware;
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

	function __construct(Hardware $hardware) {
		$this->hardware = $hardware;
		$this->OperatingSystem = new Text("id_OperatingSystem", "Operating System", $hardware->OperatingSystem());
		$this->applications = $hardware->applications();
		$this->connections = $hardware->connections();
		$this->hostname = new Text("id_hostname", "Hostname", $hardware->hostname());
		$this->idHardware = new Hidden("id_idHardware", "ID Hardware", $hardware->idHardware());
		$this->ip_address = new Text("id_ip_address", "IP Address", $hardware->ipAddress());
		$this->mac_address = new Text("id_mac_address", "Mac Address", $hardware->macAddress());
		$this->network = $hardware->network();
		$this->notes = $hardware->notes();
		$this->vulnerability = $hardware->vulnerability();
	}

	public function input_form() {
		$output = '<form class="form-horizontal" role="form">';
		$output .= $this->idHardware->input();
		$output .= $this->hostname->input();
		$output .= $this->ip_address->input();
		$output .= $this->mac_address->input();
		$output .= $this->network;
		$output .= $this->OperatingSystem->input();
		$output .= $this->connections;
		$output .= $this->applications;
		$output .= $this->notes;
		$output .= $this->vulnerability;
		$output .= '</form>';
		return $output;
	}

	public function output_form() {
		$output = '<form class="form-horizontal" role="form">';
		$output .= $this->idHardware->input();
		$output .= $this->hostname->output();
		$output .= $this->ip_address->output();
		$output .= $this->mac_address->output();
		$output .= $this->network;
		$output .= $this->OperatingSystem->output();
		$output .= $this->connections;
		$output .= $this->applications;
		$output .= $this->notes;
		$output .= $this->vulnerability;
		$output .= '</form>';
		return $output;
	}

	public function select() {
		// TODO: Implement select() method.
	}

	public function multi_select() {
		// TODO: Implement multi_select() method.
	}
}
