# GOLDataMatchingTool
Gold Data Matching Tool is a web interface that allows an authorize user to manually match students form the registrar's office (Grade/Consent) to participants from the Turning Point.

## Requirements
* NodeJS (v6.11.0)
  * Bower
* Apache (Current
* PHP

## Install
1. `git clone project` to web directory
2. `cd public` directory
  2.1. `bower install`
3. `cd application/config`
  3.1. `cp default-config.json -> config.json`
  3.2. Set up database connection information
  3.3. Add login information  
```php
/**
* Login user and password
*/
define('USER','user');
define('PASSWORD', 'password');
define('SESSION_KEY', 'active');
define('SESSION_EXCEPTIONS', serialize(array('home','user', 'error')));
```
4. from the project home directory give all files 755 permission
