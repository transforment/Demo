
var socket = io.connect( 'http://localhost:8080' );
var id_user = $( "#id_user" ).val();
var nameVal = $( "#name_user" ).val();
var chat_vs = $( "#chat_vs" ).val();

socket.emit( 'new_user',  {name_user: nameVal, id_user: id_user,chat_vs:chat_vs} );

$( "#messageForm" ).submit( function(e) {
	e.preventDefault();
	var msg = $( "#messageInput" ).val();

	var nameVal = $( "#name_user" ).val();
	var chat_vs = $( "#chat_vs" ).val();
	var vs = $( "#vs" ).val();
	var id_user = $( "#id_user" ).val();

	socket.emit( 'sent_message', { n: nameVal, mess: msg , chat_vs: chat_vs} );
	$.ajax({

			url:  "http://localhost/Demo_2/admin/Chat/push",
		type: "POST",

		data: {'name': nameVal , 'message': msg, 'chat_vs': chat_vs},
		success: function(data) {
           	var actualContent = $( "#messages_new" ).html();
			var newMsgContent ='<div class="col-xs-12 col-md-12 col-lg-12 pad"><div class="bubble you ">'+ msg +'</div></div>';
			var content =  actualContent+newMsgContent ;
			$( "#messages_new" ).html( content );  
			document.getElementById("messageForm").reset();

		}

	});

	
	return false;
});
$( "#changeto1" ).submit( function(e) {
	e.preventDefault();
        $.amaran({
            'theme'     :'colorful',
            'content'   :{
                bgcolor:'#27ae60',
                color:'#fff',
                message:'Lorem ipsum dolor sit amet',
            },
            'position'  :'bottom left',
            'inEffect' :'slideLeft',
            'outEffect' :'slideLeft',
            'delay' : 5000
        });
	
	return false;
});

$(document).ready(function(){
	//var nameVal = $( "#nameInput" ).val();
	//var msg = $( "#messageInput" ).val();
	$("#btnfuck").click(function(){
	//var nameVal = $( "#nameInput" ).val();
	var msg = $( "#messageInput" ).val();
	var nameVal = $( "#name_user" ).val();
	var nameRoom = $( "#name_user" ).val();
	socket.emit( 'sent_message', { name: nameVal, message: msg } );
	
	$.ajax({

		url:  "http://localhost/Demo/chat/push",
		type: "POST",

		data: {'name': nameVal , 'message': msg },
		success: function(data) {
           	var actualContent = $( "#messages_new" ).html();
			var newMsgContent = ' <p class="text-right">' + msg + '</p> ';
			var content =  actualContent+newMsgContent ;
			$( "#messages_new" ).html( content );         
		}

	});
	});


});
socket.on( 'new_message', function( data ) {
	var actualContent = $( "#messages_new" ).html();
	var newMsgContent =data.text;
	var content =  actualContent+newMsgContent ;
	
	$( "#messages_new" ).html( content );
});
socket.on( 'whisper', function( data ) {
	var actualContent = $( "#messages_new" ).html();
	var newMsgContent = '  <p class="text-left">' + data.message + '</p> ';
	var content =  actualContent+newMsgContent ;
	
	$( "#messages_new" ).html( content );
});