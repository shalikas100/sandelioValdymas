$(document).ready(function(){

    $('#search').on('input', function(e){
        var route = $('#searchAjax').attr('url-products-ajax-action')+'?search='+$(this).val();
        var method = "GET";

        $.ajax({

            url: route,
            method: method,
            dataType: 'json',
            processData: false,
            success:function(response){

                var tbody = $('.products');
                tbody.html('');
                var generateHtml = '';

                for(var i = 0; i < response.length; i++){
                    generateHtml += '<tr>';
                    generateHtml += '<td>'+(i+1)+'</td>';
                    generateHtml += '<td>'+response[i].kodas+'</td>';
                    generateHtml += '<td>'+response[i].barkodas+'</td>';
                    generateHtml += '<td>'+response[i].pavadinimas+'</td>';
                    generateHtml += '<td>'+response[i].likutis+'</td>';
                    generateHtml += '<td>'+response[i].svoris+'</td>';
                    generateHtml += '<td>'+response[i].vnt_dezeje+'</td>';
                    generateHtml += '<td>'+response[i].gamintojas+'</td>';
                    generateHtml += '<td>'+response[i].tipas+'</td>';
                    generateHtml += '<td>'+response[i].vieta_sandelyje+'</td>';
                    generateHtml += '<td><a class="btn btn-primary" href="show/'+response[i].id+'">Rodyti</a></td>'
                    generateHtml += '</tr>';
                }
                tbody.append(generateHtml);
            },
            error:function(response){


            }
        })

        console.log(route)
    })

})