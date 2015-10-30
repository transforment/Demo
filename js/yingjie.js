/**
 * Created by YingJie on 10/15/15.
 */



    //Prevent user from entering characters


//This function is used for checkbox when checked or unckeched
function display(a) {


    var myCheckbox = document.getElementById("chk" + a);
    var dvPassport = document.getElementById("myDiv" + a);
    if (myCheckbox.checked) {
        dvPassport.style.visibility = "visible";
    } else {
        dvPassport.style.visibility = "hidden";
    }
}


















