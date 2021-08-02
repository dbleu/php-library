<?php

namespace dbleu\api;

use function is_numeric;

class APIRequest {
	private $answer;
	
	public function __construct(string $token, string $url, string $method, string $body = "") {
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method );

		$headers = array(
  		 "Authorization: Bearer " . $token . "\n".
		   "Content-Type: application/json"
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);
		$this->answer = $resp;
	}
	
	public function getAnswer() {
		return $this->answer;
	}
}