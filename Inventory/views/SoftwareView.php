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
	protected $index;

	function __construct(Software $software) {
		$this->software = $software;
		$this->idSoftware = new Hidden("id_idSoftware", "idSoftware", $software->idSoftware(), "idSoftware");
		$this->name = new Text("id_name", "Name", $software->name(), "name");
		$this->version = new Text("id_version", "Version", $software->version(), "version");
		$this->location = new Text("id_location", "Location", $software->location(), "location");
		$this->notes = $software->note();
		$this->vulnerability = $software->vulnerability();
		$this->controller = new SoftwareController();
		$this->index = $index = "index_software.php";

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

	public function all(){
		$list = $this->controller->select();
		return $this->list_all($list);
	}


	public function list_all($list = array()) {
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


		foreach ($list as $item){
			$output .= '
        <tr>
          <td><a href="'.$this->index.'?id='.$item['idSoftware'].'">'.$item['name'].'</a></td>
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
		$this->index = $index = "index_operating_system.php";
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
		if(empty($id) and !empty($this->idSoftware->value)){
			$id = $this->idSoftware->value;
		}
		$list = $this->controller->select();
		$select_list = "<option>Select OS</option>";
		foreach ($list as $item){
			if($item['idSoftware'] == $id){
				$select_list .= '<option selected ';
			} else{
				$select_list .= '<option ';
			}
			$select_list .= 'value="'.$item['idSoftware'].'">'.$item['name'];
			if (!empty($item['version'])){
				$select_list .= ' ('.$item['version'].')';
			}
			$select_list .= '</option>';
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
		$this->index = $index = "index_application.php";

	}

	public function input_form($action="insert.php", $value="insert_application", $submit="Add Application", $id = null) {
		$os = new OperatingSystem();
		$os_view = new OperatingSystemView($os);
		$output = '<form class="form-horizontal" role="form" action="'.$action.'" method="post">';
		$output .= '<input type="hidden" name="form" value="'.$value.'">';
		$output .= '<input type="hidden" name="model_id" value="'.$id.'">';
		$output .= $this->idSoftware->input();
		$output .= $this->name->input();
		$output .= $this->version->input();
		$output .= $this->location->input();
		$output .= $os_view->select($this->idOperatingSystem)->input();
		$output .= $this->notes;
		$output .= $this->vulnerability;
		$output .= '<input type="submit" value="'.$submit.'" class="btn btn-success">';
		$output .= '</form>';
		return $output;
	}

	public function output_form() {
		$os = new OperatingSystem();
		$os_view = new OperatingSystemView($os);
		$output = '<form class="form-horizontal" role="form">';
		$output .= $this->idSoftware->input();
		$output .= $this->name->output();
		$output .= $this->version->output();
		$output .= $this->location->output();
		$output .= $os_view->select($this->idOperatingSystem)->input();
		$output .= $this->notes;
		$output .= $this->vulnerability;
		$output .= '<div class="btn-group pull-right">';
		$output .= '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#note_modal">Add Note</button>';
		$output .= '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vulnerability_modal">Add Vulnerability</button>';
		$output .= '</div>';
		$output .= '</form>';
		return $output;
	}

	public function select_Hardware_has_Application($idHardware){
		$list = $this->controller->select_hardware_has_Application($idHardware);
		return $this->list_all($list);
	}

	public function select_by_operatingSystem($operatingSystem, $id = null, $action="insert.php", $value="insert_hardwareApplication") {
		$output = '';
		$output .= '<form class="form-horizontal" role="form" action="'.$action.'" method="post">';
		$output .= '<input type="hidden" name="model_id" value="'.$id.'">';
		$output .= '<input type="hidden" name="form" value="'.$value.'">';
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

		$list = $this->controller->select_by_operatingSystem($operatingSystem);
		foreach ($list as $item){
			$output .= '
        <tr>
          <td>'.$item['name'].'</td>
          <td>'.$item['version'].'</td>
          <td>'.$item['Location'].'</td>
          <td>
          	<div class="btn-group" data-toggle="buttons">
          		<label class="btn btn-primary">
    				<input type="checkbox" name="options[]" id="option'.$item['idSoftware'].'" autocomplete="off" value="'.$item['idSoftware'].'">
    				Select
  				</label>
  			</div>
          </td>
        </tr>';
		}
		$output .= '
				</tbody>
			</table>';
		$output .= '<input type="submit" value="add" class="btn btn-success">';
		$output .= '</form>';
		return $output;
	}
}