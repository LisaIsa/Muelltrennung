$(document).ready(function () {

    setInterval(function () {
        var browserHeight = $(window).height();
        var trashYPos = $('#img_trash').position().top;

        if (trashYPos >= browserHeight) {
            checkBin();
            trashYPos = 0;
        }
        else {
            trashYPos = trashYPos + 1;
        }

        $('#img_trash').css('top', trashYPos);
    }, 10);

    $(document).keydown(function (event) {
        var KeyID = event.keyCode;
        var activeBin = getActiveBin();
        var deleteStat = activeBin + " img:last-child";
        var imgStat = '';
        var currentYPos = 0;
        var limitYPos = $('#area_bin').position().top;
        var heightTrash = 0;

        if (KeyID == 65) { // A (links)
            currentYPos = $('#img_trash').position().top;
            heightTrash = $('#img_trash').height();
            if (currentYPos < (limitYPos-heightTrash)) {
                imgStat = '<img id="img_trash" src="images/trash_ketchup.png" class="img-responsive img-trash" style="top:' + currentYPos + ';">';
                $(deleteStat).remove();
                $(getNewBin(activeBin, "left")).append(imgStat);
            }
        }

        if (KeyID == 68) { // D (rechts)
            currentYPos = $('#img_trash').position().top;
            heightTrash = $('#img_trash').height();
            if (currentYPos < (limitYPos-heightTrash)) {
                imgStat = '<img id="img_trash" src="images/trash_ketchup.png" class="img-responsive img-trash" style="top:' + currentYPos + ';">';
                $(deleteStat).remove();
                $(getNewBin(activeBin, "right")).append(imgStat);
            }
        }
    });

    function getActiveBin() {
        if ($("#area_brown:has(#img_trash)").length > 0) {
            return "#area_brown";
        }

        if ($("#area_blue:has(#img_trash)").length > 0) {
            return "#area_blue";
        }

        if ($("#area_green:has(#img_trash)").length > 0) {
            return "#area_green";
        }

        if ($("#area_yellow:has(#img_trash)").length > 0) {
            return "#area_yellow";
        }

        if ($("#area_black:has(#img_trash)").length > 0) {
            return "#area_black";
        }
    }

    function getNewBin(activeBin, move) {
        if (activeBin == "#area_brown" && move == "right") {
            return "#area_blue";
        }

        if (activeBin == "#area_blue" && move == "right") {
            return "#area_green";
        }

        if (activeBin == "#area_green" && move == "right") {
            return "#area_yellow";
        }

        if (activeBin == "#area_yellow" && move == "right") {
            return "#area_black";
        }

        if (activeBin == "#area_black" && move == "right") {
            return "#area_black";
        }

        if (activeBin == "#area_brown" && move == "left") {
            return "#area_brown";
        }

        if (activeBin == "#area_blue" && move == "left") {
            return "#area_brown";
        }

        if (activeBin == "#area_green" && move == "left") {
            return "#area_blue";
        }

        if (activeBin == "#area_yellow" && move == "left") {
            return "#area_green";
        }

        if (activeBin == "#area_black" && move == "left") {
            return "#area_green";
        }
    }
    
    function checkBin(){
        console.log(getActiveBin());
    }

});