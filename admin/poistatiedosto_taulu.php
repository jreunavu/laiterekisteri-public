<?php
    $dokumentti = $_POST['dokumentti'];
    $path = "../dokumentit/" . $dokumentti;
   if( file_exists($path)) unlink($path);
   echo "Poistettu " . $dokumentti;
?>