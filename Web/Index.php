<?php
//////////////////////////////////////////////////////////////
// 					RetroCMS 								//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.8.0 ( Citrine ) 							//
// Branch: Public											//
//////////////////////////////////////////////////////////////

?>


<?php 
//Include Header Content
include('./Web/Includes/Content/Headers/General.php'); 
$teste = new Figure('1000118001270012900121001',null);
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
                           			"<a href=\"<?php echo $this->hotel->get_HotelURL() ?>/client\" target=\"client\" onclick=\"openOrFocusHabbo(this); return false;\"\>Hotel</a\>"
                           			
                           	], text:"RetroCMS foi instalado com sucesso.<br /\>" },
                           
						
                           	{ image: "<img src=\"<?php echo $this->hotel->get_HotelWeb() ?>/c_images/album1054/beta_updated_promo.gif\" / alt=\"\"\>", links: [
                           			
                           			"<a href=\"https://github.com/Negociation/RetroCMS\" target=\"client\"; return false;\"\>Github</a\>"
                           			
                           	], text:"Warning: Alpha Preview Only for Tests. For more information access the GitHub directory.<br /\>" }
                           
                           	
                           ];
                        </script>
                        <div id="promoarea">
                           <div id="promoheader">
                              <h2><span class="lang-promoheader">Destaques</span></h2>
                              <ul style="display: none" id="promoheader-selectors">
                                 <li><a href="#" class="selected" onclick="showPromo(0); return false;">1</a></li>
								 <li><a href="#" onclick="showPromo(1); return false;">2</a></li>

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
                                       <li><a href="<?php echo $this->hotel->get_HotelURL() ?>/client" target="client" onclick="openOrFocusHabbo(this); return false;">Hotel</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="newsbox">
                           <div id="newsbox-header">
                              <h2><span class="lang-newsbox-header">Últimas Notícias</span></h2>
                              <a href="<?php echo $this->hotel->get_HotelURL() ?>/news/rss.xml"><img src="<?php echo $this->hotel->get_HotelWeb() ?>/habboweb/16/11/web-gallery/images/promo_area/feed-icon.gif" alt="" border="0"></a>
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
                              <div class="promo-button"><a href="<?php echo $this->hotel->get_HotelURL() ?>/news" alt=""><span class="lang-newsbox-footer">mais notícias</span></a></div>
                           </div>
                        </div>
                  <tr>
                     <td valign="top" style="width: 450px; height: 400px;" class="habboPage-col">
                        <br>
                        <center><br> <b> WARNING: Beta Preview, only for test. </b><br></center>
                        <br>
                     </td>
                  </tr>
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
							<script type="text/javascript">
								var Ads = new Array();
								function preloadAds(){
									for (var i = 0; i < arguments.length; i++){
										Ads[i] = document.createElement('img');
										Ads[i].setAttribute('src',arguments[i]);
									};
								}
							  
							  
								preloadAds(
								'http://web.archive.org/web/20071024132417/http://images.habbohotel.co.uk/c_images/album2748/creditsback188x125.png',
								'http://web.archive.org/web/20071024132417/http://images.habbohotel.co.uk/c_images/album2748/grunge_promo_188x125.gif',
								'http://web.archive.org/web/20071024132417/http://images.habbohotel.co.uk/c_images/album2748/ROTW_Duw_promo.png',
								'http://web.archive.org/web/20071024132417/http://images.habbohotel.co.uk/c_images/youthmusic/youth_music_lilchris_188x125.gif'
								);
							
								var urls = new Array('#','#','#','#');

								var curOffset = 1;
								window.onload= function(){
									document.getElementById('randLink').href = urls[0];
									document.getElementById('randImage').src = Ads[0].src;
									setInterval(
										function() {
											document.getElementById('randLink').href = urls[curOffset];
											document.getElementById('randImage').src = Ads[curOffset].src;
											curOffset = (curOffset >= Ads.length-1) ? 0 : curOffset + 1;
										}, 1000);
								};
							  </script>
							  
							  
							  

<a href="http://web.archive.org/web/20071024132417/http://www.habbo.co.uk/news/article329.html" target="_blank" id="randLink"><img src="http://web.archive.org/web/20071024132417/http://images.habbohotel.co.uk/c_images/album2748/grunge_promo_188x125.gif" border="0" id="randImage"></a>
<br>

                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
			   <!--Advertisement Right if as enabled-->
			   <?php include('./Web/Includes/Content/WebContent/Advertisement/Right.php'); ?>

  
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
