<?php
namespace Riyan;

/**
 * RisEncrypt
 * Enkripsi By Riyan.
 */
class RisEncrypt
{

  const TIME_DIFF_LIMIT = 300; // selisih waktu dalam second

  private $iv;

  public function __construct()
  {
    $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
  }

  public function encrypt($data, $cid, $secretKey)
  {
    $secretKey = hash('sha256', $secretKey, true);

    $dataString = json_encode($data);
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $uuid = substr(str_shuffle($characters), 0, 16);
    $combinedData = $dataString . '|' . $uuid . '.' . time() . '|' . $cid;
    $encryptedData = openssl_encrypt($combinedData, 'aes-256-cbc', $secretKey, 0, $this->iv);

    return base64_encode($this->iv . $encryptedData);
  }

  public function decrypt($encryptedData, $cid, $secretKey)
  {
    $secretKey = hash('sha256', $secretKey, true);
    $decodedData = base64_decode($encryptedData);
    $iv = substr($decodedData, 0, openssl_cipher_iv_length('aes-256-cbc'));
    $encryptedData = substr($decodedData, openssl_cipher_iv_length('aes-256-cbc'));
    $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $secretKey, 0, $iv);
    $splitData = explode('|', $decryptedData);

    if (count($splitData) >= 3) {
      list($dataString, $uuid, $storedCid) = $splitData;

      $timestamp = explode('.', $uuid)[1];
      $currentTime = time();
      if ($currentTime - $timestamp > self::TIME_DIFF_LIMIT) {
        return null;
      }

      if ($cid !== $storedCid) {
        return null;
      }

      $data = json_decode($dataString, true);
      return $data;
    }

    return null;
  }
}

// Contoh penggunaan:
$secretKey = 'inirahasiadapur'; // Ganti dengan secret key Anda
$secretKey2 = 'inirahasiadapure'; // Ganti dengan secret key Anda

// Contoh penggunaan dengan CID yang berbeda
$cid1 = 'client1.cid';
$cid2 = 'client2.cid';

// Membuat objek Enkripsi
$encryption = new \Riyan\RisEncrypt();

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
