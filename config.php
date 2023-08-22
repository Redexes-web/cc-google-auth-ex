<?php

use Dotenv\Dotenv;
require 'vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('GOOGLE_ID', $_ENV['GOOGLE_ID']);
define('GOOGLE_SECRET', $_ENV['GOOGLE_SECRET']);
?>
