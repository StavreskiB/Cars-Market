/**
 * Created by HP on 14-Oct-20.
 */
$(document).ready(function(){
        var i = 0;
        $("#addImage").click(function () {
            $("#imageForm").append("<div class='col-3 ml-2 mt-4'> <label for=' " + i + "'></label> <input type='file' class='form-control-file' id='" + i +"'> </div>");
            i++;
        });
});