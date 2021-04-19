// Function for home page
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

// Function for ad new
$(function (){
    $(document).on('keyup', '.bs-searchbox input', function (e) {
      
        var searchData = e.target.value;
        $.get('/city/search?name=' + searchData, function (cities){
            $("#ad_city option:not(:first)").remove();
            cities.forEach(function (city){
                $('#ad_city').append('<option value="'+city.id+'">'+city.name+'</option>');
                $("#ad_city").val(city.name)
            });
            $("#ad_city").selectpicker("refresh");
        });
    });
})


// Function fullsearch
$(function (){
    $(document).on('keyup', '.bs-searchbox input', function (e) {
      
        var searchData = e.target.value;
        $.get('/city/search?name=' + searchData, function (cities){
            $("#fullSearchSelect option:not(:first)").remove();
            cities.forEach(function (city){
                $('#fullSearchSelect').append('<option value="'+city.id+'">'+city.name+'</option>');
                $("#fullSearchSelect").val(city.name)
            });
            $("#fullSearchSelect").selectpicker("refresh");
        });
    });
})
