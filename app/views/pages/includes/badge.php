<?php
   if(count($data['requestCount'])<1){
      echo 0;
   }else{
      echo count($data['requestCount']);
   }
   if(count($data['requestCount'])>$_SESSION["count"]){
      $_SESSION["count"]=count($data['requestCount']);
?>
   <script>
      var modal = document.getElementById("notification");
      modal.style.display="block";
      var audio=new Audio("../audio/bell.mp3");
      audio.play();
      var span = document.getElementsByClassName("close")[0];
      span.onclick = function() {
         modal.style.display = "none";
      }
   </script>

<?php }else{
   $_SESSION["count"]=count($data['requestCount']);
   }
?>