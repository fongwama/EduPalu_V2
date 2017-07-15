/**
 * Created by Petenet001 on 10/07/2017.
 */
$(function () {

    $('#form_add_pharma').submit(function(event){

        var $this = $(this),
            action = $this.attr('action');
/*
        $.post( action, $this.serializeArray(), function(data){
            $('#response_form').html(data);
            $('#response_form').slideDown('slow');

            alert("ok");
            if(data.match('success') != null){
                $('.close').click(function(){
                    alert('success 1');
                    $('#response_form').slideUp('slow');
                    alert('success 2');
                    $('#nom_pharma').val('');
                    $('#adresse_pharma').val('');
                    $('#ville_pharma').val('');
                    $('#contact_pharma').val('');
                    $('#quartier_pharma').val('');
                    $('#contact_sender_pharma').val('');
                    alert('sucesse 3');
                });
            }else if(data.match('numero valide')){
                alert('pas de success')
            }
        });

*/
        event.preventDefault();
        var post_url = $(this).attr("action");
        var request_method = $(this).attr("method");
        var form_data = $(this).serialize();


        $.ajax({
            url : post_url,
            type: request_method,
            data : form_data
        }).done(function(response){
            $("#response_form").html(response);
                $('.close').click(function(){
                 $("#response_form").hide();
                 });
           if(response.match("succès")){
               $("#response_form").html(response);
                $('#nom_pharma').val('');
                $('#adresse_pharma').val('');
                $('#ville_pharma').val('');
                $('#contact_pharma').val('');
                $('#quartier_pharma').val('');
                $('#contact_sender_pharma').val('');
               $('.close').click(function(){
                   $("#response_form").hide();
               });
            }

        });

 //  return false;
    });
});