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
						<h2><span class ="lang-register-headerTitle">Registration</span> <a href="<?php echo $this->hotel->get_HotelURL(); ?>/register/exit" class="exit"><span class ="lang-register-headerExit">Cancel</span></a></h2>
					</div>
				</div>
			</div>
			<div class="content-top">
				<div class="content">
					<div class="content-column1">
						<div class="bubble">
							<div class="bubble-body">
								<span class ="lang-register-BubbleContent4">Please read the Terms and Conditions carefully. These ones are more intresting than real habbo ones.</span>
								<div class="clear"></div>
							</div>
						</div>
						<div class="bubble-bottom">
								<div class="bubble-bottom-body">
									<img src="<?php echo $this->hotel->get_HotelWeb() ?>/habboweb/16/11/web-gallery/images/register/bubble_tail_left.gif" alt="" width="22" height="31">
								</div>
							</div>
							<div class="frank"><img src="<?php echo $this->hotel->get_HotelWeb() ?>/habboweb/16/11/web-gallery/images/register/register4.gif" alt="" width="245" height="191"></div>
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
										<form method="post" action="<?php echo $this->hotel->get_HotelURL() ?>/register/done" id="stepform" autocomplete="off">
											<p>
												<span class ="lang-register-StepContent-TOS">You must agree to the following terms.</span>
											</p>
											<div id="terms">
												<span style="font-weight: bold;">
												Bem-vindo ao Habbo Hotel.  Se você tem menos de 16 anos, verifique os Termos e Condições com 
												os seus pais/responsáveis antes de aceitar o conteúdo. Peça para que eles expliquem qualquer 
												coisa que você não entender.
												<br>
												<p>
												Para poder usar o serviço, você precisa indicar informações válidas a seu respeito durante o registro. Envie-nos um e-mail se qualquer uma das suas informações de usuário for modificada.
												<br>
												<p>
												Como usuário do Habbo Hotel -  www.habbo.com.br e www.habbo.pt, você deve se comportar de acordo com a Habbo Etiqueta (regras do hotel) e com os Termos e Condições. Para conhecê-los melhor,
												clique nos links a seguir.Nunca dê sua senha ou seu endereço de e-mail para outra pessoa. Senão, seu Habbo poderá ser roubado.
												<br>
												<p>
												Você não precisa pagar nada para se registrar no Hotel, criar o seu próprio quarto vazio e bater papo. Pagando uma pequena taxa, você pode decorar seu quarto com móveis virtuais, participar 
												de jogos e associar-se ao Habbo Club. Para comprar, você precisará da permissão dos seus pais.
												</span> 
											</div>
											<p id="required-termsOfService">
												<input type="checkbox" name="T-O-S" id="T-O-S" value="true"> 
												<label for="T-O-S"><span class ="lang-register-StepHolder-TOS">I accept the Terms and Conditions.</span></label>
											</p>
											<div id="register-buttons">
												<div align="right">
														<input type="hidden" name="required-birth" value="<?php echo $this->newHabbo->get_HabboBirth() ?>" />
														<input type="hidden" name="newGender" value="<?php echo $this->newHabbo->get_HabboGender() ?>" />
														<input type="hidden" name="figureData" value="<?php echo $this->newHabbo->get_HabboFigure() ?>" />
														<input type="hidden" name="required-avatarName" value="<?php echo $this->newHabbo->get_HabboName() ?>" />
															<input type="hidden" name="required-password" value="<?php echo $this->newHabbo->get_HabboPassword() ?>" />
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
			Event.observe($("stepform"), "submit", function(e) {
				if (backClicked) return;
				var ok = true;
				var termsValue = $F("T-O-S");
				if (!termsValue || termsValue == "undefined" || !captchaValue || captchaValue == "undefined") {
					validatorBeforeSubmit();
				}
				if (!termsValue || termsValue == "undefined") {
					validatorAddError(false, false, "Please accept the terms of service");
					$("required-termsOfService").className = "validation-failed";
					Event.stop(e);
					ok = false;
				}
				if (ok) { $("continuebtn").disabled = true; }
			}, false);
		</script>
	
	
<?php 

//<< Page Content

//Include Footer Content
include('./Web/Includes/Content/Footers/Process.php'); 

?>