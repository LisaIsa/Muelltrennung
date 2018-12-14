<?php

# Baue eine Verbindung zu der Datenbank TrashItDB auf
$db = new SQLite3('TrashItDB.db') or die;

$player = $_GET['player'];
# In der Variable $queryAnzahlSpieler wird das Statement gespeichert, welches alle Spielernamen aus der Datenbank holt, die den übergebenen Spielernamen enthalten
$queryAnzahlSpieler = "SELECT COUNT(SpielerId) as VorhandeneSpieler FROM spieler where name='$player'";

# Wenn die Query ausgeführt werden kann, wird es in der Variable $queryAnzahlSpieler gespeichert
if ($resultAnzahlSpieler = $db->query($queryAnzahlSpieler)) {
    #Das Ergebnis wird in einem Array gespeichert
    $rowAnzahl = $resultAnzahlSpieler->fetchArray();

    # Anzahl der Datensätze herausfinden, die den Benutzernamen enthalten
    $rowcountSpieler = $rowAnzahl['VorhandeneSpieler'];
}

# Sind keine Datensätze mit dem Spielernamen in der Datenbank vorhanden, 
# so wird der Spieler in der Datenbank angelegt
if ($rowcountSpieler == 0) {

    #Satement, um Nutzernamen hinzuzufügen, wird in der Variable $sql gespeichert
    $querySpielerHinzufuegen = "INSERT INTO Spieler (Name, IstOnline, Punkte, Hoechstpunktzahl) VALUES ('" . $player . "', 1, 0, 0)";

    # Wird die Query erfolgreich ausgeführt
    $db->query($querySpielerHinzufuegen);
} elseif ($rowcountSpieler == 1) {
    $queryIstBereitsOnline = "SELECT COUNT(SpielerId) as SpielerOnline FROM spieler where name='$player' and IstOnline=1";

# Wenn die Query ausgeführt werden kann, wird es in der Variable $queryAnzahlSpieler gespeichert
    if ($resultSpielerOnline = $db->query($queryIstBereitsOnline)) {
        #Das Ergebnis wird in einem Array gespeichert
        $rowSpieler = $resultSpielerOnline->fetchArray();

        # Anzahl der Datensätze herausfinden, die den Benutzernamen enthalten
        $rowcountSpielerOnline = $rowSpieler['SpielerOnline'];
        if ($rowcountSpielerOnline == 0) {
            $queryUpdateOnlineStatus = "UPDATE Spieler SET IstOnline=1 and Punkte=0 where Name=$player";
            $db->query($queryUpdateOnlineStatus);
        } else {
            echo 'Der Spieler ist bereits online. Bitte suche dir einen anderen Spielernamen aus!';
        }
    }
}

# Verbindung zur Datenbank beenden	
$db = null;
?>

