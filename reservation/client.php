<?php

class client
{
	private $destination;
	private $assurance;
	private $nbr_place;
	private $itterateur;
	
	function __construct()
	{
		$this->destination = "";
		$this->assurance = "";
		$this->nbr_place = 0;
		$this->itterateur = 0;
		$this->cli = [];
	}
	
	public function setlist($list)
	{
		$this->cli[] = $list;
	}
	
	public function getlist()
	{
		return $this->cli;
	}
	
	public function itterateur()
	{
		$this->itterateur = $this->itterateur - 1;
	}
	public function getitterateur()
	{
		return $this->itterateur;
	}
	
	public function setdestination($destination)
	{
		$this->destination = $destination;
	}	
	public function setassurance($assurance)
	{
		$this->assurance = $assurance;
	}	
	public function setnbrplace($nbre_place)
	{
		$this->nbr_place = $nbre_place;
		$this->itterateur = $nbre_place;
	}
	
	
	public function getdestination()
	{
		return $this->destination;
	}
	public function getassurance()
	{
		return $this->assurance;
	}
	public function getnbrplace()
	{
		$place = $this->nbr_place;
		settype($place,"integer");
		
		return $place;
	}
}

?>