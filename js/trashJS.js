// ajax-Request, welcher anstößt, dass die Daten zum Müll 
// (Müllbild, Müllname, Punkte pro Müll und MülltonnenId )geholt werden 
$(document).ready(function () {
    $.ajax({
        url: "index.php",
        type: "POST",
        data: {action: "getTrash"},
        dataType: "JSON",
        //wird so werden die Daten übergeben
        success: function (data) {
            //tag erzeugen, damit das Bild in der Sidebar rechts angezeigt wird
            var image = "<img id=\"img_trash\" src=\"data:image/png;base64," + data[1] + "\" class=\"img-responsive img-trash-next center-block\"><p class=\"txt_black text-center\">"+data[0]+"</p>";

            $("#area_next_trash").append(image);
        },
        //kann der Request nicht ausgeführt werden, so wird eine Fehlermeldung ausgegeben
        error: function (request, error)
        {
            alert("FEHLER!!! Request: " + JSON.stringify(request));
        }
    });
});

