# PHP last.fm API #

## Basic Usage ##
```php
<?php
require "autoloader.php";
use LastFm\Src\Caller\CallerFactory as CallerFactory;
use LastFm\Src\Artist as Artist;

// set api key
CallerFactory::getDefaultCaller()->setApiKey('<Your API key>');

// search for the Coldplay band
$artistName = "Linkin Park";

$tracks = Artist::getTopTracks($artistName);

$results = [];
foreach ($tracks as $key => $track) {
	$results[] = [
		'name' => $track->getName(),
		'played' => $track->getPlayCount(),
		'url' => $track->getUrl()
	];
}

echo json_encode($results);

?>
```
