<?php

# Baue eine Verbindung zu der Datenbank TrashItDB auf
$db = new SQLite3('TrashItDB.db') or die;

# Übergebenen Parameter (beide Spielernamen)in den Variablen $player1 und $player2 speichern	
$player1 = $_GET['player1'];
$player2 = $_GET['player2'];

$querySpielId = "Select COUNT(SpielId) AS SpielVorhanden from Spiel where "
        . "SpielerEins ='$player1' OR SpielerEins= '$player2'"
        . "AND SpielerZwei='$player1' OR SpielerZwei='$player2'";

if ($resultSpielId = $db->query($querySpielId)) {
    #Das Ergebnis wird in einem Array gespeichert
    $rowSpielId = $resultSpielId->fetchArray();

    ## Anzahl der Datensätze herausfinden, die den Benutzernamen enthalten
    $rowcountSpielId = $rowSpielId['SpielVorhanden'];
    if ($rowcountSpielId == 0) {
        ## In der Variable $queryInsertGame wird das Statement gespeichert, 
        ## welches ein neues Spiel in der Tabelle Spiel anlegt und die zugehörigen
        ## Spieler speichert
        $queryInsertGame = "Insert INTO Spiel (SpielerEins, SpielerZwei) VALUES ('$player1', '$player2')";
        ## Query $queryInsertGame wird ausgeführt 
        $db->exec($queryInsertGame);
    }

    ## in der Variable $queryPlaysGame wird die Query gespeichert, die die 
    ## Spalte "IstImSpiel" in der Tabelle Spiel der beiden Spieler auf 1 setzt,
    ## weil diese sich gerade im Spiel befinden
    $queryPlaysGame = "UPDATE Spieler SET IstImSpiel=1 where Name in ('$player1', '$player2')";
    ## Query $queryInsertGame wird ausgeführt 
    $db->exec($queryPlaysGame);
}

# Verbindung zur Datenbank beenden	
$db = null;
?>
