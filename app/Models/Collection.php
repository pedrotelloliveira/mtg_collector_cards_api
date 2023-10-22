<?php
	//collection.php

	namespace MTG\Models;

	class Collection {
		private $name;
		private $description;
		private $created_at;
		private $cardsArray;
		
		public function __construct($name, $created_at, $description = null, $cardsArray = []) {
			$this->name = $name;
			$this->description = $description;
			$this->created_at = $created_at;
			$this->cardsArray = $cardsArray;
		}
		//Getters
		public function getName(){
			return $this->name;
		}
		public function getDescription(){
			return $this->description;
		}
		public function getCreated_at(){
			return $this->created_at;
		}
		
		//Setters
		public function setName($name){
			$this->name = $name;
		}
		public function setDescription($description){
			$this->description = $description;
		}
		public function setCreated_at($created_at){
			$this->created_at = $created_at;
		}
	}
?>