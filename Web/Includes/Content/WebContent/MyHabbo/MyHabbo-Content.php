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
		
						<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?figure='.$this->habbo->get_HabboFigure().'&size=b&action=wav,&direction=3&head_direction=3&gesture=sml&size=m" alt="" class="tabmenu-image" style="margin-right: 5px; margin-right: 0px;"/>
						<h3 style=""><span class="lang-topbar-myhabbo-content-loggedinBefore">Bem Vindo</span> '.$this->habbo->get_HabboName().' <span class="lang-topbar-myhabbo-content-loggedinAfter">ao Habbo</span></h3>
						<div class="tabmenu-inner-content">
							<p>
							<a href="'.$this->hotel->get_HotelURL().'/client" class="arrow" target="client" onclick="openOrFocusHabbo(this); return false;"><span class="lang-topbar-myhabbo-inner-client">Entrar no Habbo Hotel</span></a> 
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelURL().'/home/'.$this->habbo->Get_HabboName().'" class="arrow"><span class="lang-topbar-myhabbo-inner-home">Ver sua Habbo Home</span></a>  
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelURL().'/profile" class="arrow"><span class="lang-topbar-myhabbo-inner-profile">Editar Preferências</span></a> 							
							</p>
								<a href="'.$this->hotel->get_HotelURL().'/logout" class="colorlink orange last" style=" margin-right: 2px;"><span class="lang-topbar-myhabbo-inner-logout">Sair</span></a>   
						</div>
		'; 
	}else{
			echo '
						<img src="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/images/top_bar/myhabbo_frank.gif" alt="" width="60" height="85" class="tabmenu-image"/>
						
						<h3><span class="lang-topbar-myhabbo-content-notLoggedin">Olá! Por favor, entre ou registre-se</span></h3>
						<div class="tabmenu-inner-content">
							<p>
								<a href="'.$this->hotel->get_HotelURL().'/login" class="colorlink orange" style="margin-left: 0px; margin-right: 2px;"><span class="lang-topbar-myhabbo-inner-register">Registre-se, é gratuito</span></a>
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelURL().'/login" class="colorlink orange last" style="margin-left: 0px; margin-right: 2px;"><span class="lang-topbar-myhabbo-inner-login">Entre</span></a>
							</p>
						</div>
		';
	}		
	
		
?>
		
		
		