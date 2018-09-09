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
		<?php include('./Web/Includes/Content/Web/Advertisement/Top.php'); ?>

		<div id="top_wrap">
        <div id="top">
        <div id="topdim"></div>
        <div id="top-elements">
        <table id="topbar">
            <tr>
                <td id="topbar-count">0 Habbos no Hotel</td>
                <td id="topbar-menu" align="center">
                    <ul>
                        <li id="myhabbo" class="selected" onmouseover="switchTab('myhabbo')">
                            <div><a href="<?php echo $this->hotel->get_HotelURL();?>/tab/myhabbo" class="topbar-menu-link" onclick="return false;">Meu Habbo</a></div>
                        </li>
                        <li id="mycredits" onmouseover="if (switchTab('mycredits') &amp;&amp; document.habboLoggedIn) updateCredits()" onmouseout="fadeTab('myhabbo')">
                            <div><a href="<?php echo $this->hotel->get_HotelURL();?>/tab/credits" class="topbar-menu-link" onclick="return false;">Minhas Moedas</a></div>
                        </li>
                        <li id="habboclub" onmouseover="if (switchTab('habboclub') &amp;&amp; document.habboLoggedIn) updateHabboClub()" onmouseout="fadeTab('myhabbo')">
                            <div><a href="<?php echo $this->hotel->get_HotelURL();?>/tab/habboclub" class="topbar-menu-link" onclick="return false;">Habbo Club</a></div>
                        </li>
                    </ul>
                </td>
				<?php require_once('./Web/Includes/Content/Web/MyHabbo/Topbar-Status.php'); ?>
            </tr>
        </table>
		
		<div id="viewlogo"><a href="http://localhost"></a></div>
		<div id="enter-hotel">
			<a href="http://localhost/client" id="enter-hotel-link" target="client" onclick="openOrFocusHabbo(this); return false;"></a>
		</div>
		
		<div id="tabmenu" onmouseover="lockCurrentTab();" onmouseout="fadeTab('myhabbo')">
				<div id="tabmenu-content">
					<div id="myhabbo-content" class="tabmenu-inner selected">
						<?php require_once('./Web/Includes/Content/Web/MyHabbo/MyHabbo-Content.php'); ?>
					</div>
					<div id="mycredits-content" class="tabmenu-inner">
						<?php require_once('./Web/Includes/Content/Web/MyHabbo/MyCredits-Content.php'); ?>

					</div>
					<div id="habboclub-content" class="tabmenu-inner">
						<?php require_once('./Web/Includes/Content/Web/MyHabbo/HabboClub-Content.php'); ?>
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
							<a href="<?php echo $this->hotel->get_HotelURL(); ?>/"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_01_home.gif" alt=""/> Home</a>
							<span class="right"></span>
						</li>
						<li id="disabled">
							<span class="left"></span>
							<a href="./#"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_03_community.gif" alt=""/> Comunidade</a>
							<span class="right"></span>
						</li>
						<li id="disabled">
							<span class="left"></span>
							<a href="./#"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_04_games.gif" alt=""/> Jogos</a>
							<span class="right"></span>
						</li>
						<li id="disabled">
							<span class="left"></span>
							<a href="./#"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_10_coins.gif" alt=""/> Compre Moedas</a>
							<span class="right"></span>
						</li>
						<li id="disabled">
							<span class="left"></span>
							<a href="./#"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_09_hc.gif" alt=""/> Habbo Club</a>
							<span class="right"></span>
						</li>
						<li id="disabled">
							<span class="left"></span>
							<a href="./#"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_05_fun.gif" alt=""/> Grupos</a>
							<span class="right"></span>
						</li>
						<li class="last">
							<span class="left"></span>
							<a href="<?php echo $this->hotel->get_HotelURL(); ?>/help"><img src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/navi_icons/tab_icon_08_help.gif" alt=""/> Ajuda</a>
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
		
		

