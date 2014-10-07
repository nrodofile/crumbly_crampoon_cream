<?php
/**
 * User: Nicholas Rodofile
 */

include_once "Input.php";

class User extends Model{
    private $idUser;
    private $username;
    private $name;
    private $password;
    private $salt;

	function __construct($idUser=Null, $username=Null, $name=Null, $password=Null, $salt=Null) {
		$this->idUser = new Hidden("idUser_id","User ID",$idUser);
		$this->name = new Text("name_id", "Name", $name);
		$this->password = new Password("password_id", "Password", $password);
		$this->salt = new Password("salt_id","Salt", $salt);
		$this->username = new Text("username_id", "Username", $username);
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
			return $this->idUser->value;
		} else {
			$this->idUser->value = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function name($value=Null) {
		if (empty($value)) {
			//echo $this->name->input();
			return $this->name->value;
		}else {
			$this->name->value = $value;
		}
	}

	/**
	 * @return mixed
	 */
	protected  function password($value=Null) {
		if (empty($value)) {
			return $this->password->value;
		}else {
			$this->password->value = $value;
		}
	}

	/**
	 * @return mixed
	 */
	protected  function salt($value=Null) {
		if (empty($value)) {
			return $this->salt->value;
		}else {
			$this->salt->value = $value;
		}
	}

	/**
	 * @return mixed
	 */
	public function username($value=Null) {
		if (empty($value)) {
			return $this->username->value;
		}else {
			$this->username->value = $value;
		}
	}

	function __toString() {
		return
			"idUser: ".$this->idUser->value."<br/>".
			"name: ".$this->name->value."<br/>".
			"password: ".$this->password->value."<br/>".
			"salt: ".$this->salt->value."<br/>".
			"username: ".$this->username->value."<br/>";
	}


} 