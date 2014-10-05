<?php
/**
 * User: Nicholas Rodofile
 */

class User {
    private $idUser;
    private $username;
    private $name;
    private $password;
    private $salt;

	function __construct($idUser, $name, $password, $salt, $username) {
		$this->idUser = Hidden($id = "idUser_id", $placeholder = "User ID", $value = $idUser);
		$this->name = Text($id = "name_id", $placeholder = "Name", $value = $name);
		$this->password = Password($id = "password_id", $placeholder = "Password", $value = $password);
		$this->salt = Password($id = "salt_id", $placeholder = "Salt", $value = $salt);
		$this->username = Text($id = "username_id", $placeholder = "Username", $value = $username);
	}

	function by_id($idUser){
		echo $idUser;
		return null;
	}
} 