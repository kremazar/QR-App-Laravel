<!doctype=html>
<html>
<head>
<title>QRCODE</title>

<script type="text/javascript" src="{{ URL::asset('js/grid.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/version.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/detector.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/formatinf.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/errorlevel.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bitmat.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/datablock.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bmparser.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/datamask.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/rsdecoder.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/gf256poly.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/gf256.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/decoder.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/qrcode.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/findpat.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/alignpat.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/databr.js') }}"></script>
</head>

<style type="text/css">
  #qr-canvas {
    display: none;
}
  #video-preview {
    width:320;
    height:240;
  }
</style>

<body>
  <div id="video-cont" class="video-container">
  <video id="video-preview"></video>
  {{csrf_field()}}
  
  {{ Form::open(['action'=>'MojiKorisniciController@store','method' =>'POST']) }}
  {{csrf_field()}}
  {{Form::text('name',0,['id'=>'rez_ime'])}}
  {{Form::text('email',0,['id'=>'rez_email'])}}
  {{Form::text('id_user',0,['id'=>'rez_id'])}}
  {{ Form::submit('Submit') }}
  
  {{ Form::close() }}

  <p id="rezultat">-skeniranje-</p>
  <p id="rezultat1">-skeniranje-</p>
  <p id="rezultat2">-skeniranje-</p>

<canvas id="qr-canvas" width="800" height="600" ></canvas>
</div>
</body>
<script type="text/javascript">
  window.onload =  function() {
  /* Ask for "environnement" (rear) camera if available (mobile), will fallback to only available otherwise (desktop).
   * User will be prompted if (s)he allows camera to be started */
  navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" }, audio: false }).then(function(stream) {
    var video = document.getElementById("video-preview");
    video.srcObject = stream;
    video.setAttribute("playsinline", true); /* otherwise iOS safari starts fullscreen */
    video.play();
    setTimeout(tick, 100); /* We launch the tick function 100ms later (see next step) */
  })
  .catch(function(err) {
    console.log(err); /* User probably refused to grant access*/
  });
};
function tick() {
  var video                   = document.getElementById("video-preview");
  var qrCanvasElement         = document.getElementById("qr-canvas");
  var qrCanvas                = qrCanvasElement.getContext("2d");
  var width, height;
  if (video.readyState === video.HAVE_ENOUGH_DATA) {
    qrCanvasElement.height  = video.videoHeight;
    qrCanvasElement.width   = video.videoWidth;
    qrCanvas.drawImage(video, 0, 0, qrCanvasElement.width, qrCanvasElement.height);
    try {
      var result = qrcode.decode();
      var pero = JSON.parse(result);
      document.getElementById("rezultat1").innerHTML = pero.name;
      document.getElementById("rezultat2").innerHTML = pero.email;

      document.getElementById("rez_ime").value = pero.name;
      document.getElementById("rez_email").value = pero.email;
         
      
        
      /* Video can now be stopped */
      video.pause();
      video.src = "";
      video.srcObject.getVideoTracks().forEach(track => track.stop());
      /* Display Canvas and hide video stream */
      qrCanvasElement.classList.remove("hidden");
      video.classList.add("hidden");
    } catch(e) {
      /* No Op */
    }
  }
  /* If no QR could be decoded from image copied in canvas */
  if (!video.classList.contains("hidden"))
    setTimeout(tick, 100);
}
//function UserAction() {
//  var xhttp = new XMLHttpRequest();
//  xhttp.onreadystatechange = function() {
//    if (this.readyState == 4 && this.status == 200) {
 //     alert(this.responseText);
 //   }
 // };
 // xhttp.open("POST", "/welcome", true);
 // xhttp.setRequestHeader("Content-type", "application/json");
  //xhttp.send( JSON.stringify(result) );
//}
</script>
</html>
