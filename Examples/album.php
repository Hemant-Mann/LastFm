<?php
require "../autoloader.php";
use LastFm\Src\Caller\CallerFactory as CallerFactory;
use LastFm\Src\Artist as Artist;

// set api key
CallerFactory::getDefaultCaller()->setApiKey('<Your API key>');

// get top tracks for Coldplay
$artistName= "Coldplay";
$albumName = "Mylo Xyloto";
$album = Album::getInfo($artistName, $albumName);
echo "<div>";
echo "Number of Plays: " . $album->getPlayCount() . " time(s)<br>";
echo 'Cover: <img src="' . $album->getImage(4) . '"><br>';
echo "Album URL: " . $album->getUrl() . "<br>";
echo "</div>";
?>