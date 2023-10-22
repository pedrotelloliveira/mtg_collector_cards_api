<?php
	//DatabaseConnection.php
	namespace MTG\Controllers;

	use const MTG\Config\DB_INFO;

	class DatabaseConnection {
		private $connection;

		public function __construct() {
			try {
				$this->connection = new \PDO('mysql:host=' . DB_INFO["host"] . '; dbname=' . DB_INFO["name"], 
																			DB_INFO["username"], 
																			DB_INFO["password"]);
			} catch(\PDOException $e) {
				//catch
				print("Connection error: " . $e->getMessage() . "<br/>");
				die();
			}
		}

		public function getConnection() {
			return $this->connection;
		}

		public function fetchUser($username) {
			$query = $this->connection->prepare("SELECT * FROM users WHERE username = :username");
			$query->bindParam(":username", $username);
			$query->execute();
			$result = $query->fetch(\PDO::FETCH_ASSOC);
			return $result;
		}
	}
?>