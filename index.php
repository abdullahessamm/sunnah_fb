<?php

$accessToken = getenv('FB_ACCESS_TOKEN'); // نخلي التوكن متخزن في Secrets
$pageId = getenv("FB_PAGE_ID");

// مصفوفة أحاديث
$ahadith = include "ahadith.php";

$hadith = $ahadith[array_rand($ahadith)];

$url = "https://graph.facebook.com/{$pageId}/feed";

$data = [
    'message' => $hadith,
    'access_token' => $accessToken
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
