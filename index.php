<html>
<head>
    <title>Test</title>
</head>
<body>
<?php
require_once __DIR__ . '/vendor/autoload.php';

$rq = new \RandomQuotes\RandomQuotes();
echo "<i>" .$rq->generateRandomQuotes(100) . '</i>';

if(file_exists('media/facepalm.jpg')) {
    $opentag = "<table><tr><td><img src='media/facepalm.jpg'></td><td>";
    $closetag = "</td></tr></table>";
} else {
    $opentag = "";
    $closetag = "";
}

echo $opentag;

if(file_exists('env.php')) {
    $env = include 'env.php';
} else {
    exit('Not available');
}

$apiKey = $env['api_key'];
$cityId = $env['api_city'];
$url = sprintf($env['api_url'], $cityId, $apiKey);


$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();

var_dump($data);
echo $closetag;
?>
</body>
</html>