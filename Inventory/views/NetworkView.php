<?php
/**
 * Created by PhpStorm.
 * User: Nicholas Rodofile
 */

include_once "Input.php";
include_once "classes/Network.php";
include_once "access/includes.php";
include_once "View.php";

class NetworkView extends View {
	private $network;
	private $idNetwork;
	private $address;
	private $name;
	private $hardware;
	private $notes;
	private $vulnerability;
	private $controller;

	function __construct(Network $network) {
		$this->network = $network;
		$this->address = new Text("id_address", "Address", $network->address(), "address");
		$this->idNetwork = new Hidden("id_idNetwork", "ID Network",  $network->idNetwork(), "idNetwork");
		$this->name = new Text("id_name", "Name",  $network->name(), "name");
		$this->hardware = $network->hardware();
		$this->notes =  $network->notes();
		$this->vulnerability = $network->vulnerability();
		$this->controller = new NetworkController();
	}

	public function input_form($action="insert.php", $value="insert_network", $submit="Add Network") {
		$output = '<form class="form-horizontal" role="form" action="'.$action.'" method="post">';
		$output .= '<input type="hidden" name="form" value="'.$value.'">';
		$output .= $this->idNetwork->input();
		$output .= $this->name->input();
		$output .= $this->address->input();
		$output .= $this->hardware;
		$output .= $this->notes;
		$output .= $this->vulnerability;
		$output .= '<div class="btn-group pull-right">';
		$output .= '<input type="submit" value="'.$submit.'" class="btn btn-success">';
		$output .= '</div>';
		$output .= '</form>';
		return $output;
	}

	public function output_form() {
		$output = '<form class="form-horizontal" role="form">';
		$output .= $this->idNetwork->input();
		$output .= $this->name->output();
		$output .= $this->address->output();
		$output .= $this->hardware;
		$output .= $this->notes;
		$output .= $this->vulnerability;
		$output .= '</form>';
		return $output;
	}

	public function select($id = null) {
		$list = $this->controller->select();
		$select_list = "<option>Select Network</option>";
		foreach ($list as $item){
			if($item['idNetwork'] == $id){
				$select_list .= '<option selected value="'.$item['idNetwork'].'">'.$item['name'].' ('.$item['address'].')</option>';
			} else{
				$select_list .= '<option value="'.$item['idNetwork'].'">'.$item['name'].' ('.$item['address'].')</option>';
			}
		}

		$select = new Select("id_network", "Network",  $select_list, "network");
		return $select->input();
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
					  <th>Name</th>
					  <th>Address</th>
					</tr>
				</thead>
				<tbody>';

		$list = $this->controller->select();
		foreach ($list as $item){
			$output .= '
        <tr>
          <td>'.$item['name'].'</td>
          <td>'.$item['address'].'</td>
        </tr>';
		}
		$output .= '
				</tbody>
			</table>';

		return $output;
	}
}

class NetworkHardwareView extends View{
	private $idNetwork;
	private $idHardware;
	private $ip_address;
	private $mac_address;
	private $controller;
	private $networkHardware;

	function __construct($networkHardware) {
		$this->networkHardware = $networkHardware;
		$this->controller = new NetworkHardwareController();
		$this->idHardware = new Hidden("id_idHardware", "ID Hardware", $networkHardware->idHardware(), "idHardware");
		$this->idNetwork = new Hidden("id_idNetwork", "ID Network",  $networkHardware->idNetwork(), "idNetwork");
		$this->ip_address = new Text("id_ip_address", "IP Address",  $networkHardware->ip_address(), "ip_address");
		$this->mac_address = new Text("id_mac_address", "MAC Address",  $networkHardware->mac_address(), "mac_address");
	}


	public function input_form($action="insert.php", $value="insert_networkHardware", $submit="Add Network Connection", $id=null) {
		$output = '<form class="form-horizontal" role="form" action="'.$action.'" method="post">';
		$output .= '<input type="hidden" name="form" value="'.$value.'">';
		$output .= '<input type="hidden" name="idHardware" value="'.$id.'">';
		$network = new Network($this->idNetwork);
		$network_view = new NetworkView($network);
		$output .= $network_view->select();
		$output .= $this->ip_address->input();
		$output .= $this->mac_address->input();
		$output .= '<input type="submit" value="'.$submit.'" class="btn btn-success">';
		$output .= '</div>';
		$output .= '</form>';
		return $output;
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

	public function  hardwareNetwork($hardware){
		$list = $this->controller->select_network($hardware);
		return $this->list_all($list);
	}

	public function list_all($list=null) {
		$output = '';
		$output .= '<table class="table table-hover">';
		$output .= '
				<thead>
					<tr>
					  <th>IP Address</th>
					  <th>Mac Address</th>
					  <th>Network</th>
					</tr>
				</thead>
				<tbody>';


		foreach ($list as $item){
			$output .= '
        <tr>
          <td>'.$item['ip_address'].'</td>
          <td>'.$item['mac_address'].'</td>
          <td>'.$item['Network'].'</td>
        </tr>';
		}
		$output .= '
				</tbody>
			</table>';

		return $output;
	}
}