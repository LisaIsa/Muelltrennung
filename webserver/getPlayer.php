<?php
## Baue eine Verbindung zu der Datenbank TrashIt auf
$db = new SQLite3('TrashItDB.db') or die;
   
$player=$_GET['player'];
## In der Variable $queryAnzahlSpieler wird das Statement gespeichert, welches alle Spielernamen aus der Datenbank holt, die den übergebenen Spielernamen enthalten
$queryGetSpieler= "SELECT SpielerId FROM spieler where IstOnline= 1 and Name <> '$player' LIMIT 1";	

## Wenn die Query ausgeführt werden kann, wird es in der Variable $queryAnzahlSpieler gespeichert
if ($resultSpieler=$db->query($queryGetSpieler))
{
    ## es wird ein Array erstellt, in dem die Ergebnisse gespeichert werden
        $data= array();
        while($rowSpieler=$resultSpieler->fetchArray()){
            array_push($data, $rowSpieler) ;
        }
}
## Sind keine Datensätze mit dem Spielernamen in der Datenbank vorhanden, 
## so wird der Spieler in der Datenbank angelegt
if($rowSpieler==""){	
    echo json_encode($data);
}else{
    
    //$data-Array wird zurückgegeben
    echo json_encode($data);
}   

## Verbindung zur Datenbank beenden	
    $db=null;
?>

