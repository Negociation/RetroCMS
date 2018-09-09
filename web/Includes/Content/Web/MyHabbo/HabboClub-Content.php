<?php
//////////////////////////////////////////////////////////////
// 						   RetroCMS 						//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 							//
//////////////////////////////////////////////////////////////

?>

	<?php
	if($this->habbo->get_HabboLoggedIn()){ 
		if(!$this->habbo->get_HabboClubStatus()){
			echo'
						<h3>Você não é membro do Habbo Clube</h3>
			';
		}else{
			echo'
						<h3>Você possui '.$this->habbo->get_HabboClubDays().' dias restantes no Habbo Clube</h3>
			';	
		}
		echo'					
						<div class="tabmenu-inner-content">
							<p>
								Habbo Club te dá os melhores benefícios
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelWeb().'/tab/habboclub" class="arrow"><span>Últimas Notícias</span></a>
							</p>
						</div>
		'; 
	}else{
			echo '
						<h3>Por favor, <a href="'.$this->hotel->get_HotelWeb().'/login">entre</a> para ver suas informações do Habbo Club</h3>
						<div class="tabmenu-inner-content">
							<p>
								Habbo Club te dá os melhores benefícios
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelWeb().'/tab/habboclub" class="arrow"><span>Últimas Notícias</span></a>
							</p>
						</div>
		';
	}		
	
		
?>
		
		
		