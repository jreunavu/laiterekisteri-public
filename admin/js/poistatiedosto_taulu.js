$(function(){
$('.fa-times').click(function(){
    if (confirm("Poistetaanko dokumentti?")) {
        var dokumentti = $(this).next('.dokumentti').text();
        var data_dokumentti = new FormData();
        data_dokumentti.append("dokumentti", dokumentti);
        $.ajax({
            url:'poistatiedosto_taulu.php',
            data: data_dokumentti,
            method:'POST',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response){
             {
                alert(response);
                location.reload();
             }
            }
           });
      }
});
});