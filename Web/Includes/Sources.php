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
            <link href="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/styles/style.css" type="text/css" rel="stylesheet"/>
			<link href="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/styles/boxes.css" type="text/css" rel="stylesheet"/>	
			<link href="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/styles/ads.css" type="text/css" rel="stylesheet"/>
<?php 
//Special CSS Includes
switch (get_class($this)){
	case "Install":
	case "Register":
	case "Account":
		echo '			<link href="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/styles/process.css" type="text/css" rel="stylesheet"/>';	
		break;
}
?>


			<script language="JavaScript" type="text/javascript">
				var habboReqPath = "";
				var habboStaticFilePath = "http://web.archive.org/web/20070501032619/http://images.habbo.com.br/web/web-3.0.1-b25";
			</script>
			
			<script language="JavaScript" type="text/javascript" src="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/js/prototype.js"></script>
			<script language="JavaScript" type="text/javascript" src="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/js/habbo.js"></script>
			<script language="JavaScript" type="text/javascript" src="<?php echo $this->hotel->get_HotelWeb(); ?>/habboweb/16/11/web-gallery/js/builder.js"></script>
			<script language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
			
			<!-- Languages -->
			<script language="JavaScript" type="text/javascript" src="<?php echo $this->hotel->get_HotelUrl(); ?>/web/includes/language/pt.js"></script>
			<script language="JavaScript" type="text/javascript" src="<?php echo $this->hotel->get_HotelUrl(); ?>/web/includes/language/en.js"></script>

			
			<!-- Alpha (Will be removed or merged with the javascripts files) -->
			<script language="JavaScript" type="text/javascript">
				var j = jQuery.noConflict();
					
				function LoadLanguage(lang){
					/*fills all the span tags with class=lang pattern*/ 
					window.localStorage.setItem('userLang', lang);

				  j('span[class^="lang"]').each(function(){
					  
					var LangVar = (this.className).replace('lang-','');
					var Text = window["WORDS_"+lang][LangVar];
					j(this).text(Text);        
				  });
				}

				window.onload = function Start(){ 
					if (window.localStorage.getItem('userLang') === null){
						window.localStorage.setItem('userLang', 'PT');
						alert(window.localStorage.getItem('userLang'));
					}
					var lang =  window.localStorage.getItem('userLang');
					LoadLanguage(lang); 
					LoadData();
				};
			
			</script>
<?php
//Special JavaScript Includes
switch (get_class($this)){
	case "Profile":
		include './Web/Includes/Content/Sources/Profile.php'; 
		break;
	case "Home":
		include './Web/Includes/Content/Sources/Home.php'; 
		break;
	case "Groups":
		include './Web/Includes/Content/Sources/Home.php'; 
		break;
	case "Register":
	case "Install":
		echo '
			<script language="JavaScript" type="text/javascript" src="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/js/registration.js"></script>
			<script language="JavaScript" type="text/javascript" src="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/js/swfobject.js"></script>

		';
	case "Account":
		echo'
			<script language="JavaScript" type="text/javascript" src="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/js/hobojax.js"></script>
			<script language="JavaScript" type="text/javascript" src="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/js/validation.js"></script>
		';
		break;
	case "Client":
		echo '			<script language="JavaScript" type="text/javascript" src="'.$this->hotel->get_HotelWeb().'/habboweb/16/11/web-gallery/js/effects.js"></script>';
		break;
	default:
		break;
}
?>


		