<?php
    ## Baue eine Verbindung zu der Datenbank TrashItDB auf
    $db = new SQLite3('TrashItDB.db') or die;
    ## In der Variable $queryRangliste wird das Statement gespeichert, welches die 5 besten Spieler mit deren Punktzahl aus der Datenbank holt 
    $queryRangliste= "SELECT Name, Hoechstpunktzahl FROM spieler ORDER BY Hoechstpunktzahl DESC LIMIT 5";
   
    ## Wenn die Query ausgeführt werden kann, wird es in der Variable $resultRangliste gespeichert
    if ($resultRangliste=$db->query($queryRangliste))
    {
    
        ## es wird ein Array erstellt, in dem die Ergebnisse gespeichert werden
        $data= array();
        while($res= $resultRangliste->fetchArray(1)){
            array_push($data, $res) ;
        }
        //$data-Array wird zurückgegeben
        echo json_encode($data);
    }

## Verbindung zur Datenbank beenden	
	$db=null;

?>