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
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '\..\..');
require_once 'mysqlconnection.php';
require_once ('../business/estimate.php');
require_once ('../business/user.php');
require_once ('mysqladmanager.php');
require_once ('mysqlestimatemanager.php');

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
		if (!$row) return null;
		
		return new Estimate($row[$this::ID], $row[$this::AD], $row[$this::PRICE], $row[$this::SHIPPER], $row[$this::STATE]);
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
	
	public function getAllEstimatesByShipper($shipper_id, $state) {
	
	
		$condition = " AND " . $this::STATE . " = ".$state;
	
		$query = "SELECT * FROM estimate " .
				"WHERE " . $this::SHIPPER . " = " . $shipper_id . $condition . ";";
	
		$result = $this->_conn->selectDB($query);

		/*$row = $result->fetch();
		if (!$row) return null;*/

		$response = null;
		while ($row = $result->fetch()) {
			$estimate = new Estimate($row[$this::ID], $row[$this::AD], $row[$this::PRICE], $row[$this::SHIPPER], $row[$this::STATE]);
			$response[] =serialize($estimate);
			unset($estimate);
		}
		///if (!$row) return null; 

		return $response;
	}
	//test2  
	public function getAllEstimatesByShipperWithTitleAd($shipper_id, $state) {
	
	
		$condition = " AND " . $this::STATE . " = ".$state;
	
		$query = "SELECT * FROM estimate e 
				INNER JOIN ad a ON e.estimate_ad = a.ad_id 
				WHERE e.estimate_shipper = ". $shipper_id." AND e.estimate_state = ".$state. ";";
	
		$result = $this->_conn->selectDB($query);
	
		/*$row = $result->fetch();
			if (!$row) return null;*/
	
		$response = null;
		while ($row = $result->fetch()) {
			$estimate = new Estimate($row[$this::ID], $row[$this::AD], $row[$this::PRICE], $row[$this::SHIPPER], $row[$this::STATE]);
			$estimate->setTitleAd($row[$this::TITLE_AD]);
			$estimate->setBeginDate($row[$this::DATE_BEGIN_AD]);
			$response[] =serialize($estimate);
			unset($estimate);
		}
		///if (!$row) return null;
	
		return $response;
	}
	

	
	public function getAllEstimatesByAd($ad_id, $onlyActiveEstimates = TRUE) {
		$condition = "";
		if ($onlyActiveEstimates = TRUE)
			$condition = " AND " . $this::INACTIVE . " = false";
		
		$query = "SELECT * FROM estimate WHERE ". $this::AD. " = ". $ad_id . $condition . ";";

		$result = $this->_conn->selectDB($query);
		
		while ($row = $result->fetch()) {
			$estimate = new Estimate($row[$this::ID], $row[$this::AD], $row[$this::PRICE], $row[$this::SHIPPER]);
			$response[] = serialize($estimate) ;
			unset($estimate);
		}
		
		return $response;
	}
	
	public function getAllEstimatesByAdAndState($ad_id, $state) {
		$condition = "";
		if ($onlyActiveEstimates = TRUE)
			$condition = " AND " . $this::STATE . " = ".$state;
	
			$query = "SELECT * FROM estimate WHERE ". $this::AD. " = ". $ad_id . $condition . ";";
		
			$result = $this->_conn->selectDB($query);
			
			while ($row = $result->fetch()) {
				$estimate = new Estimate($row[$this::ID], $row[$this::AD], $row[$this::PRICE], $row[$this::SHIPPER], $row[$this::STATE]);
				$response[] =serialize($estimate) ;
				unset($estimate);
			}

			if(isset($response))
				return $response;
			
	}
	
	public function getAllEstimatesByState($state) {
		$query = "SELECT * FROM estimate WHERE " . $this::STATE . " = " . $state;
		
		$result = $this->_conn->selectDB($query);
		
		while ($row = $result->fetch()) {
			$estimate = new Estimate($row[$this::ID], $row[$this::AD], $row[$this::PRICE], $row[$this::SHIPPER], $row[$this::STATE]);
			
			$response[] = $estimate;
			unset($estimate);
		}
		
		if (isset($response))
			return $response;
			
		return null;
	}
	
	
	
	public function getInfoShipperByEstimateState($idAd, $state) {
	
		$condition = " AND " . $this::AD. " = ".$idAd;
	
		$query = "SELECT * FROM estimate e
				INNER JOIN user u ON e.estimate_shipper = u.user_id
				INNER JOIN ad a ON e.estimate_ad = a.ad_id
				WHERE e.estimate_state = ". $state.$condition.";";
	
		$result = $this->_conn->selectDB($query);
	
		$row = $result->fetch ();
		if (! $row)
			return null;
		
			$shipper = new User($row[$this::USER_ID], $row[$this::FIRSTNAME], $row[$this::LASTNAME],0, $row[$this::USER_TITLE],$row[$this::ADDRESS1], $row[$this::ADDRESS2],
					$row[$this::CITY],0, $row[$this::EMAIL],$row[$this::SOCIETY],0);
			$shipper->setTitleAd($row[$this::TITLE_AD]);
			$shipper = serialize($shipper);
		return $shipper;
	}
	
	//Utilisé pour récupérer les info des client grace à l'id dans la table "ad"
	public function getAdByEstimateState($idShipper, $state) {
	
		$condition = " AND " . $this::SHIPPER. " = ".$idShipper;
	
		$query = "SELECT * FROM estimate e
				INNER JOIN ad a ON e.estimate_ad = a.ad_id
				INNER JOIN user u ON a.ad_user = u.user_id
				WHERE e.estimate_state = ". $state.$condition.";";
	
		$result = $this->_conn->selectDB($query);

			
		while ($row = $result->fetch()) {
			$user = new User($row[$this::USER_ID], $row[$this::FIRSTNAME], $row[$this::LASTNAME],0, $row[$this::USER_TITLE],$row[$this::ADDRESS1], $row[$this::ADDRESS2],
					$row[$this::CITY],0, $row[$this::EMAIL],$row[$this::SOCIETY],0);
			$user->setTitleAd($row[$this::TITLE_AD]);
			$response[] = serialize($user);
			unset($estimate);
		}
		
			/*while ($row = $result->fetch()) {
				$adId = $row[$this::AD_USER];
				$response[] =$adId;
				unset($estimate);
			}*/
		
			
			if(isset($response)){
				return $response;
			}
			return null;
	}
	
	//Utilisé pour récupérer les info des client grace à l'id dans la table "ad"
	public function getEstimateStateByAdvetiser($idAdvertiser, $state) {
	
		//$condition = " AND " . $this::SHIPPER. " = ".$idShipper;
	
		$query = "SELECT * FROM estimate e
				INNER JOIN ad a ON e.estimate_ad = a.ad_id
				INNER JOIN user u ON a.ad_user = u.user_id
				WHERE e.estimate_state = ". $state." AND a.ad_user =".$idAdvertiser.";";
	
		$result = $this->_conn->selectDB($query);
	
			
		while ($row = $result->fetch()) {
			$estimate = new Estimate($row[$this::ID], $row[$this::AD], $row[$this::PRICE], $row[$this::SHIPPER], $row[$this::STATE]);
			$estimate->setTitleAd($row[$this::TITLE_AD]);
			$estimate->setBeginDate($row[$this::DATE_BEGIN_AD]);
			$response[] = serialize($estimate);
			unset($estimate); 
		}
			
		if(isset($response)){
			return $response;
		}
		return null;
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
				"SET " .	$this::AD . " = '" . $estimate->getAd() . "', " .
							$this::PRICE . " = '" . $estimate->getPrice() . "', " . 
							$this::SHIPPER . " = '" . $estimate->getShipper() . "', " .
							$this::STATE . " = '" . $estimate->getState() . "' " .
				"WHERE " . $this::ID . " = " . $estimate->getId() . ";";

		return $this->_conn->executeQuery($query);
	}
	
	public function updateEstimateState($estimate_Id, $state) {
		$query = "UPDATE estimate " .
				"SET " .	$this::STATE . " = " . $state . " " .
				"WHERE " . $this::ID . " = " . $estimate_Id . ";";
	
				return $this->_conn->executeQuery($query);
	}
	
	// DELETE
	public function deleteEstimate(Estimate $estimate) {
		$query = "DELETE estimate WHERE " . $this::ID . " = " . $estimate->getId() . ";";
		return $this->_conn->executeQuery($query);
	}
	

	
	public function deleteEstimateByAdId($adId) {
		$query = "DELETE FROM estimate WHERE " . $this::AD . " = " . $adId . ";";
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
	const STATE = 'estimate_state';
	const TITLE_AD = 'ad_title';
	const DATE_BEGIN_AD = 'ad_date_beginning';
	
	//Field names in table "user"
	const USER_ID ='user_id';
	const USER_TITLE = 'user_title';
	const FIRSTNAME = 'user_firstname';
	const LASTNAME = 'user_lastname';
	const SOCIETY = 'user_society';
	const ADDRESS1 = 'user_adress1';
	const ADDRESS2 = 'user_adress2';
	const CITY = 'user_city';
	const EMAIL = 'user_email';
	
	const AD_USER = 'ad_user';
	
}