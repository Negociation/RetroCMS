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

class Account{
	private $pageTitle;
	private $habbo;
	private $habboModel;
	private $hotel;

	public function __construct($hotelConection){ 
		$this->hotelModel = new HotelModel($hotelConection);
		$this->hotel = $this->hotelModel->get_HotelObject();
		
		$this->pageTitle = 'Login';
		$this->habbo = new Habbo();
		$this->habboModel = new HabboModel($hotelConection);
		if ($this->habbo->get_HabboLoggedIn()){
			#$this->habbo = $this->habboModel->get_Habbo($_SESSION['id']);		
		}
	}
	
	//The Main Page 
	function login(){
		
		//Call the Hotel Settings from Core
		global $hotel;
		global $hotelModel;
		if($hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;

		}else{
			
			//Check if habbo as logged-in if as true redirects to Home
			if ($this->habbo->get_HabboLoggedIn()){
				header('Location: ../');
				exit;
			}else{
				echo'
				<form action="'.$hotel->get_hotelUrl().'/account/submit" method="post" id="login-form">
				<input type="hidden" name="loginTicket" value="LT-270976-JWCorbGb7fctvYlEP2es-br-fe2"/>
				<input type="hidden" name="targetPage" value="'.$hotel->get_hotelUrl().'"/>

				<p>
				<label for="login-username" class="registration-text">Meu nome Habbo</label>
				<input type="text" class="required-username" name="login-username" id="login-username" value=""/>
				</p>

				<script type="text/javascript" language="JavaScript">
				$("login-username").focus();
				</script>

				<p>
				<label for="login-password" class="registration-text">Senha</label>
				<input type="password" class="required-password" name="login-password" id="login-password" value=""/>
				</p>

				<p class="last">
				<input type="submit" value="Entre" class="process-button" id="login-submit"/>
				</p>
				</form>
				';
			}
		}
	}
	
	function Disconected(){
		if($this->hotel->get_HotelClosed()){
			require_once './Web/Maintenance/Index.php';
			exit;
		}else{
			if(!$this->habbo->get_HabboLoggedIn()){
				header('Location: ../');
				exit;			
			}else{
				echo 'Your sign yout from Habbo as sucessfull!';
				echo '<b> <a href="'.$this->hotel->get_HotelURL().'/login.">Login </a>   |   <a href="'.$this->hotel->get_HotelURL().'/register/start.">Register </a> | <a href="'.$this->hotel->get_HotelURL().'/.">Index</a>  ';
				session_destroy();	
			}
		}			
	}
	
	function Submit(){		
		if($this->hotel->get_HotelClosed()){
				require_once './Web/Maintenance/Index.php';
				exit;
		}elseif($_SERVER['REQUEST_METHOD'] != 'POST' || $this->habbo->get_HabboLoggedIn()){
			header('Location: ../');
			exit;	
		}else{
			//Get Form data using POST
			$this->habbo->set_HabboName(isset($_POST['login-username']) ? $_POST['login-username'] : '');
			$this->habbo->set_HabboPassword(isset($_POST['login-password']) ? $_POST['login-password'] : '');
			if($this->habboModel->set_HabboLogin($this->habbo)){
				header('Location: ../');
				exit;	
			}else{
				echo "Login Failed";
			}
		}	
	}	
}
?>

