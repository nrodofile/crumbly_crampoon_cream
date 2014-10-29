<?php
/**
 * Created by PhpStorm.
 * User: n8036039
 * Date: 10/29/14
 * Time: 10:51 PM
 */
include_once "Input.php";
include_once "classes/Note.php";
include_once "View.php";

class NoteView extends View{
	private $noteModel;
	private $idNote;
	private $subject;
	private $note;
	private $added;
	private $modified;
	private $user;

	function __construct(Note $noteModel) {
		$this->noteModel = $noteModel;
		$this->added = new Text("id_added", "Added",  $noteModel->added());
		$this->idNote = new Text("id_idNote", "idNote",  $noteModel->idNote());
		$this->modified = new Text("id_modified", "modified",  $noteModel->modified());
		$this->note = new Text("id_note", "note",  $noteModel->note());
		$this->subject = new Text("id_subject", "subject",  $noteModel->subject());
		$this->user = null;
	}

	public function input_form() {
		$output = '<form class="form-horizontal" role="form">';
		$output .= $this->idNote->input();
		$output .= $this->subject->input();
		$output .= $this->note->input();
		$output .= $this->added->output();
		$output .= $this->modified->input();
		$output .= $this->user;
		$output .= '</form>';
		return $output;
	}

	public function output_form() {
		$output = '<form class="form-horizontal" role="form">';
		$output .= $this->idNote->input();
		$output .= $this->subject->output();
		$output .= $this->note->output();
		$output .= $this->added->output();
		$output .= $this->modified->output();
		$output .= $this->user;
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