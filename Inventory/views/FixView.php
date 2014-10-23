<?php
/**
 * User: Nicholas Rodofile
 */

include_once "classes/Fix.php";
include_once "View.php";
include_once "Input.php";

class FixView extends View {
	public $fix;
	private $idFix;
	private $description;
	private $software;
	private $notes;

	function __construct(Fix $fix) {
		$this->fix = $fix;
		$this->description = new TextArea("id_description", "Description", $fix->description());
		$this->idFix = new Hidden("id_idFix", "ID Fix",$fix->idFix());
		$this->notes = $fix->notes();
		$this->software = $fix->software();

	}

	public function input_form() {
		echo $this->idFix->input();
		echo $this->description->input();
		echo $this->software;
		echo $this->notes;
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