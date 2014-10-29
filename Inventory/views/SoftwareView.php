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
		$output = '<form class="form-horizontal" role="form">';
		$output .=  $this->idSoftware->input();
		$output .= $this->name->input();
		$output .= $this->version->input();
		$output .= $this->location->input();
		$output .= $this->notes;
		$output .= $this->vulnerability;
		$output .= '</form>';
		return $output;
	}

	public function output_form() {
		$output = '<form class="form-horizontal" role="form">';
		$output .= $this->idSoftware->input();
		$output .= $this->name->output();
		$output .= $this->version->output();
		$output .= $this->location->output();
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