Ilustracka
=========================
![stable](https://img.shields.io/badge/stable-0.0.1-blue.svg) 

About
-----
Application to retrieve information about user´s repositories at GitHub

Installation
------------
App
  1. Install LAMP
  2. Copy the app to web server directory
  3. Set configuration in settings.ini file (/settings/settings.ini) - DB configuration + pin code
  4. Make sure the config file is not accessible for others since it contains credentials.
  5. Execute sql scripts to prepare database
  6. Run at {path...}/gitapp
     
Requirements
-------------------

Type           | version
-------------  | -------
Server         | LAMP, (WAMP not tested)
PHP version    | 5.6 or 7.0 (7.0 and 7.1 tested)

Version
------

  * 0.0.1 - initial release
 
