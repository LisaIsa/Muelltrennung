$(document).ready(function () {
    $('#btn_spielen').click(function () {
        loginPlayer();
    });

    $(document).keydown(function (event) {
        var KeyID = event.keyCode;

        if (KeyID == 13) { // return
            event.preventDefault();
            startGame();
        }
    });

    function loginPlayer() {
        if ($('#tbx_spieler').val() != '') {
            $.ajax({
                url: "index.php",
                type: "POST",
                data: {
                    action: "setPlayer",
                    player: $('#tbx_spieler').val()
                },
                //wird der ajax-Request erfolgreich durchgeführt, so wird die Rangliste gefüllt
                success: function () {
                    searchPlayer();
                },
                //kann der Request nicht ausgeführt werden, so wird ein Alter ausgegeben
                error: function (request, error)
                {
                    alert("FEHLER!!! Request: " + JSON.stringify(request));
                }
            });
        } else {
            $('#tbx_spieler').focus();
            $('#area_spieler').addClass("has-error");
            $('#icon_spieler').removeClass("invisible");
            $('#tbx_spieler').popover({container: 'body', title: 'Twitter Bootstrap Popover', content: "It's so simple to create a tooltop for my website!"});
        }
    }

    function searchPlayer() {
        setInterval(function () {
            $.ajax({
                type: "POST",
                url: "index.php",
                data: {
                    action: "getPlayer"
                },
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (index, val) {
                        if(val.SpielerId != ""){
                            startGame();
                        }
                    });
                },
                error: function (request, error)
                {
                    alert("FEHLER!!! Request: " + JSON.stringify(request));
                }
            });
        }, 1000);
    }
    
    function startGame(){
        $('#body').load('includes/multiplayer.inc.php', function () {
               $('#area_sidebar').load('includes/sidebar.inc.php', function () {
                 $.getScript("js/rankingJS.js");
             });
             $.getScript("js/gameJS.js");
            });
    }

    $('[data-toggle="popover"]').popover();
});

