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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />    
<title>Habbo ~ <?php echo $this->pageTitle ?></title>    
<head>


<?php include './Web/Includes/Sources.php'; ?>

<script language="JavaScript" type="text/javascript">
var habboClient = true;
document.habboLoggedIn = true;
</script>

<script type="text/javascript" language="javascript">
window.onload = resizeWin;
window.onerror = function() { return true; };
window.onunload = clearOpener;
ensureOpenerIsLoggedIn();
addClientUnloadHook();
Event.observe(document, "keypress", function(e) { if (e.keyCode == Event.KEY_BACKSPACE) { Event.stop(e); } });
</script>
	


</head>

<body id="client">

<div id="client-topbar" style="display:none">
  <div class="logo"><img src="http://localhost/habboweb/16/11/web-gallery/images/popup/popup_topbar_habbologo.gif" alt="" align="middle"/></div>
  <div class="habbocount"><div id="habboCountUpdateTarget">
</div>
0 Habbos Online
	<script language="JavaScript" type="text/javascript">
		setTimeout(function() {
			HabboCounter.init(600);
		}, 20000);
	</script>
</div>
  <div class="logout"><a href="./logout?origin=popup" onclick="self.close(); return false;">Logout</a>
</div>

<div>


			<?php echo "
				<object classid='clsid:166B1BCA-3F9C-11CF-8075-444553540000' codebase='https://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=10,8,5,1,0' id='habbo' width='720' height='540'>
				<param name='src' value='http://images.alex-dev.org/dcr/r21_20080417_0343_5110_5527e6590eba8f3fb66348bdf271b5a2/habbo.dcr'>
				<param name='swRemote' value='swSaveEnabled='true' swVolume='true' swRestart='false' swPausePlay='false' swFastForward='false' swTitle='Habbo Hotel' swContextMenu='true' '>
				<param name='swStretchStyle' value='none'>
				<param name='swText' value=''>

				<param name='bgColor' value='#000000'>
				<param name='sw6' value='use.sso.ticket=1;sso.ticket=".$this->habbo->get_HabboTicket()."'>
				<param name='sw2' value='connection.info.hostlocalhost;connection.info.port=12321'>
				<param name='sw4' value='connection.mus.host=localhost;connection.mus.port=12322'>
				<param name='sw3' value='client.reload.url=https://localhost/'>
				<param name='sw1' value='site.url=https://www.habbo.ch;url.prefix=https://www.habbo.ch'>
				<param name='sw5' value='external.variables.txt=http://localhost/vars.txt;external.texts.txt=http://localhost/texts.txt'>
				<embed src='http://images.alex-dev.org/dcr/r21_20080417_0343_5110_5527e6590eba8f3fb66348bdf271b5a2/habbo.dcr' bgColor='#000000' width='720' height='540' swRemote='swSaveEnabled='true' swVolume='true' swRestart='false' swPausePlay='false' swFastForward='false' swTitle='Habbo Hotel' swContextMenu='true'' swStretchStyle='none' swText='' type='application/x-director' pluginspage='https://www.macromedia.com/shockwave/download/'
				sw6='use.sso.ticket=1;sso.ticket=".$this->habbo->get_HabboTicket()."'
				sw8='forward.type=1;forward.id=60'
				sw2='connection.info.host=localhost;connection.info.port=12321'
				sw4='connection.mus.host=localhost;connection.mus.port=12322'
				sw3='client.reload.url=http://localhost'
				sw1='site.url=http://localhost;url.prefix=http://localhost'
				sw5='external.variables.txt=http://localhost/vars.txt;external.texts.txt=http://localhost/texts.txt'></embed>
				</object>

			
				";
	?>		
</div>
</body>
</html>