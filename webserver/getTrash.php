<?php

# Baue eine Verbindung zu der Datenbank TrashItDB auf
$db = new SQLite3('TrashItDB.db') or die;

# Übergebene Parameter in der Variable $counter speichern	
$counter = $_GET['counter'];

# In der Variable $querymuell wird das Statement gespeichert, 
# welches den Namen, das Foto, die Müllpunkte und die MülltonnenId
# zur übergebenen MuellId selektieren soll
$querymuell = "SELECT Name, Foto, MuellPunkte, MuelltonnenId FROM Muell WHERE Muellid = $counter";

# Wenn die Query ausgeführt werden kann, wird es in der Variable $resultMuell gespeichert
if ($resultMuell = $db->query($querymuell)) {
    # es wird ein Array erstellt, in dem die Ergebnisse gespeichert werden
    $data = array();
    $res = $resultMuell->fetchArray(1);
    array_push($data, $res['Name']);
    #hier wird das Bild enkodiert und in den Array hinzugefügt, 
    #damit es weiter verwendet werden kann
    array_push($data, base64_encode($res['Foto']));
    array_push($data, $res['MuellPunkte']);
    array_push($data, $res['MuelltonnenId']);

    #$data-Array wird zurückgegeben
    echo json_encode($data);
}

# Verbindung zur Datenbank beenden	
$db = null;
?>