<?php
DEFINE("DBHOST", "localhost");
DEFINE("DBUSER", "root");
DEFINE("DBPASS", "");
DEFINE("DBNAME", "arbasysn_arbasys5");
$Link=mysql_connect(DBHOST,DBUSER,DBPASS) or die ("Couln't connect to database");
mysql_select_db(DBNAME,$Link);

date_default_timezone_set('Asia/Jakarta');

?>
