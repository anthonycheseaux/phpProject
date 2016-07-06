<?php
/************************************************************\
 *
 * File			mysqladmanager.php
 *
 * Language		PHP
 *
 * Author		David Mack & Anthony Cheseaux
 * Creation		20160514
 * modification 
 *
 * Project		teemw
 *
 \************************************************************/
require_once 'mysqlconnection.php';
require_once '../business/ad.php';
class MySqlAdManager {
	public function __construct() {
		$this->_conn = new MySqlConnection ();
	}
	public function getAd($id) {
		$query = "SELECT 	ad.ad_id,
							ad.ad_user,
							cat.category_name as ad_category,
							ad.ad_title, 
							ad.ad_description,
							ad.ad_objects_number,
							ci1.city_name AS ad_departure_city, 
							ci2.city_name AS ad_destination_city,
	 						ad.ad_total_weight, 
	 						ad.ad_total_volume, 
	 						ad.ad_date_beginning,
	 						ad.ad_date_end
	 						
						FROM AD ad 
						INNER JOIN CITY ci1 ON (ad.ad_departure_city = ci1.city_id)
		   				INNER JOIN CITY ci2 ON (ad.ad_destination_city = ci2.city_id)
		   				INNER JOIN CATEGORY cat ON (ad.ad_category = cat.category_id)
						
						WHERE ad_id = '$id'";
		$result = $this->_conn->selectDB ( $query );
		$row = $result->fetch ();
		if (! $row)
			return null;
		$ad = new Ad ( 
				$row [$this::ID], 
				$row [$this::USER], 
				$row [$this::CATEGORY],
				$row [$this::DEPARTURE_CITY], 
				$row [$this::DESTINATION_CITY], 
				$row [$this::TITLE], 
				$row [$this::DESCRIPTION], 
				$row [$this::TOTAL_WEIGHT], 
				$row [$this::OBJECTS_NUMBER], 
				$row [$this::TOTAL_VOLUME], 
				$row [$this::DATE_BEGINNING],
				$row [$this::DATE_END] );
		return $ad;
	}
	
	/**
	 * Default : getAllAds() will return only active ads, when getAllAds(false) will return all ads
	 * 
	 * @param string $onlyActiveAds        	
	 */
	public function getAllAds($onlyActiveAds = TRUE) {
		if ($onlyActiveAds == TRUE)
			$query = "SELECT ad.ad_id,
							 ad.ad_user,
							 cat.category_name as ad_category,
							 ad.ad_title, 
							 ad.ad_description,
							 ad.ad_objects_number,
							 ci1.city_name AS ad_departure_city, 
							 ci2.city_name AS ad_destination_city,
	 						 ad.ad_total_weight, 
	 						 ad.ad_total_volume, 
	 						 ad.ad_date_beginning,
	 						 ad.ad_date_end
	 						
						FROM AD ad 
						INNER JOIN CITY ci1 ON (ad.ad_departure_city = ci1.city_id)
		   				INNER JOIN CITY ci2 ON (ad.ad_destination_city = ci2.city_id)
		   				INNER JOIN CATEGORY cat ON (ad.ad_category = cat.category_id) 
					
					    WHERE " . $this::INACTIVE . " = false"; // returns only active ads
		else
			$query = "SELECT ad.ad_id,
							 ad.ad_user,
							 cat.category_name as ad_category,
							 ad.ad_title, 
							 ad.ad_description,
							 ad.ad_objects_number,
							 ci1.city_name AS ad_departure_city, 
							 ci2.city_name AS ad_destination_city,
	 						 ad.ad_total_weight, 
	 						 ad.ad_total_volume, 
	 						 ad.ad_date_beginning,
	 						 ad.ad_date_end
	 						
						FROM AD ad 
						INNER JOIN CITY ci1 ON (ad.ad_departure_city = ci1.city_id)
		   				INNER JOIN CITY ci2 ON (ad.ad_destination_city = ci2.city_id)
		   				INNER JOIN CATEGORY cat ON (ad.ad_category = cat.category_id) "; // returns all ads
		$result = $this->_conn->selectDB ( $query );
		while ( $row = $result->fetch () ) {
			$ad = new Ad ( $row [$this::ID], $row [$this::USER], $row [$this::CATEGORY], $row [$this::DEPARTURE_CITY], $row [$this::DESTINATION_CITY], $row [$this::TITLE], $row [$this::DESCRIPTION], $row [$this::TOTAL_WEIGHT], $row [$this::OBJECTS_NUMBER], $row [$this::TOTAL_VOLUME], $row [$this::DATE_BEGINNING], $row [$this::DATE_END] );
			$response [] = $ad;
			unset ( $ad );
		}
		return $response;
	}
	
	/**
	 * Default : getAllAds() will return only active ads which end date is today or later, 
	 * when getAllAds(false) will return all ads which end date is today or later
	 * 
	 * @param string $onlyActiveAds        	
	 */
	public function getAllAdsFromToday($onlyActiveAds = TRUE) {
		if ($onlyActiveAds == TRUE)
			$query = "SELECT ad.ad_id,
							 ad.ad_user,
							 cat.category_name as ad_category,
							 ad.ad_title, 
							 ad.ad_description,
							 ad.ad_objects_number,
							 ci1.city_name AS ad_departure_city, 
							 ci2.city_name AS ad_destination_city,
	 						 ad.ad_total_weight, 
	 						 ad.ad_total_volume, 
	 						 ad.ad_date_beginning,
	 						 ad.ad_date_end
	 						
						FROM AD ad 
						INNER JOIN CITY ci1 ON (ad.ad_departure_city = ci1.city_id)
		   				INNER JOIN CITY ci2 ON (ad.ad_destination_city = ci2.city_id)
		   				INNER JOIN CATEGORY cat ON (ad.ad_category = cat.category_id)  
					
					WHERE " . $this::INACTIVE . " = false" . " AND DATE(" . $this::DATE_END . ") >= CURDATE()"; // returns only active ads
		else
			$query = "SELECT ad.ad_id,
							 ad.ad_user,
							 cat.category_name as ad_category,
							 ad.ad_title, 
							 ad.ad_description,
							 ad.ad_objects_number,
							 ci1.city_name AS ad_departure_city, 
							 ci2.city_name AS ad_destination_city,
	 						 ad.ad_total_weight, 
	 						 ad.ad_total_volume, 
	 						 ad.ad_date_beginning,
	 						 ad.ad_date_end
	 						
						FROM AD ad 
						INNER JOIN CITY ci1 ON (ad.ad_departure_city = ci1.city_id)
		   				INNER JOIN CITY ci2 ON (ad.ad_destination_city = ci2.city_id)
		   				INNER JOIN CATEGORY cat ON (ad.ad_category = cat.category_id) 
					
					WHERE DATE(" . $this::DATE_END . ") >= CURDATE()"; // returns all ads
		
		$result = $this->_conn->selectDB ( $query );
		
		while ( $row = $result->fetch () ) {
			$ad = new Ad( $row [$this::ID], 
					$row [$this::USER], 
					$row [$this::CATEGORY], 
					$row [$this::DEPARTURE_CITY], 
					$row [$this::DESTINATION_CITY], 
					$row [$this::TITLE], 
					$row [$this::DESCRIPTION], 
					$row [$this::TOTAL_WEIGHT], 
					$row [$this::OBJECTS_NUMBER], 
					$row [$this::TOTAL_VOLUME], 
					$row [$this::DATE_BEGINNING], 
					$row [$this::DATE_END] );
			
			$response [] = $ad;
			unset ( $ad );
		}
		
		if (! empty ( $response ))
			return $response;
		else
			return null;
	}
	
	public function createAd(Ad $ad) {
		$query = "INSERT INTO ad (" . $this::USER . ", " . $this::CATEGORY . ", " . $this::DEPARTURE_CITY . ", " . $this::DESTINATION_CITY . ", " . $this::TITLE . ", " . $this::DESCRIPTION . ", " . $this::TOTAL_WEIGHT . ", " . $this::TOTAL_VOLUME . ", " . $this::DATE_BEGINNING . ", " . $this::DATE_END . ") 
					VALUES ('" . $ad->getUser () . "', '" . $ad->getCategory () . "', '" . $ad->getDeparture_city () . "', '" . $ad->getDestination_city () . "', '" . $ad->getTitle () . "', '" . $ad->getDescription () . "', '" . $ad->getTotal_weight () . "', '" . $ad->getTotal_volume () . "', '" . $ad->getDate_beginning () . "', '" . $ad->getDate_end () . "');";
		
		return $this->_conn->executeQuery ( $query );
	}
	
	public function updateAd(Ad $ad) {
		$query = "UPDATE ad
					SET " . $this::CATEGORY . " = " . $ad->getCategory () . ", " . $this::USER . " = " . $ad->getUser () . " , " . $this::DEPARTURE_CITY . " = " . $ad->getDeparture_city () . ", " . $this::DESTINATION_CITY . " = " . $ad->getDestination_city () . ", " . $this::TITLE . " = " . $ad->getTitle () . ", " . $this::DESCRIPTION . " = " . $ad->getDescription () . ", " . $this::TOTAL_VOLUME . " = " . $ad->getTotal_volume () . ", " . $this::TOTAL_WEIGHT . " = " . $ad->getTotal_weight () . ", " . $this::DATE_BEGINNING . " = " . $ad->getDate_beginning () . ", " . $this::DATE_END . " = " . $ad->getDate_end () . " " . "WHERE " . $this::ID . " = " . $ad->getId () . ";";
		
		return $this->_conn->executeQuery ( $query );
	}
	public function deleteAd(Ad $ad) {
		$query = "DELETE ad WHERE " . $this::ID . " = " . $ad->getId ();
		
		return $this->_conn->executeQuery ( $query );
	}
	
	// Connection
	private $_conn;
	
	// Field names in the Data Base
	const ID = "ad_id";
	const USER = "ad_user";
	const CATEGORY = "ad_category";
	const DEPARTURE_CITY = "ad_departure_city";
	const DESTINATION_CITY = "ad_destination_city";
	const TITLE = "ad_title";
	const DESCRIPTION = "ad_description";
	const TOTAL_WEIGHT = "ad_total_weight";
	const OBJECTS_NUMBER = "ad_objects_number";
	const TOTAL_VOLUME = "ad_total_volume";
	const DATE_BEGINNING = "ad_date_beginning";
	const DATE_END = "ad_date_end";
	const INACTIVE = "ad_inactive";
}