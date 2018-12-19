<div id="area_menu" class="row vertical-center">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">

        <div class="panel panel-primary panel-transparent">
            <div class="panel-heading txt_manual text-center">
                <h3 class="no_border no_margin">Spielanleitung</h3>
            </div>
            <div class="panel-body">         
                <p class="txt_black text-center">Wirf den Müll in den richtigen Mülleimer, indem du den Müll nach links (A) oder nach rechts (D) verschiebst. Die Farben der Tonnen haben folgende Bedeutung:</p>
                <p class="txt_yellow text-center">Gelb - Gelber Sack</p>
                <p class="txt_blue text-center">Blau - Altpapier</p>
                <p class="txt_brown text-center">Braun - Biomüll</p>
                <p class="txt_green text-center">Grün - Behälterglas</p>
                <p class="txt_black text-center">Schwarz - Restmüll</p>
            </div>
        </div>

        <div class="panel panel-primary panel-transparent">
            <div class="panel-body">         
                <form>
                    <div id="area_spieler" class="form-group form-group-lg has-feedback">
                        <input id="tbx_spieler" class="form-control input-lg" placeholder="Name" autofocus>
                        <span id="icon_spieler" class="glyphicon glyphicon-remove form-control-feedback invisible" aria-hidden="true"></span>
                    </div>
                </form>
                <div class="btn-group btn-block" role="group">
                    <button id="btn_play_game" type="button" class="btn btn-lg btn-block btn-play-color">
                        <span class="glyphicon glyphicon-expand" aria-hidden="true"></span>   
                        <strong> SPIELEN</strong>                                           
                    </button >
                </div> 
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="background-logo">
            <p>TRASH IT!</p>
        </div>
        <img src="images/bin_main.png">
    </div>
</div> 
  <div id="mdl_search_player" class="modal fade in" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-body">
            <div class="center-block">
                <div class="loader"></div> 
                <p class="text-center"><strong>Gegenspieler wird gesucht!</strong></p>
            </div>
        </div>
        <div class="modal-footer">
            <button id="btn_close_mdl" type="button" class="btn btn-warning">Abbrechen</button> 
        </div>
    </div>
  </div>
</div>
