<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'the project');

$conn = new mysqli(HOST , USER , PASS , DBNAME);

// arabic
$conn -> set_charset('utf8');