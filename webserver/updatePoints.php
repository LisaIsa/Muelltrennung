<?php
    ## Baue eine Verbindung zu der Datenbank TrashIt auf
    $db = new SQLite3('TrashIt.db') or die;
    
     ## Übergebenen Parameter in der Variable $spielername speichern	
    $levelId= $_GET['levelId'];
    $spielername= $_GET['spielername'];
    ## In der Variable $queryRangliste wird das Statement gespeichert, welches die 10 besten SPieler mit deren Punktzahl aus der Datenbank holt 
    $queryUpdatePoints= "UPDATE Spieler SET Punkte=(SELECT l.Punktzahl "
            . "from Level l join Muell m on l.LevelId = m.LevelId where l.LevelId= $levelId) "
            . "where Spielername='$spielername'";
   
    ## Wenn die Query ausgeführt werden kann, wird es in der Variable $resultRangliste gespeichert
    $db->query($queryUpdatePoints);

## Verbindung zur Datenbank beenden	
    $db=null;
?>