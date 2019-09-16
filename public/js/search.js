  jQuery(document).ready(function ($) {
    var searchData = "";
    
    displaySalesProduct(searchData);   
   

    $("#productSearch").on("change keyup paste", function(){
        var searchData = $("#productSearch").val();
            displaySalesProduct(searchData);       
    });

    function displaySalesProduct(searchData){  
        
        $.ajax({
            url: url + "/school/ajaxDisplayRecord/edit/" + 1,
            method: "POST",
            data: { searchData: searchData},
            success: function(data) {
                $('#productsDisplay').html(data);                
            }
        });
    }



    });


