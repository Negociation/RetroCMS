<?php
//////////////////////////////////////////////////////////////
// 						   RetroCMS 						//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )							//
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal ) 							//
//////////////////////////////////////////////////////////////

?>

	<?php if($this->hotel->get_AdvertisementRight('status')){ 
		echo'
             <div class="ad-scale ad160">
                  <table>
                     <tbody>
                        <tr>
                           <td class="ad-header-tl"></td>
                           <td class="ad-header-t"></td>
                           <td class="ad-header-tr"></td>
                        </tr>
                        <tr>
                           <td class="ad-header-ml"></td>
                           <td class="ad-header-m">
                              <h5><span class="lang-Advertissement_Title">Publicidade</span></h5>
                           </td>
                           <td class="ad-header-mr"></td>
                        </tr>
                        <tr>
                           <td class="ad-content-ml"></td>
                           <td class="ad-content-m" align="center" valign="top"><a href="'.$this->hotel->get_AdvertisementRight('url').'"><img style="width: 160px; height: 600px;" alt="" src="'.$this->hotel->get_AdvertisementRight('image').'">
                           </td>
                           <td class="ad-content-mr"></td>
                        </tr>
                        <tr>
                           <td class="ad-content-bl"></td>
                           <td class="ad-content-b"></td>
                           <td class="ad-content-br"></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
			
		'; 
	} 
		
?>
		
		
		