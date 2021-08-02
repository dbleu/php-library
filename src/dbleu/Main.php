<?php
namespace dbleu;

use dbleu\exceptions\{
	InvalidTokenException,
	CooldownException
};

use dbleu\api\APIRequest;

class Main {
	private $token = "";
	
	public function __construct(string $token = "") {
		if($token === "") {
			throw new InvalidTokenException("Invalid token");
		}
		$this->token = $token;
	}
	
	private function getToken() {
		return $this->token;
	}
	
	public function getVotes() {
		$req = new APIRequest($this->token, "https://api.discord-botlist.eu/v1/votes", "GET");
		return $req->getAnswer();
	}
	
	public function update(int $serverCount = 0) {
		$req = new APIRequest($this->token, "https://api.discord-botlist.eu/v1/update", "PATCH", '{"serverCount": ' . $serverCount . '}' );
		return $req->getAnswer();
	}
}