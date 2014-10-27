<?php
/**
 * Created by PhpStorm.
 * User: Nicholas Rodofile
 */

include_once "Input.php";
include_once "classes/Software.php";
include_once "View.php";

class SoftwareView extends View{

	protected $idSoftware;
	protected $name;
	protected $version;
	protected $location;
	protected $notes;
	protected $vulnerability;
	protected $software;

	function __construct(Software $software) {
		$this->software = $software;
		$this->idSoftware = new Hidden("id_idSoftware", "idSoftware", $software->idSoftware());
		$this->name = new Text("id_name", "Name", $software->name());
		$this->version = new Text("id_version", "Version", $software->version());
		$this->location = new Text("id_location", "Location", $software->location());
		$this->notes = $software->note();
		$this->vulnerability = $software->vulnerability();
	}

	public function input_form() {
		echo $this->idSoftware->input();
		echo $this->name->input();
		echo $this->version->input();
		echo $this->location->input();
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