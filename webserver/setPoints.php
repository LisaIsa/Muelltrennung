<?php

# Baue eine Verbindung zu der Datenbank TrashItDB auf
$db = new SQLite3('TrashItDB.db') or die;

# Übergebene Parameter in der Variable $player (Spielername) und 
# $points (derzeitiger Punktestand) speichern	
$player = $_GET['player'];
$points = $_GET['points'];

$queryHoechstePunkte = "SELECT Hoechstpunktzahl FROM spieler where Name='$player'";

# Wenn die Query ausgeführt werden kann, wird es in der Variable $resultSpielerPunkte gespeichert
if ($resultHoechstePunkte = $db->query($queryHoechstePunkte)) {
    $res = $resultSpielerPunkte->fetchArray(1);
    $hoechstpunktzahl = $res['Hoechstpunktzahl'];
    echo $hoechstpunktzahl;

    # ist die derzeitige Höchstpunktzahl kleiner als die aktuell gesammelten Punkte,
    # so wird ein Update auf die Hoechstpunktzahlin der Tabelle Spieler gemacht  
    if ($hoechstpunktzahl < $points) {
        $queryUpdateHoechstePunkte = "UPDATE Spieler SET Hoechstpunktzahl=$points WHERE Name='$player'";
        $db->exec($queryUpdateHoechstePunkte);
    }

    # In der Variable $queryUpdatePoints wird das Statement gespeichert,
    # welches die Punktzahl eines Spielers aktualisiert
    $queryUpdatePoints = "UPDATE Spieler SET Punkte=$points WHERE Name='$player'";

    # $queryUpdatePoints ausführen
    $db->exec($queryUpdatePoints);
}

# Verbindung zur Datenbank beenden	
$db = null;
?>