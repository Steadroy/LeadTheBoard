<?php
	
$servername = "localhost";  // URL of MySQL database, localhost will usually be fine
$username = "test"; // MySQL username
$password = "test"; // User password
$dbname = "testx"; // Database 





// Creating constants for heavily used paths makes things a lot easier.

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/views/templates'));

defined("INCLUDES_PATH")
    or define("INCLUDES_PATH", realpath(dirname(__FILE__) . '/includes'));

defined("VIEWS_PATH")
    or define("VIEWS_PATH", realpath(dirname(__FILE__) . '/views'));
  

defined("ACHIEVEMENTICONS_PATH")
    or define("ACHIEVEMENTICONS_PATH", realpath(dirname(__FILE__) . '/assets/achievements'));
 
?>