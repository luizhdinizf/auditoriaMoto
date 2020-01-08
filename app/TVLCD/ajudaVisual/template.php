<!DOCTYPE html>
<html>
<head>
    
<meta http-equiv="pragma" content="no-cache">
<script src="/js/mqttws31.min.js"></script>
<script src="../js/mqtt.js"></script>

<style>
html {
  scroll-behavior: smooth;
}

body {
        overflow: hidden;        
        margin:0;
        
    }

.skimage {
    
   
    height: 100vh;
    width: 100vw;
    padding: 0px;    
    border: 0px solid green;
}
.floatingBtn{position:absolute; top:0px; left:0px; color:#fff; z-index:9999;  font-size:12px; width: 12px; width: 12px;}


</style>
  </head>
<body>
 <a href="atualizar.html">
<img src="uploaded_files/0.gif" class="skimage" id="s0">
</a>

<script>
    
document.body.onload = function (event) {
    hostname= "<?php echo $hostname; ?>";
  MQTTconnect(hostname);
}

    
</script>


</body>
</html>
