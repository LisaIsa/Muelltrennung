<?php
    ## Baue eine Verbindung zu der Datenbank TrashItDB auf
    $db = new SQLite3('TrashItDB.db') or die;
    
     ## Übergebenen Parameter in der Variable $player und Punkte speichern	
    $player= $_GET['player'];
    $points= $_GET['points'];
    
    ## In der Variable $queryRangliste wird das Statement gespeichert, welches die 10 besten SPieler mit deren Punktzahl aus der Datenbank holt 
    $queryUpdateRankingPoints= "UPDATE Spieler SET Hoechstpunktzahl=$points WHERE Name='$player'";
   
    ## Wenn die Query ausgeführt werden kann, wird es in der Variable $resultRangliste gespeichert
    $db->exec($queryUpdateRankingPoints);

## Verbindung zur Datenbank beenden	
    $db=null;
?>

