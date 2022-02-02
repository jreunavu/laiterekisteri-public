<!-- Sivu tiedostojen lähettämiseen palvelimelle -->
<!-- Sallittuja tiedostotyyppejä voi lisätä sivulla lahetatiedosto.php  -->
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
        <!-- Alkupään javaskriptit -->
        <script src="js/piilotaFiltterointi.js"></script>

        <!-- Otskko ja funktionaalisia php-tiedostoja -->
        <?php
        $otsikko = "Lisää dokumentteja";
        include_once 'db/yhteys.php';
        include_once 'valikko.php';
        echo '<script>', 'piilotaFiltterointi();', '</script>';
        ?>
    </head>
    <body>
        <!-- Container tiedostojen valinnalle -->
        <div class="container-fluid" id="tiedostolahetyscontainer">
            <form method="post" action="" enctype="multipart/form-data" id="myform">

                <div class="row">
                    <div class="custom-file">
                        <div class="col" id="valitsecontainer">
                            <input type="file" class="custom-file-input" id="file" name="file">
                            <label class="custom-file-label" for="customFile">Valitse tiedosto (.pdf)</label>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <!-- Napissa on lahetatoiminto.js-tiedostossa asetettu tiedostotyypin validointi -->
                    <div class="col">
                        <input type="button" class="btn btn-primary" value="Lähetä" id="laheta" onclick="lahetaDokumentti();">
                    </div>
                </div>
            </form>
        </div>
        <!-- Container ohjelaatikolle -->
        <div class="container-fluid" id="opastuscontainer">
            <div class="jumbotron">
                <h1>Tiedostojen lisääminen</h1><br>
                <p>Tiedostojen tulee olla pdf-muodossa ja tiedostonimen tulee olla laitteen P-numero, esim. P12345. <br>
                Jos laitteella on useampi tiedosto, ne voidaan nimetä P12345_1, P12345_2, myös P12345_ohjekirja jne. käyvät, kunhan alkuosa on laitteen numero.<br>
                </p>
            </div>
        </div>

        <?php
            // Hakee tietokannan tiedot
            $query = "SELECT * FROM rekisteri";
            $result = mysqli_query($conn, $query);
        ?>

        <!-- Container tiedostoille -->
        <div class="container-fluid" id="dokumentitcontainer">
            <div class="row">
                <div class="col">
                    <h1>Palvelimen tiedostot</h1><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php
                    $dokumentit = glob("../dokumentit/*");
                    foreach($dokumentit as $dokumentti) { 
                        echo "<i class='fas fa-times'></i> 
                        <a class='dokumentti' href='$dokumentti'>" .basename($dokumentti). "</a> <br>";
                    } 
                    ?>
                </div>
            </div>
        </div>


        <!-- Bootstrapin vaatimat javascriptit -->
        <script src="js/jquery.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- Javascriptit lisäominaisuuksille -->
        <script src="js/piilotaFiltterointi.js"></script>
        <script src="js/lahetatoiminto.js"></script>
        <script src="js/tiedostonnimi.js"></script>
        <script src="js/poistatiedosto_taulu.js"></script>
    </body>
</html>