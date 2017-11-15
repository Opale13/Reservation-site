<?php

	class client
	{
		private $destination;
		private $assurance;
		private $nbr_place;
		private $iterateur;
		private $count;
		
		public function __construct()
		{
			$this->destination = "";
			$this->assurance = "";
			$this->nbr_place = 0;
			$this->iterateur = 1;
			$this->cli = [];
			$this->count = 0;
		}

		public function modifylist($place, $list)
		{
			$this->cli[$place] = $list;
		}

		public function resetcount()
		{
			$this->count = 0;
		}

		public function setcount()
		{
			$this->count = $this->count + 1;
		}

		public function setlist($list)
		{
			$this->cli[] = $list;
		}
		
		public function getlist()
		{
			return $this->cli;
		}
		
		public function iterateur()
		{
			$this->iterateur = $this->iterateur - 1;
		}

		public function getiterateur()
		{
			return $this->iterateur;
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
			$this->iterateur = $nbre_place;
		}


		public function getcount()
		{
			return $this->count;
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