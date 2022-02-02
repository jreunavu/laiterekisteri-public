<?php
//Lähettää TableEdit-javaskriptin taulumuokkaukset tietokantaan
include('db/yhteys.php');
 
$input = filter_input_array(INPUT_POST);
 
if ($input['action'] === 'edit')
{
    $sql = "UPDATE rekisteri SET
    varaaja ='" . $input['varaaja'] . "'
    WHERE id='" . $input['id'] . "'";
    
    mysqli_query($conn,$sql);
}
 
 
mysqli_close($mysqli);
 
echo json_encode($input);
?>