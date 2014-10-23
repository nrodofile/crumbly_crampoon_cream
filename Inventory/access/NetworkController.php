<?php
/**
 * User: Nicholas Rodofile
 */

include_once "utilities/utilities.php";
include_once "classes/Network.php";
include_once "Controller.php";

class NetworkController extends Controller{

	public function create($network) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`create_Network`(:idNetwork, :address, :name);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idNetwork', $network->idNetwork());
				$stmt->bindParam(':address', $network->address());
				$stmt->bindParam(':name', $network->name());
				$stmt->execute();
				$dbh = null;
			} catch (PDOException $e) {
				$msg = "<strong>Error!:</strong> " . $e->getMessage();
				echo alertDanger($msg);
			}
		} else {
			$msg = "<strong>Error!:</strong> "."No Connection!";
			echo alertDanger($msg);
		}
	}

	public function read($network) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`read_Network`(:idNetwork);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idNetwork', $network->idNetwork());
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				$dbh = null;
				return $result;
			} catch (PDOException $e) {
				$msg = "<strong>Error!:</strong> " . $e->getMessage();
				echo alertDanger($msg);
				return null;
			}
		} else {
			$msg = "<strong>Error!:</strong> "."No Connection!";
			echo alertDanger($msg);
			return null;
		}
	}

	public function update($network) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`update_Network`(:idNetwork, :address, :name);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idNetwork', $network->idNetwork());
				$stmt->bindParam(':address', $network->address());
				$stmt->bindParam(':name', $network->name());
				$stmt->execute();
				$dbh = null;
			} catch (PDOException $e) {
				$msg = "<strong>Error!:</strong> " . $e->getMessage();
				echo alertDanger($msg);
				return null;
			}
		} else {
			$msg = "<strong>Error!:</strong> "."No Connection!";
			echo alertDanger($msg);
			return null;
		}
	}

	public function delete($network) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`delete_Network`(:idNetwork);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idNetwork', $network->idNetwork());
				$stmt->execute();
				$dbh = null;
			} catch (PDOException $e) {
				$msg = "<strong>Error!:</strong> " . $e->getMessage();
				echo alertDanger($msg);
				return null;
			}
		} else {
			$msg = "<strong>Error!:</strong> "."No Connection!";
			echo alertDanger($msg);
			return null;
		}
	}
}