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

class HabboModel{
	protected $hotelConection;
	
	public function __construct($HotelConection){ 
		$this->hotelConection = $HotelConection;
		
	}
	
	//Sets Habbo ticket after habbo reload the client
	public function set_HabboTicket($habboObject){
		$sql = 'UPDATE users SET sso_ticket = :sso where id = :id';
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->bindValue(':id', $habboObject->get_HabboId());
		$stmt->bindValue(':sso', $habboObject->get_HabboTicket());
		$stmt->execute();
	}
	
	//Get a Random Unique Habbo ticket
	public function get_HabboTicket($habboObject){
		$sql = 'SELECT sso_ticket from users where sso_ticket != ""';
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->execute();			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//Check if as a unique Ticket
		$uniqueTicket = true;
		do{
			$ramdomTicket = 'LT-'.rand (100000 , 999999 ).'-'.bin2hex(random_bytes(10)).'-'.$habboObject->get_HabboLanguage().'-fe2';
			foreach($result as $existingTicket){
				if($ramdomTicket == $existingTicket){
					$uniqueTicket = false;
				}
			}
		}while($uniqueTicket == false);
		return $ramdomTicket;
	
	}
	
	//Check if Habboname as Valid
	public function get_HabboName($Name){
		$sql = "SELECT id  FROM users WHERE username = :username";
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->bindValue(':username', $Name);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($result) == 1){
			return false;
		}else{
			return true;
		}
	}
	
	
	//Returns the Habbo after pass the HabboObject with ID
	public function get_HabboObject($habboObject){
		$sql = "SELECT id,username,credits,motto,badge,badge_active,home_enabled,figure,sex,club_subscribed,club_expiration,created_at FROM users WHERE id = :id";
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->bindValue(':id', $habboObject->get_HabboId());
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($result) == 1){	
			$habboObject->ConstructObject($result[0]['id'],
$result[0]['username'],$result[0]['credits'],$result[0]['motto'],$result[0]['badge'],$result[0]['badge_active'],$result[0]['home_enabled'],$result[0]['figure'],$result[0]['sex'],$result[0]['club_expiration'],$result[0]['created_at']);
		}
		return $habboObject;	
	}
	
	//Destroys Habbo Session 
	public function set_HabboLogout(){
		unset($this->habbo);
		$_SESSION['habboLoggedIn'] = false;
		session_destroy();
	}	

	//Register new User
	public function set_HabboRegistration($habboObject){
		$status = true;
		$sql = "INSERT INTO users (`username`, `password`, `figure`,`pool_figure`, `sex`, `motto`,`rank`, `birthday`,`email`) 
		VALUES (:habboname, :password , :figure,'', :gender, '', :rank, :birth,:email);
";
		try{ 
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->bindValue(':habboname', $habboObject->get_HabboName());
		$stmt->bindValue(':password', password_hash($habboObject->get_HabboPassword(), PASSWORD_ARGON2I));
		$stmt->bindValue(':figure', $habboObject->get_HabboFigure());
		$stmt->bindValue(':gender', $habboObject->get_HabboGender());
		$stmt->bindValue(':rank', $habboObject->get_HabboRank());
		$stmt->bindValue(':birth', $habboObject->get_HabboBirth());
		$stmt->bindValue(':email', $habboObject->get_HabboEmail());

		$stmt->execute();
		}catch (PDOException $e){
			$status = false;
		}
			return $status;
	}
	
	
	public function set_HabboLogin($habboObject){
		$errorId = -1;
		//Step 1 "Check if Habbo Exists"
		$sql = "SELECT id,username,password,rank FROM users WHERE username = :username";
		$stmt = $this->hotelConection->prepare($sql);
		$stmt->bindValue(':username', $habboObject->get_HabboName());
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($result) == 0){	
			echo '<script language="JavaScript" type="text/javascript"> sessionStorage.setItem("loginErrorId", "1"); </script>';
			return false;
			exit;
			//Message of Error Habbo doesnt Exist
		}else{
			//Step 2 "Check if Password Match"
			if (!password_verify($habboObject->get_HabboPassword(),$result[0]['password'])){
				echo '<script language="JavaScript" type="text/javascript"> sessionStorage.setItem("loginErrorId", "2"); </script>';
				return false;
				exit;
			}else{
				//Step 3 "Check if Habbo as Banned"
				if ($result[0]['rank'] == 0){
					echo '<script language="JavaScript" type="text/javascript"> sessionStorage.setItem("loginErrorId", "3"); </script>';
					return false;
					exit;
				}else{
					//Everthing OK
					$_SESSION['habboLoggedIn'] = true;
					$_SESSION['id'] = $result[0]['id'];
					return true;
					exit;
				}
			}
		}
	}
	
	

}


?>
