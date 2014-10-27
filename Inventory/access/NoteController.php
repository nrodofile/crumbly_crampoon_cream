<?php
/**
 * User: Nicholas Rodofile
 */

include_once 'includes.php';

class NoteController extends Controller {
	public function create($note) {
		if ($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`create_Note`(idNote, subject , note, added, modified, User);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idNote', $note->idNote());
				$stmt->bindParam(':subject', $note->subject());
				$stmt->bindParam(':note', $note->subject());
				$stmt->bindParam(':added', $note->subject());
				$stmt->bindParam(':modified', $note->subject());
				$stmt->bindParam(':User', $note->user()->IdUser());
				$stmt->execute();
				$dbh = null;
			} catch (PDOException $e) {
				$msg = "<strong>Error!:</strong> " . $e->getMessage();
				echo alertDanger($msg);
			}
		} else {
			$msg = "<strong>Error!:</strong> " . "No Connection!";
			echo alertDanger($msg);

		}
	}

	public function read($note) {
		if ($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`read_Note`(idNote);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idNote', $note->idNote());
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

	public function update($note) {
		if ($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`update_Note`(idNote, subject , note, added, modified, User);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idNote', $note->idNote());
				$stmt->bindParam(':subject', $note->subject());
				$stmt->bindParam(':note', $note->subject());
				$stmt->bindParam(':added', $note->subject());
				$stmt->bindParam(':modified', $note->subject());
				$stmt->bindParam(':User', $note->user()->IdUser());
				$stmt->execute();
				$dbh = null;
			} catch (PDOException $e) {
				$msg = "<strong>Error!:</strong> " . $e->getMessage();
				echo alertDanger($msg);
			}
		} else {
			$msg = "<strong>Error!:</strong> " . "No Connection!";
			echo alertDanger($msg);

		}
	}

	public function delete($note) {
		if ($this->conn != null) {
			try {
				$statement = "CALL `NetworkInventory`.`delete_Note`(idNote);";
				$dbh = $this->conn;
				$stmt = $dbh->prepare($statement);
				$stmt->bindParam(':idNote', $note->idNote());
				$stmt->execute();
				$dbh = null;
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