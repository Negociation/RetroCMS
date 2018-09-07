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
									<embed type="application/x-shockwave-flash" src="http://localhost/imgpath/images/flash/HabboRegistration.swf" width="406" height="327" style="undefined" id="habboreg" name="habboreg" quality="high" base="/gallery/web-5.0.17/flash/" flashvars="post_url=http://localhost/account/register/step/2?&amp;back_url=http://localhost/account/register/back?&amp;figuredata_url=http://localhost/imgpath/images/flash/figure_data_xml.xml&amp;localization_url=http://localhost/imgpath/images/flash/figure_editor.xml&amp;post_figure=figure&amp;post_gender=gender&amp;figure=6500261510590016960473504&amp;gender=F">
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
	if ($this->hotel->get_HotelVersion() < 18 ){ 
	echo '
	<script type="text/javascript" language="JavaScript">
	var swfobj = new SWFObject("'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/flash/HabboRegistration.swf", "habboreg", "406", "327", "7");
	swfobj.addParam("base", "'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/flash/");
	swfobj.addVariable("post_url", "'.$this->hotel->get_HotelURL().'/register/step/2?");
	swfobj.addVariable("back_url", "'.$this->hotel->get_HotelURL().'");
	swfobj.addVariable("figuredata_url", "'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/xml/figure_data_xml.xml");
	swfobj.addVariable("localization_url", "'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/xml/figure_editor.xml");
	swfobj.addVariable("post_figure", "figureData");
	swfobj.addVariable("post_gender", "newGender");
	swfobj.addVariable("figure", "1000118501210012850129001");
	swfobj.addVariable("gender", "M");
	swfobj.write("flashcontent");
	</script>
	';
	
	}else{
	
	echo '
	<script type="text/javascript" language="JavaScript">                                                    var swfobj = new SWFObject("http://localhost/Habboweb/19_893f5b1b323d5c8b3767d50e5f5988a6/7/web-gallery/flash/HabboRegistration.swf", "habboreg", "435", "400", "8");                                                    swfobj.addParam("base", "http://localhost/Habboweb/19_893f5b1b323d5c8b3767d50e5f5988a6/7/web-gallery/flash/");                                                    swfobj.addParam("wmode", "opaque");                                                    swfobj.addParam("AllowScriptAccess", "always");                                                    swfobj.addVariable("figuredata_url", "http://localhost/Habboweb/19_893f5b1b323d5c8b3767d50e5f5988a6/7/web-gallery/xml/figuredata.xml");                                                    swfobj.addVariable("draworder_url", "http://localhost/Habboweb/19_893f5b1b323d5c8b3767d50e5f5988a6/7/web-gallery/xml/draworder.xml");                                                    swfobj.addVariable("localization_url", "http://localhost/Habboweb/19_893f5b1b323d5c8b3767d50e5f5988a6/7/web-gallery/xml/figure_editor.xml");                                                    swfobj.addVariable("figure", "hr-828-61.hd-180-1.ch-804-96.lg-280-64.sh-290-77.ha-1013-96");                                                    swfobj.addVariable("gender", "M");                                                                                                        swfobj.addVariable("showClubSelections", "0");                                                                                                        swfobj.write("flashcontent");                                                    </script>                                                    
	';
	} ?>
	
	
<?php 

//<< Page Content

//Include Footer Content
include('./Web/Includes/Content/Footers/Process.php'); 

?>