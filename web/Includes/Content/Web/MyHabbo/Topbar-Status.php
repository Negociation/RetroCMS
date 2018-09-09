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
            <td id="topbar-status" class="loggedin"><b>'.$this->habbo->get_HabboName().'</b>, você esta no Habbo</td>
		'; 
	}else{
			echo '
			<td id="topbar-status" class="notloggedin">Entre para acessar o Habbo</td>
		';
	}		
	
		
?>
		
		
		