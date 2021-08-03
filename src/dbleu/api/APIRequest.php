<?php

namespace dbleu\api;

use dbleu\exceptions\{
	InvalidTokenException,
	CooldownException
};

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
		if($resp === '{"message":"Too many requests"}') throw new CooldownException("Too many requests");
		if($resp === '{"message":"You need to wait atleast 5 minutes after posting the data"}') throw new CooldownException("You are Rate-Limited. Please wait atleast 5 minutes.");
		$this->answer = $resp;
	}
	
	public function getAnswer() {
		return $this->answer;
	}
}