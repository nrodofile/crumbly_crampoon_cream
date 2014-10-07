<?php
/**
 * User: Nicholas Rodofile
 */

abstract class Controller {
	protected  $conn;

	abstract public function create($model);
	abstract public function read($model);
	abstract public function update($model);
	abstract public function delete($model);

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