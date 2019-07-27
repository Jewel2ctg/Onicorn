<script>
 $("#country_id").change(function(){
        var country = $("#country_id").val();
        
        // Send an ajax request to server with this division
        $("#division-area").html("");
        var option = "<option>Please Select division</option>";
        var url="{{ url('/') }}";

        $.get( url+"/get-division/"+country, function( data ) {

            data = JSON.parse(data);
            data.forEach( function(element) {
              option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
            });

          $("#division-area").html(option);

        });
    });

    $("#division-area").change(function(){
        var division = $("#division-area").val();
        
        // Send an ajax request to server with this division
        $("#district-area").html("");
        var option = "<option>Please Select district</option>";
        var url="{{ url('/') }}";

        $.get( url+"/get-districts/"+division, function( data ) {

            data = JSON.parse(data);
            data.forEach( function(element) {
              option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
            });

          $("#district-area").html(option);

        });
    })
</script>