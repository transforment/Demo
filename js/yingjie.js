/**
 * Created by YingJie on 10/15/15.
 */

var string_1 ;

function doMath() {
    var lephi = parseInt(document.getElementById('lephi').value);
    var sobang = parseInt(document.getElementById('sobang').value);
    var total = 0;
    var myYing = document.getElementById('ma_Ho_So').value;

    if( myYing.substr(16,2) =="01" ){

        if(sobang >= 2){
            total = 2*2+(sobang-2)*1;
        }else{
            total =lephi * sobang;
        }
        if(total > 100) {
            total = 100;
        }
    }
    else{
        total =lephi * sobang;
    }
    document.getElementById('tongcong').value = total+"000";

}

$( document ).ready(function() {
    var lePhi = document.getElementById("lephi").value;
    if(lePhi != "Yingjie"){
        string_1 = "TP";
    }else {
        string_1 = "DD";
    }

    var myDayVar = document.getElementById("so_ngay").value;
    var theLifeOfWolf = 0;
    var theLifeOfYing = 0;
    document.getElementById("songay").value = myDayVar;
    var node_id = parseInt(document.getElementById('node_id').value);

    if(node_id >1){
        theLifeOfWolf = node_id -1;
        if(theLifeOfWolf < 10){
            theLifeOfYing = "0"+theLifeOfWolf;
        }else{
            theLifeOfYing = theLifeOfWolf;
        }
    }
    var theString = document.getElementById("today_1").value + "-" + document.getElementById("today_2").value + "-" + string_1 + theLifeOfYing + "-" ;
    var addCode = 2015;
    if( myDayVar == 0){
        addCode = "00";
    }else{
        addCode = document.getElementById("songay").value;
    }
    theString = theString + addCode;
    document.getElementById("ma_Ho_So").value = theString;
    //OK

    var myProcess = document.getElementById('ma_Ho_So').value;
    if( myProcess.substr(16,2) =="20" ){
        document.getElementById('lephi').readOnly = false;
    }

    var myDayVar = document.getElementById("songay").value;

    var myDate = new Date();

    var ngayTra = new Date(myDate.getTime()+myDayVar*24*3600*1000);

    var dd = (ngayTra.getDate() < 10 ? '0' : '') + ngayTra.getDate();
    var MM = ((ngayTra.getMonth() + 1) < 10 ? '0' : '') + (ngayTra.getMonth() + 1);
    var yyyy = ngayTra.getFullYear();
    var thu = ngayTra.getDay();
    var weekday;

    switch(thu) {
        case 1:
            weekday = 'Thứ hai';
            break;
        case 2:
            weekday = 'Thứ ba';
            break;
        case 3:
            weekday = 'Thứ tư';
            break;
        case 4:
            weekday = 'Thứ năm';
            break;
        case 5:
            weekday = 'Thứ sáu';
            break;
        case 6:
            weekday = 'Thứ bảy';
            break;
        default:
            weekday = 'Chủ nhật';
            break;
    }

    var myTimeString =weekday+", Ngày "+dd+" Tháng "+MM+" Năm "+yyyy;
    if(myDayVar==""){
        document.getElementById("time_info").innerHTML = "";
    }else{
        if(thu == 0 || thu == 6){
            document.getElementById("time_info").innerHTML =  myTimeString;
            $('#time_info').removeClass('anotherClass');
            $('#time_info').addClass('myClass');
        }else {
            document.getElementById("time_info").innerHTML =  myTimeString;
            $('#time_info').removeClass('myClass');
            $('#time_info').addClass('anotherClass');
        }
    }

});

function doMacBookPro(){

    var myDayVar = document.getElementById("songay").value;
    var myDate = new Date();

    var ngayTra = new Date(myDate.getTime()+myDayVar*24*3600*1000);

    var dd = (ngayTra.getDate() < 10 ? '0' : '') + ngayTra.getDate();
    var MM = ((ngayTra.getMonth() + 1) < 10 ? '0' : '') + (ngayTra.getMonth() + 1);
    var yyyy = ngayTra.getFullYear();
    var thu = ngayTra.getDay();
    var weekday;

    switch(thu) {
        case 1:
            weekday = 'Thứ hai';
            break;
        case 2:
            weekday = 'Thứ ba';
            break;
        case 3:
            weekday = 'Thứ tư';
            break;
        case 4:
            weekday = 'Thứ năm';
            break;
        case 5:
            weekday = 'Thứ sáu';
            break;
        case 6:
            weekday = 'Thứ bảy';
            break;
        default:
            weekday = 'Chủ nhật';
            break;
    }

    var myTimeString =weekday+", Ngày "+dd+" Tháng "+MM+" Năm "+yyyy;

    if(myDayVar==""){
        document.getElementById("time_info").innerHTML = "";
    }else{
        if(thu == 0 || thu == 6){
            document.getElementById("time_info").innerHTML  =  myTimeString;
            $('#time_info').removeClass('anotherClass');
            $('#time_info').addClass('myClass');
        }else {
            document.getElementById("time_info").innerHTML  =  myTimeString;
            $('#time_info').removeClass('myClass');
            $('#time_info').addClass('anotherClass');
        }
    }
    var theLifeOfWolf = 0;
    var theLifeOfYing = 0;
    document.getElementById("songay").value = myDayVar;


    var node_id = parseInt(document.getElementById('node_id').value);


    if(node_id >1){
        theLifeOfWolf = node_id -1;
        if(theLifeOfWolf < 10){
            theLifeOfYing = "0"+theLifeOfWolf;
        }else{
            theLifeOfYing = theLifeOfWolf;
        }
    }
    var theString = document.getElementById("today_1").value + "-" + document.getElementById("today_2").value + "-" + string_1 + theLifeOfYing + "-" ;
    var addCode = 2015;
    if( myDayVar == 0){
        addCode = "00";
    }else{
        addCode = document.getElementById('songay').value;
    }
    theString = theString + addCode;
    document.getElementById("ma_Ho_So").value = theString;


}

function compileInputs() {
    var inputsThanhPhan = new Array();
    var inputsSoLuong = new Array();
    $('.lovecheckbox').each(function () {

        if ($(this).is(':checked')) {
            var thenum = this.id.match(/\d+/)[0];
            var soLuong = document.getElementById("myNumber" + thenum);
            inputsSoLuong.push(soLuong);
            inputsThanhPhan.push( $(this).val());

        }
    });
    for (i = 0; i < inputsSoLuong.length; i++) {
        inputsThanhPhan[i] = inputsThanhPhan[i]+"+"+"<b>"+inputsSoLuong[i].value+"</b>"+"+";
    }
    document.getElementById("ying_ho_so_da_nhan").value = inputsThanhPhan;

}

function checkLePhi(){
    var myYing = document.getElementById('ma_Ho_So').value;
    if(myYing.substr(16,2)=="20"){

        var lephiNew = parseInt(document.getElementById('lephi').value);
        if(lephiNew != 400 && lephiNew != 0){
            alert("Kiểm tra lại tiền lệ phí!");
            document.getElementById('lephi').value = "400.000";
            document.getElementById('sobang').value = "";
            document.getElementById('tongcong').value = "0";

        }
    }
}

//Prevent user from entering characters
$("#inputCMND,#myYear,#myYearMonth,#myYearQuarter,#inputPhone,#sobang,#lephi,#songay,#2015").keypress(function(e) {
    var key_codes = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 0, 8];

    if (!($.inArray(e.which, key_codes) >= 0)) {
        e.preventDefault();
    }
}); //

function checkbox(){
var myCheckbox = document.getElementById("yingcheckbox");
    var x = document.getElementsByName('lovetextbox');
    if(myCheckbox.checked){
        $('.lovecheckbox').prop('checked', true);
        $('.lovetextbox').val('1');
    }else{
        $('.lovecheckbox').prop('checked', false);
        $('.lovetextbox').val('0');
    }
}

//This function is used for checkbox when checked or unckeched
function display(a) {
    var myCheckbox = document.getElementById("chk" + a);
    var myTextField = document.getElementById("myNumber" + a);
    if (myCheckbox.checked) {
        myTextField.value = 1;
    } else {
        myTextField.value = 0;
    }
}

