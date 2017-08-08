<!doctype html>
<html>
  <head>

     <meta charset="UTF-8">

    <title>Socket.IO chat</title>

    <!-- styles -->
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">

  </head>
  <body>

    <div class="container" id="caja-streaming">
      <div class="row">
          <div class="col-md-8 ">
              <div id="video">
                  <!-- <video id="video2" width="100%" height="100%" controls autoplay loop>
                  </video> -->
                  <img id="play">
              </div>
          </div>
          <div class="col-md-4" id="chat">
              <div class="panel panel-default">
                  <div class="panel-heading">Chat </div>
                  <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-12" >
                        <div id="messages">
                              <div class="chat-log">
                                  <div class="chat-message" v-for="message in messages">
                                      <p><small>@{{ message[1] }} : </small>@{{ message[2] }} </p>

                                  </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-12" >
                          <div class="chat-composer">
                              <input v-model="input" autocomplete="off" placeholder="Escribe un mensaje..." @keyup.enter="post" />

                              <input type="hidden" v-model="channel" value="">
                              <input type="hidden" v-model="userName" value="{{ Auth::user()->name }}">

                              <button @click="post" class="btn btn-primary">Send</button>
                          </div>
                      </div>
                  </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

    <!-- scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>

    <script>

    //  var socket = io("http://socket-seac.herokuapp.com:80");
    var socket=io('http://localhost:8080');

      console.log('cliente cargado..');

      var vm = new Vue({
        el: "#chat",

        data: {
          messages: [],
          input: "",
          channel: "",
          userName: ""
        },
        methods: {
          post: function() {
            console.log('mensaje ' + this.input);
            var payload = [this.channel, this.userName, this.input];
            console.log(payload);
            socket.emit('chat',payload);
            this.input = ''
          }
        }
      });

      console.log(vm.userName);
      socket.on('chat.' + vm.channel, function(payload){
        vm.messages.push(['chat', payload[1], payload[2]]);
        console.log('mensaje recibido -- ' + payload);
      });




    </script>

  </body>
</html>
