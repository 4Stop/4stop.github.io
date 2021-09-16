<?php

$post = array(
    'merchant_id'=>'DEM-GE88m982o3z7qiD',
    'password'=>'l2D3jsgLCgnDTsE',
    'user_name'=>'sandip.k@paymentz.com',
    'user_number'=>'',
    'trans_id'=>1576,
    'customer_registration_id'=>'',
);

$file1 = "";
if (isset($_FILES['doc']['tmp_name']) && !empty($_FILES['doc']['tmp_name'])) {
    $file1 = $_FILES['doc']['tmp_name'];
}

$file2 = "";
if (isset($_FILES['doc2']['tmp_name']) && !empty($_FILES['doc2']['tmp_name'])) {
    $file2 = $_FILES['doc2']['tmp_name'];
}

if (!empty($file1)) {
    $post['doc'] = new CURLFile($file1);
}

if (!empty($file2)) {
    $post['doc2'] = new CURLFile($file2);
}

$ch = curl_init('https://api.verifyglobalrisk.com/index.php/documentIdVerify');

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 90);
curl_setopt($ch, CURLOPT_TIMEOUT, 90);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);

$data = curl_exec($ch);

$error = curl_error($ch);

$header_size = curl_getinfo($ch);
echo 'Result:<br>';
echo $data;
echo '<br>';
echo '<br>';
echo 'Header<br>';
print_r($header_size);
echo '<br>';
echo '<br>';
echo 'Error<br>';
print curl_error($ch);

echo '<br>';
echo '<br>';

