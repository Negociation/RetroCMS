<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 					//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )					//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 						//
//////////////////////////////////////////////////////////////

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<title><?php echo $this->hotel->get_HotelName();?> ~ <?php echo $this->pageTitle ?></title>
		<?php include('./Web/Includes/Sources.php'); ?>
	</head>
	<div id="process-wrapper">
		<div id="process-header">
			<div id="process-header-body">
				<div id="process-header-content">
					<div id="habbologo"><a href="<?php echo $this->hotel->get_HotelURL();?>"></a></div>
			<div style="float: right; margin-top: -14px; height: 14px;">			<a href="#" onclick="LoadLanguage('PT')" style="margin-left: 5px; height: 14px;" rel="tooltip-English"><img src="http://127.0.0.1/c_images/hlanguages/icon_br.gif" alt=""></a>
			<a href="#" onclick="LoadLanguage('EN')" style="margin-left: 5px; height: 14px;" rel="tooltip-English"><img src="http://127.0.0.1/c_images/hlanguages/icon_en.gif" alt=""></a>
			<a href="#" onclick="LoadLanguage('ES')" style="margin-left: 5px; height: 14px;" rel="tooltip-English"><img src="http://127.0.0.1/c_images/hlanguages/icon_es.gif" alt=""></a>
			<a href="#" onclick="$('#moreLang').toggle(); return false;" style="margin-left: 5px; height: 14px;" rel="tooltip-More languages..."><img src="http://127.0.0.1/c_images/hlanguages/more.png" alt=""></a>
			</div>
				</div>
				
			</div>
		</div>