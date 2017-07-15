/**
 * Created by Petenet001 on 13/07/2017.
 */

$(document).ready(function(){



    $('input[type=radio][name=identite]').change(function(){
        if (this.value == 'femme') {
            $('#etatenceinte').show();
        }else if(this.value == 'homme'){
            $('#etatenceinte').hide();
        }
    });

    $('input[type=radio][name=traitement]').change(function() {
        if (this.value == 'antipaludeen') {
            $('#select22').show();
            $('#lieu_traitement').show();
            $('#op32Text').hide();
            $('#trtmnt_autre').hide();
        }
        else if (this.value == 'traditionnel') {
            $('#op32Text').show();
            $('#lieu_traitement').show();
            $('#select22').hide();
            $('#trtmnt_autre').hide();

        }else if (this.value == 'autre'){
            $('#trtmnt_autre').show();
            $('#lieu_traitement').show();
            $('#op32Text').hide();
            $('#select22').hide();

        }else  if(this.value == 'aucun'){
            $('#select22').hide();
            $('#op32Text').hide();
            $('#trtmnt_autre').hide();
            $('#lieu_traitement').hide();
        }
    });


   $('#form_palu_et_vous').submit(function(event){
        event.preventDefault();

       event.preventDefault();
       var post_url = $(this).attr("action");
       var request_method = $(this).attr("method");
       var form_data = $(this).serialize();


       $.ajax({
           url : post_url,
           type: request_method,
           data : form_data
       }).done(function(response){
           $("#response_server").html(response);
           $('.close').click(function(){
               $("#response_server").hide();
           });
           if(response.match("succès")){
               $("#response_server").html(response);

               $('.close').click(function(){
                   $("#response_server").hide();
               });
           }

       });

   });
});