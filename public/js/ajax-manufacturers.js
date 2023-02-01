$(document).ready(function(){


    $('#search').on('input', function(e){
        var route = $('#searchAjax').attr('url-manufacturers-ajax-action')+'?search='+$(this).val();
        var method = "GET";

        $.ajax({

            url: route,
            method: method,
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success:function(response){

                var tbody = $('.manufacturers');
                tbody.html('');
                var generateHtml = '';

                for(var i = 0; i < response.length; i++){ 
                    generateHtml += '<tr>';
                    generateHtml += '<td>'+response[i].id+'</td>';
                    generateHtml += '<td>'+response[i].manufacturer+'</td>';
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

