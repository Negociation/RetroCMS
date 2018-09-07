<?php
//////////////////////////////////////////////////////////////
// 							RetroCMS 						//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 							//
// Branch: Public											//
//////////////////////////////////////////////////////////////
?>


<?php
include('./Web/Includes/Sources.php');
echo '
<script>    
	var habboReqPath = "";    
	var habboStaticFilePath = "/web-gallery";    
	var habboImagerUrl = "/habbo-imaging/";    
	document.habboLoggedIn = true;    
	window.name = "habboMain";    
</script>';
echo 'Its alive, and working as well! <br>';
		
echo 'Your SSO Login Ticket as: '.$this->habboModel->get_HabboTicket($this->habbo).'<br>';
		
echo $this->hotel->get_HotelName().' ~ '.$this->hotel->get_HotelNick();

echo '<center><br> <b> WARNING: Alpha Preview, only for test. </b><br>';
		
if ($this->habbo->get_HabboLoggedIn()){
	echo ' <b>'. $this->habbo->get_HabboName().' </b> -- <i>'.$this->habbo->get_HabboMotto() .'</i><br> <a href="'.$this->hotel->get_HotelURL().'/logout.">Logout </a> | <a href="'.$this->hotel->get_HotelURL().'/client" id="enter-hotel-link" target="client" onclick="openOrFocusHabbo(this); return false;">Client</a>';	
}else{
	echo '<b> <a href="'.$this->hotel->get_HotelURL().'/login.">Login </a>   |   <a href="'.$this->hotel->get_HotelURL().'/register/start.">Register </a>';
}
			
?>