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
	private $network;
	private $OperatingSystem;
	private $connections;
	private $applications;
	private $notes;
	private $vulnerability;
	private $controller;

	function __construct(Hardware $hardware) {
		$this->hardware = $hardware;
		$this->OperatingSystem = new OperatingSystem($hardware->OperatingSystem());
		$this->applications = $hardware->applications();
		$this->connections = $hardware->connections();
		$this->hostname = new Text("id_hostname", "Hostname", $hardware->hostname(), "hostname");
		$this->idHardware = new Hidden("id_idHardware", "ID Hardware", $hardware->idHardware(), "idHardware");
		$this->network = $hardware->network();
		$this->notes = $hardware->notes();
		$this->vulnerability = $hardware->vulnerability();
		$this->controller = new HardwareController();

	}

	public function input_form($action="insert.php", $value="insert_hardware", $submit="Add Hardware") {
		$os_view = new OperatingSystemView($this->OperatingSystem);
		$output = '<form class="form-horizontal" role="form" action="'.$action.'" method="post">';
		$output .= '<input type="hidden" name="form" value="'.$value.'">';
		$output .= $this->idHardware->input();
		$output .= $this->hostname->input();
		$output .= $this->network;
		$output .= $os_view->select()->input();
		$output .= $this->connections;
		$output .= $this->applications;
		$output .= $this->notes;
		$output .= $this->vulnerability;
		$output .= '<input type="submit" value="'.$submit.'" class="btn btn-success">';
		$output .= '</form>';
		return $output;
	}

	public function output_form() {
		$output = '<form class="form-horizontal" role="form">';
		$output .= $this->idHardware->input();
		$output .= $this->hostname->output();
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

	public function list_all() {
		$output = '';
		$output .= '<table class="table table-hover">';
		$output .= '
				<thead>
					<tr>
					  <th>Hostname</th>
					  <th>Operating System</th>
					</tr>
				</thead>
				<tbody>';

		$list = $this->controller->select();
		foreach ($list as $item){
			$output .= '
        <tr>
          <td>'.$item['Hostname'].'</td>
          <td>'.$item['OperatingSystem'].'</td>
        </tr>';
		}
		$output .= '
				</tbody>
			</table>';

		return $output;
	}
}
