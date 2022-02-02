//Tarkistaa numeron lisaa.php-sivulla, käyttää yhteystiedostona ajaxhaku.php:ta
$(document).ready(function(){
                $("#numero").keyup(function(){
                    var numero = $(this).val().trim();
                        if(numero != ''){

            $.ajax({
            url: 'ajaxhaku.php',
            type: 'post',
            data: {numero: numero},
            success: function(response){

                $('#num_response').html(response);
             },
         });
      }else{
         $("#num_response").html("");
      }
    });
});