<?php
//////////////////////////////////////////////////////////////
//						  RetroCMS							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]					//				
// Development Thread: goo.gl/nwzdZo						//
//////////////////////////////////////////////////////////////
// Beta Version 0.9.0 ( Aquamarine ) 					    //
// Branch: Public (Unstable)								//
// Compatibility Version(s): [r14,r15,r16,r17]				//
//////////////////////////////////////////////////////////////

// Class: ModelTemplate
// Desc: Default Template for Models (DAO)

class ModelTemplate{
	
	protected $hotelConection;
	
	public function getAll($table){	
		try {
			$sql = 'SELECT * FROM .'.$table.' order by id';
			$stmt = $this->hotelConection->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			//If not return false
			return false;
			exit;
		}
		return $result;		
	}
	
	
}
?>