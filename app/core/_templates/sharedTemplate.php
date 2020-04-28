<?php
//////////////////////////////////////////////////////////////
//						  RetroCMS							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]					//
// Development Thread: goo.gl/nwzdZo						//
//////////////////////////////////////////////////////////////
// Beta Version 0.9.5.110 ( Aquamarine ) 				    //
// Branch: Public (Unstable)								//
// Compatibility Version(s): [r14,r15,r16,r17]				//
//////////////////////////////////////////////////////////////


// Class: ModelTemplate
// Desc: Default Template for Models


namespace Template;

use PDO;
use CLR;

class Shared{

	public function validatePassword($password,$hash){
		echo sodium_crypto_pwhash_str($password, SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE, SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE);
		return sodium_crypto_pwhash_str_verify($hash,$password);
	}
	
	public function getPasswordHash($password){
		return sodium_crypto_pwhash_str($password, SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE, SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE);
	}	
	
	public function getValidTicket($type,$language){
		return $type.'-'.rand (100000 , 999999 ).'-'.bin2hex(random_bytes(10)).'-'.strtolower($language).'-fe2';
	}
}

?>