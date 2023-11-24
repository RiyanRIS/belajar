<?php

require_once './RisEncrypt.php';
// Contoh penggunaan:
$secretKey = 'inirahasiadapur'; // Ganti dengan secret key Anda
$secretKey2 = 'inirahasiadapure'; // Ganti dengan secret key Anda

// Contoh penggunaan dengan CID yang berbeda
$cid1 = 'client1.cid';
$cid2 = 'client2.cid';

// Membuat objek Enkripsi
$encryption = new Riyan\RisEncrypt();

// Data yang akan dienkripsi
$dataToEncrypt = array(
  'nama' => 'riyan ris',
  'username' => 'riyanris',
  'password' => '123qweKL:'
);

// Proses enkripsi dengan CID pertama
$encryptedData1 = $encryption->encrypt($dataToEncrypt, $cid1, $secretKey);
var_dump($encryptedData1);

// Proses dekripsi dengan CID pertama
$decryptedData1 = $encryption->decrypt($encryptedData1, $cid1, $secretKey);
var_dump($decryptedData1);

// Proses dekripsi dengan CID kedua (akan gagal karena CID berbeda)
$decryptedData2 = $encryption->decrypt($encryptedData1, $cid2, $secretKey);
var_dump($decryptedData2);

// Proses dekripsi dengan secret key kedua (akan gagal karena secret key berbeda)
$decryptedData3 = $encryption->decrypt($encryptedData1, $cid1, $secretKey2);
var_dump($decryptedData3);

// Proses dekripsi dengan selisih waktu 5 second, ubah dulu nilai constantnya
sleep(5);
$decryptedData1 = $encryption->decrypt($encryptedData1, $cid1, $secretKey);
var_dump($decryptedData1);