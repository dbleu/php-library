<h1 align="center">discord-botlist.eu api</h1>
<br />
Welcome ðŸ‘‹ <br />
This package offers you a more user friendly and easier way to interact with the discord-botlist.eu HTTP api. This package is made by KeksDev.

## Install
```
composer require dbleu/php-libary
```

## Getting started
```PHP
<?php
use dbleu\Main;

require_once __DIR__ . '/vendor/autoload.php';

// Init Libary
$api = new Main("<API Token>");

// Get an array with all dates when the bot was voted for
$votes = $api->getVotes();
var_dump($votes);

// Get the current information about the bot
$information = $api->getBotData();
var_dump($information);

// Update the server count
$newCount = 1;
$count = $api->updateGuildCount($newCount);
var_dump($count);
```

---

`getVotes()` <br />
| Parameter | Type |
| --- | --- |
| _none_ | _none_ |

> `Array`

---

`.getBotData()` <br />
| Parameter | Type |
| --- | --- |
| _none_ | _none_ |

> `Object`

---

`.updateGuildCount(serverCount)` <br />
| Parameter | Type |
| --- | --- |
| updateGuildCount |`Integer` |

> ```
> {
>   "updated": Array,
>   "bot": Object
> }
> ```

