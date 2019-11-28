var refresh = function(logado) {
		  var imagesPath= "uploaded_files/";
		  var ilist = document.images;
		  var imageReload = ilist[0]      
          if (logado == "true"){
            console.log("True");  
          imageReload.src = imagesPath + "0.gif?t=" + new Date().getTime();
        }else{
            console.log("False");
            imageReload.src = imagesPath + "error.jpeg?t=" + new Date().getTime();
        }
          
          }  
    host = "brmtz-dev-001";
    port = 9001;
    useTLS = false;
    cleansession = true;
    username = null;
    password = null;

   
	var mqtt;
    var reconnectTimeout = 2000;
    function MQTTconnect(hostname) {
        topic = hostname+"/logado";
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
            onFailure: function (message) {
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
        console.log("Host="+ host + ", port=" + port + ", path=" + path + " TLS = " + useTLS + " username=" + username + " password=" + password);
        mqtt.connect(options);
    }
    function onConnect() {
        console.log('Connected to ' + host + ':' + port + path);
        // Connection succeeded; subscribe to our topic
        mqtt.subscribe(topic, {qos: 0});        
    }
    function onConnectionLost(response) {
        setTimeout(MQTTconnect, reconnectTimeout);
        //console.log("Reconecting");
    };
    function onMessageArrived(message) {
        var topic = message.destinationName;
        var payload = message.payloadString;
        console.log( topic + ' = ' + payload);
        refresh(payload);
    };
