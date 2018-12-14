<?php
    ## Baue eine Verbindung zu der Datenbank TrashIt auf
    $db = new SQLite3('TrashItDB.db') or die;
    
    ## Übergebenen Parameter in der Variable $counter und $ spielername speichern	
    $counter = $_GET['counter'];
    
    ## In der Variable $queryRangliste wird das Statement gespeichert, welches die 10 besten SPieler mit deren Punktzahl aus der Datenbank holt 
    $querymuell= "SELECT Foto FROM Muell WHERE Muellid = $counter";   
   
    ## Wenn die Query ausgeführt werden kann, wird es in der Variable $resultMuell gespeichert
    if ($resultMuell = $db -> query($querymuell))
    {
        ## es wird ein Array erstellt, in dem die Ergebnisse gespeichert werden
        $res= $resultMuell->fetchArray();

        $encoded_image = base64_encode($res['Foto']);

        $image = "<img src='data:image/jpeg;base64,{$encoded_image}' alt=\"$Ten\">";

        echo $image;
    }

## Verbindung zur Datenbank beenden	
	$db=null;

?>