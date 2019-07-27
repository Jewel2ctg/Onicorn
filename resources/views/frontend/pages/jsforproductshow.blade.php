<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script >

$(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 100,
            values: [15, 65],
            slide: function (event, ui) {

                $("#amount_start").val(ui.values[ 0 ]);
                $("#amount_end").val(ui.values[ 1 ]);
                var start = $('#amount_start').val();
                var end = $('#amount_end').val();

                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',//"{{ url('/') }}"+'/pricefilter',
                    data: "start=" + start + "& end=" + end,
                    success: function (response) {
                        
                        $('#updateDiv').html(response);
                    }
                });
            }
        });
        $("#sortby").change(function () {
        var sortby=$("#sortby").val();

        	//$sortby=this.value;;
        	 $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',//"{{ url('/') }}"+'/pricefilter',
                    data: "sortby=" + sortby,
                    success: function (response) {
                       
                        $('#updateDiv').html(response);
                    }
                });
        });
        });









</script>