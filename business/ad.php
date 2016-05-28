<?php
/************************************************************\
 *
 * File			ad.php
 *
 * Language		PHP
 *
 * Author		David Mack
 * Creation		20160425
 *
 * Project		teemw
 * Package		business
 *
 * Description	classe objet Ad
 *
 \************************************************************/
class Ad {
	
	public function __construct($id = NULL, $user = NULL, $category = NULL, $departure_city = NULL, $destination_city = NULL, $title = NULL, $description = NULL, $total_weight = NULL, $objects_number = NULL, $total_volume = NULL, $date_beginning = NULL, $date_end = NULL) {
		$this->id = $id;
		$this->user = $user;
		$this->category = $category;
		$this->departure_city = $departure_city;
		$this->destination_city = $destination_city;
		$this->title = $title;
		$this->description = $description;
		$this->total_weight = $total_weight;
		$this->objects_number = $objects_number;
		$this->total_volume = $total_volume;
		$this->date_beginning = $date_beginning;
		$this->date_end = $date_end;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getUser() {
		return $this->user;
	}
	public function setUser($user_id) {
		$this->user = $user_id;
	}
	public function getCategory() {
		return $this->category;
	}
	public function setCategory($category) {
		$this->category = $category;
	}
	public function getDeparture_city() {
		return $this->departure_city;
	}
	public function setDeparture_city($departure_city) {
		$this->departure_city = $departure_city;
	}
	public function getDestination_city() {
		return $this->destination_city;
	}
	public function setDestination_city($destination_city) {
		$this->destination_city = $destination_city;
	}
	public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		$this->title = $title;
	}
	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = $description;
	}
	public function getTotal_weight() {
		return $this->total_weight;
	}
	public function setTotal_weight($total_weight) {
		$this->total_weight = $total_weight;
	}
	public function getObjects_number() {
		return $this->objects_number;
	}
	public function setObjects_number($objects_number) {
		$this->objects_number = $objects_number;
	}
	public function getTotal_volume() {
		return $this->total_volume;
	}
	public function setTotal_volume($total_volume) {
		$this->total_volume = $total_volume;
	}
	public function getDate_beginning() {
		return $this->date_beginning;
	}
	public function setDate_beginning($date_beginning) {
		$this->date_beginning = $date_beginning;
	}
	public function getDate_end() {
		return $this->date_end;
	}
	public function setDate_end($date_end) {
		$this->date_end = $date_end;
	}
	private $id;
	private $user;
	private $category;
	private $departure_city;
	private $destination_city;
	private $title;
	private $description;
	private $total_weight;
	private $objects_number;
	private $total_volume;
	private $date_beginning;
	private $date_end;
}
?>