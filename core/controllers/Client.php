<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 							//		
// Branch: Public											//
//////////////////////////////////////////////////////////////

class Client{
	private $pageTitle;
	private $habbo;
	private $habboModel;

	public function __construct($hotelConection){ 
		$_SESSION['id'] = 2;
		$_SESSION['habboLoggedIn'] = true;
		$this->hotelModel = new HotelModel($hotelConection);
		$this->habboModel = new HabboModel($hotelConection);
		
		$this->habbo = new Habbo();
		$this->hotel = $this->hotelModel->get_HotelObject();

		if ($this->habbo->get_HabboLoggedIn()){
			echo $this->habbo->get_HabboId();
			$this->habbo = $this->habboModel->get_HabboObject($this->habbo);	
		}
		
		
	}
	
	//The Main Page 
	public function default(){
		
		//Call the Hotel Settings from Core
		global $hotel;
		global $hotelModel;
		if($hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;
		}else{
			
			//Check if habbo as logged-in if as true redirects to Home
			if (!$this->habbo->get_HabboLoggedIn()){
				header('Location: ../');
				exit;
			}else{
				$this->habbo->set_HabboTicket($this->habboModel->get_HabboTicket($this->habbo));
				$this->habboModel->set_HabboTicket($this->habbo);
				echo "
				<html xmlns='https://www.w3.org/1999/xhtml'>
				<head>
				<meta https-equiv='Content-Type' content='text/html; charset=utf-8' />
				<title>Kepler</title>
				</head>

				<body bgcolor='black'<!-- leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'-->>
				<div align='center'>
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

				</div>
				</body>

				</html>
				";
			}
		}
	}

}
?>

