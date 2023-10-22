<?php
	//card.php

	namespace MTG\Models;

	class Card {
		private $name;
		private $description;
		private $image_url;
		private $rarity;

		public function __construct($name, $description, $image_url, $rarity){
			$this->name = $name;
			$this->description = $description;
			$this->image_url = $image_url;
			$this->rarity = $rarity;		
		}
		//Getters 
		public function getName(){
			return $this->name;
		}
		public function getDescription(){
			return $this->description;
		}
		public function getImage_url(){
			return $this->image_url;
		}
		public function getRarity(){
			return $this->rarity;
		}

		//Setters
		public function setName($name){
			$this->name = $name;
		}
		public function setDescription($description){
			$this->description = $description;
		}
		public function setImage_url($image_url){
			$this->image_url = $image_url;
		}
		public function setRarity($rarity){
			$this->rarity = $rarity;
		}
	}
?>