$(document).ready(function () {

   function ConfirmDelete(event) {
        var x = confirm("Are you sure you want to delete?");
        if (x) {
            return true;
        }
        else {

            event.preventDefault();
            return false;
        }

    }

});
function ConfirmDelete(event) {
    var x = confirm("Are you sure you want to delete?");
    if (x) {
        return true;
    }
    else {
        return false;
        //event.preventDefault();

    }

}