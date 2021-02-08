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
                   
                
                });
                $('.chosen-select').trigger("chosen:updated");
            });
        }, 1500);

    });
})
*/

$(function (){

    $(document).on('keyup', '.bs-searchbox input', function (e) {
      
        var searchData = e.target.value;
        $.get('/city/search?name=' + searchData, function (cities){
            $("#select-city option:not(:first)").remove();
            cities.forEach(function (city){
                $('#select-city').append('<option value="'+city.id+'">'+city.name+'</option>');
                $("#select-city").val(city.name)
            });
            $("#select-city").selectpicker("refresh");
        });
    });
})
