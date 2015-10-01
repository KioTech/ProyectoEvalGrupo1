var gFunctions = { 
  geonames: function(idElement){
    var element = $("#" + idElement.toString());
    element.autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "http://gd.geobytes.com/AutoCompleteCity",
          dataType: "jsonp",
          data: {
            q: request.term
          },
          success: function( data ) {
            response( data );
          }
        });
      },
      minLength: 3
    });
  },
}