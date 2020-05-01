//////////////////////////////////////////////////////////////
//                       RetroCMS                           //
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos ( M.tiago )                         //
//////////////////////////////////////////////////////////////
// Alpha Version 0.7.0 ( Opal )                             //
//////////////////////////////////////////////////////////////

var LANG_EN = {
	//--------------------------------------------------------------------------------------------------------------	
	// Shared
	//--------------------------------------------------------------------------------------------------------------
	
	//Topbar
	"topbar-offline" : "Hotel Offline",
	"topbar-status-loggedIn" : "Logged in as <b>%data%</b>", 
	"topbar-status-notLoggedIn" : "Not logged in",

	//TopBar -> My Habbo Tab
	"topbar-myhabbo" : "My Habbo",
	"topbar-myhabbo-headerNotLoggedIn" : "Welcome! Please sign in or register",
	"topbar-myhabbo-headerLoggedIn" : "Welcome! %data%",
	"topbar-myhabbo-inner-login" : "Sign In",
	"topbar-myhabbo-inner-register" : "Register Now, it's free!",
	"topbar-myhabbo-inner-client" : "Enter Habbo Hotel",
	"topbar-myhabbo-inner-home" : "View your Habbo Home Page",
	"topbar-myhabbo-inner-profile" : "Edit Your Settings",
	"topbar-myhabbo-inner-logout" : "Sign Out",

	//TopBar -> My Credits Tab
	"topbar-mycredits" : "My Coins",
	"topbar-mycredits-headerNotLoggedIn" : "Please <a href='"+habboReqPath+"/login'>enter</a> to see your balance",
	"topbar-mycredits-headerLoggedIn-haveCredits" : "You have <span id=\"amount-credits\" class=\"amount habbocredits\">%data%</span> credits",
	"topbar-mycredits-headerLoggedIn-noCredits" : "You have no Credits",
	"topbar-mycredits-inner-buy" : "Buy More Coins",
	"topbar-mycredits-inner-redeem" : "Redeem a Coin or Furni Code",
	
	  
	//TopBar -> My Club Tab
	"topbar-habboclub" : "Habbo Club",
	"topbar-habboclub-headerNotLoggedIn" : "Please <a href='"+habboReqPath+"/login'>enter</a> to see your Club status",
	"topbar-habboclub-headerLoggedIn-notMember" : "You are not subscribed to Club",
	"topbar-habboclub-headerLoggedIn-isMember" : "You have %data% days left in your subscription",
	"topbar-habboclub-inner-about": "Habbo Club gives you access to the full benefits on Habbo Hotel.",
	"topbar-habboclub-inner-club" : "Latest News on Habbo Club",
	
	
	//Navbar
	"navbar-title-home": "home",
	"navbar-title-hotel": "new here?",
	"navbar-title-community": "community",
	"navbar-title-games": "games",
	"navbar-title-credits": "coins",
	"navbar-title-club": "habbo club",
	"navbar-title-groups": "groups",
	"navbar-title-help": "help",
	
	//Months
	"month-1": "Janaury",
	"month-2": "February",
	"month-3": "March",
	"month-4": "April",
	"month-5": "May",
	"month-6": "June",	
	"month-7": "July",
	"month-8": "August",
	"month-9": "September",	
	"month-10": "October",	
	"month-11": "November",	
	"month-12": "December",	
	
	
	//--------------------------------------------------------------------------------------------------------------
	// Account
	//--------------------------------------------------------------------------------------------------------------
	
	//Page: Login
		
	"account-login-headerLeft" : "NEW TO HABBO? REGISTER HERE!",
	"account-login-registerHeader" : "REGISTER NOW!",
	"account-login-registerContent" : "Habbo is an online community that lets you create your own virtual space for you and your friends. With thousands of members already checked in there's always something to do...", 
	"account-login-registerBirthHeader": "PLEASE START BY ENTERING YOUR BIRTHDAY",
	"account-login-registerSubmit": "CONTINUE",  
	"account-login-registerReasonsHeader": "TOP REASONS TO REGISTER",
	"account-login-registerReason1": "<li>Create your own Habbo character and Home page</li>",
	"account-login-registerReason2": "<li>Meet your friends and find new ones</li>",
	"account-login-registerReason3": "<li>Decorate your own room</li>",
	"account-login-registerReason4": "<li>It’s more fun than not joining!</li>",
	"account-login-registerReason5": "<li>It's completely free!</li>",
	
	"account-login-headerRight": "ALREADY HAVE A HABBO? PLEASE LOG IN HERE!",
	"account-login-subheaderRight": "",
	"account-login-content": "If you already have a Habbo account then log in here using your Habbo user name and your password. Your user name and password are the same for here as they are in the Hotel.",
	"account-login-labelUsername": "MY HABBO NAME",
	"account-login-labelPassword": "PASSWORD",
	"account-login-loginSubmit": "LOG IN",  
	"account-login-forgottenPassHeader": "FORGOTTEN YOUR PASSWORD?",   
	"account-login-forgottenPassContent": "If you have forgotten your password please contact Player Support by using the <a href='"+habboReqPath+"/iot/go?lang=pt_BR&amp;country=br' target='_blank'>Habbo Help Tool</a>",  
	"account-login-safetyHeader": "SECURITY INFORMATION",   
	"account-login-safetyContent": "The real Habbo site is encrypted to protect you and your data. You can check whether or not this site is encrypted by looking for the nice looking padlock at the bottom of your web browser.",



	

	
	//404
	"notFound-headline": "PAGE NOT FOUND",	
	"notFound-Title": "PAGE NOT FOUND",	
	"notFound-Content": "We're sorry, but the page you have requested cannot be found. Perhaps it's lost, or it might have run off... OR, Kedo might have thought it was a Twinkie and eaten it!.<br><br>Please try typing the URL again, if that doesn't work visit the Home Page and click the links to find the page you're looking for...<br><br>If you have come to this page from the Hotel after clicking 'Buy Credits' then please, <a href=\""+habboReqPath+"/credits\" target=\"_self\">Click Here</a>.<br><br><br>",
	
	//Logout
	"logout-header": "Logged out",
	"logout-content": "You have logged out succesfully.<br><br>Goodbye, and we hope you come back soon!<br/><br/><a href=\""+habboReqPath+"\" target=\"_self\">Sign in again</a>",
	
	//Register	 
	"register-header": "Registration",
	"register-headerExit": "Cancel",
	"register-BubbleContent0": "Please tell us your birthday.",
	"register-labelBirthday" : "Birthday",
	"register-BubbleContent1": "Now the fun begins! Choose what you want to look like in habbo!",

	  
	 //Home
	 "home-headline-error": "Page could not be shown",
	 "home-header-infoHidden": "Did you know?",
	 "home-content-infoHidden": "That you can make your Habbo Home private through in your Habbo Profile?<br/><br/>Well, now you do!<br/>",
	 "home-header-infoBanned": "Did you know?",
	 "home-content-infoBanned": "If you own this page, and you believe you have been unjustly banned, please explain your case to our Support through <a target=\"_self\" href=\""+habboReqPath+"/iot/go?lang=pt_BR&amp;country=br\">Habbo Helping Tool</a>.<br><br><a href=\""+habboReqPath+"\" target=\"_self\">Back to Homepage</a><br>",
	 "home-header-error": "Sorry!",
	 "home-content-errorHidden": "<span style=\"font-weight: bold;\">%data%</span> marked this page as private.<br/><br/>Sorry!<br/><br/>",
	 "home-content-errorHidden-hotelUrl":"New to Habbo?",
	 "home-content-errorHidden-homeUrl":"Habbo Home main page",
	 "home-content-errorBanned": "This page is no longer available because <span style=\"font-weight: bold;\">%data%</span> was banned.<br>",

};
