<!-- Sivu uusien laitteiden lisäämiseen -->
<!doctype html>
<html lang="fi">
    <head>
        <title>Laiterekisteri</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/styles.css">
        <script src="js/piilotaFiltterointi.js"></script>

        <!-- Otsikko ja ulkoiset php:t -->
        <?php
        $otsikko = "Lisää laitteita";
        include_once 'db/yhteys.php';
        include_once 'valikko.php';
        echo '<script>', 'piilotaFiltterointi();', '</script>';
        ?>
    </head>

    <body>
        <!-- Lähettää tiedot tietokantaan -->
        <?php
        if(isset($_POST['tallenna'])){
        $sql = "INSERT INTO rekisteri (numero, nimike, merkki, hankittu, inventoitu, paikka, muita_tietoja)
        VALUES ('".$_POST["numero"]."','".$_POST["nimike"]."','".$_POST["merkki"]."','".$_POST["hankittu"]."','".$_POST["inventoitu"]."','".$_POST["paikka"]."','".$_POST["muita_tietoja"]."')";
        $result = mysqli_query($conn,$sql);
        } ?>

        <!-- Container lisäys-inputeille -->
        <div class="container-fluid" id="lisaacontainer">
            <form method="post">
                <div class="form-row">

                    <div class="col-md-4 mb-3">
                        <label for="numero">Numero</label>
                        <div class="input-group" >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">*</span>
                            </div>
                            <input type="text" class="form-control" name="numero" id="numero" placeholder="Numero" aria-describedby="inputGroupPrepend" maxlength="6" required>
                        </div>
                        <div id="num_response"></div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="nimike">Nimike</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">*</span>
                            </div>
                            <input type="text" class="form-control" name="nimike" placeholder="Nimike" aria-describedby="inputGroupPrepend" required>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="merkki">Merkki</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">*</span>
                            </div>
                            <input type="text" class="form-control" name="merkki" placeholder="Merkki" aria-describedby="inputGroupPrepend" required>
                        </div>
                    </div>

                </div>

                <div class="form-row">

                    <div class="col-md-3 mb-3">
                        <label for="hankittu">Hankittu</label>
                        <input type="text" class="form-control" id="hankittu" name="hankittu" placeholder="Hankittu">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="inventoitu">Inventoitu</label>
                        <input type="text" class="form-control" id="inventoitu" name="inventoitu" placeholder="Inventoitu">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="paikka">Hyllypaikka</label>
                        <input type="text" class="form-control" id="paikka" name="paikka" placeholder="Hyllypaikka">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="muita_tietoja">Muita tietoja</label>
                        <input type="text" class="form-control" id="muita_tietoja" name="muita_tietoja" placeholder="Tietoja">
                    </div>
                    
                </div>
                    <button class="btn btn-primary" type="submit" name="tallenna">Tallenna</button>
            </form><br>
        </div>

        <!-- Bootstrapin vaatimat javascriptit -->
        <script src="js/jquery.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- Javascriptit lisäominaisuuksille -->
        <script src="js/tarkistanumero.js"></script>
    </body>
</html>