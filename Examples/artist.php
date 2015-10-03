<?php
require "../autoloader.php";
use LastFm\Src\Caller\CallerFactory as CallerFactory;
use LastFm\Src\Artist as Artist;

// set api key
CallerFactory::getDefaultCaller()->setApiKey('<Your API key>');

// search for the Coldplay band
$artistName = "Linkin Park";

$tracks = Artist::getTopTracks($artistName);
echo "<ul>";
foreach($tracks as $key => $track) {
    echo "<li><div>";
    echo "Track Number: " . ($key + 1) . "<br>";
    echo "Title: " . $track->getName() . "<br>";
    echo "Played: " . $track->getPlayCount() . " time(s)<br>";
    echo "Duration: " . $track->getDuration() . " seconds<br>";
    echo "Track URL: " . $track->getUrl() . "<br>";
    echo "</div></li>";
}
echo "</ul>";

?>