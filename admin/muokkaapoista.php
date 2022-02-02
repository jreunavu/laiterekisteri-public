<!-- Lähettää TableEdit-javaskriptin taulumuokkaukset tietokantaan -->
<?php
include('db/yhteys.php');
 
$input = filter_input_array(INPUT_POST);
 
if ($input['action'] === 'edit')
{
    $sql = "UPDATE rekisteri SET
    numero ='" . $input['numero'] . "',
    nimike ='" . $input['nimike'] . "',
    merkki ='" . $input['merkki'] . "',
    hankittu ='" . $input['hankittu'] . "',
    inventoitu ='" . $input['inventoitu'] . "',
    paikka ='" . $input['paikka'] . "',
    varaaja ='" . $input['varaaja'] . "',
    muita_tietoja='" . $input['muita_tietoja'] . "'" ."
    WHERE id='" . $input['id'] . "'";
    
    mysqli_query($conn,$sql);
}
if ($input['action'] === 'delete')
{
    mysqli_query($conn,"DELETE FROM rekisteri WHERE id='" . $input['id'] . "'");
}
 
 
mysqli_close($mysqli);
 
echo json_encode($input);
?>