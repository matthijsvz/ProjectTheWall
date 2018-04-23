<?php
define ('HOST', 'localhost');
define ('USER', 'root');
define ('PASS','root');
define ('DBNAME','24542_db');

$mysqli = new mysqli(HOST,USER,PASS,DBNAME);

if ($mysqli->errno) {
    echo 'Connection error: ' . $mysqli->errno;
}
