<?php
require_once "Risencrypt.php";

$cid = 'riyan';
$secret = 'iNiR4h4s14!';

$data = array(
  'nama' => 'Riyan Risky',
  'ttl' => 'Semarang, 19 Nov 1996'
);

$data = '';

$encrypted = RisEnc\RisEnc::encrypt($data, $cid, $secret);

var_dump($encrypted);

$decrypted = RisEnc\RisEnc::decrypt($encrypted, $cid, $secret);

var_dump($decrypted);
