<?php
date_default_timezone_set('UTC');

$string = file_get_contents("data.json");
$json = json_decode($string, true);

$day = date("l"); // Get Day Name
$link = $json[0][$day][0]['link']; // Get Title with Day Name

header("Location: ". $link);
exit();