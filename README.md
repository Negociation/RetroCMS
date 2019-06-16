# RetroCMS
- A Oldschool CMS compatible with Kepler Server ( v14 -> v17 ), based on the Web 1.0 revison 17 (2007), with support for Multi-language, Login , Logout , SSO...




+ This is the Beta Ring ( Aquamarine ) , all old versions ( Opal "Alpha" , Citrine"Beta1,Beta2" ) are deprecated now , we recommend to you use the Beta3 Builds , it have more features and securitys patches every month. Development Progress:

  - MVC with Security (90%)
  - Diagnosis Class ( 100% )
  - Diagnosis Panel ( 100% )
  - Views ( 83% ) 
  - Optimize some content
  - DAO templates (96%)
  - Controller template (100%)
  - Controllers (72%)
  - LanguageManager Library (90%)
 
 + Current Features:
  - Registration with Validations (99%) [Only neeed add captcha validation for safety]
  - Login (80%) [Only need to add Login Messages]
  - Logout
  - Habbo Credits Page
  - Habbo Club Page (50% only shows doesnt allows subscriptions)
  - English and Portuguese Support 
  - Client (70%) , doesnt allow LanguageManager and only works with SSO
  - Install (90%) [Except for Hotel Customizations]
  
 
  
### Install:

1º) Create a New Blank Database on your MySQL.

2º) Set the correctly information on ./core/install/settings.ini "USERNAME , PASSWORD, HOST"...

3º) ENABLE SODIUM LIBRARY 

    a) If u using a Webhost just need to enable sodium library , recommend to use php 7.2 
    
    b) If u using Xampp jut follow these steps:
    
      > Uncomment extension=sodium from php.ini file on C:/../Xampp/php removing ";"
      
      > Search libsodium.dll from php directory
      
      > Paste libsodium.dll on C:/../Xampp/Apache/bin
      
      > Restart apache
        
4º) Open the main directory on Navigator example "localhost" and set the information on Install

5º) Follow the Steps with the requiring information about your hotel , after Step 3 the Install create YOUR default admin account and Hotel Data

6º) Test your hotel




