<?php

# Baue eine Verbindung zu der Datenbank TrashItDB auf
$db = new SQLite3('TrashItDB.db') or die;

$player = $_GET['player'];

# In der Variable $queryUpdateOnlineStatus wird der die SPalte IstOnline auf 0,
# also auf "Offline", und die SPalte "IstImSpiel" wird auch auf 0  gesetzt
$queryFinishGame = "UPDATE Spieler SET IstOnline=0, IstImSpiel=0 where Name='$player'";
$db->query($queryFinishGame);


# Verbindung zur Datenbank beenden	
$db = null;

?>