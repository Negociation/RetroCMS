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
?>

<?php 
//Include Header Content
include('./Web/Includes/Content/Headers/Register.php'); 

//Page Content >>
?>


<div id="outer">
<div id="outer-content">
<div class="processbox">
	<div class="headline">
		<div class="headline-content">
			<div class="headline-wrapper">
				<h2>Registration <a href="<?php echo $this->hotel->get_HotelURL(); ?>/register/exit" class="exit">Cancel</a></h2>
			</div>
		</div>
	</div>
	<div class="content-top">
		<div class="content">
			<div class="content-column1">
				<div class="bubble">
					<div class="bubble-body">               
						Now to pick your Habbo name! Who are you going to be in Habbo?
						<div class="clear"></div>
					</div>
				</div>
			<div class="bubble-bottom">
				<div class="bubble-bottom-body">
					<img src="<?php echo $this->hotel->get_HotelURL() ?>/habboweb/16/11/web-gallery/images/register/bubble_tail_left.gif" alt="" width="22" height="31">
				</div>
			</div>
			<div class="frank"><img src="<?php echo $this->hotel->get_HotelURL() ?>/habboweb/16/11/web-gallery/images/register/register3.gif" alt="" width="245" height="191"></div>
		</div>
	
			<div class="content-column2">
				<div id="process-errors">
					<div class="content-red">
						<div class="content-red-body" id="process-errors-content">
							<div class="clear"></div>
						</div>
					</div>
					<div class="content-red-bottom">
						<div class="content-red-bottom-body"></div>
					</div>
				</div>
				<div class="content-white-outer">
					<div class="content-white">
						<div class="content-white-body">
							<div class="content-white-content">                                                
								<form method="post" action="<?php echo $this->hotel->get_HotelURL() ?>/register/step/3" id="stepform">                                                    
									<p>                                                        
										Sorry, but that name is already taken. How about one of these ?
										</p> 
									
									<p>                                                        
                                        <input type="radio" name="required-avatarName1" disabled= true value="male" > Option 1<br>

									</p> 
									
									<p>                                                        
                                        <input type="radio" name="required-avatarName2" disabled= true value="male" > Option 2<br>
									</p> 
									
									<p>                                                        
                                        <input type="radio" name="required-avatarName3" disabled= true value="male" > Option 3<br>
									</p> 
									
									<p>                                                        
                                        <input type="radio" name="gender" value="male" checked> Other: 		
										<input type="text" name="required-avatarName" id="username" maxlength="14" value="" class="registration-text required-avatarName">                                                    

									</p> 
									
									
									<div id="pwStatus"></div>                                                    
									                                          
									<div id="register-buttons">
	
									<div align="right" "="">
									<input type="submit" value="Back" id="continuebtn" class="process-button">
										<input type="hidden" name="required-password" value="<?php echo $this->newHabbo->get_HabboPassword() ?>" />
										<input type="hidden" name="required-birth" value="<?php echo $this->newHabbo->get_HabboBirth() ?>" />
										<input type="hidden" name="newGender" value="<?php echo $this->newHabbo->get_HabboGender() ?>" />
										<input type="hidden" name="figureData" value="<?php echo $this->newHabbo->get_HabboFigure() ?>" />
										<input type="submit" value="Continue" id="continuebtn" class="process-button">
									</div>
									<div class="clear"></div>                                                    
									</div>                                                
								</form>                                            
							</div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="content-white-bottom">
								<div class="content-white-bottom-body"></div>
							</div>
						</div>
					</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="content-bottom"><div class="content-bottom-content"></div></div>
	</div>



	<script type="text/javascript" language="JavaScript">
	function initUserDetailForm() {
		Object.extend(Validation, { addError : validatorAddError });
		Validation.addAllThese([
			['required-avatarName', 'Please choose your name', function(v) {
				return !Validation.get('IsEmpty').test(v);
			}]
		]);
		new Validation('stepform', {focusOnError:true, beforeSubmit:validatorBeforeSubmit, skipValidation:function(){ return backClicked; }});
		
	}
	initUserDetailForm();
	</script>

<?php 

//<< Page Content

//Include Footer Content
include('./Web/Includes/Content/Footers/Process.php'); 

?>