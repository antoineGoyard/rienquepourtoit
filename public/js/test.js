/*$(function (){
    $('#search-input').on('keyup', function() {
        var value = $(this).val();
        $.get('/location/city?name=' + value, function (articles){ 
            $('#result').empty();
            articles.forEach(function (article){
              
                $('#result').append("<li>" + article.nom+ "</li>")
            });
        });
    });
})
*/

/*
$(function (){
    var timeout = null;
    $('.chosen-search-input').on('keyup', function() {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
        var value = $('.chosen-search-input').val();
        
            $.get('/location/city?name=' + value, function (articles){ 
                
                $('.test1').remove();
                
                articles.forEach(function (article){
                    console.log(article);
                    $('.chosen-select').append("<option class='test1' value='"+ article.nom+"'>"+ article.nom+"</option>");
                
                });
                $('.chosen-select').trigger("chosen:updated");
            });
        }, 1500);

    });

})
*/


