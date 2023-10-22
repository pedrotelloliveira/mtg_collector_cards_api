<?php
	//register.php

	namespace MTG\Controllers\Auth;

use MTG\Controllers\DatabaseConnection;
use MTG\Models\User;

	require __DIR__ . '/../../../vendor/autoload.php';

	class Register {
		private $database;
		private $user;

		public function __construct(DatabaseConnection $database, User $user) {
			$this->database = $database;
			$this->user = $user;
		}

		public function userRegister() {

			if ($this->database->fetchUser($this->user->getUsername()) > 0) {
				return true;
			} else {
				$query = $this->database->getConnection()->prepare("INSERT INTO users () WHERE username = :username");
				$query->bindParam(":username", $this->user->getUsername(), \PDO::PARAM_STR);
				$query->execute();
				$result = $query->fetch(\PDO::FETCH_ASSOC);
				return $result;
				return false;
			}

		// 	$sql = "SELECT * FROM users WHERE username =? AND password =?";
		//   $stmt = $this->getConnection()->prepare($sql);
		//   $stmt->bind_param("ss", $username, $password);
		//   $stmt->execute();
		//   $stmt->store_result();
		//   $stmt->bind_result($id, $username, $password);
		//   $stmt->fetch();
		//   $stmt->close();
		//   if ($stmt->num_rows > 0) {
		//     return true;
		//   } else {
		//     return false;
		//   }
		}
	}
?>