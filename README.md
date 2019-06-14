# RetroCMS
- A Oldschool CMS compatible with Kepler , with support between v14...v17, allowing Multi-language and Ajax Request like the old days.


+ This is the Beta Ring ( Aquamarine ) , for a stable Beta please Use Beta 2 (Citrine), who as planned to get some features from the Private Branch:
  - MVC with Security (90%)
  - Diagnosis Class ( 100% )
  - Diagnosis Panel ( 100% )
  - Views ( 83% ) 
  - Optimize some content
  - DAO templates (96%)
  - Controller template (100%)
  - Controllers (72%)
  
  
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




