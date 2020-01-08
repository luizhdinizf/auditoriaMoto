var trocaImagem = function(path) {
    var ilist = document.images;
    var imageReload = ilist[0]
    imageReload.src = path + "?t=" + new Date().getTime();

}

var login = function(payload) {
    var imagesPath = "uploaded_files/";
    var path = imagesPath + "0.gif";

    if (payload == "true") {
        trocaImagem(path);
    }
    if (payload == "false") {
        trocaImagem(path);
    }

}

var reload = function() {
    location.reload(true);
}


host = "brmtz-dev-001";
port = 9001;
useTLS = false;
cleansession = true;
username = null;
password = null;


var mqtt;
var reconnectTimeout = 2000;
function MQTTconnect() {
 
    topic = hostname + "/#";
    if (typeof path == "undefined") {
        path = '/mqtt';
    }
    mqtt = new Paho.MQTT.Client(
        host,
        port,
        path,
        "web_" + parseInt(Math.random() * 100, 10)
    );
    var options = {
        timeout: 3,
        useSSL: useTLS,
        cleanSession: cleansession,
        onSuccess: onConnect,
        onFailure: function(message) {
            consolge.log("Connection failed: " + message.errorMessage + "Retrying");
            setTimeout(MQTTconnect, reconnectTimeout);
        }
    };
    mqtt.onConnectionLost = onConnectionLost;
    mqtt.onMessageArrived = onMessageArrived;
    if (username != null) {
        options.userName = username;
        options.password = password;
    }
    console.log("Host=" + host + ", port=" + port + ", path=" + path + " TLS = " + useTLS + " username=" + username + " password=" + password);
    mqtt.connect(options);
}

function onConnect() {
    console.log('Connected to ' + host + ':' + port + path);
    // Connection succeeded; subscribe to our topic
    //mqtt.publish("RMTZ3077/frontend","true");
    message = new Paho.MQTT.Message("true");
    var topicWake = hostname+"/frontend";
    message.destinationName = hostname+"/frontend";
    mqtt.send(message);

    mqtt.subscribe(topic, { qos: 2 });
    mqtt.subscribe("broadcast/#", { qos: 2 });
}

function onConnectionLost(response) {
    setTimeout(MQTTconnect, reconnectTimeout);
    //console.log("Reconecting");
};


function onMessageArrived(message) {
    var topic = message.destinationName;
    var command = topic.split("/")[1];
    var payload = message.payloadString;
    console.log(command);
    if (command == "reload") {
        console.log("Reloading");
        location.reload(true);
    }
    if (command == "login"){
         login(payload);
    }
    if (command == "trocar"){
        trocaImagem(payload);
    }
     if (command == "popup"){
            
            content = "<h1 align=\"center\" >"+hostname+"</h1>"+
            "</br><hr></br>"+   
            
            "<img src=\"uploaded_files/0.gif\" class=\"skimage\" id=\"s0\">";
            
            
            
            
            
            document.body.innerHTML = content; 
          //
           setTimeout(function(){
               console.log("Reloading");
            location.reload(true);
                
               
               }, 3000);

              
    }


    

    console.log(topic + ' = ' + payload);
   
};
