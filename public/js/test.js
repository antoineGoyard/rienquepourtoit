$(function (){
    $('#search-input').on('keyup', function() {
        var value = $(this).val();
        $.get('/article/search-json?terms=' + value, function (articles){ 
            articles.forEach(function (article){
                $('#result').append("<li>" + article.title + "</li>")
            });
        });
    });
})