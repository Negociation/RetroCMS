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
//Include Header Content
include('./Web/Includes/Content/Headers/Account.php'); 

//Page Content >>
?>

			<div id="outer">
				<div id="outer-content">
					<div class="processbox">
						<div class="headline">
							<div class="headline-content">
								<div class="headline-wrapper">
									<h2>Você saiu do Habbo</h2>
								</div>
							</div>
						</div>
						<div class="content-top">
							<div class="content">
								<img vspace="0" hspace="0" border="0" align="right" src="<?php echo $this->hotel->get_HotelWeb();?>/c_images/album209/frank_waving_dbl.gif" alt="">Você saiu do Habbo.<br/><br/>Esperamos que tenha falado com muitos amigos.<br/><br/>Retorne em breve!<br/><br/>Se desejar entrar novamente, <a href="<?php echo $this->hotel->get_HotelURL();?>/" target="_self">clique aqui</a>.<br/>
								<div class="clear"></div>
							</div>
						</div>
						<div class="content-bottom">
							<div class="content-bottom-content"></div>
						</div>
					</div>

<?php 

//<< Page Content

//Include Footer Content
include('./Web/Includes/Content/Footers/Process.php'); 

?>
