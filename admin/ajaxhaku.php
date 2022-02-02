<!-- Ajax-tiedosto numeron reaali-aikaiselle tarkistamiselle lisaa.php-sivulla, tarkistanumero.js kautta -->
<?php
include "db/yhteys.php";

if(isset($_POST['numero'])){
   $numero = $_POST['numero'];

   $query = "select count(*) as cntNumero from rekisteri where numero='".$numero."'";

   $result = mysqli_query($conn,$query);
   $response = "<span style='color: green;'>Numero on vapaa</span>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntNumero'];
    
      if($count > 0){
          $response = "<span style='color: red;'>Numero on jo käytössä.</span>";
      }
   
   }

   echo $response;
   die;
}