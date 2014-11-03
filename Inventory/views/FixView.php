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
	private $controller;

	function __construct(Fix $fix) {
		$this->fix = $fix;
		$this->description = new TextArea("id_description", "Description", $fix->description(), "description");
		$this->idFix = new Hidden("id_idFix", "ID Fix",$fix->idFix(), "idFix");
		$this->notes = $fix->notes();
		$this->software = $fix->software();
		$this->controller = new FixController();

	}

	public function input_form($action="insert.php", $value="insert_fix", $submit="Add Fix", $id=null) {
		$output = '<form class="form-horizontal" role="form" action="'.$action.'" method="post">';
		$output .= '<input type="hidden" name="form" value="'.$value.'">';
		$output .= '<input type="hidden" name="model_id" value="'.$value.'">';
		$output .= $this->idFix->input();
		$output .= $this->description->input();
		$output .= $this->software;
		$output .= $this->notes;
		$output .= '<input type="submit" value="'.$submit.'" class="btn btn-success">';
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

	public function list_all() {
		$output = '';
		$output .= '<table class="table table-hover">';
		$output .= '
				<thead>
					<tr>
					  <th>Fix</th>
					  <th>Description</th>
					</tr>
				</thead>
				<tbody>';
		$count = 0;
		$list = $this->controller->select();
		foreach ($list as $item){
			$count += 1;
			$output .= '
        <tr>
          <td>'.$count.'</td>
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