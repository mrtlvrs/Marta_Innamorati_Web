<?php
//Database connection settings
define('DB_HOST', '127.0.0.1');
define('DB_PORT', 3306);
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'crochethub');
define('DRIVER', 'pdo_mysql');

//base url, per usare solo path relativi
define('BASE_URL', '/CrochetHub/public/index.php');
define('BASE_PUBLIC', '/CrochetHub/public');

//session cookie expiration
define('COOKIE_EXP_TIME', 2592000); // 30 days in seconds