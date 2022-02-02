<!-- Täysin muokattava taulu -->
<!doctype html>
<html lang="fi">
    <head>

        <title>Laiterekisteri</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Tyylitiedostot -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/all.css">
        <!-- Alkupään javaksriptit -->
        <script src="js/all.js"></script>
        <script src="js/piilotaFiltterointi.js"></script>

        <!-- Otsikko ja ulkoiset php:t -->
        <?php
        $otsikko = "Muokkaa laitteita";
        include_once 'db/yhteys.php';
        include_once 'valikko.php';
        ?>

    </head>
    <body>
        <div id="piilotettul" class="container">
            <input type="file" id="file" name="file" style="display: none">
        </div>
        <!-- Taulun container -->
        <div class="container-fluid" id="taulunlaatikko2">
            <div class="panel panel-default">
                <div class="table-responsive panel-body">
                    <table class="table table-hover table-bordered" id="taulupohjamuokattava">
                        <!-- Taulun otsikot -->
                        <thead>
                            <tr>
                                <th>id</th>
                                <th class="jarjesta">Numero</th>
                                <th class="jarjesta">Nimi</th>
                                <th class="jarjesta">Merkki</th>
                                <th class="jarjesta">Hankittu</th>
                                <th class="jarjesta">Inventoitu</th>
                                <th class="jarjesta">Hyllypaikka</th>
                                <th class="jarjesta">Varaaja</th>
                                <th>Muita tietoja</th>
                                <th>Dokumentit</th>
                            </tr>
                        </thead>

                        <?php
                            // Hakee tietokannan tiedot
                            $query = "SELECT * FROM rekisteri";
                            $result = mysqli_query($conn, $query);

                            if ($result->num_rows > 0) {

                            // Palauttaa tietokannan tiedot
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
                            $dokumentit = glob("../dokumentit/$numero*.*");
                        ?>
                
                        <!-- Taulun solut -->
                        <tbody>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td class="haenumero"><?php echo $numero ?></td>
                                <td id="rivitys"><?php echo $nimike ?></td>
                                <td id="rivitys"><?php echo $merkki ?></td>
                                <td><?php echo $hankittu ?></td>
                                <td><?php echo $inventoitu ?></td>
                                <td><?php echo $paikka ?></td>
                                <td><?php echo $varaaja ?></td>
                                <td id="rivitys"><?php echo $muita_tietoja ?></td>
                                <!-- Looppaa kaikki dokumentit joilla on sama numero kuin rivillä ja estää tyhjiä numeroita näyttämästä kaikkia dokumentteja, nowrap estää rastia menemästä eri riville pienemmillä näytöillä-->
                                <td style="white-space:nowrap;">
                                    <?php if (!empty($numero)){
                                    foreach($dokumentit as $dokumentti) { 
                                        echo "<i class='fas fa-times'></i> 
                                            <a class='dokumentti' href='$dokumentti'>" .basename($dokumentti). "</a>
                                            <br>";
                                    } 
                                    } ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php } }?>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </form>
        </div>

        <!-- Bootstrapin vaatimat javascriptit -->
        <script src="js/jquery.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        
        <!-- Javascriptit lisäominaisuuksille -->
        <script src="js/muokkaariveja.js"></script>
        <script src="js/varmista.js"></script>
        <script src="js/filtterointi_muokattava.js"></script>
        <script src="js/sorttaa.js"></script>
        <script src="js/jquery.tabledit.js"></script>
        <script src="js/poistatiedosto_taulu.js"></script>
    </body>
</html>