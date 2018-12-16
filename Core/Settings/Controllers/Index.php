<?php

class Index{
	protected $pageTitle;
	protected $habbo;
	protected $habboModel;		
	protected $hotel;
	protected $hotelModel;
	
	public function __construct($hotelConection){ 
		$this->pageTitle = 'Inicio';
		$this->hotelModel = new HotelModel($hotelConection);
		$this->habboModel = new HabboModel($hotelConection);
		$this->habbo = new Habbo();
		$this->hotel = $this->hotelModel->get_HotelObject();
	}



	public function default(){
		include 'Web/Index.php';	
	}
}

?>
