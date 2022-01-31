<?php

$db_name = 'crud';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

$cx_db = new PDO("mysql:dbname=".$db_name.";host".$db_host, $db_user, $db_pass);