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

	public function input_form() {
		$output = '<form class="form-horizontal" role="form" action="insert.php" method="post">';
		$output .= '<input type="hidden" name="form" value="insert_network">';
		$output .= $this->idNetwork->input();
		$output .= $this->name->input();
		$output .= $this->address->input();
		$output .= $this->hardware;
		$output .= $this->notes;
		$output .= $this->vulnerability;
		$output .= $this->select();
		$output .= '<input type="submit" value="Add">';
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