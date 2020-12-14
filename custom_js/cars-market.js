/**
 * Created by HP on 23-Sep-20.
 */

$(document).ready(function(){

    $(function () {
        $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
    });


    $("#details").click(function () {
        $("#searching").slideDown("slow");
        $("#fastSearch").hide();
        $("#buttonSearch").hide();
    });

    $("#searchDet").click(function () {
        $("#searching").slideUp("slow");
        $("#fastSearch").slideDown("fast");
        $("#buttonSearch").slideDown("fast");
    });

});
