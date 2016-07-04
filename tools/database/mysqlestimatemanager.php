<?php
/************************************************************\
 *
 * File				mysqlestimatemanager.php
 *
 * Language			PHP
 *
 * Author			David Mack
 * Creation			20160528
 * modification 
 *
 * Project			teemw
 *
 \************************************************************/
require_once 'mysqlconnection.php';
require_once '/business/estimate.php';
require_once 'mysqladmanager.php';

class MySqlEstimateManager {
	
	public function __construct() {
		$this->_conn = new MySqlConnection();
	}
	
	// SELECTS
	// Estimate by id
	public function getEstimate($id) {
		$query = "SELECT * FROM estimate WHERE " . self::ID . " = " . $id;
		$result = $this->_conn->selectDB($query);
		$row = $result->fetch();
		if (!row) return null;
		
		return new Estimate($row[$this::ID], $row[$this::AD], $row[$this::PRICE], $row[$this::SHIPPER]);
	}
	
	public function getAllEstimatesByCustomer($customer_id, $onlyActiveEstimates = TRUE) {
		$condition = "";
		if ($onlyActiveEstimates = TRUE)
			$condition = " AND " . $this::INACTIVE . " = false";
		
		$query = "SELECT * FROM estimate AS e, ad as a " .
				"WHERE e." . $this::AD . " = " . MySqlAdManager::ID . " " .				// jointure estimate - ad
				"AND a." . MySqlAdManager::USER . " = " . $customer_id . 
				$condition . ";";
		
		$result = $this->_conn->executeQuery($query);
		if (!row) return null;
		
		while ($row = $result->fetch()) {
			$estimate = new Estimate($row[$this::ID], $row[$this::AD], $row[$this::PRICE], $row[$this::SHIPPER]);
			$response[] = $estimate;
			unset($estimate);
		}
		
		return $response;
	}
	
	public function getAllEstimatesByAd($ad_id, $onlyActiveEstimates = TRUE) {
		$condition = "";
		if ($onlyActiveEstimates = TRUE)
			$condition = " AND " . $this::INACTIVE . " = false";
		
		$query = "SELECT * FROM estimate WHERE ". $this::AD. " = ". $ad_id . $condition . ";";

		$result = $this->_conn->selectDB($query);
		if (!row) return null;
	
		while ($row = $result->fetch()) {
			$estimate = new Estimate($row[$this::ID], $row[$this::AD], $row[$this::PRICE], $row[$this::SHIPPER]);
			$response[] =serialize($estimate) ;
			unset($estimate);
		}
	
		return $response;
	}
	
	// INSERT
	public function createEstimate(Estimate $estimate) {
		
		$query = "INSERT INTO estimate (" . $this::AD . ", " . $this::PRICE . ", " . $this::SHIPPER . ") " .
				"VALUES ('" . $estimate->getAd() . "', '" . $estimate->getPrice() . "', '" . $estimate->getShipper() . "');";
		
		return $this->_conn->executeQuery($query);
	}
	
	// UPDATE
	public function updateEstimate(Estimate $estimate) {
		$query = "UPDATE estimate " .
				"SET " .	$this::AD . " = " . $estimate->getAd() . ", " .
							$this::PRICE . " = " . $estimate->getPrice() . ", " . 
							$this::SHIPPER . " = " . $estimate->getShipper() . " " .
				"WHERE " . $this::ID . " = " . $estimate->getId() . ";";
		
		return $this->_conn->executeQuery($query);
	}
	
	// DELETE
	public function deleteEstimate(Estimate $estimate) {
		$query = "DELETE estimate WHERE " . $this::ID . " = " . $estimate->getId() . ";";
		return $this->_conn->executeQuery($query);
	}
	
	
	
	// Connection
	private $_conn;
	
	// Field names in the Data Base
	const ID = 'estimate_id';
	const AD = 'estimate_ad';
	const PRICE = 'estimate_price';
	const SHIPPER = 'estimate_shipper';
	const INACTIVE = 'estimate_inactive';
}