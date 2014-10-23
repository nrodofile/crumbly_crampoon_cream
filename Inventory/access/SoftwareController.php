<?php
/**
 * User: Nicholas Rodofile
 */
include_once "utilities/utilities.php";
include_once "classes/Software.php";
include_once "Controller.php";

class SoftwareController extends Controller{

	public function create($software) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`create_Software`(:idSoftware, :name, :version, :Location);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idSoftware', $software->idSoftware());
				$stmt->bindParam(':name', $software->name());
				$stmt->bindParam(':version', $software->version());
				$stmt->bindParam(':Location', $software->location());
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

	public function read($software) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`read_Software`(:idSoftware);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idSoftware', $software->idSoftware());
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				$dbh = null;
				return $result;
			} catch (PDOException $e) {
				$msg = "<strong>Error!:</strong> " . $e->getMessage();
				echo alertDanger($msg);
			}
		} else {
			$msg = "<strong>Error!:</strong> "."No Connection!";
			echo alertDanger($msg);
		}
	}

	public function update($software) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`update_Software`(:idSoftware, :name, :version, :Location);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idSoftware', $software->idSoftware());
				$stmt->bindParam(':name', $software->name());
				$stmt->bindParam(':version', $software->version());
				$stmt->bindParam(':Location', $software->location());
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

	public function delete($software) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`delete_Software`(:idSoftware);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idSoftware', $software->idSoftware());
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
}

class OperatingSystemController extends Controller{

	public function create($os) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`create_OperatingSystem`(:idOperatingSystem);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idOperatingSystem', $os->idSoftware());
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


	public function read($os) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`read_OperatingSystem`(:idOperatingSystem);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idOperatingSystem', $os->idSoftware());
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

	public function update($os) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`update_OperatingSystem`(:idOperatingSystem);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idOperatingSystem', $os->idSoftware());
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

	public function delete($os) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`delete_OperatingSystem`(:idOperatingSystem);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idOperatingSystem', $os->idSoftware());
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
}