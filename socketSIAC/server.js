var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var port = process.env.PORT || 8080;
 

app.get('/', function(req, res){
  res.sendFile(__dirname + '/index.html');
});



io.on('connection', function(socket){

	



  console.log('cliente conectado.' + socket.id);
  //console.log(socket);
    // socket chat

    socket.on('chat', function(payload){
        console.log('mensaje recibido...' + payload);
        io.emit('chat.' + payload[0], payload);
    });


});



http.listen(port, function(){
  console.log('listening:' + port);
});


 