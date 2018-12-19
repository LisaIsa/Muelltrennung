<?php
$db = new SQLite3('TrashItDB.db') or die;

$player = $_GET['player'];
$uhrzeit_alt = $_GET('timestamp');

# In der Variable $queryUpdateOnlineStatus wird der die SPalte IstOnline auf 0,
# also auf "Offline", und die SPalte "IstImSpiel" wird auch auf 0  gesetzt
        $queryFinishGame = "UPDATE Spieler SET Timestamp=$uhrzeit_alt where Name='$player'";
        $db->exec($queryFinishGame);
    
    # Verbindung zur Datenbank beenden	
        $db = null;
?>

