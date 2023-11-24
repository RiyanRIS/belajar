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
