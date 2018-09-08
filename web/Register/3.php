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
											Email is the only way for our Support team to contact you if you need any help with your account.
											<div class="clear"></div>
										</div>
									</div>
												<div class="bubble-bottom">
												<div class="bubble-bottom-body">
													<img src="<?php echo $this->hotel->get_HotelURL() ?>/habboweb/16/11/web-gallery/images/register/bubble_tail_left.gif" alt="" width="22" height="31">
												</div>
											</div>
							<div class="frank"><img src="<?php echo $this->hotel->get_HotelURL() ?>/habboweb/16/11/web-gallery/images/register/register4.gif" alt="" width="245" height="191"></div>
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
													<form method="post" action="http://localhost/account/register/step/4" id="stepform">
														<p>
															Please enter your email address.
														</p>
														<p>
															<label for="email" class="registration-text">Your email address:</label><br>
															<input type="text" name="required-email" id="required-email" value="" class="registration-text required-email">
														</p>
														<div id="register-buttons">
															<div align="right">
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
						<div class="content-bottom">
							<div class="content-bottom-content"></div>
						</div>
					</div>
		<script type="text/javascript" language="JavaScript">
		Object.extend(Validation, { addError : validatorAddError });
		Validation.addAllThese([
				['required-email', 'Please enter a valid email address', function(v) {
				return !Validation.get('IsEmpty').test(v) && /^[\w\-.%]{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/.test(v);
				}],
				new Validation('stepform', {focusOnError:true, beforeSubmit:validatorBeforeSubmit, skipValidation:function(){ return backClicked; }
				});
				Event.observe($("backbtn"),'click',function() { backClicked=true; },false);
		</script>
		
<?php 

//<< Page Content

//Include Footer Content
include('./Web/Includes/Content/Footers/Process.php'); 

?>