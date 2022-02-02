<?php 
//Lähettää tiedostot palvelimelle

if(isset($_FILES['file']['name'])){
   $filename = $_FILES['file']['name'];

   // Tiedostokansion sijainti
   $location = '../dokumentit/'.$filename;

   $file_extension = pathinfo($location, PATHINFO_EXTENSION);
   $file_extension = strtolower($file_extension);

   // Sallitut tiedostotyypit
   $valid_ext = array("pdf");

   $response = 0;
   if(in_array($file_extension,$valid_ext)){
      // Lähettää tiedoston
      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
         $response = 1;
      } 
   }

   echo $response;
   exit;
}