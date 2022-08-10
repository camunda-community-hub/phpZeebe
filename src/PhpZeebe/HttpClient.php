<?php
namespace Community\PhpZeebe;

class HttpClient {
	
	public static function postFormData($url, $data) {
		//$url = 'http://server.com/path';
		//$data = array('key1' => 'value1', 'key2' => 'value2');

		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data)
			)
		);
		$context  = stream_context_create($options);
		try {
			$response = file_get_contents($url, false, $context);
		} catch (\ErrorException $ex) {
			throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
		}
		if ($response === false) {
			throw new \Exception();
		}
		return json_decode($response, TRUE);
	}
	
	private static function my_utf8_encode(array $in): array {
		foreach ($in as $key => $record) {
			if (is_array($record)) {
				$in[$key] = my_utf8_encode($record);
			} else {
				$in[$key] = utf8_encode($record);
			}
		}

		return $in;
	}


	public static function postJson(string $url, array $data) {
		$data     = my_utf8_encode($data);
		$postdata = json_encode($data);
		if (is_null($postdata)) {
			throw new \Exception('decoding params');
		}

		$options = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/json',
				'content' => $postdata
			)
		);

		$context = stream_context_create($options);
		try {
			$response = file_get_contents($url, false, $context);
		} catch (\ErrorException $ex) {
			throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
		}
		if ($response === false) {
			throw new \Exception();
		}
		return json_decode($response, TRUE);
	}
}