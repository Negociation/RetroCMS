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
		<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />
		<title><?php echo $this->hotel->get_HotelName();?> ~ <?php echo $this->pageTitle ?></title>
		<?php include('./Web/Includes/Sources.php'); ?>
		<meta name="build" content="R14-b18 - 20070626154037 - uk"/>
	</head>
	<body id="registration">
		<h1 id="main-header"><?php echo $this->hotel->get_HotelNick(); ?></h1>
		<div id="process-wrapper">
		<div id="process-header">
			<div id="process-header-body">
				<div id="process-header-content">
					<div id="logo"><a href="<?php echo $this->hotel->get_HotelURL(); ?>"></a></div>
					<div id="steps">
						<img src="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/images/process/step1<?php if($id == 1){ echo '_on';} ?>.gif" alt="1" width="30" height="26">
						<img src="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/images/process/step_right<?php if($id == 1){ echo '_on';} ?>.gif" alt="" width="20" height="26">
						<img src="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/images/process/step2<?php if($id == 2){ echo '_on';} ?>.gif" alt="2" width="30" height="26">
						<img src="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/images/process/step_right<?php if($id == 2){ echo '_on';} ?>.gif" alt="" width="20" height="26">
						<img src="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/images/process/step3<?php if($id == 3){ echo '_on';} ?>.gif" alt="3" width="30" height="26">
						<img src="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/images/process/step_right<?php if($id == 3){ echo '_on';} ?>.gif" alt="" width="20" height="26">
						<img src="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/images/process/step4<?php if($id == 4){ echo '_on';} ?>.gif" alt="4" width="30" height="26">
						<img src="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/images/process/step_right<?php if($id == 4){ echo '_on';} ?>.gif" alt="" width="20" height="26">
						<img src="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/images/process/step5<?php if($id == 5){ echo '_on';} ?>.gif" alt="5" width="30" height="26">
					</div>
				</div>
			</div>
		</div>