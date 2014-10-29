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
		$output = '<form class="form-horizontal" role="form">';
		$output .= $this->idFix->input();
		$output .= $this->description->input();
		$output .= $this->software;
		$output .= $this->notes;
		$output .= '</form>';
		return $output;
	}

	public function output_form() {
		$output = '<form class="form-horizontal" role="form">';
		$output .= $this->idFix->input();
		$output .= $this->description->output();
		$output .= $this->software;
		$output .= $this->notes;
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