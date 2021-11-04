<?php 
function encrypt_decrypt($gg_secret,$userId, $action = 'encrypt')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = $userId; // user define private key
    $secret_iv = 'loc@ttu!doen-de123'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt') {
        $output = openssl_encrypt($gg_secret, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($gg_secret), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

?>