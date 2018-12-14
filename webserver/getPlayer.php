<?php
## Baue eine Verbindung zu der Datenbank TrashIt auf
$db = new SQLite3('TrashItDB.db') or die;
   
$player=$_GET['player'];
## In der Variable $queryAnzahlSpieler wird das Statement gespeichert, welches alle Spielernamen aus der Datenbank holt, die den übergebenen Spielernamen enthalten
$queryGetSpieler= "Select name from Spieler where SpielId=(SELECT SpielId FROM spieler '$player') and Name <> '$player'";	

  if ($resultSpieler=$db->query($queryGetSpieler))
    {
    
        ## es wird ein Array erstellt, in dem die Ergebnisse gespeichert werden
        $data= array();
        while($res= $resultSpieler->fetchArray(1)){
            array_push($data, $res) ;
        }
        //$data-Array wird zurückgegeben
        echo json_encode($data);
    }
    
## Verbindung zur Datenbank beenden	
    $db=null;
?>

