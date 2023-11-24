<?php
require './Monolog/Logger.php';
require './Monolog/Handler/StreamHandler.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Membuat logger
$log = new Logger('name');
$log->pushHandler(new StreamHandler('app.log', Logger::WARNING));

// Menuliskan pesan ke log
$log->warning('This is a warning message');
?>