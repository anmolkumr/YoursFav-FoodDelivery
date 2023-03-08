<?php

define('DB_SERVER', 'fdb26.biz.nf');
define('DB_USERNAME', '2987060_sample');
define('DB_PASSWORD', 'jnvkhsiwanandpass321');
define('DB_NAME', '2987060_sample');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else {
  echo "";
}
?>
