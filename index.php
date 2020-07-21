<?php
require_once __DIR__ . '/vendor/autoload.php';

    var_dump('deze');

    $rq = new \RandomQuotes\RandomQuotes();
    echo $rq->generateRandomQuotes(100);

    if(file_exists('env.php')) {
        $env = include 'env.php';
    } else {
        exit('Not available');
    }

	var_dump(getWeather($env));


	function getWeather($env)
	{
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

		return $data;
	}
