<?php
namespace dbleu;

use dbleu\exceptions\InvalidTokenException;
use dbleu\api\APIRequest;

class Main {
	private $token = "";
	
	public function __construct(string $token = "") {
		if($token === "") {
			throw new InvalidTokenException("Invalid API Token provided.");
		}
		$this->token = $token;
	}
	
	public function getVotes() {
		$req = new APIRequest($this->token, Config::URL . Config::API_VERSION . "/votes", "GET");
		return $req->getAnswer();
	}
	
	public function updateGuildCount(int $serverCount = 0) {
		$req = new APIRequest($this->token, Config::URL . Config::API_VERSION . "/update", "PATCH", '{"serverCount": ' . $serverCount . '}' );
		return json_decode($req->getAnswer());
	}
	
	public function getBotData() {
		$req = new APIRequest($this->token, Config::URL . Config::API_VERSION . "/ping", "GET");
		return json_decode($req->getAnswer());
	}
}