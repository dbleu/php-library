<?php
use dbleu\Main;
use dbleu\api\APIRequest;

require_once __DIR__ . "/src/loader.php";

$dbleu = new Main("FxyqLbLnCgHh2C6XiOzQGRlXgC1iAHvqSm6ICA20mcK8CZbakK");
$v = $dbleu->getVotes();
var_dump($v);

//$req = new \dbleu\api\APIRequest("6MDjxgh4HTtZgmvkMduF3N0uu9YqLIzIf781u4voYZaipHvD89", "https://api.discord-botlist.eu/v1/update", "PATCH", '{"serverCount": 1039499493, "vanity": "brackett"}');
//var_dump($req->getAnswer());
 
?>