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
include('./Web/Includes/Content/Headers/Install.php'); 

//Page Content >>
?>


<div id="outer">
<div id="outer-content">
<div class="processbox">
	<div class="headline">
		<div class="headline-content">
			<div class="headline-wrapper">
				<h2>Install</h2>
			</div>
		</div>
	</div>
	<div class="content-top">
		<div class="content">
			<div class="content-column1">
		

			<div class="frank"><img src="<?php echo $this->hotel->get_HotelURL() ?>/habboweb/16/11/web-gallery/images/install/1.png" alt="" width="260" height="324"></div>
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
								<form method="post" action="<?php echo $this->hotel->get_HotelURL() ?>/install/step/2" id="stepform">                                                    
									<p>                                                        
										<b>SET THE BASIC HOTEL INFORMATION</b>
										<br>
										Please write the basic information about your hotel:
										</p> 
									
									<p>                                                        
										<label for="required-hotelName" class="registration-text">Hotel Name</label>
										<br>                                                        
										<input type="text" name="required-hotelName" id="hotelname" maxlength="14" value="" class="registration-text required-hotelName">                                                    
									</p> 
									<p>                                                        
										<label for="required-hotelNick" class="registration-text">Hotel Nick</label>
										<br>                                                        
										<input type="text" name="required-hotelNick" id="hotelnick" maxlength="14" value="" class="registration-text required-hotelNick">                                                    
									</p> 
									<p>                                                        
										<label for="required-hotelNick" class="registration-text">Hotel Version</label>
										<br>     
										<div id="required-hotelVer">
												<select name="required-hotelVer" id="required-hotelVer" class="dateselector">
													<option value="">--</option>
													<option value="11">v11</option>
													<option value="12">v12</option>
													<option value="13">v13</option>
													<option value="14">v14</option>
													<option value="15">v15</option>
													<option value="16">v16</option>
													<option value="17">v17</option>
													<option value="18">v18</option>
													<option value="19">v19</option>
													<option value="20">v20</option>
													<option value="21">v21</option>
													<option value="22">v22</option>
													<option value="23">v23</option>
													<option value="24">v24</option>
												</select>
												
												
										<script type="text/javascript" language="JavaScript">
											function GetVersion(){
												document.getElementById('required-hotelVersion').value = document.getElementById('required-hotelVer').value;
											}
										</script>		
														
										</div>
									</p> 
									<hr> 
									
									<p>                                                        
										<b>NOW INFORMS YOUR HOTEL URLS:</b>
										<br>
										Please write the basic information about your hotel , you cant change that for now:

										
									</p> 
									
									<p>                                                        
										<label for="required-hotelUrl" class="registration-text">Website Url</label>
										<br>                                                        
										<input type="text" name="required-hotelUrl" id="hotelurl" maxlength="14" value="" class="registration-text required-hotelUrl">                                                    
									</p>   
									
									<p>                                                        
										<label for="required-hotelWeb" class="registration-text">Image Patch</label>
										<br>                                                        
										<input type="text" name="required-hotelWeb" id="hotelweb" maxlength="14" value="" class="registration-text required-hotelWeb">                                                    
									</p>
									  
								
									<div id="pwRetypeStatus"></div>                                                    
									<div id="register-buttons">
	
									<div align="right" >
										<input type="hidden" name="required-hotelVersion" id="required-hotelVersion"/>

										<input type="submit" value="Continue" id="continuebtn" onmousedown="GetVersion()" class="process-button">
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
			['required-hotelName', 'Please choose your name', function(v) {
				return !Validation.get('IsEmpty').test(v);
			}],
			['required-hotelNick', 'Please choose your name', function(v) {
				return !Validation.get('IsEmpty').test(v);
			}],
			['required-hotelUrl', 'Please choose your name', function(v) {
				return !Validation.get('IsEmpty').test(v);
			}],
			['required-hotelWeb', 'Please choose your name', function(v) {
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