<!-- Oppilas-näkymän sivu -->
<!doctype html>
<html lang="fi">
    <head>

        <title>Laiterekisteri</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/all.css">
        <script src="js/all.js"></script>
        <script src="js/piilotaFiltterointi.js"></script>

        
        <?php
        $otsikko = "Laboratorion laitetietokanta";
        include_once 'db/yhteys.php';
        ?>

        <!-- Otsikkopalkki -->
        <div class="container-fluid" id="paaotsikko">
            <div class="row">
                <div class="col">
                    <h1><?php echo $otsikko ?></h1>
                </div>
            </div>
        </div>

        <br>

        <!-- Hakulaatikko -->
        <div class="col-12 id="filtterointirivi">
            <input type="text" id="filtterointiInput" onkeyup="filtterointi()" placeholder="Etsi laitteita">
        </div>

    </head>
    <body>
        <!-- Taulun container alkaa -->
        <div class="container-fluid" id="taulunlaatikko2">
            <div class="panel panel-default">
                <div class="table-responsive panel-body">
                    <!-- Taulun headerit -->
                    <table class="table table-hover table-bordered" id="taulupohjamuokattava">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th class="jarjesta">Numero</th>
                                <th class="jarjesta">Nimi</th>
                                <th class="jarjesta">Merkki</th>
                                <th class="jarjesta">Hyllypaikka</th>
                                <th>Dokumentit</th>
                                <th class="jarjesta">Varaaja</th>
                            </tr>
                        </thead>

                        <!-- Hakee taulun sisällön tietokannasta -->
                        <?php
                            $query = "SELECT * FROM rekisteri";
                            $result = mysqli_query($conn, $query);

                            if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $numero = $row['numero'];
                                $nimike = $row['nimike'];
                                $merkki = $row['merkki'];
                                $paikka = $row['paikka'];
                                $varaaja = $row['varaaja'];
                                // Hakee dokumentit-kansiosta kaikki P-numeroita vastaavat tiedostot
                                $dokumentit = glob("../dokumentit/$numero*.*");
                        ?>
                
                        <!-- Taulun runko -->
                        <tbody>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $numero ?></td>
                                <td id="rivitys"><?php echo $nimike ?></td>
                                <td id="rivitys"><?php echo $merkki ?></td>
                                <td><?php echo $paikka ?></td>
                                <td>
                                    <?php if (!empty($numero)){
                                    foreach($dokumentit as $dokumentti) { 
                                        echo "<a href='$dokumentti'>" .basename($dokumentti). "</a><br>";
                                    } } ?>
                                </td>
                                <td><?php echo $varaaja ?></td>
                            </tr>
                        </tbody>
                            <?php } }?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Bootstrapin vaatimat javascriptit -->
        <script src="js/jquery.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        
        <!-- Javascriptit lisäominaisuuksille -->
        <script src="js/muokkaariveja.js"></script>
        <script src="js/filtterointi_muokattava.js"></script>
        <script src="js/sorttaa.js"></script> 
        <script src="js/jquery.tabledit.js"></script> 
    </body>
</html>