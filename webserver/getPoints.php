<?php
    ## Baue eine Verbindung zu der Datenbank TrashIt auf
    $db = new SQLite3('TrashIt.db') or die;
    
    ## Übergebenen Parameter in der Variable $spielername speichern	
    $spielername = $_GET['spielername'];
    
    ## In der Variable $querySpielerPunkte wird das Statement gespeichert, welches die Punkte eines Spielers aus der Datenbank holt 
    $querySpielerPunkte= "SELECT Punkte FROM spieler where Spielername='$spielername'";
   
    ## Wenn die Query ausgeführt werden kann, wird es in der Variable $resultRangliste gespeichert
    if ($resultSpielerPunkte=$db->query($querySpielerPunkte))
    {
    
        ## es wird ein Array erstellt, in dem die Ergebnisse gespeichert werden
        $data= array();
        while($res= $resultSpielerPunkte->fetchArray(1)){
            array_push($data, $res) ;
        }
        //$data-Array wird zurückgegeben
        echo json_encode($data);
    }

## Verbindung zur Datenbank beenden	
	$db=null;

?>