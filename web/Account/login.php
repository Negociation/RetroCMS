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
require_once('./Web/Includes/Content/Headers/Account.php'); 

//Page Content >>
?>


		<div id="outer">
			<div id="outer-content">
				<div class="processbox left">
					<div class="headline">
						<div class="headline-content">
							<div class="headline-wrapper">
								<h2>Primeira vez no Habbo? Registre-se.</h2>
							</div>
						</div>
					</div>
					<div class="content-top">
						<div class="content">
							<div class="processbox-inner">
								<h4>Primeira vez? Registre-se aqui!</h4>
								<p>
									<img vspace="10" hspace="10" border="0" align="right" src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/album209/frank_with_key.gif?h=531971dc69fe0357f9a244f47e3239ab" alt="">Habbo é uma comunidade que te permite criar seu próprio espaço virtual para si e teus amigos. Mais de um milhão de Habbos já se registraram (já pensou?). Então, há muito para se fazer aí dentro.<br/><br/><br/><br/>
								</p>
							</div>
							<div id="registration-errors">
								<div class="content-red">
									<div class="content-red-body" id="registration-errors-content">
										<div class="clear"></div>
									</div>
								</div>
								<div class="content-red-bottom">
									<div class="content-red-bottom-body"></div>
								</div>
							</div>
							<div class="content-white-outer" id="registration-start">
								<div class="content-white">
									<div class="content-white-body">
										<div class="content-white-content">
											<form method="post" action="<?php echo $this->hotel->get_HotelURL(); ?>/register/start" id="registration-form">
												<p>
													<label for="day" class="registration-text">Por favor, comece pela data de nascimento</label>
												</p>
												<div id="required-birthday">
													<select name="day" id="day" class="dateselector">
														<option value="">--</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
														<option value="18">18</option>
														<option value="19">19</option>
														<option value="20">20</option>
														<option value="21">21</option>
														<option value="22">22</option>
														<option value="23">23</option>
														<option value="24">24</option>
														<option value="25">25</option>
														<option value="26">26</option>
														<option value="27">27</option>
														<option value="28">28</option>
														<option value="29">29</option>
														<option value="30">30</option>
														<option value="31">31</option>
													</select>
													<select name="month" id="month" class="dateselector">
														<option value="">--</option>
														<option value="1">Janeiro</option>
														<option value="2">Fevereiro</option>
														<option value="3">Março</option>
														<option value="4">Abril</option>
														<option value="5">Maio</option>
														<option value="6">Junho</option>
														<option value="7">Julho</option>
														<option value="8">Agosto</option>
														<option value="9">Setembro</option>
														<option value="10">Outubro</option>
														<option value="11">Novembro</option>
														<option value="12">Dezembro</option>
													</select>
													<select name="year" id="year" class="dateselector">
														<option value="">--</option>
														<option value="2007">2007</option>
														<option value="2006">2006</option>
														<option value="2005">2005</option>
														<option value="2004">2004</option>
														<option value="2003">2003</option>
														<option value="2002">2002</option>
														<option value="2001">2001</option>
														<option value="2000">2000</option>
														<option value="1999">1999</option>
														<option value="1998">1998</option>
														<option value="1997">1997</option>
														<option value="1996">1996</option>
														<option value="1995">1995</option>
														<option value="1994">1994</option>
														<option value="1993">1993</option>
														<option value="1992">1992</option>
														<option value="1991">1991</option>
														<option value="1990">1990</option>
														<option value="1989">1989</option>
														<option value="1988">1988</option>
														<option value="1987">1987</option>
														<option value="1986">1986</option>
														<option value="1985">1985</option>
														<option value="1984">1984</option>
														<option value="1983">1983</option>
														<option value="1982">1982</option>
														<option value="1981">1981</option>
														<option value="1980">1980</option>
														<option value="1979">1979</option>
														<option value="1978">1978</option>
														<option value="1977">1977</option>
														<option value="1976">1976</option>
														<option value="1975">1975</option>
														<option value="1974">1974</option>
														<option value="1973">1973</option>
														<option value="1972">1972</option>
														<option value="1971">1971</option>
														<option value="1970">1970</option>
														<option value="1969">1969</option>
														<option value="1968">1968</option>
														<option value="1967">1967</option>
														<option value="1966">1966</option>
														<option value="1965">1965</option>
														<option value="1964">1964</option>
														<option value="1963">1963</option>
														<option value="1962">1962</option>
														<option value="1961">1961</option>
														<option value="1960">1960</option>
														<option value="1959">1959</option>
														<option value="1958">1958</option>
														<option value="1957">1957</option>
														<option value="1956">1956</option>
														<option value="1955">1955</option>
														<option value="1954">1954</option>
														<option value="1953">1953</option>
														<option value="1952">1952</option>
														<option value="1951">1951</option>
														<option value="1950">1950</option>
														<option value="1949">1949</option>
														<option value="1948">1948</option>
														<option value="1947">1947</option>
														<option value="1946">1946</option>
														<option value="1945">1945</option>
														<option value="1944">1944</option>
														<option value="1943">1943</option>
														<option value="1942">1942</option>
														<option value="1941">1941</option>
														<option value="1940">1940</option>
														<option value="1939">1939</option>
														<option value="1938">1938</option>
														<option value="1937">1937</option>
														<option value="1936">1936</option>
														<option value="1935">1935</option>
														<option value="1934">1934</option>
														<option value="1933">1933</option>
														<option value="1932">1932</option>
														<option value="1931">1931</option>
														<option value="1930">1930</option>
														<option value="1929">1929</option>
														<option value="1928">1928</option>
														<option value="1927">1927</option>
														<option value="1926">1926</option>
														<option value="1925">1925</option>
														<option value="1924">1924</option>
														<option value="1923">1923</option>
														<option value="1922">1922</option>
														<option value="1921">1921</option>
														<option value="1920">1920</option>
														<option value="1919">1919</option>
														<option value="1918">1918</option>
														<option value="1917">1917</option>
														<option value="1916">1916</option>
														<option value="1915">1915</option>
														<option value="1914">1914</option>
														<option value="1913">1913</option>
														<option value="1912">1912</option>
														<option value="1911">1911</option>
														<option value="1910">1910</option>
														<option value="1909">1909</option>
														<option value="1908">1908</option>
														<option value="1907">1907</option>
														<option value="1906">1906</option>
														<option value="1905">1905</option>
														<option value="1904">1904</option>
														<option value="1903">1903</option>
														<option value="1902">1902</option>
														<option value="1901">1901</option>
														<option value="1900">1900</option>
													</select>
												</div>
												
												<script type="text/javascript" language="JavaScript">
															function MergeData(){
																var dd = document.getElementById('day').value;
																var mm = document.getElementById('month').value;
																var yy = document.getElementById('year').value;
																document.getElementById('required-birth').value = parseInt((new Date(dd+'/'+mm+'/'+yy).getTime() / 1000).toFixed(0));
															}
												</script>
												<p class="last">
													<input type="hidden" name="required-birth" id="required-birth" />
													<input type="submit" value="Continuar" onmousedown="MergeData()" class="process-button" id="registration-submit"/>
												</p>
											</form>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="content-white-bottom">
									<div class="content-white-bottom-body"></div>
								</div>
							</div>
							<div class="processbox-inner">
								<p><br/>
									<span style="font-weight: bold;">Razões para registrar-se:</span><br/>
								<ul>
									<li>Criar seu próprio Habbo e página pessoal</li>
									<li>Encontrar seus amigos e fazer novas amizades</li>
									<li>Decorar seu próprio Quarto</li>
									<li>É muito divertido mesmo</li>
									<li>É gratuito<br/></li>
								</ul>
								<br/><br/><br/></p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="content-bottom">
						<div class="content-bottom-content"></div>
					</div>
				</div>
				<div class="processbox right blue">
					<div class="headline">
						<div class="headline-content">
							<div class="headline-wrapper">
								<h2>Já é um Habbo? Entre!</h2>
							</div>
						</div>
					</div>
					<div class="content-top">
						<div class="content">
							<div class="processbox-inner">
								<p>
									Já é registrado? Entre aqui.<br/><br/>Se você já possui conta no Habbo, entre aqui usando seu nome Habbo e senha (os mesmo que você usa no Hotel).<br/><br/>
								</p>
							</div>
							
					<div id="login-errors">
					<div class="content-red">
						<div class="content-red-body" id="login-errors-content">
						<div class="clear"></div>
						</div>
					</div>
					<div class="content-red-bottom"><div class="content-red-bottom-body"></div></div>
					</div>
							<div class="content-white-outer" id="login">
								<div class="content-white">
									<div class="content-white-body">
										<div class="content-white-content">
											<form action="./submit" method="post" id="login-form">
												<input type="hidden" name="loginTicket" value="LT-270976-JWCorbGb7fctvYlEP2es-br-fe2"/>
												<?php if(isset($_GET['target'])){ echo '<input type="hidden" name="target" value="'.$_GET['target'].'"/>'; } ?>
												<input type="hidden" name="service" value="/security_check"/>
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
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="content-white-bottom">
									<div class="content-white-bottom-body"></div>
								</div>
							</div>
							<div class="processbox-inner">
								<p>
									<br style="font-weight: bold;"/><span style="font-weight: bold;"> Esqueceu a senha?</span><br/><br/>Se você esqueceu sua senha, entre em contato com o Suporte usando a <a href="http://web.archive.org/web/20070613213428/http://www.habbohotel.com.br/iot/go?lang=pt_BR&amp;country=br" target="_blank">Ferramenta de Ajuda Habbo</a>.<br/><br/>
								</p>
								<h4>PARA SUA SEGURANÇA</h4>
								<p>
									<img vspace="10" hspace="10" border="0" align="right" src="<?php echo $this->hotel->get_HotelWeb(); ?>/c_images/album209/encryption_pc_ie.gif?h=e4fc37398b1a546726f6e1e4694c8035" alt="">O Habbo é criptografado para proteger todos os seus dados. Para saber se a página é segura, olha no Cadeado que aparece embaixo, na janela do seu navegador (por exemplo, Internet Explorer e Firefox).<br/><br/><br/>
								</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="content-bottom">
						<div class="content-bottom-content"></div>
					</div>
				</div>
				
				<script type="text/javascript" language="JavaScript">
					Event.observe($("registration-form"), "submit", function(e) {
						if ($("day").selectedIndex == 0 || $("month").selectedIndex == 0 || $("year").selectedIndex == 0) {
							validatorBeforeSubmit("registration-errors");
							validatorAddError(false, false, "Por favor, insira uma data válida.", "registration-errors");
							$("required-birthday").className = "validation-failed";
							Event.stop(e);
						} else {
							$("registration-submit").disabled = 'true';
						}
					}, false);
					Event.observe($("login-form"), "submit", function(e) {
						if ($F("login-username") == "" || $F("login-password") == "") {
							validatorBeforeSubmit("login-errors");
							validatorAddError(false, false, "Por favor, digite seu nome Habbo e senha", "login-errors");
						
							if ($F("login-password") == "") { $("login-password").className = "validation-failed"; $("login-password").focus(); }
							else { Element.removeClassName($("login-password"), "validation-failed"); }
							if ($F("login-username") == "") { $("login-username").className = "validation-failed"; $("login-username").focus(); }
							else { Element.removeClassName($("login-username"), "validation-failed"); }
							Event.stop(e);
						} else {
							$("login-submit").disabled = 'true';
						}
					}, false);
				</script>
				
				
				<script type="text/javascript" language="JavaScript">
							var errorId = sessionStorage.getItem("loginErrorId");
							
							switch(errorId){
							case "1":
								validatorAddError(false, false, "Nome Habbo informado não existe.", "login-errors");
								break;
							case "2":
								validatorAddError(false, false, "Senha não confere com o nome Habbo.", "login-errors");
								break;
							case "3":												
								validatorAddError(false, false, "Este Habbo esta banido.", "login-errors");
								break;
								
							}
							sessionStorage.removeItem("loginErrorId");
							
				</script>
				
<?php 

//<< Page Content

//Include Footer Content
require_once ('./Web/Includes/Content/Footers/Process.php'); 

?>


