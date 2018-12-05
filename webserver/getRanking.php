<?php
    ## Baue eine Verbindung zu der Datenbank TrashIt auf
    $db = new SQLite3('TrashIt.db') or die;
    ## In der Variable $queryRangliste wird das Statement gespeichert, welches die 10 besten SPieler mit deren Punktzahl aus der Datenbank holt 
    $queryRangliste= "SELECT Spielername, Hoechstpunktzahl FROM spieler ORDER BY Hoechstpunktzahl DESC LIMIT 10";
   
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