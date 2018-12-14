<?php
    ## Baue eine Verbindung zu der Datenbank TrashIt auf
    $db = new SQLite3('TrashItDB.db') or die;
    
    ## Übergebenen Parameter in der Variable $counter und $ spielername speichern	
    $counter = $_GET['counter'];
    
    ## In der Variable $queryRangliste wird das Statement gespeichert, welches die 10 besten SPieler mit deren Punktzahl aus der Datenbank holt 
    $querymuell= "SELECT Name, Foto, Muellpunkte, MuelltonnenId FROM Muell WHERE Muellid = $counter";   
   
    ## Wenn die Query ausgeführt werden kann, wird es in der Variable $resultMuell gespeichert
    if ($resultMuell = $db -> query($querymuell))
    {
        ## es wird ein Array erstellt, in dem die Ergebnisse gespeichert werden
        $data= array();
        while($res= $resultMuell->fetchArray(1)){
            array_push($data, $res) ;
        }
        //$data-Array wird zurückgegeben
        echo json_encode($data);
    }

## Verbindung zur Datenbank beenden	
	$db=null;

?>