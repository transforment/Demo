/**
 * Created by YingJie on 10/15/15.
 */



    //Prevent user from entering characters
$("#inputCMND,#myYear,#inputPhone,#sobang,#lephi,#songay,p").keypress(function(e) {
    var key_codes = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 0, 8];

    if (!($.inArray(e.which, key_codes) >= 0)) {
        e.preventDefault();
    }
}); //

//This function is used for checkbox when checked or unckeched
function display_reference(a) {


    var myCheckbox = document.getElementById("chk" + a);
    var dvPassport = document.getElementById("myDiv" + a);
    if (myCheckbox.checked) {
        dvPassport.style.visibility = "visible";
    } else {
        dvPassport.style.visibility = "hidden";
    }
}

function displayDialog(){
    var yingCheckbox = document.getElementById("yingCheckbox");
    var yingNote     = document.getElementById("note");
    if(yingCheckbox.checked){
        yingNote.style.visibility = "visible";
    }else{
        yingNote.style.visibility = "hidden";
    }
}


















