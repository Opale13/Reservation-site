<?php

	class client
	{
		private $destination;
		private $assurance;
		private $nbr_place;
		private $iterateur;
		private $count;
		private $id_vol;
		
		public function __construct()
		{
			$this->destination = "";
			$this->assurance = "";
			$this->nbr_place = 0;
			$this->cli = [];
			$this->count = 1;
			$this->id_vol = -1;
		}

		//Modify client list
		public function modifylist($place, $list)
		{
			$this->cli[$place] = $list;
		}

		public function downcount()
		{
			$this->count = $this->count - 1;
		}

		//reset the counter to 1
		public function resetcount()
		{
			$this->count = 1;
		}


		/*================Setter================*/

		//increments the counter by 1
		public function setcount()
		{
			$this->count = $this->count + 1;
		}
		public function setlist($list)
		{
			$this->cli[] = $list;
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
		}
		public function setidvol($id)
		{
			$this->id_vol = $id;
		}


		/*================getter================*/

		public function getlist()
		{
			return $this->cli;
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
		public function getidvol()
		{
			return $this->id_vol;
		}
	}

?>