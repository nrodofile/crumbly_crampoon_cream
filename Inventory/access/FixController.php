<?php
/**
 * User: Nicholas Rodofile
 */

include_once "Controller.php";
include_once "utilities/utilities.php";
include_once "classes/Fix.php";

class FixController extends Controller{

	public function create($fix) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`create_Fix`(:idFix, :description);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idFix', $fix->idFix());
				$stmt->bindParam(':description', $fix->description());
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

	public function read($fix) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`read_Fix`(:idFix, :description);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idFix', $fix->idFix());
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

	public function update($fix) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`update_Fix`(:idFix, :description);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idFix', $fix->idFix());
				$stmt->bindParam(':description', $fix->description());
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

	public function delete($fix) {
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`delete_Fix`(:idFix, :description);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idFix', $fix->idFix());
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