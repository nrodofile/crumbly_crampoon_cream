<?php
/**
 * User: Nicholas Rodofile
 */

include_once "includes.php";

class User extends Model{
    private $idUser;
    private $username;
    private $name;
    private $password;
    private $salt;

	function __construct($idUser=Null, $username=Null, $name=Null, $password=Null, $salt=Null) {
		$this->idUser = $idUser;
		$this->name = $name;
		$this->password = $password;
		$this->salt = $salt;
		$this->username = $username;
	}

	function by_id($idUser){
		echo $idUser;
		return new self();
	}

	/**
	 * @return mixed
	 */
	public function IdUser($value=Null) {
		if (empty($value)) {
			return $this->idUser;
		} else {
			$this->idUser = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function name($value=Null) {
		if (empty($value)) {
			//echo $this->name->input();
			return $this->name;
		}else {
			$this->name = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public  function password($value=Null) {
		if (empty($value)) {
			return $this->password;
		}else {
			$this->password = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public  function salt($value=Null) {
		if (empty($value)) {
			return $this->salt;
		}else {
			$this->salt = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function username($value=Null) {
		if (empty($value)) {
			return $this->username;
		}else {
			$this->username = $value;
		}
	}

	function __toString() {
		return
			"idUser: ".$this->idUser."<br/>".
			"name: ".$this->name."<br/>".
			"password: ".$this->password."<br/>".
			"salt: ".$this->salt."<br/>".
			"username: ".$this->username."<br/>";
	}


} 