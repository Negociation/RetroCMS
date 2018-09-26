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
            <td id="topbar-status" class="loggedin"> <span class="lang-topbar-status-loggedinBefore"></span><b>'.$this->habbo->get_HabboName().'</b><span class="lang-topbar-status-loggedinAfter">, você esta no Habbo</span></td>
		'; 
	}else{
			echo '
			<td id="topbar-status" class="notloggedin"><span class="lang-topbar-status-notLogged">Entre para acessar o Habbo</span></td>
		';
	}		
	
		
?>
		
		
		