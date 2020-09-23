<?php

include("./lib/qrlib.php");

$dci = $_GET['player_dci'];
$player_email = $_GET['player_email'];


$tempDir = getcwd().'/qrcodes/';
$fileName = $param.'_'.md5($param).'.png';
$pngAbsolutePath = $tempDir.$fileName;

if (!file_exists($pngAbsolutePath)){
	QRcode::png('http://www.pandaevents.cn/process_individual.php?dci='.'&player_email='.$player_email,$pngAbsolutePath);
}

QRcode::png('http://www.pandaevents.cn/process_individual.php?dci='.'&player_email='.$player_email);

?>