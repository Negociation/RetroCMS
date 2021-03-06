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
	
	public function getByParam($table,$column,$param){
		try {
			$sql = 'SELECT * FROM .'.$table.' where '.$column.' = :param';
			$stmt = $this->hotelConection->prepare($sql);
			$stmt->bindValue(':param', $param);
			$stmt->execute();

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}catch(Exception $e){
			//If not return false
			return false;
			exit;
		}
		return $result;	
	}
	
	public function getById($table,$id){
		try {
			$sql = 'SELECT * FROM '.$table.' WHERE id = :id';
			$stmt = $this->hotelConection->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$result = $stmt->fetch();
		}catch(Exception $e){
			//If not return false
			return false;
			exit;
		}		
		return $result;		
	}
	
	public function customQuery($query){
		try {
			$stmt = $this->hotelConection->prepare($query);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			//If not return false
			return false;
			exit;
		}		
		return $result;	
	}
	
	public function getColumn($Table,$Column){
		try {
			$sql = 'SELECT '.$Column.' FROM '.$Table;
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
	
	public function setColumnById($Table, $Column, $Id, $Param){
		try {
			$sql = 'UPDATE '.$Table.' SET '.$Column.' = :param where id = :id';
			$stmt = $this->hotelConection->prepare($sql);
			$stmt->bindValue(':param', $Param);
			$stmt->bindValue(':id', $Id);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}catch(Exception $e){
			//If not return false
			return false;
			exit;
		}
		return true;		
	}
	
}
?>