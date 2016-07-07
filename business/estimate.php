<?php
/************************************************************\
 *
 * File				estimate.php
 *
 * Language			PHP
 *
 * Author			David Mack
 * Creation			20160528
 * modification 
 *
 * Project			teemw
 * Package			business
 * 
 * Description		classe objet Estimate
 *
 \************************************************************/
class Estimate {
	
	public function __construct($id, $ad, $price, $shipper, $state = 1) {
		$this->id = $id;
		$this->ad = $ad;
		$this->price = $price;
		$this->shipper = $shipper;
		$this->state = $state;
	}
	
	public function getBeginDateAd()
	{
		return $this->beginDateAd;
	}
	
	public function setBeginDate($date)
	{
		$this->beginDateAd = $date;
	}
	
	public function getTitleAd()
	{
		return $this->titleAd;
	}
	
	public function setTitleAd($title)
	{
		$this->titleAd = $title;
	}
	
	public function getState()
	{
		return $this->state;
	}
	
	public function setState($state)
	{
		$this->state = $state;
	}
	
	
	public function getShipper() 
	{
	  return $this->shipper;
	}
	
	public function setShipper($shipper) 
	{
	  $this->shipper = $shipper;
	}    
	public function getPrice() 
	{
	  return $this->price;
	}
	
	public function setPrice($price) 
	{
	  $this->price = $price;
	}    
	public function getAd() 
	{
	  return $this->ad;
	}
	
	public function setAd($ad) 
	{
	  $this->ad = $ad;
	}
	public function getId() 
	{
	  return $this->id;
	}
	
	public function setId($id) 
	{
	  $this->id = $id;
	}
	
	private $id;
	private $ad;
	private $price;
	private $shipper;
	private $state;
	private $titleAd;
	private $beginDateAd;
	
}
?>