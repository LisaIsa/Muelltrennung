// ajax-Request, durch den die besten 10 Spieler mit der Punktzahl geholt werden 
$(document).ready(function () {
    console.log("test");
    
    $.ajax({
        url: "index.php",
        type: "POST",
        data: {action: "getRanking"},
        dataType: "json",
        //wird der ajax-Request erfolgreich durchgeführt, so wird die Rangliste gefüllt
        success: function (data) {
            //data wird in einer Schelife durchlaufen, damit jeder Wert in der Tabelle angezeigt wird
            $.each(data, function (index, val) {
                var platz = index + 1;
                //eine neue Reihe wird für die Tabelle erstellt 
                var newRow = $('<tr class="info">');
                //es werden drei Spalten (Platz, Spielername, Hoechstpunktzahl) gefüllt
                var cols = "";
                cols += '<td>' + platz + '</th>';
                cols += '<td>' + val.Spielername + '</td>';
                cols += '<td>' + val.Hoechstpunktzahl + '</td></tr>';

                //in die Reihe werden die Werte der Spalten hinzgefügt
                newRow.append(cols);
                //in die Tabelle wird die neue Reihe eingefügt
                $("#tbl_ranking_body").append(newRow);
            });
        },
        //kann der Request nicht ausgeführt werden, so wird ein Alter ausgegeben
        error: function (request, error)
        {
            alert("FEHLER!!! Request: " + JSON.stringify(request));
        }
    });
});

