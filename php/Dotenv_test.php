<?php 

require_once './Dotenv.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

echo getenv('ENVIRONTMENT');