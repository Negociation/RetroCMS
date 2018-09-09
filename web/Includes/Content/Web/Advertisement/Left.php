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

	<?php if($this->hotel->get_AdvertisementTop('status')){ 
		echo'
        <div align="center">
            <div class="ad-scale ad-leader">
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
                                <h5>Advertissement</h5>
                            </td>
                            <td class="ad-header-mr"></td>
                        </tr>
                        <tr>
                            <td class="ad-content-ml"></td>
                            <td class="ad-content-m" align="center" valign="top"><a href="'.$this->hotel->get_AdvertisementTop('url').'"><img style="width: 728px; height: 90px;" alt="" src="'.$this->hotel->get_AdvertisementTop('image').'" /><br />
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
        </div>
		'; 
	} 
		
?>
		
		
		