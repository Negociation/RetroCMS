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
						<h3><span class="lang-topbar-habboclub-content-loggedin">Você não é membro do Habbo Clube</span></h3>
			';
		}else{
			echo'
						<h3><span class="lang-topbar-habboclub-content-loggedinBefore">Você possui</span> '.$this->habbo->get_HabboClubDays().' <span class="lang-topbar-habboclub-content-loggedinAfter">dias restantes no Habbo Clube</span></h3>
			';	
		}
		echo'					
						<div class="tabmenu-inner-content">
							<p>
								<span class="lang-topbar-habboclub-inner-about">Habbo Club te dá os melhores benefícios</span>
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelWeb().'/tab/habboclub" class="arrow"><span class="lang-topbar-habboclub-inner-club">Últimas Notícias</span></a>
							</p>
						</div>
		'; 
	}else{
			echo '
						<h3><span class="lang-topbar-habboclub-content-notloggedinBefore">Por favor,</span> <a href="'.$this->hotel->get_HotelWeb().'/login"><span class="lang-sign">entre</span></a> <span class="lang-topbar-habboclub-content-notloggedinAfter">para ver suas informações do Habbo Club</span></h3>
						<div class="tabmenu-inner-content">
							<p>
								<span class="lang-topbar-habboclub-inner-about">Habbo Club te dá os melhores benefícios</span>
								
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelWeb().'/tab/habboclub" class="arrow"><span class="lang-topbar-habboclub-inner-club">Últimas Notícias</span></a>
							</p>
						</div>
		';
	}		
	
		
?>
		
		
		