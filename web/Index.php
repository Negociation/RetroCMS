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

<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-home">
   <tbody>
      <tr>
         <td colspan="6" style="height: 4px;"></td>
      </tr>
      <tr>
         <td rowspan="2" style="width: 8px;">&nbsp;</td>
         <td valign="top" style="width:740px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
               <tbody>
                  <tr>
                     <td colspan="3" style="padding-bottom: 3px;">
                        <script type="text/javascript">
                           var promoPages = [
                           	{ image: "<img src=\"https://i.imgur.com/yEo2vdU.png\" / alt=\"\"\>", links: [
                           			"<a href=\"/#\">Mais!</a>", 
                           			"<a href=\"<?php echo $this->hotel->get_HotelURL() ?>/client\" target=\"client\" onclick=\"openOrFocusHabbo(this); return false;\"\>Abismo</a\>"
                           			
                           	], text:"ErikaFantasma deve estar ocupadíssima neste momento.<br /\>" },
                           
                           	
                           ];
                        </script>
                        <div id="promoarea">
                           <div id="promoheader">
                              <h2>Destaques</h2>
                              <ul style="display: none" id="promoheader-selectors">
                                 <li><a href="#" class="selected" onclick="showPromo(0); return false;">1</a></li>
                              </ul>
                              <script type="text/javascript">
                                 $('promoheader-selectors').style.display = "block";
                              </script>
                           </div>
                           <div id="promocontent">
                              <div id="promobody">
                                 <p id="promoimage">
                                    <a href="./#">
                                    <img src="https://i.imgur.com/yEo2vdU.png" alt=""> </a>
                                 </p>
                                 <div class="promotext">
                                    <p id="promotext-content">RetroCMS foi instalado com sucesso.<br> </p>
                                 </div>
                                 <div id="promolinks">
                                    <ul id="promolinks-list">
                                       <li><a href="<?php echo $this->hotel->get_HotelURL() ?>/#">Mais!</a></li>
                                       <li><a href="<?php echo $this->hotel->get_HotelURL() ?>/client" target="client" onclick="openOrFocusHabbo(this); return false;">Abismo</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="newsbox">
                           <div id="newsbox-header">
                              <h2>Últimas Notícias</h2>
                              <a href="<?php echo $this->hotel->get_HotelURL() ?>/news/rss.xml"><img src="<?php echo $this->hotel->get_HotelWeb() ?>/habboweb/16/11/web-gallery/promo_area/feed-icon.gif" alt="" border="0"></a>
                           </div>
                           <div id="newsbox-text">
                              <div class="newsitem">
                                 <h3><span class="articledate">[00/00/00]</span> 			
                                    <a href="<?php echo $this->hotel->get_HotelURL() ?>/#">RetroCMS Instalado com Sucesso</a>
                                 </h3>
                                 <p>
                                    Clique para mais informações...
                                 </p>
                              </div>
                           </div>
                           <div id="newsbox-footer">
                              <div class="promo-button"><a href="<?php echo $this->hotel->get_HotelURL() ?>/news" alt="">mais notícias</a></div>
                           </div>
                        </div>
                  <tr>
                     <td valign="top" style="width: 450px; height: 400px;" class="habboPage-col">
                        <br>
                        <center><br> <b> WARNING: Alpha Preview, only for test. </b><br></center>
                        <br>
                     </td>
                  </tr>
                  </td>
               </tbody>
            </table>
         </td>
         <td rowspan="2" style="width: 4px;"></td>
         <td rowspan="2" valign="top" style=" margin-left: 4px; width: 176px;">
            <div id="ad_sidebar">
               <div class="cooperation">
                  <table height="120" width="168" valign="middle" align="center" border="0" cellpadding="0" cellspacing="0" background="http://localhost/c_images/themes/partner_box.gif">
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
</table>
<br style="clear: both;"/>
</div>

		
<?php 
//Include Footer Content
include('./Web/Includes/Content/Footers/General.php'); 

//Page Content >>
?>



	