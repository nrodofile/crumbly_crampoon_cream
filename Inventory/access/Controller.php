<?php
/**
 * User: Nicholas Rodofile
 */

class Controller {
	protected  $conn;

	function __construct() {
		try {
			$this->conn = new PDO('mysql:host=127.0.0.1;port=3306; dbname=SecurityChallenge', 'player', '90opl;./');
		} catch (PDOException $e) {
			$msg = "<strong>Error!:</strong> " . $e->getMessage();
			echo alertWarning($msg);
			$this->conn = null;
		}
	}

	function __destruct() {
		$this->conn = null;
	}

} 