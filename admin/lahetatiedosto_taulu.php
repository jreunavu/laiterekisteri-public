<?php //Lähettää muokkaa-sivun taulusta tiedostoja
if (!empty( $_FILES["file"]["name"] ) )
{
    $numero = $_POST['numero'];
    $temp = explode(".", $_FILES["file"]["name"]);
    $ext = end($temp);
    $newfilename = $numero . '.' . $ext;
    //Lisää numeron tiedostonnimeen jos samalla nimellä on jo tiedosto
    $counter = 0;
    while(file_exists("../dokumentit/" . $newfilename)) {
        $newfilename = $numero . '_' . $counter . '.' . $ext;
        $counter++;
    };
    move_uploaded_file($_FILES["file"]["tmp_name"], "../dokumentit/" . $newfilename);
}
?>