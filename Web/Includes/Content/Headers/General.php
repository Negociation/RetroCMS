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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />
        <title><?php echo $this->hotel->get_HotelName();?> ~ <?php echo $this->pageTitle ?></title>
        <?php include('./Web/Includes/Sources.php'); ?>
    <body id="home">
        <div id="overlay"></div>
        <h1 id="main-header"><?php echo $this->hotel->get_HotelNick();?></h1>
        <div id="wrapper">
		<?php include('./Web/Includes/Content/WebContent/Advertisement/Top.php'); ?>

		<div id="top_wrap">
        <div id="top">
        <div id="topdim"></div>
        <div id="top-elements">
        <table id="topbar">
            <tr>
                <td id="topbar-count">0 <span class="lang-topbar-count">Habbos no Hotel</span></td>
                <td id="topbar-menu" align="center">
                    <ul>
                        <li id="myhabbo" class="selected" onmouseover="switchTab('myhabbo')">
                            <div><a href="<?php echo $this->hotel->get_HotelURL();?>/tab/myhabbo" class="topbar-menu-link" onclick="return false;"><span class="lang-topbar-myhabbo">Meu Habbo</span></a></div>
                        </li>
                        <li id="mycredits" onmouseover="if (switchTab('mycredits') &amp;&amp; document.habboLoggedIn) updateCredits()" onmouseout="fadeTab('myhabbo')">
                            <div><a href="<?php echo $this->hotel->get_HotelURL();?>/tab/credits" class="topbar-menu-link" onclick="return false;"><span class="lang-topbar-mycredits">Minhas Moedas</span></a></div>
                        </li>
                        <li id="habboclub" onmouseover="if (switchTab('habboclub') &amp;&amp; document.habboLoggedIn) updateHabboClub()" onmouseout="fadeTab('myhabbo')">
                            <div><a href="<?php echo $this->hotel->get_HotelURL();?>/tab/habboclub" class="topbar-menu-link" onclick="return false;"><span class="lang-topbar-habboclub">Habbo Club</span></a></div>
                        </li>
                    </ul>
                </td>
				<?php require_once('./Web/Includes/Content/WebContent/MyHabbo/Topbar-Status.php'); ?>
            </tr>
        </table>

		<div id="viewlogo"><a href="<?php echo $this->hotel->get_HotelURL();?>"></a></div>
		<div style="position: absolute; bottom: 15px; left: 40px; height: 14px;">
			<div style="float: left; margin-top: 2px; height: 14px;">
			<a href="#" onclick="LoadLanguage('PT')" style="margin-left: 5px; height: 14px;" rel="tooltip-English"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/hlanguages/icon_br.gif" alt=""></a>
			<a href="#" onclick="LoadLanguage('EN')" style="margin-left: 5px; height: 14px;" rel="tooltip-English"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/hlanguages/icon_en.gif" alt=""></a>
			<a href="#" onclick="LoadLanguage('ES')" style="margin-left: 5px; height: 14px;" rel="tooltip-English"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/hlanguages/icon_es.gif" alt=""></a>
			<a href="#" onclick="$('#moreLang').toggle(); return false;" style="margin-left: 5px; height: 14px;" rel="tooltip-More languages..."><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/hlanguages/more.png" alt=""></a>
			</div>
		</div>
		<?php //require_once('./Web/Includes/Content/Web/Socket/Enter-Hotel.php'); ?>

		

		
		<div id="tabmenu" onmouseover="lockCurrentTab();" onmouseout="fadeTab('myhabbo')">
				<div id="tabmenu-content">
					<div id="myhabbo-content" class="tabmenu-inner selected">
						<?php require_once('./Web/Includes/Content/WebContent/MyHabbo/MyHabbo-Content.php'); ?>
					</div>
					<div id="mycredits-content" class="tabmenu-inner">
						<?php require_once('./Web/Includes/Content/WebContent/MyHabbo/MyCredits-Content.php'); ?>

					</div>
					<div id="habboclub-content" class="tabmenu-inner">
						<?php require_once('./Web/Includes/Content/WebContent/MyHabbo/HabboClub-Content.php'); ?>
					</div>
					<div class="clear"></div>
				</div>
				<div id="tabmenu-bottom"></div>
			</div>
			<script language="JavaScript" type="text/javascript">
				$("tabmenu").style.left = (Position.cumulativeOffset($("myhabbo"))[0] - Position.cumulativeOffset($("top"))[0]) + "px";
			</script>
		</div>
		
		<div id="mainmenu">
					<ul>
						<li id="leftspacer">&nbsp;</li>
						<li <?php if(get_class($this) == 'Index') echo'id="active"'; ?> >
							<span class="left"></span>
							<a href="<?php echo $this->hotel->get_HotelURL(); ?>/"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_01_home.gif" alt=""/> <span class="lang-navbar-home">Home</span></a>
							<span class="right"></span>
						</li>
						<li id="disabled">
							<span class="left"></span>
							<a href="./#"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_03_community.gif" alt=""/><span class="lang-navbar-community">Comunidade</span></a>
							<span class="right"></span>
						</li>
						<li id="disabled">
							<span class="left"></span>
							<a href="./#"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_04_games.gif" alt=""/> <span class="lang-navbar-games">Jogos</span></a>
							<span class="right"></span>
						</li>
						<li id="disabled">
							<span class="left"></span>
							<a href="./#"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_10_coins.gif" alt=""/><span class="lang-navbar-credits">Compre Moedas</span></a>
							<span class="right"></span>
						</li>
						<li id="disabled">
							<span class="left"></span>
							<a href="./#"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_09_hc.gif" alt=""/><span class="lang-navbar-habboclub">Habbo Club</span> </a>
							<span class="right"></span>
						</li>
						<li id="disabled">
							<span class="left"></span>
							<a href="./#"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_05_fun.gif" alt=""/> <span class="lang-navbar-groups">Grupos</span></a>
							<span class="right"></span>
						</li>
						<li class="last">
							<span class="left"></span>
							<a href="<?php echo $this->hotel->get_HotelURL(); ?>/help"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_08_help.gif" alt=""/> <span class="lang-navbar-help">Ajuda</span></a>
							<span class="right"></span>
						</li>
					</ul>
				</div>
				<div id="submenu">
					<div class="subnav">


					</div>
				</div>
			</div>
		</div>	
		<div id="main-content">
		
		

