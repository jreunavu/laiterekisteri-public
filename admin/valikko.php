<div class="container-fluid" id="paaotsikko">
    <div class="row">
        <div class="col">
            <h1><?php echo $otsikko ?></h1>
        </div>
    </div>
</div>
<br class="rivinvaihto">

<div class="container-fluid" id="valikkocontainer">
    <div class="row">
        <div class="col-12 col-sm-2 col-xl-1 my-auto">
            <div class="dropdown">
                <button type="button" class="btn btn-light dropdown-toggle valikkonappi" data-toggle="dropdown">
                    Valikko
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.html">Etusivu</a>
                    <a class="dropdown-item" href="lisaa.php">Lisää laitteita</a>
                    <a class="dropdown-item" href="katso.php">Näytä tietokanta</a>
                    <a class="dropdown-item" href="muokkaa.php">Muokkaa/Poista laitteita</a>
                    <a class="dropdown-item" href="sisalto.php">Manuaalien ja sisällön lisäys</a>
                    <a class="dropdown-item" href="create.php">LUO TESTIKANTA</a>
                    <a class="dropdown-item" href="create1.php">LUO TESTIKANNAN TAULUT</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-xl-11" id="filtterointirivi">
            <input type="text" id="filtterointiInput" onkeyup="filtterointi()" placeholder="Etsi laitteita">
        </div>
    </div>
</div>
<br class="rivinvaihto">