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
include('./Web/Includes/Content/Headers/Register.php'); 

//Page Content >>
?>


<div id="outer">
<div id="outer-content">
<div class="processbox">
	<div class="headline">
		<div class="headline-content">
			<div class="headline-wrapper">
				<h2>Registration</h2>
			</div>
		</div>
	</div>
	<div class="content-top">
		<div class="content">
			<div class="content-column1">
				<div class="bubble">
					<div class="bubble-body">
						Congratulations <?php echo $this->newHabbo->get_HabboName(); ?>! You are now a habbo! 
						<div class="clear"></div>
					</div>
				</div>
				<div class="bubble-bottom">
					<div class="bubble-bottom-body">
						<img src="<?php echo $this->hotel->get_HotelWeb() ?>/habboweb/16/11/web-gallery/images/register/bubble_tail_left.gif" alt="" width="22" height="31">
					</div>
				</div>
					<div class="frank"><img src="<?php echo $this->hotel->get_HotelWeb() ?>/habboweb/16/11/web-gallery/images/register/register8.gif" alt="" width="245" height="191"></div>
			</div>
			<div class="content-column2">
				<div class="content-white-outer">
					<div class="content-white">
						<div class="content-white-body">
							<div class="content-white-content">
								<h4>Welcome to Habbo!</h4>
								<img src="<?php echo $this->hotel->get_HotelWeb() ?>/c_images/album235/hh_welcome.png" alt="">
								<div align="left" style="margin-top: 10px;">
								
									<a href="<?php echo $this->hotel->get_HotelURL() ?>" class="process-button" style=" width: 0px; height: 0px; padding-top: 2px; padding-bottom: 2px; padding-left: 4px; padding-right: 4px;" >done</a>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="content-white-bottom">
						<div class="content-white-bottom-body"></div>
					</div>
				</div>
			</div>
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