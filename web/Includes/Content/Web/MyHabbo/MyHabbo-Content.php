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
						<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?figure=%3C?php%20echo%20%22$figura2%22;%20?%3E&size=b&action=wav,&direction=3&head_direction=3&gesture=sml&size=m" alt="" class="tabmenu-image" style="margin-right: 5px; margin-right: 0px;"/>
						<h3 style="">Bem Vindo '.$this->habbo->get_HabboName().' ao Habbo</h3>
						<div class="tabmenu-inner-content">
							<p>
							<a href="'.$this->hotel->get_HotelURL().'/client" class="arrow" target="client" onclick="openOrFocusHabbo(this); return false;"><span>Entrar no Habbo Hotel</span></a> 
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelURL().'/home/'.$this->habbo->Get_HabboName().'" class="arrow"><span>Ver sua Habbo Home</span></a>  
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelURL().'/profile" class="arrow"><span>Editar Preferências</span></a> 							
							</p>
								<a href="'.$this->hotel->get_HotelURL().'/logout" class="colorlink orange last"><span>Sair</span></a>   
						</div>
		'; 
	}else{
			echo '
						<img src="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/images/top_bar/myhabbo_frank.gif" alt="" width="60" height="85" class="tabmenu-image"/>
						<h3>Olá! Por favor, entre ou registre-se</h3>
						<div class="tabmenu-inner-content">
							<p>
								<a href="'.$this->hotel->get_HotelURL().'/login" class="colorlink orange"><span>Registre-se, é gratuito</span></a>
							</p>
							<p>
								<a href="'.$this->hotel->get_HotelURL().'/login" class="colorlink orange last"><span>Entre</span></a>
							</p>
						</div>
		';
	}		
	
		
?>
		
		
		