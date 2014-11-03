<?php
/**
 * User: Nicholas Rodofile
 */

include_once 'includes.php';

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
				$result = $stmt->execute();
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
				$result = $stmt->execute();
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

	public function delete($network) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`delete_Network`(:idNetwork);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idNetwork', $network->idNetwork());
				$result = $stmt->execute();
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

	public function select() {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`select_Network`();";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->execute();
				$result = $stmt->fetchAll();
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
}

class NetworkHardwareController extends Controller {

	public function create($networkHardware) {
		if ($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`create_Network_has_Hardware`(:Network, :Hardware, :ip_address, :mac_address);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':Network', $networkHardware->idNetwork());
				$stmt->bindParam(':Hardware', $networkHardware->idHardware());
				$stmt->bindParam(':ip_address', $networkHardware->ip_address());
				$stmt->bindParam(':mac_address', $networkHardware->mac_address());
				$result = $stmt->execute();
				$dbh = null;
				return $result;
			} catch (PDOException $e) {
				$msg = "<strong>Error!:</strong> " . $e->getMessage();
				echo alertDanger($msg);
				return null;
			}
		} else {
			$msg = "<strong>Error!:</strong> " . "No Connection!";
			echo alertDanger($msg);
			return null;
		}
	}

	public function read($network) {
		if ($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`Network_has_Hardware`(:idNetwork);";
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
			$msg = "<strong>Error!:</strong> " . "No Connection!";
			echo alertDanger($msg);
			return null;
		}
	}

	public function update($network) {
		if ($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`Network_has_Hardware`(:idNetwork, :address, :name);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idNetwork', $network->idNetwork());
				$stmt->bindParam(':address', $network->address());
				$stmt->bindParam(':name', $network->name());
				$result = $stmt->execute();
				$dbh = null;
				return $result;
			} catch (PDOException $e) {
				$msg = "<strong>Error!:</strong> " . $e->getMessage();
				echo alertDanger($msg);
				return null;
			}
		} else {
			$msg = "<strong>Error!:</strong> " . "No Connection!";
			echo alertDanger($msg);
			return null;
		}
	}

	public function delete($network) {
		if ($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`delete_Network`(:idNetwork);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idNetwork', $network->idNetwork());
				$result = $stmt->execute();
				$dbh = null;
				return $result;
			} catch (PDOException $e) {
				$msg = "<strong>Error!:</strong> " . $e->getMessage();
				echo alertDanger($msg);
				return null;
			}
		} else {
			$msg = "<strong>Error!:</strong> " . "No Connection!";
			echo alertDanger($msg);
			return null;
		}
	}

	public function select_network(Hardware $hardware) {
		if ($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`select_Hardware_has_network`(:Hardware)";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':Hardware', $hardware->idHardware());
				$stmt->execute();
				$result = $stmt->fetchAll();
				$dbh = null;
				return $result;
			} catch (PDOException $e) {
				$msg = "<strong>Error!:</strong> " . $e->getMessage();
				echo alertDanger($msg);
				return null;
			}
		} else {
			$msg = "<strong>Error!:</strong> " . "No Connection!";
			echo alertDanger($msg);
			return null;
		}
	}
}