<?php
/**
 * User: Nicholas Rodofile
 */

include_once 'includes.php';

class UserController extends Controller {

	function create($user){
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`create_User`(:idUser, :username, :name, :password, :salt);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idUser', $user->idUser());
				$stmt->bindParam(':username', $user->username());
				$stmt->bindParam(':name', $user->name());
				$stmt->bindParam(':password', $user->password());
				$stmt->bindParam(':salt', $user->salt());
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

	function read($user){
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`read_User`(:idUser);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idUser', $user->idUser());
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

	function update($user){
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`update_User`(:idUser, :username, :name, :password, :salt);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idUser', $user->idUser());
				$stmt->bindParam(':username', $user->username());
				$stmt->bindParam(':name', $user->name());
				$stmt->bindParam(':password', $user->password());
				$stmt->bindParam(':salt', $user->salt());
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

	function delete($user){
		if($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`delete_User`(:idUser);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idUser', $user->idUser());
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