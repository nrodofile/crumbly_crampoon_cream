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
	protected $controller;

	function __construct(Software $software) {
		$this->software = $software;
		$this->idSoftware = new Hidden("id_idSoftware", "idSoftware", $software->idSoftware(), "idSoftware");
		$this->name = new Text("id_name", "Name", $software->name(), "name");
		$this->version = new Text("id_version", "Version", $software->version(), "version");
		$this->location = new Text("id_location", "Location", $software->location(), "location");
		$this->notes = $software->note();
		$this->vulnerability = $software->vulnerability();
		$this->controller = new SoftwareController();

	}

	public function input_form($action="insert.php", $value="insert_software", $submit="Add Software") {
		$output = '<form class="form-horizontal" role="form" action="'.$action.'" method="post">';
		$output .= '<input type="hidden" name="form" value="'.$value.'">';
		$output .= $this->idSoftware->input();
		$output .= $this->name->input();
		$output .= $this->version->input();
		$output .= $this->location->input();
		$output .= $this->notes;
		$output .= $this->vulnerability;
		$output .= '<input type="submit" value="'.$submit.'" class="btn btn-success">';
		$output .= '</form>';
		return $output;
	}

	public function list_all() {
		$output = '';
		$output .= '<table class="table table-hover">';
		$output .= '
				<thead>
					<tr>
					  <th>Name</th>
					  <th>Version</th>
					  <th>Location</th>
					</tr>
				</thead>
				<tbody>';

		$list = $this->controller->select();
		foreach ($list as $item){
			$output .= '
        <tr>
          <td>'.$item['name'].'</td>
          <td>'.$item['version'].'</td>
          <td>'.$item['Location'].'</td>
        </tr>';
		}
		$output .= '
				</tbody>
			</table>';

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

class OperatingSystemView extends SoftwareView{
	function __construct(OperatingSystem $operatingSystem) {
		$this->software = $operatingSystem;
		$this->idSoftware = new Hidden("id_idOperatingSystem", "idOperatingSystem", $operatingSystem->idSoftware());
		$this->name = new Text("id_name", "Name", $operatingSystem->name(), "name");
		$this->version = new Text("id_version", "Version", $operatingSystem->version(), "version");
		$this->location = new Text("id_location", "Location", $operatingSystem->location(), "location");
		$this->notes = $operatingSystem->note();
		$this->vulnerability = $operatingSystem->vulnerability();
		$this->controller = new OperatingSystemController();
	}

	public function input_form($action="insert.php", $value="insert_operatingSystem", $submit="Add Operating System") {
		$output = '<form class="form-horizontal" role="form" action="'.$action.'" method="post">';
		$output .= '<input type="hidden" name="form" value="'.$value.'">';
		$output .= $this->idSoftware->input();
		$output .= $this->name->input();
		$output .= $this->version->input();
		$output .= $this->location->input();
		$output .= $this->notes;
		$output .= $this->vulnerability;
		$output .= '<input type="submit" value="'.$submit.'" class="btn btn-success">';
		$output .= '</form>';
		return $output;
	}

	public function select($id = null) {
		$list = $this->controller->select();
		$select_list = "<option>Select OS</option>";
		foreach ($list as $item){
			if($item['idSoftware'] == $id){
				$select_list .= '<option selected value="'.$item['idSoftware'].'">'.$item['name'].' ('.$item['version'].')</option>';
			} else{
				$select_list .= '<option value="'.$item['idSoftware'].'">'.$item['name'].' ('.$item['version'].')</option>';
			}
		}

		$select = new Select("id_idOperatingSystem", "Operating System",  $select_list, "idOperatingSystem");
		return $select;
	}
}

class ApplicationView extends SoftwareView{
	private $idOperatingSystem;

	function __construct(Application $application) {
		$this->software = $application;
		$this->idSoftware = new Hidden("id_idSoftware", "idSoftware", $application->idSoftware(), "idSoftware");
		$this->name = new Text("id_name", "Name", $application->name(), "name");
		$this->version = new Text("id_version", "Version", $application->version(), "version");
		$this->location = new Text("id_location", "Location", $application->location(), "location");
		$this->notes = $application->note();
		$this->vulnerability = $application->vulnerability();
		$this->idOperatingSystem = $application->idoperatingSystem();
		$this->controller = new ApplicationController();

	}

	public function input_form($action="insert.php", $value="insert_application", $submit="Add Application") {
		$os = new OperatingSystem();
		$os_view = new OperatingSystemView($os);
		$output = '<form class="form-horizontal" role="form" action="'.$action.'" method="post">';
		$output .= '<input type="hidden" name="form" value="'.$value.'">';
		$output .= $this->idSoftware->input();
		$output .= $this->name->input();
		$output .= $this->version->input();
		$output .= $this->location->input();
		$output .= $os_view->select()->input();
		$output .= $this->notes;
		$output .= $this->vulnerability;
		$output .= '<input type="submit" value="'.$submit.'" class="btn btn-success">';
		$output .= '</form>';
		return $output;
	}
}