$(function(){
    var socket = io.connect('http://10.10.0.100:8083');
   io.transports = ['websocket', 'flashsocket', 'htmlfile', 'xhr-multipart', 'xhr-polling', 'jsonp-polling'];
   
    socket.on('connect', function () {
      socket.on('fis', function(data,data2,data3) {
		//console.log(data2);
		//var msg2 = eval('('+data2+')');
		//var msg = eval(data);
		//$('#messages').append(msg.chgc+msg2.CODE);
		update(data,data2,data3);
      });
	  socket.on('ping', function(data){
	  });
      socket.on('disconnect', function() {
        document.getElementById("messages").innerHTML = 'disconnect';
      });
	  socket.on('error', function() {
        document.getElementById("messages").innerHTML = 'error';
      });
    });

   
  });