$(document).ready(function() {
    
    $(".menu").click(function(){
        var plik = $(this).attr("link");
        $(".content").load(plik);
    });
    
    $("#formAddKlient").submit(function () {
        $.ajax({
         url: "addklient.php",
         type: "POST",
         data: $("#formAddKlient").serialize(),
         cache: false,
         success: function (response){
            $("strona").load("showklienci.ph");
            //{alert(response);}
         }
         
     });
     return false;
 });   

    
}); 