<!DOCTYPE html>
<html>
<head>
<meta http-equiv="pragma" content="no-cache">
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
<body onload="refresher()">
 <a href="atualizar.html">
<img src="uploaded_files/0.gif" class="skimage" id="s0">
</a>

<script>
	
	 function refresher(){ 
      console.log("fora");
      var refresh = function() {
		  var imagesPath= "uploaded_files/";
		  var ilist = document.images;
		  var imageReload = ilist[0]      
          imageReload.src = imagesPath + "0.gif?t=" + new Date().getTime();
          console.log( new Date().getTime()); 
          }   
	 var reloader = function() {
		  location.reload(); 
          } 
       setInterval(refresh, 30000);
       setInterval(reloader, 300000);
    }
    </script>


</body>
</html>
