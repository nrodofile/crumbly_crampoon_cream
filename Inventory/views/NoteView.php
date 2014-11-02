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
	private $controller;

	function __construct(Note $noteModel) {
		$this->noteModel = $noteModel;
		$this->added = new Text("id_added", "Added",  $noteModel->added(), "added");
		$this->idNote = new Hidden("id_idNote", "idNote",  $noteModel->idNote(), "idNote");
		$this->modified = new Text("id_modified", "Modified",  $noteModel->modified(), "modified");
		$this->note = new TextArea("id_note", "Note",  $noteModel->note(), 'note');
		$this->subject = new Text("id_subject", "Subject",  $noteModel->subject(), "subject");
		$this->user = null;
		$this->controller = new NoteController();

	}

	public function input_form($action="insert.php", $value="insert_note", $submit="Add Note") {
		$output = '<form class="form-horizontal" role="form" action="'.$action.'" method="post">';
		$output .= '<input type="hidden" name="form" value="'.$value.'">';
		$output .= $this->idNote->input();
		$output .= $this->subject->input();
		$output .= $this->note->input();
		$output .= $this->user;
		$output .= '<input type="submit" value="'.$submit.'" class="btn btn-success">';
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

	public function list_all() {
		$output = '';
		$output .= '<table class="table table-hover">';
		$output .= '
				<thead>
					<tr>
						<th>Added</th>
					  	<th>Subject</th>
					  	<th>Note</th>
					</tr>
				</thead>
				<tbody>';
		$count = 0;
		$list = $this->controller->select();
		foreach ($list as $item){
			$count += 1;
			$output .= '
        <tr>
			<td>'.$item['added'].'</td>
			<td>'.$item['subject'].'</td>
			<td>'.$item['note'].'</td>
			<td>'.$item['description'].'</td>
        </tr>';
		}
		$output .= '
				</tbody>
			</table>';

		return $output;
	}

	public function select() {
		// TODO: Implement select() method.
	}

	public function multi_select() {
		// TODO: Implement multi_select() method.
	}
}