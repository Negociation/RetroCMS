<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 					//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )					//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 						//
//////////////////////////////////////////////////////////////

?>

<?php 
//Include Header Content
include('./Web/Includes/Content/Headers/General.php'); 

//Page Content >>
?>
	<div id="page-headline">
		<div id="page-headline-breadcrums"></div>
		<div id="page-headline-text">Arquivo</div>
	</div>
	
	<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-home">
	<tbody>
	   <tr>
		  <td colspan="5" style="height: 4px;"></td>
	   </tr>
	   <tr>
		  <td rowspan="2" style="width: 8px;">&nbsp;</td>
		  <td valign="top" style="width: 740px;">
			 <table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
				   <tr>
					  <td colspan="2" style="padding-bottom: 3px;"></td>
				   </tr>
				   <tr>
						<td valign="top" style="width: 202px;" class="habboPage-col">
							<div class="v3box yellow">
								<div class="v3box-top"><h3>Notícias Habbo</h3></div>
								<div class="v3box-content">
									<div class="v3box-body">
									No Arquivo de Notícias Habbo você encontra o que está buscando.

										<div class="clear"></div>
									</div>
								</div>
								<div class="v3box-bottom"><div></div></div>
							</div>
						</td>
						
						<td valign="top" style="width: 539px;" class="habboPage-col">
							<div class="v3box yellow">
								<div class="v3box-top"><h3>Lista de Notícias</h3></div>
								<div class="v3box-content">
									<div class="v3box-body">
										<p></p>
										<ul>
											<li>
											<!--Articles Content foreach-->
												<span class="articledate">[00/00/00]</span>
												<a href="<?php echo $this->hotel->get_HotelWeb() ?>/news/0">Noticia não encontrada!</a>
											</li>
										</ul>
										<p></p>
										<div class="clear"></div>
									</div>
								</div>
								<div class="v3box-bottom">
									<div></div>
								</div>
							</div>
						</td>

					   
				   </tr>
				</tbody>
			 </table>
		  </td>
		
	   
	    
         <td rowspan="2" style="width: 4px;"></td>
		 
		 
         <td rowspan="2" valign="top" style=" margin-left: 4px; width: 176px;">
            <div id="ad_sidebar">
               <div class="cooperation">
                  <table height="120" width="168" valign="middle" align="center" border="0" cellpadding="0" cellspacing="0" background="<?php echo $this->hotel->get_HotelWeb() ?>/c_images/themes/partner_box.gif">
                     <tbody>
                        <tr>
                           <td>
                              <!--Partner Box Advertisement-->
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
			   <!--Advertisement Right if as enabled-->
			   <?php include('./Web/Includes/Content/Web/Advertisement/Right.php'); ?>

  
            </div>
         </td>
      </tr>
   </tbody>
   </tr>
</table>
<br style="clear: both;"/>
</div>






	
<?php 
//Include Footer Content
include('./Web/Includes/Content/Footers/General.php'); 

//Page Content >>
?>



	