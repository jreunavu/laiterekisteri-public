<!-- Sivu tietokannan näyttämiseen -->
<!doctype html>
<html lang="fi">
    <head>

        <title>Laiterekisteri</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Tyylitiedostot -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/styles.css">

        <!-- Tietokannan yhteystiedosto ja valikkorivin php -->
        <?php
        $otsikko = "Näytä laitteet";
        include_once 'db/yhteys.php';
        include_once 'valikko.php';
        ?>

    </head>
    <body>
        <!-- Taulun container -->
        <div class="container-fluid" id="taulunlaatikko2">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="taulupohja">
                    <!-- Taulun otsikot -->
                    <thead>
                        <tr>
                            <th class="jarjesta">Numero</th>
                            <th class="jarjesta">Nimi</th>
                            <th class="jarjesta">Merkki</th>
                            <th class="jarjesta">Hankittu</th>
                            <th class="jarjesta">Inventoitu</th>
                            <th class="jarjesta">Hyllypaikka</th>
                            <th>Varaaja</th>
                            <th>Muita tietoja</th>
                            <th>Dokumentit</th>
                        </tr>
                    </thead>

                    <!-- Hakee tietokannasta tiedot -->
                    <?php
                    $query = "SELECT * FROM rekisteri";
                    $result = mysqli_query($conn, $query);

                    if ($result->num_rows > 0) {

                    // Tietokannan tiedot muuttujiin
                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $numero = $row['numero'];
                        $nimike = $row['nimike'];
                        $merkki = $row['merkki'];
                        $hankittu = $row['hankittu'];
                        $inventoitu = $row['inventoitu'];
                        $paikka = $row['paikka'];
                        $varaaja = $row['varaaja'];
                        $muita_tietoja = $row['muita_tietoja'];
                        // Hakee dokumentit-kansiosta kaikki P-numeroita vastaavat tiedostot
                        $dokumentit = glob("../dokumentit/$numero*.*");
                    ?>
                
                    <!-- Muuttujien tiedot taulun soluihin -->
                    <tbody>
                        <tr>
                            <td><?php echo $numero ?></td>
                            <td><?php echo $nimike ?></td>
                            <td><?php echo $merkki ?></td>
                            <td><?php echo $hankittu ?></td>
                            <td><?php echo $inventoitu ?></td>
                            <td><?php echo $paikka ?></td>
                            <td><?php echo $varaaja ?></td>
                            <td><?php echo $muita_tietoja ?></td>
                            <!-- Looppaa kaikki dokumentit joilla on sama numero kuin rivillä ja estää tyhjiä numeroita näyttämästä kaikkia dokumentteja -->
                            <td>
                                <?php if (!empty($numero)){
                                foreach($dokumentit as $dokumentti) { 
                                    echo "<a href='$dokumentti'>" .basename($dokumentti). "</a><br>";
                                } } ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php } }?>
                </table>
            </div>
        </div>

        <!-- Bootstrapin vaatimat javascriptit -->
        <script src="js/jquery.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- Javascriptit lisäominaisuuksille -->
        <script src="js/filtterointi.js"></script>
        <script src="js/sorttaa.js"></script>   
    </body>
</html>