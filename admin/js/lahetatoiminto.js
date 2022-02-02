// Tarkistaa tiedostotyypin ennen lähetystä ja antaa ilmoituksen
function lahetaDokumentti() {

   var files = document.getElementById("file").files;

   if(files.length > 0 ){

      var formData = new FormData();
      formData.append("file", files[0]);

      var xhttp = new XMLHttpRequest();

      // POST-metodi ja ajax-tiedoston nimi
      xhttp.open("POST", "lahetatiedosto.php", true);

      xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {

           var response = this.responseText;
           if(response == 1){
              alert("Tiedosto lähetetty");
              location.reload();
           }else{
              alert("Tiedostoa ei lähetetty");
           }
         }
      };

      xhttp.send(formData);

   }else{
      alert("Valitse tiedosto");
   }

}