$(document).ready(function() {

    $('select[name="district"]').on('change', function(){
        var selected_district =  $(this).find("option:selected").text();
        if(selected_district) {
            $.ajax({
                url: '/subcounties/get/'+selected_district,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="sub_county"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="sub_county"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="sub_county"]').empty();
        }

    });

});