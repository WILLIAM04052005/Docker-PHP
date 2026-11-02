<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$conn = mysql_connect("127.0.0.1:3306", "root", "IAmRoot") or die("Erreur MySQL : " . mysql_error());
mysql_query("SET NAMES utf8", $conn);
mysql_query("CREATE DATABASE IF NOT EXISTS exosPHP", $conn) or die("Création de la base impossible : " . mysql_error());
mysql_select_db("exosPHP", $conn) or die("Base introuvable : " . mysql_error());
mysql_query("CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    date_creation DATETIME NOT NULL,
    PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8", $conn) or die("Création de la table impossible : " . mysql_error());

$nom = "hacker', 'hacker@example.com', NOW()) #";
$email = "test@example.com";

mysql_query("INSERT INTO utilisateurs (nom, email, date_creation) VALUES ('$nom', '$email', NOW())", $conn) or die(mysql_error());

$result = mysql_query("SELECT * FROM utilisateurs", $conn);
while ($row = mysql_fetch_array($result)) {
    echo $row['nom'] . ' - ' . $row['email'] . '<br>';
}

// Injection SQL : le # commente la fin de la requête, l'attaquant impose ses propres valeurs.
