$(document).ready(function(){


    $('#search').on('input', function(e){
        var route = $('#searchAjax').attr('url-clients-ajax-action')+'?search='+$(this).val();
        var method = "GET";

        $.ajax({

            url: route,
            method: method,
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success:function(response){

                var tbody = $('.clients');
                tbody.html('');
                var generateHtml = '';

                for(var i = 0; i < response.length; i++){
                    generateHtml += '<tr>';
                    generateHtml += '<td>'+response[i].id+'</td>';
                    generateHtml += '<td>'+response[i].im_kodas+'</td>';
                    generateHtml += '<td>'+response[i].klientas+'</td>';
                    generateHtml += '<td>'+response[i].adresas+'</td>';
                    generateHtml += '<td>'+response[i].miestas+'</td>';
                    generateHtml += '<td>'+response[i].pasto_kodas+'</td>';
                    generateHtml += '<td>'+response[i].telefonas+'</td>';
                    generateHtml += '<td>'+response[i].el_pastas+'</td>';
                    generateHtml += '<td>'+'<a class="btn btn-primary" href="show/'+response[i].id+'">Rodyti</a>'+'</td>';
                    generateHtml += '</tr>';
                }
                tbody.append(generateHtml);
            },
            error:function(response){

           
            }
        })

    
    })

})

