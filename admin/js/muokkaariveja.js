$(document).ready(function(){
    $('#taulupohjamuokattava').Tabledit({
        url: 'muokkaapoista.php',
        hideIdentifier: true,
        columns: {
            identifier: [0, 'id'],
            editable: [[1, 'numero'], [2, 'nimike'], [3, 'merkki'], [4, 'hankittu'], [5, 'inventoitu'], [6, 'paikka'], [7, 'varaaja'], [8, 'muita_tietoja']]
        }
    })
});