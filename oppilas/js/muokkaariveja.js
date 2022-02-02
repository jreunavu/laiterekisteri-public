//TableEdit-pluginin asetukset oppilas-taululle
$(document).ready(function(){
    $('#taulupohjamuokattava').Tabledit({
        url: 'muokkaapoista.php',
        hideIdentifier: true,
        columns: {
            identifier: [0, 'id'],
            editable: [[6, 'varaaja']]
        }
    })
});