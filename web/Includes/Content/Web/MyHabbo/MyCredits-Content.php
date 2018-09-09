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
		echo'
						<h3>Você tem <span id="amount-credits" class="amount habbocredits">'.$this->habbo->get_HabboCredits().'</span> Habbo Moedas</h3>
						<div class="tabmenu-inner-content">
							<p>
								<img src="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/images/top_bar/mycredits_coins.gif" alt="" width="47" height="21" class="tabmenu-image coins"/>
								<a href="'.$this->hotel->get_HotelURL().'/tab/credits" class="arrow"><span>Comprar Moedas</span></a>
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelWeb().'/tab/redeem" class="arrow"><span>Inserir Código de Moedas ou Mobis</span></a>
							</p>
						</div>
		'; 
	}else{
			echo '
						<h3>Por favor, <a href="'.$this->hotel->get_HotelURL().'/login">entre</a> para ver seu saldo</h3>
						<div class="tabmenu-inner-content">
							<p>
								<img src="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/images/top_bar/mycredits_coins.gif" alt="" width="47" height="21" class="tabmenu-image coins"/>
								<a href="'.$this->hotel->get_HotelURL().'/tab/credits" class="arrow"><span>Comprar Moedas</span></a>
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelWeb().'/tab/redeem" class="arrow"><span>Inserir Código de Moedas ou Mobis</span></a>
							</p>
						</div>
		';
	}		
	
		
?>
		
		
		