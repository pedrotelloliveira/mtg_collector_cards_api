<?php
//user.php

namespace MTG\Models;

use MTG\Controllers\DatabaseConnection;

class User
{
	private $id;
	private $username;
	private $email;
	private $password;
	private $name;
	private $avatar;
	private $created_at;

	// Constructor
	public function __construct($username, $email, $password, $created_at = null, $name = null, $avatar = null)
	{
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->created_at = $created_at;
		$this->name = $name;
		$this->avatar = $avatar;
	}

	// Getters
	public function getId()
	{
		return $this->id;
	}
	public function getUsername()
	{
		return $this->username;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function getPassword()
	{
		return $this->password;
	}
	public function getCreated_at()
	{
		return $this->created_at;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getAvatar()
	{
		return $this->avatar;
	}

	// Setters
	public function setUsername($username)
	{
		$this->username = $username;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function setPassword($password)
	{
		$this->password = $password;
	}
	public function setAvatar($avatar)
	{
		$this->avatar = $avatar;
	}
	public function setName($name)
	{
		$this->name = $name;
	}

	public function add()
	{
		$db = new DatabaseConnection();
		$query = $db->getConnection()->prepare("INSERT INTO users (username, email, password, name) VALUES (:username, :email, :password, :name)");
		$query->bindParam(":username", $name);
		$query->bindParam(":email", $email);
		$query->bindParam(":password", $password);
		$query->bindParam(":password", $name);
		$result = $query->execute();
	}


	// Other methods
	public function save()
	{
		// Logic to save/update user data in the database
		// Example: Execute SQL query to update user details
	}

	public function delete()
	{
		// Logic to delete user from the database
		// Example: Execute SQL query to delete user record
	}

	// Additional methods...

}
