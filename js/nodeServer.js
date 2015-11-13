var socket = require( 'socket.io' );
var express = require( 'express' );
var http = require( 'http' );

var app = express();
var server = http.createServer( app );

var io = socket.listen( server );
var	users = [];
var nickNames = {};
var namesUsed = [];
var currentRoom = {};
io.sockets.on( 'connection', function( socket ) {

	console.log( "New client !" );

	socket.on('new_user', function(data){
		socket.user=data.id_user;
		nickNames[socket.id] = data.name_user;
		users[socket.user] = socket;
console.log( "Client !!!!!!!!!!!!" +data.id_user);
		joinRoom(socket, data.chat_vs);
	});

	
 handleMessageBroadcasting(socket);

	socket.on('disconnect', function(data){
	console.log( "Client Diss!" );
	delete users[socket.user];
	delete nickNames[socket.id];
	});
});
function joinRoom(socket, room) {
  socket.join(room);
  currentRoom[socket.id] = room;
// socket.emit('joinResult', {room: room});
//  socket.broadcast.to(currentRoom[socket.id]).emit('new_message', {
  //  	text: '<p class="text-center">'+ nickNames[socket.id]  + ' has joined ' + currentRoom[socket.id] +' </p> '});

}
function handleMessageBroadcasting(socket) {
	socket.on( 'sent_message', function( data ) {
	//	console.log( 'Message received ' + data.name + ":" + data.message );

		socket.broadcast.to(data.chat_vs).emit( 'new_message',{ 
			text:'<div class="col-xs-12 col-md-12 col-lg-12 pad"><span class="chat-img pull-left"><img src="http://localhost/Demo-2/upload/'+data.avatar+'" alt="User Avatar" class="img-circle size" /></span><div class="bubble me">'+ data.mess + '</div></div>'
			 } );
	/*if (data.vs in users){
			users[data.vs].emit( 'new_message', { name: data.n, message: data.mess } );
		
		} else{

		}
	*/
		//io.sockets.emit( 'message', { name: data.name, message: data.message } );

	});
	socket.on( 'sent_noti', function( data ) {
	if (3 in users)
	{
	//users[3].emit( 'new_noti', { name: data.n} );
		users[3].emit( 'new_noti', { name: data.n} );
		} 
		else
		{

		}
	
		//io.sockets.emit( 'message', { name: data.name, message: data.message } );

	});
}
function handleRoomJoining(socket) {
  socket.on('join', function(room) {
    socket.leave(currentRoom[socket.id]);
    joinRoom(socket, room.newRoom);
  });
}
server.listen( 8080 );