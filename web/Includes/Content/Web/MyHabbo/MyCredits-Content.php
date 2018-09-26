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
						<h3><span class="lang-topbar-mycredits-content-loggedinBefore">Você tem</span> <span id="amount-credits" class="amount habbocredits">'.$this->habbo->get_HabboCredits().'</span> <span class="lang-topbar-mycredits-content-loggedinAfter">Habbo Moedas</span></h3>
						<div class="tabmenu-inner-content">
							<p>
								<img src="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/images/top_bar/mycredits_coins.gif" alt="" width="47" height="21" class="tabmenu-image coins"/>
								<a href="'.$this->hotel->get_HotelURL().'/tab/credits" class="arrow"><span class="lang-topbar-mycredits-inner-buy">Comprar Moedas</span></a>
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelWeb().'/tab/redeem" class="arrow"><span class="lang-topbar-mycredits-inner-redeem">Inserir Código de Moedas ou Mobis</span></a>
							</p>
						</div>
		'; 
	}else{
			echo '
						<h3><span class="lang-topbar-mycredits-content-notloggedinBefore">Por favor,</span> <a href="'.$this->hotel->get_HotelURL().'/login"><span class="lang-sign">entre</span></a> <span class="lang-topbar-mycredits-content-notloggedinAfter">para ver seu saldo</span></h3>
						<div class="tabmenu-inner-content">
							<p>
								<img src="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/images/top_bar/mycredits_coins.gif" alt="" width="47" height="21" class="tabmenu-image coins"/>
								<a href="'.$this->hotel->get_HotelURL().'/tab/credits" class="arrow"><span class="lang-topbar-mycredits-inner-buy">Comprar Moedas</span></a>
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelWeb().'/tab/redeem" class="arrow"><span class="lang-topbar-mycredits-inner-redeem">Inserir Código de Moedas ou Mobis</span></a>
							</p>
						</div>
		';
	}		
	
		
?>
		
		
		