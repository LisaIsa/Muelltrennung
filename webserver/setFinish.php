<?php

$db = new SQLite3('TrashItDB.db') or die;

$player = $_GET['player'];
$abbrechen = false;
while ($abbrechen) {
    $queryTimestamp = "SELECT Timestamp FROM spieler where Name='$player'";

# Wenn die Query ausgeführt werden kann, wird es in der Variable $resultSpielerPunkte gespeichert
    if ($resultTimestamp = $db->query($queryTimestamp)) {
        # es wird ein Array erstellt, in dem die Ergebnisse gespeichert werden
        $uhrzeit_alt = $resultTimestamp->fetchArray();
    }
    $uhrzeit_aktuell = date("YmdHis");
    if ($uhrzeit_aktuell - $uhrzeit_alt >= 30) {

# In der Variable $queryUpdateOnlineStatus wird der die SPalte IstOnline auf 0,
# also auf "Offline", und die SPalte "IstImSpiel" wird auch auf 0  gesetzt
        $queryFinishGame = "UPDATE Spieler SET IstOnline=0, IstImSpiel=null where Name='$player'";
        $db->exec($queryFinishGame);
        $abbrechen = true;
    }
    sleep(5);
}
    # Verbindung zur Datenbank beenden	
    $db = null;

