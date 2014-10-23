<?php
/**
 * User: Nicholas Rodofile
 */
include_once "utilities/utilities.php";
include_once "classes/Hardware.php";
include_once "Controller.php";

class HardwareController extends Controller{

	public function create($hardware) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`create_Hardware`(:idHardware, :Hostname, :ip_address, :mac_address, :OperatingSystem);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idHardware', $hardware->idHardware());
				$stmt->bindParam(':Hostname', $hardware->hostname());
				$stmt->bindParam(':ip_address', $hardware->ipAddress());
				$stmt->bindParam(':mac_address', $hardware->macAddress());
				$stmt->bindParam(':OperatingSystem', $hardware->OperatingSystem()->idSoftware());
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

	/**
	 * @return array
	 */
	public function read($hardware) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`read_Hardware`(:idHardware);
";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idHardware', $hardware->idHardware());
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

	public function update($hardware) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`update_Hardware`(:idHardware, :Hostname, :ip_address, :mac_address, :OperatingSystem);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idHardware', $hardware->idHardware());
				$stmt->bindParam(':Hostname', $hardware->hostname());
				$stmt->bindParam(':ip_address', $hardware->ipAddress());
				$stmt->bindParam(':mac_address', $hardware->macAddress());
				$stmt->bindParam(':OperatingSystem', $hardware->OperatingSystem()->idSoftware());
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

	public function delete($hardware) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`delete_Hardware`(:idHardware);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idHardware', $hardware->idHardware());
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