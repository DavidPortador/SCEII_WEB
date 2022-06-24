        </div>
    </div>
    <script>
      var barra = false;
      function side(){
        if(barra){
          closeNav();
          barra = false;
        }else{
          openNav();
          barra = true;
        }
      }
      function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
      }
      function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
      }
    </script>
  </body>
</html>