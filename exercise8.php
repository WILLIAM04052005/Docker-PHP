<?php

// DateTime : Gère les dates au-delà de 2038. Plus flexible que les timestamps.
$date = new DateTime("2039-01-01");
//$timestamp = mktime(0, 0, 0, 1, 1, 2039);
//echo $timestamp;
echo "Date après 2038 : " . $date->format('Y-m-d');
?>