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
				<h2>Registration <a href="<?php echo $this->hotel->get_HotelURL(); ?>/register/exit" class="exit">Cancel</a></h2>
			</div>
		</div>
	</div>
	<div class="content-top">
		<div class="content">
			<div class="content-column1">
				<div class="bubble">
					<div class="bubble-body">
						Now the fun begins! Choose what you want to look like in habbo!
						<div class="clear"></div>
					</div>
				</div>
				<div class="bubble-bottom">
					<div class="bubble-bottom-body">
						<img src="<?php echo $this->hotel->get_HotelWeb();?>/habboweb/16/11/web-gallery/images/register/bubble_tail_left.gif" alt="" width="22" height="31">
					</div>
				</div>
				<div class="frank"><img src="<?php echo $this->hotel->get_HotelWeb();?>/habboweb/16/11/web-gallery/images/register/register7.gif" alt="" width="245" height="181"></div>
			</div>
			<div class="content-column2">
				<div id="process-errors">
					<div class="content-red">
						<div class="content-red-body" id="process-errors-content">
							<div class="clear"></div>
						</div>
					</div>
					<div class="content-red-bottom">
						<div class="content-red-bottom-body"></div>
					</div>
				</div>
				<div class="content-white-outer">
					<div class="content-white">
						<div class="content-white-body">
							<div class="content-white-content">
								<div id="flashcontent">
								

								</div>

								<?php 
									echo'
									<script type="text/javascript" language="JavaScript">
									var swfobj = new SWFObject("'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/flash/HabboRegistration.swf", "habboreg", "406", "327", "7");
									swfobj.addVariable("post_url", "'.$this->hotel->get_HotelURL().'/register/step/2?");
									swfobj.addVariable("back_url", "'.$this->hotel->get_HotelURL().'");
									swfobj.addVariable("figuredata_url", "'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/xml/figure_data_xml.xml");
									swfobj.addVariable("localization_url", "'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/xml/figure_editor.xml");
									swfobj.addVariable("post_figure", "figureData");
									swfobj.addVariable("post_gender", "newGender");
									swfobj.addVariable("required-birth", "'.$this->newHabbo->get_HabboBirth().'");
									swfobj.addVariable("figure", "'.$this->newHabbo->get_HabboFigure().'");
									swfobj.addVariable("gender", "'.$this->newHabbo->get_HabboGender().'");
									swfobj.write("flashcontent");
									</script>
									';
								?>
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